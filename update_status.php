<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Terima data dari formulir
    $status = isset($_POST['status']) ? $_POST['status'] : 0;
    $waktu = isset($_POST['waktu']) ? $_POST['waktu'] : 0;

    // Konfigurasi koneksi database (sesuaikan dengan database Anda)
    $host = "localhost"; // Ganti dengan host database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$database = "pestakora";

    // Buat koneksi ke database
    $conn = new mysqli($host, $username, $password, $database);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }

    // Update data di tabel voting (gantilah dengan nama tabel dan kolom sesuai dengan struktur database Anda)
    $sql = "UPDATE waktu SET status = '$status', waktu = '$waktu' WHERE id = 1";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diperbarui";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
}
?>
