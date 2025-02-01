<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jenis = $_POST['jenis'];
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar'];

    $allowedTypes = [
        'image/gif',
        'image/jpeg',
        'image/jpg',
        'image/pjpeg',
        'image/x-png',
        'image/png'
    ];

    $allowedExts = ['gif', 'jpeg', 'jpg', 'pjpeg', 'png'];

    $ext_gambar = strtolower(pathinfo($gambar['name'], PATHINFO_EXTENSION));

    if (in_array($gambar["type"], $allowedTypes) && in_array($ext_gambar, $allowedExts)) {

        $tmpfile = $gambar['tmp_name'];
        $namagambar = $gambar['name'];
        $kefilegambar = "uploads/" . $namagambar;

        if (move_uploaded_file($tmpfile, $kefilegambar)) {
            $sql = "INSERT INTO berita (jenis, judul, tanggal, deskripsi, gambar) VALUES ('$jenis', '$judul', '$tanggal', '$deskripsi', '$kefilegambar')";

            if ($conn->query($sql) === TRUE) {
                session_start();
                $_SESSION['message'] = "Berhasil Membuat Berita!";
                $_SESSION['msg_type'] = "success";
                header("Location: warta_create.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file gambar.";
        }
    } else {
        echo "Format file tidak diizinkan.";
    }

    $conn->close();
}
