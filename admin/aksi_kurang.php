<?php
include 'koneksi.php';
$id = $_GET['id'];
$curr_cap = $_GET['curr_cap'];

$sql = "update data_location set curr_cap = $curr_cap - 1  where id = $id ";
$hasil = mysqli_query($koneksi, $sql);

if ($hasil) {
    header("location:ketersediaan.php?pesan=sukses");
} else {
    header("location:ketersediaan.php?pesan=gagal");
}
