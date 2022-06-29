<?php
session_start();
include('../koneksi/koneksi.php');
if (isset($_POST['kode'])) {
    $kode_industri = $_POST['kode'];
    $industri = $_POST['industri'];
    echo $industri;
    if (empty($industri)) {
        header("Location:industri.php?data=" . $kode_industri . " &notif=editkosong");
    } else {
        $sql = "update `industri` set `industri`='$industri' where `kode_industri`='$kode_industri'";
        mysqli_query($koneksi, $sql);
        header("Location:industri.php?notif=editberhasil");
    }
}
