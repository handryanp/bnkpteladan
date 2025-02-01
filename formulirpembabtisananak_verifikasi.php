<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM babtisanak WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $tempat_lahir = $row['tempat_lahir'];
        $tanggal_lahir = $row['tanggal_lahir'];
        $jenis_kelamin = $row['jenis_kelamin'];
        $anakke = $row['anakke'];
        $nama_ayah = $row['nama_ayah'];
        $nama_ibu = $row['nama_ibu'];
        $alamat = $row['alamat'];
        $lingkungan = $row['lingkungan'];
        $sektor = $row['sektor'];
        $nomorkk = $row['nomorkk'];
        $uang_sumbangan = $row['uang_sumbangan'];
        $foto_tambahan = $row['foto_tambahan'];

        $sql_insert = "INSERT INTO babtisanak_verifikasi (nama, tempat_lahir, tanggal_lahir, jenis_kelamin, anakke, nama_ayah, nama_ibu, alamat, lingkungan, sektor, nomorkk, uang_sumbangan, foto_tambahan)
                       VALUES ('$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$anakke', '$nama_ayah', '$nama_ibu', '$alamat', '$lingkungan', '$sektor', '$nomorkk', '$uang_sumbangan', '$foto_tambahan')";

        if ($conn->query($sql_insert) === TRUE) {
            $sql_delete = "DELETE FROM babtisanak WHERE id = $id";
            $conn->query($sql_delete);

            $_SESSION['message'] = "Data berhasil diverifikasi.";
        } else {
            $_SESSION['message'] = "Error: " . $sql_insert . "<br>" . $conn->error;
        }
    } else {
        $_SESSION['message'] = "Data tidak ditemukan.";
    }
} else {
    $_SESSION['message'] = "ID Data tidak ditemukan.";
}

$conn->close();

header("Location: shintua_verifikasi_pendataan_jemaat.php");
exit();
