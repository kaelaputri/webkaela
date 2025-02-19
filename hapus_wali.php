<?php
include 'koneksi.php';

// Pastikan koneksi berhasil
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Cek apakah ID wali murid ada di URL
if (isset($_GET['id'])) {
    $id = (int)$_GET['id']; // Pastikan ID adalah integer

    // Query untuk menghapus data wali murid
    $query = "DELETE FROM wali_murid WHERE id_wali = $id";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data wali murid berhasil dihapus'); window.location='wali_murid.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data: " . mysqli_error($koneksi) . "'); window.location='wali.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location='wali.php';</script>";
}
?>