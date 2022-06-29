<?php
	session_start();
	include('../koneksi/koneksi.php');
	if(isset($_SESSION['kode_status'])){
        $kode_status = $_SESSION['kode_status'];
        $status = $_POST['status'];

        if(empty($status)){ 
            header("Location:edit_status.php?data=".$kode_status." &notif=editkosong");
        }else {
            $sql = "update `status` set `status`='$status' where `kode_status`='$kode_status'"; mysqli_query($koneksi,$sql);
            header("Location:status.php?notif=editberhasil");
        }
    }
?>