<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nickname = $_POST['nickname'];
    $tmptlahir = $_POST['tmptlahir'];
    $tnggllahir = $_POST['tnggllahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nomorsk = $_POST['nomorsk'];
    $alamat = $_POST['alamat'];
    $lingkungan = $_POST['lingkungan'];
    $sektor = $_POST['sektor'];
    $nomortelp = $_POST['nomortelp'];

    $sql = "INSERT INTO tblsnk (nama, nickname, tmptlahir, tnggllahir, jenis_kelamin, nomorsk, alamat, lingkungan, sektor, nomortelp) VALUES ('$nama', '$nickname', '$tmptlahir', '$tnggllahir', '$jenis_kelamin', '$nomorsk', '$alamat', '$lingkungan', '$sektor', '$nomortelp')";

    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['message'] = "Data berhasil disimpan!";
        $_SESSION['msg_type'] = "success";
        header("Location: admin_shintua.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
