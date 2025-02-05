<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_siswa = $_GET['id'];
    $delete_query = "DELETE FROM siswa WHERE id_siswa = '$id_siswa'";

    if (mysqli_query($koneksi, $delete_query)) {
        echo "Siswa berhasil dihapus!";
        header("Location: siswa.php");
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}
?>
