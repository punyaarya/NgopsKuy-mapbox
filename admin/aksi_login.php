<?php
include 'koneksi.php';

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi, "select * from users where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {

	$_SESSION["loggedin"] = true;
	$_SESSION['username'] = $username;
	header("location:dashboard.php");
} else {
	header("location:login.php?pesan=gagal");

}
