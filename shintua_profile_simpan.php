<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("User tidak terautentikasi.");
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nickname = $_POST['nickname'];
    $tmptlahir = $_POST['tmptlahir'];
    $tnggllahir = $_POST['tnggllahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nomorsk = $_POST['nomorsk'];
    $alamat = $_POST['alamat'];
    $lingkungan = $_POST['lingkungan'];
    $sektor = $_POST['sektor'];
    $nomortelp = $_POST['nomortelp'];
    $profile_pic = '';

    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['profile_pic']['tmp_name'];
        $file_name = basename($_FILES['profile_pic']['name']);
        $target_dir = "uploads/";
        $target_file = $target_dir . $file_name;

        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        if (move_uploaded_file($file_tmp, $target_file)) {
            $profile_pic = $file_name;
        } else {
            echo "Error uploading file.";
            exit();
        }
    }

    $query_user = "SELECT snk_id FROM tbluser WHERE user_id = " . intval($user_id);
    $result_user = mysqli_query($conn, $query_user);
    $row_user = mysqli_fetch_assoc($result_user);
    $snk_id = $row_user['snk_id'];

    $sql = "UPDATE tblsnk SET 
                nama='$nama', 
                nickname='$nickname', 
                tmptlahir='$tmptlahir', 
                tnggllahir='$tnggllahir', 
                jenis_kelamin='$jenis_kelamin', 
                nomorsk='$nomorsk', 
                alamat='$alamat', 
                lingkungan='$lingkungan', 
                sektor='$sektor', 
                nomortelp='$nomortelp'";

    if (!empty($profile_pic)) {
        $sql .= ", profile_pic='$profile_pic'";
    }

    $sql .= " WHERE id=" . intval($snk_id);

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Profile Berhasil Diperbarui!";
        $_SESSION['msg_type'] = "success";
        header("Location: shintua_profile.php?id=" . intval($snk_id));
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
