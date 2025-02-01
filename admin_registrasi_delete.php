<?php
include 'config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];
    
    $stmt = $conn->prepare("DELETE FROM tbluser WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    
    if ($stmt->execute()) {
        session_start();
        $_SESSION['message'] = "Akun berhasil dihapus!";
        $_SESSION['msg_type'] = "success";
        header("Location: admin_registrasi_akun.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
} else {
    echo "ID tidak ditemukan atau tidak valid.";
}

$conn->close();
