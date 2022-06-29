<?php
session_start();
include('../koneksi/koneksi.php');

if (isset($_POST['kode'])) {
    $kode_domisili = $_POST['kode'];
    $domisili = $_POST['domisili'];

    echo $domisili;
    if (empty($domisili)) {
        header("Location:domisili.php?data=" . $kode_domisili . " &notif=editkosong");
    } else {
        $sql = "update `domisili` set `domisili`='$domisili' where `kode_domisili`='$kode_domisili'";
        mysqli_query($koneksi, $sql);
        header("Location:domisili.php?notif=editberhasil");
    }
}
