<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM berita WHERE warta_id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $jenis = $row['jenis'];
        $judul = $row['judul'];
        $tanggal = $row['tanggal'];
        $deskripsi = $row['deskripsi'];
        $gambar = $row['gambar'];

        $sql_insert = "INSERT INTO berita_verifikasi (jenis, judul, tanggal, deskripsi, gambar)
                       VALUES ('$jenis', '$judul', '$tanggal', '$deskripsi', '$gambar')";

        if ($conn->query($sql_insert) === TRUE) {
            $sql_delete = "DELETE FROM berita WHERE warta_id = $id";
            $conn->query($sql_delete);

            $_SESSION['message'] = "Berita berhasil diverifikasi.";
        } else {
            $_SESSION['message'] = "Error: " . $sql_insert . "<br>" . $conn->error;
        }
            $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Berita tidak ditemukan.";
    }
} else {
    $_SESSION['message'] = "ID berita tidak ditemukan.";
}

$conn->close();

header("Location: warta_verifikasi.php");
exit();
?>
