<?php
session_start();
include('../koneksi/koneksi.php');

if (isset($_POST['kode'])) {
    $kode_status = $_POST['kode'];
    $status = $_POST['status'];

    echo $status;
    if (empty($status)) {
        header("Location:status.php?data=" . $kode_status . " &notif=editkosong");
    } else {
        $sql = "update `status` set `status`='$status' where `kode_status`='$kode_status'";
        mysqli_query($koneksi, $sql);
        header("Location:status.php?notif=editberhasil");
    }
}
