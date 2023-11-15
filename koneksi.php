<?php
$host = "localhost"; // Ganti dengan host database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$database = "pestakora"; // Ganti dengan nama database Anda

date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
$waktu = date("d-m-Y H:i:s");

// Membuat koneksi ke database
$mysqli = new mysqli($host, $username, $password, $database);

// Memeriksa apakah koneksi berhasil
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
} 
?>