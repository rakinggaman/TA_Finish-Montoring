<?php
include('../koneksi/koneksi.php');
$progres = $_POST['projek'];
$deskripsi = $_POST['deskripsi'];
if (empty($progres)) {
    header("Location:progres.php?notif=tambahkosong");
} else {
    $sql = "insert into `progres_projek` (`kode_projek`, `deskripsi` )
    values ('$progres', '$deskripsi' )";
    mysqli_query($koneksi, $sql);

    // NGAMBIL DATA TERAKHIR DARI DB
    $sql_j = mysqli_fetch_assoc(mysqli_query($koneksi, "select * from `progres_projek` order by `kode_projek_id` desc limit 1"));
    $kode_projek = $sql_j['kode_projek'];
    $kode_projek_id = $sql_j['kode_projek_id'];

    // UPDATE PROJEK
    //$update_project = mysqli_query($koneksi, "update `projek` set `kode_projek_id` = $kode_projek_id where `kode_projek` = '$kode_projek'");


    header("Location:progres.php?notif=tambahberhasil");
}
