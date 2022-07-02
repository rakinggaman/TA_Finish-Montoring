<?php
session_start();
include('../koneksi/koneksi.php');

if (isset($_POST['kode'])) {
    $kode_produk = $_POST['kode'];
    $produk = $_POST['produk'];

    echo $produk;
    if (empty($produk)) {
        header("Location:produk.php?data=" . $kode_produk . " &notif=editkosong");
    } else {
        $sql = "update `produk` set `produk`='$produk' where `kode_produk`='$kode_produk'";
        mysqli_query($koneksi, $sql);
        header("Location:produk.php?notif=editberhasil");
    }
}
