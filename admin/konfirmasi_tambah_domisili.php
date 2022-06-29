<?php
    include('../koneksi/koneksi.php');
	$domisili = $_POST['domisili'];
	if(empty($domisili)){
	header("Location:tambah_domisili.php?notif=tambahkosong");
	}else{
	$sql = "insert into `domisili` (`domisili`)
	values ('$domisili')";
	mysqli_query($koneksi,$sql);
	header("Location:domisili.php?notif=tambahberhasil");
 }
 ?>
