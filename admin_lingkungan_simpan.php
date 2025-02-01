<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lingkungan = $_POST['lingkungan'];

    $sql = "INSERT INTO trlingkungan (lingkungan) VALUES ('$lingkungan')";

    if ($conn->query($sql) === TRUE) {
        $id_lingkungan = $conn->insert_id;

        $id_sektor = 30;
        $queryrelasi = "INSERT INTO trsektor_trlingkungan (trsektor_id, trlingkungan_id) VALUES ('$id_sektor', '$id_lingkungan')";
        $hasilrelasi = $conn->query($queryrelasi);
        
        session_start();
        $_SESSION['message'] = "Data lingkungan berhasil disimpan!";
        $_SESSION['msg_type'] = "success";
        header("Location: admin_lingkungan_create.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    header("Location: admin_lingkungan_create.php");
    exit();
}
?>
