<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM kkjemaat WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $nama_panggilan = $row['nama_panggilan'];
        $alamat = $row['alamat'];
        $lingkungan = $row['lingkungan'];
        $nomorkk = $row['nomorkk'];
        $nomortelp = $row['nomortelp'];

        $sql_insert = "INSERT INTO kkjemaat_verifikasi (nama, nama_panggilan, alamat, lingkungan, nomorkk, nomortelp)
                       VALUES ('$nama', '$nama_panggilan', '$alamat', '$alamat', '$nomorkk', '$nomortelp')";

        if ($conn->query($sql_insert) === TRUE) {
            $sql_delete = "DELETE FROM kkjemaat WHERE id = $id";
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

header("Location: verifikasi_pendataan_jemaat.php");
exit();
