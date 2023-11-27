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
$query = "SELECT nit, COUNT(*) as jumlah_duplikasi FROM pemilihan GROUP BY nit HAVING COUNT(*) > 1";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "NIT yang memiliki duplikasi di tabel pemilihan: ";
    while ($row = $result->fetch_assoc()) {
        echo $row['nit'] . " (Duplikasi: " . $row['jumlah_duplikasi'] . " kali) ";
    }
} else {
    echo "Tidak ada NIT yang memiliki duplikasi di tabel pemilihan.";
}

// Tutup koneksi
$conn->close();
?>
