<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM sekolahsidi WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['message'] = "Data berhasil dihapus!";
        $_SESSION['msg_type'] = "success";
        header("Location: admin_verifikasi_pendataan_jemaat.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header("Location: admin_verifikasi_pendataan_jemaat.php");
    exit();
} else {
    echo "ID tidak ditemukan.";
}

$conn->close();
?>
