<?php
    include('../koneksi/koneksi.php');
	$produk = $_POST['produk'];
	if(empty($produk)){
	header("Location:tambah_produk.php?notif=tambahkosong");
	}else{
	$sql = "insert into `produk` (`produk`)
	values ('$produk')";
	mysqli_query($koneksi,$sql);
	header("Location:produk.php?notif=tambahberhasil");
 }
