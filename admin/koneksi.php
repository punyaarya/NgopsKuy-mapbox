<?php
	$namahost="localhost";
	$namauser="root";
	$password="";
	$namadatabase="prakgis(1)";

	$koneksi=mysqli_connect($namahost,$namauser,$password,$namadatabase);
	
	if(!$koneksi){
		die("Koneksi gagal: ".mysqli_connect_error());
	}
	
?>