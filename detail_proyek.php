<?php
session_start();
include('koneksi/koneksi.php');
if (isset($_GET['data'])) {
  $kode_projek = $_GET['data'];
  $_SESSION['kode_projek'] = $kode_projek;
  //get data projek
  $sql_m = "SELECT projek.kode_projek, projek.pelanggan, domisili.domisili, industri.industri, produk.produk, projek.instagram, projek.facebook, projek.nama_perwakilan, projek.wa_perwakilan, status.status ,
   projek.gambar_projek, projek.harga_projek , progres_projek.gambar, progres_projek.deskripsi ,  progres_projek.created_at
  FROM projek projek INNER JOIN domisili domisili ON projek.kode_domisili = domisili.kode_domisili
  INNER JOIN industri industri ON projek.kode_industri = industri.kode_industri
  INNER JOIN produk produk ON projek.kode_produk = produk.kode_produk
  INNER JOIN status status ON projek.kode_status = status.kode_status
  LEFT JOIN progres_projek ON progres_projek.kode_projek = projek.kode_projek
  WHERE projek.kode_projek = '$kode_projek'";

  $query_m = mysqli_query($koneksi, $sql_m);
  while ($data_m = mysqli_fetch_row($query_m)) {
    $kode_projek        = $data_m[0];
    $pelanggan          = $data_m[1];
    $domisili           = $data_m[2];
    $industri           = $data_m[3];
    $produk             = $data_m[4];
    $instagram          = $data_m[5];
    $facebook           = $data_m[6];
    $nama_perwakilan    = $data_m[7];
    $wa_perwakilan      = $data_m[8];
    $status             = $data_m[9];
    $gambar_projek      = $data_m[10];
    $harga_projek       = $data_m[11];
    //$deskripsi          = array($data_m[12]);
    $deskripsi          = $data_m[12];
    $created_at         = $data_m[13];
    $gambar         = $data_m[14];
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <!--CSS-->
  <link rel="stylesheet" href="asset/css/styles.css" />
  <!--Boxicons CDN LINK-->
  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
  <title>Detail Proyek</title>
</head>

<body>
  <!-- Page Content -->

  <div id="page-content-wrapper">
    <div class="container-fluid mt-5 p-5 justify-content-center">
      <div class="card">
        <div class="card-header">
          <a class="btn btn-warning mt-3 mb-3" href="index.php">
            <i class="fas fa-arrow-circle-left "></i> Kembali
          </a>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td width="20%"><strong>Pelanggan<strong></td>
                <td width="80%"><?php echo $pelanggan; ?></td>
              </tr>
              <tr>
                <td width="20%"><strong>Domisili<strong></td>
                <td width="80%"><?php echo $domisili; ?></td>
              </tr>
              <tr>
                <td width="20%"><strong>Industri<strong></td>
                <td width="80%"><?php echo $industri; ?></td>
              </tr>
              <tr>
                <td width="20%"><strong>Produk<strong></td>
                <td width="80%"><?php echo $produk; ?></td>
              </tr>
              <tr>
                <td width="20%"><strong>Instagram<strong></td>
                <td width="80%"><?php echo $instagram; ?></td>
              </tr>
              <tr>
                <td width="20%"><strong>Facebook<strong></td>
                <td width="80%"><?php echo $facebook; ?></td>
              </tr>
              <tr>
                <td width="20%"><strong>Nama Perwakilan<strong></td>
                <td width="80%"><?php echo $nama_perwakilan; ?></td>
              </tr>
              <tr>
                <td width="20%"><strong>Wa Perwakilan<strong></td>
                <td width="80%"><?php echo $wa_perwakilan; ?></td>
              </tr>
              <tr>
                <td width="20%"><strong>Status<strong></td>
                <td width="80%"><?php echo $status; ?></td>
              </tr>
              <tr>
                <td width="20%"><strong>Gambar Proyek<strong></td>
                <td width="80%"><img style="width:60%;" src=" img/<?php echo $gambar_projek; ?>">
              </tr>
              <tr>
                <td width="20%"><strong>Harga<strong></td>
                <td width="80%">Rp. <?php echo number_format($harga_projek); ?></td>
              </tr>

              <tr>
                <td width="20%"><strong>Proses<strong></td>
                <td width="80%">

                  <?php
                  $sql_progress = mysqli_query($koneksi, "SELECT * FROM progres_projek WHERE kode_projek = '$kode_projek'");
                  while ($data_progress = mysqli_fetch_array($sql_progress)) {
                  ?>
                    <ul>
                      <li><?= $data_progress['deskripsi'] ?>, <?= $data_progress['created_at'] ?></li>
                      <img src="img/<?= $data_progress['gambar'] ?>" style="width :20%;">

                    </ul>
                  <?php
                  }
                  ?>

                  <!-- <?php echo $deskripsi; ?>
                  <?php echo $created_at; ?> -->

                </td>
              </tr>

            </tbody>
          </table>
          <!-- /#page-content-wrapper -->
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>