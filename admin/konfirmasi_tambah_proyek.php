<?php
include('../koneksi/koneksi.php');

$pelanggan = $_POST['pelanggan'];
$kode_pelanggan = $_POST['kode_pelanggan'];
$domisili = $_POST['domisili'];
$industri = $_POST['industri'];
$produk = $_POST['produk'];
$instagram = $_POST['instagram'];
$facebook = $_POST['facebook'];
$nama = $_POST['nama'];
$wa = $_POST['wa'];
$status = $_POST['status'];
$harga = $_POST['harga'];
$tambah = 0;

if (empty($pelanggan)) {
	header("Location:proyek.php?notif=tambahkosong&data=Pelanggan");
} else if (empty($kode_pelanggan)) {
	header("Location:proyek.php?notif=tambahkosong&data=Kode_Pelanggan");
} else if (empty($domisili)) {
	header("Location:proyek.php?notif=tambahkosong&data=Domisili");
} else if (empty($industri)) {
	header("Location:proyek.php?notif=tambahkosong&data=industri");
} else if (empty($produk)) {
	header("Location:proyek.php?notif=tambahkosong&data=Produk");
} else if (empty($instagram)) {
	header("Location:proyek.php?notif=tambahkosong&data=instagram");
} else if (empty($facebook)) {
	header("Location:proyek.php?notif=tambahkosong&data=Facebook");
} else {

	$rand = rand();
	$ekstensi =  array('png', 'jpg', 'jpeg');
	$filename 	= $_FILES['gambar_projek']['name'];
	$ukuran = $_FILES['gambar_projek']['size'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	$tmp_file = $_FILES['gambar_projek']['tmp_name'];

	if ($ukuran < 1044070) {
		$xx = $filename;
		move_uploaded_file($_FILES['gambar_projek']['tmp_name'], "../img/" . $filename);
		$sql = "INSERT INTO `projek` (`pelanggan`, `kode_pelanggan`, `kode_domisili`, `kode_industri`, `kode_produk`, `instagram`, `facebook`, `nama_perwakilan`, `wa_perwakilan`, `kode_status`, `gambar_projek`, `harga_projek`) 
			VALUES ('$pelanggan', '$kode_pelanggan', '$domisili', '$industri', '$produk', '$instagram', '$facebook', '$nama', '$wa', '$status','$xx', '$harga')";
		mysqli_query($koneksi, $sql);

		// copy($tmp_file, "../")

		$tambah++;
	} else {
		$sql = "INSERT INTO `projek` (`pelanggan`, `kode_pelanggan`, `kode_domisili`, `kode_industri`, `kode_produk`, `instagram`, `facebook`, `nama_perwakilan`, `wa_perwakilan`, `kode_status`, `harga_projek`) 
			VALUES ('$pelanggan', '$kode_pelanggan', '$domisili', '$industri', '$produk', '$instagram', '$facebook', '$nama', '$wa', '$status', '$harga')";
		mysqli_query($koneksi, $sql);
		$tambah++;
	}
	header("Location:proyek.php?notif=tambahberhasil");
}
