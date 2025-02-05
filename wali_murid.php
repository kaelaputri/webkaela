<?php
include 'koneksi.php'; // Koneksi ke database

// Ambil data wali murid beserta nama kelasnya
$query = "SELECT wali_murid.*, kelas.nama_kelas FROM wali_murid
            LEFT JOIN kelas ON wali_murid.id_kelas = kelas.id_kelas";

$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Wali Murid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-3">Data Wali Murid</h2>
        <div class="d-flex justify-content-between mb-3">
            <div>
                <a href="kelas.php" class="btn btn-primary">Kelola Kelas</a>
                <a href="siswa.php" class="btn btn-primary">Kelola Siswa</a>
            </div>
            <a href="tambah_wali.php" class="btn btn-success">Tambah Wali Murid</a>
        </div>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nama Wali Murid</th
