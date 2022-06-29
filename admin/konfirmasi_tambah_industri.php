<?php
    include('../koneksi/koneksi.php');
	$industri = $_POST['industri'];
	if(empty($industri)){
	header("Location:tambah_industri.php?notif=tambahkosong");
	}else{
	$sql = "insert into `industri` (`industri`)
	values ('$industri')";
	mysqli_query($koneksi,$sql);
	header("Location:industri.php?notif=tambahberhasil");
 }
 ?>
