<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $anakke = $_POST['anakke'];
    $nama_ayah = $_POST['nama_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $alamat = $_POST['alamat'];
    $lingkungan = $_POST['lingkungan'];
    $sektor = $_POST['sektor'];
    $nomorkk = $_POST['nomorkk'];

    $sql = "INSERT INTO sekolahsidi (nama, tempat_lahir, tanggal_lahir, jenis_kelamin, anakke, nama_ayah, nama_ibu, alamat, lingkungan, sektor, nomorkk) VALUES ('$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$anakke', '$nama_ayah', '$nama_ibu', '$alamat', '$lingkungan', '$sektor', '$nomorkk')";

    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['message'] = "Data berhasil disimpan!";
        $_SESSION['msg_type'] = "success";
        header("Location: formulirsiswasidi_create.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>