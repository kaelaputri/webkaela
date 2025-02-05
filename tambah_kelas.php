<?php
include 'koneksi.php';  // Menghubungkan ke database

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nama_kelas = $_POST['nama_kelas'];

    // Query untuk memasukkan data kelas
    $query = "INSERT INTO kelas (nama_kelas) VALUES ('$nama_kelas')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Kelas berhasil ditambahkan!'); window.location='kelola_kelas.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-3">Tambah Kelas</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Tambah Kelas</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
