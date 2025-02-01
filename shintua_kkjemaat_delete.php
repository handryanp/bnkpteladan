<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM kkjemaat_verifikasi WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['message'] = "Data berhasil dihapus!";
        $_SESSION['msg_type'] = "success";
        header("Location: shintua_profile.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header("Location: shintua_profile.php");
    exit();
} else {
    echo "ID tidak ditemukan.";
}

$conn->close();
?>
