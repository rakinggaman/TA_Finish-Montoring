<?php
    include('../koneksi/koneksi.php');
	$nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

	if(empty($nama)){
	header("Location:akun.php?notif=tambahkosong");
	}else if(empty($email)){
    header("Location:akun.php?notif=tambahkosong");
    }else if(empty($username)){
    header("Location:akun.php?notif=tambahkosong");
    }else if(empty($password)){
    header("Location:akun.php?notif=tambahkosong");    
    }else if(empty($level)){
    header("Location:akun.php?notif=tambahkosong");  
}else{
	$sql = "INSERT INTO `akun` (`username`, `nama`, `email`, `password`, `level`) VALUES 
    ('$username', '$nama', '$email', MD5('$password'), '$level');";
	mysqli_query($koneksi,$sql);
	header("Location:akun.php?notif=tambahberhasil");
 }
