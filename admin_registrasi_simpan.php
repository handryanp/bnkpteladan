<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_nm = $_POST['user_nm'];
    $user_pass = $_POST['user_pass'];
    $user_email = $_POST['user_email'];
    $role_id = $_POST['role'];
    $snk_id = null;

    if ($role_id == 4) {
        $query_snk = "SELECT id FROM tblsnk ORDER BY id DESC LIMIT 1";
        $result_snk = $conn->query($query_snk);
        if ($result_snk->num_rows > 0) {
            $row_snk = $result_snk->fetch_assoc();
            $snk_id = $row_snk['id'];
        } else {
            $_SESSION['message'] = 'Tidak ada SNK yang ditemukan! Silakan tambahkan data SNK terlebih dahulu.';
            $_SESSION['msg_type'] = 'danger';
            header("Location: registrasi_akun.php");
            exit();
        }
    }

    $check_query = "SELECT * FROM tbluser WHERE user_nm = ? OR user_email = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ss", $user_nm, $user_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['message'] = 'Username atau Email sudah terdaftar nih! Coba lagi dengan data yang berbeda';
        $_SESSION['msg_type'] = 'warning';
        header("Location: admin_registrasi_akun.php");
    } else {
        if ($snk_id !== null) {
            $insert_query = "INSERT INTO tbluser (user_nm, user_pass, user_email, role_id, snk_id) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_query);
            $stmt->bind_param("sssii", $user_nm, $user_pass, $user_email, $role_id, $snk_id);
        } else {
            $insert_query = "INSERT INTO tbluser (user_nm, user_pass, user_email, role_id) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_query);
            $stmt->bind_param("sssi", $user_nm, $user_pass, $user_email, $role_id);
        }

        if ($stmt->execute()) {
            $_SESSION['message'] = 'Berhasil Membuat Akun Baru!';
            $_SESSION['msg_type'] = 'success';
            header("Location: admin_registrasi_akun.php");
        } else {
            $_SESSION['message'] = 'Gagal Membuat Akun! Silakan coba lagi dan mengisi data dengan benar.';
            $_SESSION['msg_type'] = 'danger';
            header("Location: admin_registrasi_akun.php");
        }
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: admin_registrasi_akun.php");
    exit();
}
