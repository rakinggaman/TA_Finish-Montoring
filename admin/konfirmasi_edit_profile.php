<?php
session_start();
include('../koneksi/koneksi.php');
if (isset($_SESSION['id_user'])) {
	$id_user = $_SESSION['id_user'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	if (empty($nama)) {
		header("Location:profile.php?notif=editkosong&jenis=nama");
	} else if (empty($email)) {
		header("Location:profile.php?notif=editkosong&jenis=email");
	} else {
		$sql = "UPDATE `akun` SET `nama`='$nama', `email`='$email'
	WHERE `id_user`='$id_user'";
		mysqli_query($koneksi, $sql);
		header("Location:dashboard.php?notif=editberhasil");
	}
}
