<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$servername = "localhost";
$username = "bnkpteladan";
$password = "bnkp123";
$dbname = "bnkpteladan";

$base_url = "https://iniaku.network/bnkpteladan/user_beranda.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
