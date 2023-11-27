<?php
$host = "localhost";
$username = "root";
$password = "HH2JH148877";
$database = "pestakora";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data NIT dari tabel users yang tidak ada di tabel pemilihan
$query = "SELECT users.nit FROM users LEFT JOIN pemilihan ON users.nit = pemilihan.nit WHERE pemilihan.nit IS NULL";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "NIT yang tidak ada di tabel pemilihan: ";
    while ($row = $result->fetch_assoc()) {
        echo $row['nit'] . " ";
    }
} else {
    echo "Semua NIT pada tabel users sudah ada di tabel pemilihan.";
}

// Tutup koneksi
$conn->close();
?>