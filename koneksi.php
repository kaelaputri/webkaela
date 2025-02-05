<<?php
$host = 'localhost'; // Server MySQL Anda
$user = 'root'; // Username MySQL Anda
$password = ''; // Password MySQL Anda (kosong jika menggunakan XAMPP atau Laragon default)
$database = 'sekolah'; // Nama database yang sudah ada

// Koneksi ke database
$koneksi = mysqli_connect($host, $user, $password, $database);

// Cek apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
