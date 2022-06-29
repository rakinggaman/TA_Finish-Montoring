<?php
session_start();
include('../koneksi/koneksi.php');
if (isset($_SESSION['kode_projek'])) {
  $kode_projek      = $_SESSION['kode_projek'];
  $pelanggan        = $_POST['pelanggan'];
  $kode_pelanggan   = $_POST['kode_pelanggan'];
  $kode_domisili    = $_POST['domisili'];
  $kode_industri    = $_POST['industri'];
  $kode_produk      = $_POST['produk'];
  $instagram        = $_POST['instagram'];
  $facebook         = $_POST['facebook'];
  $nama             = $_POST['nama'];
  $wa               = $_POST['wa'];
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
      $query = "UPDATE projek SET pelanggan='$pelanggan', kode_pelanggan='$kode_pelanggan', kode_domisili=$kode_domisili, kode_industri=$kode_industri, kode_produk=$kode_produk, instagram='$instagram', facebook='$facebook', nama_perwakilan='$nama', wa_perwakilan='$wa', kode_status=$status, gambar_projek='$gambar_projek', harga_projek=$harga WHERE kode_projek=$kode_projek";
      mysqli_query($koneksi, $query);
      $tambah++;
    }
  } else {
    $query = "UPDATE projek SET pelanggan='$pelanggan', kode_pelanggan='$kode_pelanggan', kode_domisili=$kode_domisili, kode_industri=$kode_industri, kode_produk=$kode_produk, instagram='$instagram', facebook='$facebook', nama_perwakilan='$nama', wa_perwakilan='$wa', kode_status=$status, harga_projek=$harga WHERE kode_projek=$kode_projek";
    mysqli_query($koneksi, $query);
    $tambah++;
  }

  header("Location:proyek.php?notif=editberhasil");

  // if (empty($kode_projek)) {
  //   header("Location:edit_proyek.php?data=" .$kode_projek. "&notif=editkosong");
  // } else if (empty($pelanggan)) {
  //   header("Location:edit_proyek.php?data=" .$pelanggan. "&notif=editkosong");
  // } else if (empty($domisili)) {
  //   header("Location:edit_proyek.php?data=" .$domisili. "&notif=editkosong");
  // } else if (empty($industri)) {
  //   header("Location:edit_proyek.php?data=" .$industri. "&notif=editkosong");
  // } elseif (empty($produk)) {
  //   header("Location:edit_proyek.php?data=" .$produk. "&notif=editkosong");
  // } elseif (empty($instagram)) {
  //   header("Location:edit_proyek.php?data=" .$instagram. "&notif=editkosong");
  // } elseif (empty($facebook)) {
  //   header("Location:edit_proyek.php?data=" .$facebook. "&notif=editkosong");
  // } else if (empty($nama)) {
  //   header("Location:edit_proyek.php?data=" .$nama. "&notif=editkosong");
  // }
  // else if (empty($wa)) {
  //   header("Location:edit_proyek.php?data=" .$wa. "&notif=editkosong");
  // }  else if (empty($harga)) {
  //   header("Location:edit_proyek.php?data=" .$harga. "&notif=editkosong");
  // } else {
  //   $query = "UPDATE projek SET pelanggan='$pelanggan', kode_domisili=$kode_domisili, kode_industri=$kode_industri, kode_produk=$kode_produk, instagram='$instagram', facebook='$facebook', nama_perwakilan='$nama', wa_perwakilan='$wa', kode_status=$status, harga_projek=$harga WHERE kode_projek=$kode_projek";
  //   mysqli_query($koneksi, $sql);

  //   header("Location:proyek.php?notif=editberhasil");
  // }
}
// $_SESSION['id_user']=$id_user;