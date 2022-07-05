<?php
include('../koneksi/koneksi.php');
$progres = $_POST['projek'];
$deskripsi = $_POST['deskripsi'];
if (empty($progres)) {
    header("Location:progres.php?notif=tambahkosong");
} else {
    $rand = rand();
    $ekstensi =  array('png', 'jpg', 'jpeg');
    $filename     = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $tmp_file = $_FILES['gambar']['tmp_name'];

    if ($ukuran < 1044070) {
        $xx = $filename;
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../img/" . $filename);
        $sql = "insert into `progres_projek` (`kode_projek`, `deskripsi`, `gambar` )
        values ('$progres', '$deskripsi','$xx')";
        mysqli_query($koneksi, $sql);
        // copy($tmp_file, "../")

        $tambah++;
    } else {
        $sql = "insert into `progres_projek` (`kode_projek`, `deskripsi` )
        values ('$progres', '$deskripsi' )";
        mysqli_query($koneksi, $sql);
        $tambah++;
    }
    // $sql = "insert into `progres_projek` (`kode_projek`, `deskripsi` )
    // values ('$progres', '$deskripsi' )";
    // mysqli_query($koneksi, $sql);

    // NGAMBIL DATA TERAKHIR DARI DB
    $sql_j = mysqli_fetch_assoc(mysqli_query($koneksi, "select * from `progres_projek` order by `kode_projek_id` desc limit 1"));
    $kode_projek = $sql_j['kode_projek'];
    $kode_projek_id = $sql_j['kode_projek_id'];

    // UPDATE PROJEK
    //$update_project = mysqli_query($koneksi, "update `projek` set `kode_projek_id` = $kode_projek_id where `kode_projek` = '$kode_projek'");


    header("Location:progres.php?notif=tambahberhasil");
}
