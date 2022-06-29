<?php
session_start();
include('../koneksi/koneksi.php');
if (isset($_GET['data'])) {
    $kode_projek = $_GET['data'];
    $_SESSION['kode_projek'] = $kode_projek;

    //get data projek
    $sql_m = "SELECT * FROM `projek` WHERE `kode_projek` = '$kode_projek' ";
    $query_m = mysqli_query($koneksi, $sql_m);
    while ($data_m = mysqli_fetch_row($query_m)) {
        $kode_projek        = $data_m[0];
        $kode_pelanggan    = $data_m[1];
        $pelanggan          = $data_m[2];
        $kode_domisili      = $data_m[3];
        $kode_industri      = $data_m[4];
        $kode_produk        = $data_m[5];
        $instagram          = $data_m[6];
        $facebook           = $data_m[7];
        $nama_perwakilan    = $data_m[8];
        $wa_perwakilan      = $data_m[9];
        $kode_status        = $data_m[10];
        $gambar_projek        = $data_m[11];
        $harga_projek       = $data_m[12];
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
    <title>Edit Proyek</title>
</head>

<body>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid mt-5 p-5 justify-content-center">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-warning mt-3 mb-3" href="proyek.php">
                        <i class="fas fa-arrow-circle-left "></i> Kembali
                    </a>
                </div>
                <form class="form-horizontal" method="post" action="konfirmasi_edit_proyek.php" enctype="multipart/form-data">
                    <?php if (!empty($_GET['notif'])) { ?>
                        <?php if ($_GET['notif'] == "editkosong") { ?>
                            <div class="alert alert-danger" role="alert">
                                Maaf data proyek wajib di isi</div>
                        <?php } ?>
                    <?php } ?>
                    <div class="card-body">
                        <h4 class="card-title mt-2">Form Edit Data</h4>
                        <div class="form-group row">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Kode Pelanggan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="kode_pelanggan" name="kode_pelanggan" value="<?= $kode_pelanggan; ?>">
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Pelanggan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="pelanggan" name="pelanggan" value="<?= $pelanggan; ?>">
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Domisili</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="domisili" name="domisili">
                                    <option value="0">- Pilih Domisili -</option>
                                    <?php
                                    $sql_j = "select `kode_domisili`, `domisili` from `domisili` order by `kode_domisili`";
                                    $query_j = mysqli_query($koneksi, $sql_j);
                                    while ($data_j = mysqli_fetch_row($query_j)) {
                                        $kode_dom = $data_j[0];
                                        $domisili = $data_j[1];
                                    ?>
                                        <option value="<?php echo $kode_dom; ?>" <?php if ($kode_dom == $kode_domisili) { ?> selected="selected" <?php } ?>>
                                            <?php echo $domisili; ?><?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Industri</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="industri" name="industri">
                                    <option value="0">- Pilih Industri -</option>
                                    <?php
                                    $sql_j = "select `kode_industri`, `industri` from `industri` order by `kode_industri`";
                                    $query_j = mysqli_query($koneksi, $sql_j);
                                    while ($data_j = mysqli_fetch_row($query_j)) {
                                        $kode_dom = $data_j[0];
                                        $domisili = $data_j[1];
                                    ?>
                                        <option value="<?php echo $kode_dom; ?>" <?php if ($kode_dom == $kode_domisili) { ?> selected="selected" <?php } ?>>
                                            <?php echo $domisili; ?><?php } ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Produk</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="produk" name="produk">
                                    <option value="0">- Pilih produk -</option>
                                    <?php
                                    $sql_j = "select `kode_produk`, `produk` from `produk` order by `kode_produk`";
                                    $query_j = mysqli_query($koneksi, $sql_j);
                                    while ($data_j = mysqli_fetch_row($query_j)) {
                                        $kode_dom = $data_j[0];
                                        $domisili = $data_j[1];
                                    ?>
                                        <option value="<?php echo $kode_dom; ?>" <?php if ($kode_dom == $kode_domisili) { ?> selected="selected" <?php } ?>>
                                            <?php echo $domisili; ?><?php } ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Instagram</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo $instagram; ?>">
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Facebook</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo $facebook; ?>">
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Nama Perwakilan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama_perwakilan; ?>">
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Whatsapp</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="wa" name="wa" value="<?php echo $wa_perwakilan; ?>">
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Status</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="status" name="status">
                                    <option value="0">- Pilih Status -</option>
                                    <?php
                                    $sql_j = "select `kode_status`, `status` from `status` order by `kode_status`";
                                    $query_j = mysqli_query($koneksi, $sql_j);
                                    while ($data_j = mysqli_fetch_row($query_j)) {
                                        $kode_dom = $data_j[0];
                                        $domisili = $data_j[1];
                                    ?>
                                        <option value="<?php echo $kode_dom; ?>" <?php if ($kode_dom == $kode_domisili) { ?> selected="selected" <?php } ?>>
                                            <?php echo $domisili; ?><?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Gambar</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" id="gambar_projek" name="gambar_projek" />
                                <h7> <span style="color: red;">maksimal 2mb</span> </h7>
                                <h7> <span style="color: red;">input gambar jika ingin mengubahnyaa dan jangan input gambar jika tidak</span> </h7>
                            </div>
                            <div class="form-group row mt-4">
                                <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Harga</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $harga_projek; ?>">

                                    <button type="submit" class="btn primary-bg second-text float-end mt-5 mb-3 "> <i class="fas fa-plus me-2"></i>Edit </button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>