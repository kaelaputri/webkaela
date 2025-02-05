<?php
include 'koneksi.php'; // Koneksi ke database

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_wali = $_POST['nama_wali'];
    $kontak = $_POST['kontak'];
    $id_kelas = $_POST['id_kelas'];  // id_kelas dipilih dari dropdown kelas

    // Query untuk menyimpan data wali murid
    $query = "INSERT INTO wali_murid (nama_wali, kontak, id_kelas) 
              VALUES ('$nama_wali', '$kontak', '$id_kelas')";

    if (mysqli_query($koneksi, $query)) {
        echo "Wali murid berhasil ditambahkan!";
        header("Location: wali_murid.php"); // Redirect ke halaman utama data wali murid
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
    <title>Tambah Wali Murid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-3">Tambah Wali Murid</h2>
        <a href="wali_murid.php" class="btn btn-primary mb-3">Kembali ke Data Wali Murid</a>
        
        <form action="tambah_wali.php" method="POST">
            <div class="mb-3">
                <label for="nama_wali" class="form-label">Nama Wali Murid</label>
                <input type="text" class="form-control" id="nama_wali" name="nama_wali" required>
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
            <button type="submit" class="btn btn-success">Tambah Wali Murid</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
