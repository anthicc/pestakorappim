<?php
// Koneksi ke database (sesuaikan dengan detail database Anda)
$host = "localhost";
$username = "root";
$password = "";
$database = "pestakora";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil suara dari database untuk setiap paslon
$result1 = $conn->query("SELECT * FROM pemilihan WHERE danyon = '1'");
$suara1 = $result1->num_rows;

$result2 = $conn->query("SELECT * FROM pemilihan WHERE danyon = '2'");
$suara2 = $result2->num_rows;

$result3 = $conn->query("SELECT * FROM pemilihan WHERE danyon = '3'");
$suara3 = $result3->num_rows;


$result4 = $conn->query("SELECT * FROM pemilihan WHERE kadem = '1'");
$suara4 = $result4->num_rows;

$result5 = $conn->query("SELECT * FROM pemilihan WHERE kadem = '2'");
$suara5 = $result5->num_rows;

$result6 = $conn->query("SELECT * FROM pemilihan WHERE kadem = '3'");
$suara6 = $result6->num_rows;


$result7 = $conn->query("SELECT * FROM pemilihan WHERE wakadem = '1'");
$suara7 = $result7->num_rows;

$result8 = $conn->query("SELECT * FROM pemilihan WHERE wakadem = '2'");
$suara8 = $result8->num_rows;

$result9 = $conn->query("SELECT * FROM pemilihan WHERE wakadem = '3'");
$suara9 = $result9->num_rows;

$jumlah = $conn->query("SELECT * FROM users");
$jumlahh = $jumlah->num_rows;
$tidakvote = $jumlahh - $suara1 - $suara2 - $suara3;

// Tutup koneksi
$conn->close();

// Kembalikan suara sebagai respons JSON
echo json_encode([$suara1, $suara2, $suara3, $suara4, $suara5, $suara6, $suara7, $suara8, $suara9, $tidakvote]);
?>
