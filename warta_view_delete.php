<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `berita_verifikasi` WHERE warta_id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['message'] = "Berita berhasil dihapus!";
        $_SESSION['msg_type'] = "success";
        header("Location: warta_view.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header("Location: warta_view.php");
    exit();
} else {
    echo "ID tidak ditemukan.";
}

$conn->close();
?>
