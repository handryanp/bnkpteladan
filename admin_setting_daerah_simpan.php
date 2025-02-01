<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sektor = $_POST['sektor'];

    $sql = "INSERT INTO trsektor (sektor) VALUES ('$sektor')";

    if ($conn->query($sql) === TRUE) {
        $id_sektor = $conn->insert_id;

        $id_lingkungan = 30;
        $queryrelasi = "INSERT INTO trsektor_trlingkungan (trsektor_id, trlingkungan_id) VALUES ('$id_sektor', '$id_lingkungan')";
        $hasilrelasi = $conn->query($queryrelasi);
        
        session_start();
        $_SESSION['message'] = "Data berhasil disimpan!";
        $_SESSION['msg_type'] = "success";
        header("Location: admin_setting_daerah_create.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    header("Location: admin_setting_daerah_create.php");
    exit();
}
?>
