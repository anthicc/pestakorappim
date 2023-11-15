<?php
// Mulai sesi PHP
session_start();

// Hapus semua data sesi
session_destroy();

// Arahkan pengguna ke halaman login (ganti "login.php" sesuai dengan halaman login Anda)
header("Location: login.php");
exit; // Pastikan untuk keluar dari skrip PHP setelah mengarahkan
?>
