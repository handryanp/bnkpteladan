<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nama_panggilan = $_POST['nama_panggilan'];
    $alamat = $_POST['alamat'];
    $lingkungan = $_POST['lingkungan'];
    $nomorkk = $_POST['nomorkk'];
    $nomortelp = $_POST['nomortelp'];

    $sql = "INSERT INTO kkjemaat (nama, nama_panggilan, alamat, lingkungan, nomorkk, nomortelp) VALUES ('$nama', '$nama_panggilan', '$alamat', '$lingkungan', '$nomorkk', '$nomortelp')";

    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['message'] = "Data berhasil disimpan!";
        $_SESSION['msg_type'] = "success";
        header("Location: formulirkkjemaat_create.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
