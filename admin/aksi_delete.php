<?php
include 'koneksi.php';
$id = $_GET['id'];

$sql = "delete from data_location where id = $id";
$hasil = mysqli_query($koneksi, $sql);

if ($hasil) {
    header("location:daftarwarkop.php?pesan=sukses");
} else {
    header("location:daftarwarkop.php?pesan=gagal");
}
?>
