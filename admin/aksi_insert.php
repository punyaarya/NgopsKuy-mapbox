<?php
include 'koneksi.php';
$nama = $_POST['nama'];
$max_cap = $_POST['max_cap'];
$curr_cap = $_POST['curr_cap'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];

$sql = "insert into data_location (nama, max_cap, lat, lon) values ('".$nama."','".$max_cap."', '".$lat."', '".$lon."') ";
$hasil = mysqli_query($koneksi, $sql);

if ($hasil) {
    header("location:daftarwarkop.php?pesan=sukses");
} else {
    header("location:daftarwarkop.php?pesan=gagal");
}
?>
