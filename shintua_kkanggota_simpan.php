<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tmptlahir = $_POST['tmptlahir'];
    $tnggllahir = $_POST['tnggllahir'];
    $baptis = $_POST['baptis'];
    $sidi = $_POST['sidi'];
    $nikah = $_POST['nikah'];
    $hub_keluarga = $_POST['hub_keluarga'];
    $status_nikah = $_POST['status_nikah'];
    $pendidikan = $_POST['pendidikan'];
    $pekerjaan = $_POST['pekerjaan'];
    $keterangan = $_POST['keterangan'];

    $sql = "INSERT INTO tblanggota (nama, jenis_kelamin, tmptlahir, tnggllahir, baptis, sidi, nikah, hub_keluarga, status_nikah, pendidikan, pekerjaan, keterangan) VALUES ('$nama', '$jenis_kelamin', '$tmptlahir', '$tnggllahir', '$baptis', '$sidi', '$nikah', '$hub_keluarga', '$status_nikah', '$pendidikan', '$pekerjaan', '$keterangan')";

    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['message'] = "Data berhasil disimpan!";
        $_SESSION['msg_type'] = "success";
        header("Location: shintua_kkanggota_create.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
