<?php
    include('../koneksi/koneksi.php');
	$status = $_POST['status'];
	if(empty($status)){
	header("Location:tambah_status.php?notif=tambahkosong");
	}else{
	$sql = "insert into `status` (`status`)
	values ('$status')";
	mysqli_query($koneksi,$sql);
	header("Location:status.php?notif=tambahberhasil");
 }
 ?>
