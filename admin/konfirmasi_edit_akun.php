<?php
session_start();
include('../koneksi/koneksi.php');
if (isset($_SESSION['id_user'])) {
    $id_user = $_POST['kode'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    if (empty($id_user)) {
        header("Location:akun.php?data=" . $id_user . " &notif=editkosong");
    } else if (empty($nama)) {
        header("Location:akun.php?include=akun&data=" . $nama . "&notif=editkosong&jenis=nama");
    } else if (empty($email)) {
        header("Location:akun.php?include=akun&data=" . $email . "&notif=editkosong&jenis=email");
    } else if (empty($username)) {
        header("Location:akun.php?include=akun&data=" . $username . "&notif=editkosong&jenis=username");
    } else if (empty($password)) {
        header("Location:akun.php?include=akun&data=" . $password . "&notif=editkosong&jenis=password");
        // }else if(empty($level)){
        //     header("Location:edit_user.php?include=edit_user&data=".$level."&notif=editkosong&jenis=level");
    } else {
        $sql = "UPDATE `akun` SET `nama`='$nama', `email`='$email', `username`='$username', `password`='$password', `level`='$level' WHERE `id_user`=$id_user";
        mysqli_query($koneksi, $sql);
        header("Location:akun.php?notif=editberhasil");
    }
}
