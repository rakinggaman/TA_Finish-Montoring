<?php
session_start();
include('../koneksi/koneksi.php');

$kode_projek      = $_POST['kode_projek'];
$pelanggan        = $_POST['pelanggan'];
$kode_pelanggan   = $_POST['kode_pelanggan'];
$kode_domisili    = $_POST['domisili'];
$kode_industri    = $_POST['industri'];
$kode_produk      = $_POST['produk'];
$instagram        = $_POST['instagram'];
$facebook         = $_POST['facebook'];
$nama             = $_POST['nama_perwakilan'];
$wa               = $_POST['wa_perwakilan'];
$status           = $_POST['status'];
$gambar_projek    = $_FILES['gambar_projek']['name'];
$harga            = $_POST['harga'];

// Update edit projek

if (!empty($gambar_projek)) {
  $rand     = rand();
  $ekstensi = array('png', 'jpg', 'jpeg');
  $filename = $_FILES['gambar_projek']['name'];
  $ukuran   = $_FILES['gambar_projek']['size'];
  $ext      = pathinfo($filename, PATHINFO_EXTENSION);
  $tmp_file = $_FILES['gambar_projek']['tmp_name'];

  if ($ukuran < 1044070) {
    $xx = $filename;
    move_uploaded_file($_FILES['gambar_projek']['tmp_name'], "../img/" . $filename);
    $query = "UPDATE projek SET pelanggan='$pelanggan', kode_pelanggan='$kode_pelanggan', kode_domisili='$kode_domisili', kode_industri='$kode_industri', kode_produk='$kode_produk', instagram='$instagram', facebook='$facebook', nama_perwakilan='$nama', wa_perwakilan='$wa', kode_status='$status', gambar_projek='$gambar_projek', harga_projek='$harga' WHERE kode_projek='$kode_projek'";
    mysqli_query($koneksi, $query);
    $tambah++;
  }
} else {
  $query = "UPDATE projek SET pelanggan='$pelanggan', kode_pelanggan='$kode_pelanggan', kode_domisili='$kode_domisili', kode_industri='$kode_industri', kode_produk='$kode_produk', instagram='$instagram', facebook='$facebook', nama_perwakilan='$nama', wa_perwakilan='$wa', kode_status='$status', harga_projek='$harga' WHERE kode_projek='$kode_projek'";
  mysqli_query($koneksi, $query);
  $tambah++;
}

header("Location:proyek.php?notif=editberhasil");

// $_SESSION['id_user']=$id_user;
