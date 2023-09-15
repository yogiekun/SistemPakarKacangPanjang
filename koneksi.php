<?php
// konfigurasi database
$host =   "localhost";
$user =   "root";
$pass =   "";
$dbs =   "nagaimame";
// perintah php untuk akses ke database
/*$koneksi = mysqli_connect($my['host'], $my['user'], $my['pass']);
if (! $koneksi){
	echo "koneksi Gagal !".mysqli_error();
	}

mysqli_select_db($my['dbs'])
or die ("Database tidak ada !".mysqli_error());*/

$koneksi = mysqli_connect($host,$user,$pass,$dbs);
?>