<?php
include 'koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$max_cap = $_POST['max_cap'];
$curr_cap = $_POST['curr_cap'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];

$sql = "update data_location set nama = '" . $nama . "',  max_cap = '" . $max_cap . "' , lat = '" . $lat . "' , lon ='" . $lon . "' where id = $id ";
$hasil = mysqli_query($koneksi, $sql);

if ($hasil) {
    header("location:daftarwarkop.php?pesan=sukses");
} else {
    header("location:daftarwarkop.php?pesan=gagal");
}
