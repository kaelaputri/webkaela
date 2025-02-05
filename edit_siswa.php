<?php
include 'koneksi.php';

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_siswa = $_POST['nama_siswa'];
    $alamat = $_POST['alamat'];
    $kontak = $_POST['kontak'];
    $id_kelas = $_POST['id_kelas'];  // id_kelas dipilih dari dropdown kelas

    // Query untuk menyimpan data siswa
    $query = "INSERT INTO siswa (nama_siswa, alamat, kontak, id_kelas) 
              VALUES ('$nama_siswa', '$alamat', '$kontak', '$id_kelas')";

    if (mysqli_query($koneksi, $query)) {
        echo "Siswa berhasil ditambahkan!";
        header("Location: siswa.php"); // Redirect ke halaman utama data siswa
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-3">Tambah Siswa</h2>
        <a href="siswa.php" class="btn btn-primary mb-3">Kembali ke Data Siswa</a>
        
        <form action="tambah_siswa.php" method="POST">
            <div class="mb-3">
                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required></textarea>
            </div>
            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" class="form-control" id="kontak" name="kontak" required>
            </div>
            <div class="mb-3">
                <label for="id_kelas" class="form-label">Kelas</label>
                <select class="form-select" id="id_kelas" name="id_kelas" required>
                    <option value="">Pilih Kelas</option>
                    <?php
                    // Menampilkan pilihan kelas dari database
                    $kelas_query = "SELECT * FROM kelas";
                    $kelas_result = mysqli_query($koneksi, $kelas_query);
                    while ($kelas_row = mysqli_fetch_assoc($kelas_result)) {
                        echo "<option value='" . $kelas_row['id_kelas'] . "'>" . $kelas_row['nama_kelas'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Tambah Siswa</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
