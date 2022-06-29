<?php
// session_start();
include('../koneksi/koneksi.php');
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
    <title>Tambah Proyek</title>
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
                <form class="form-horizontal" method="post" action="konfirmasi_tambah_proyek.php" enctype="multipart/form-data">
                    <div class="card-body">
                        <h4 class="card-title mt-2">Form Tambah Data</h4>
                        <?php if (!empty($_GET['notif'])) { ?>
                            <?php if ($_GET['notif'] == "tambahkosong") { ?>
                                <div class="alert alert-danger" role="alert">
                                    Maaf data proyek wajib di isi</div>
                            <?php } ?>
                        <?php } ?>
                        <div class="form-group row">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Pelanggan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="part_name" name="pelanggan" placeholder="Isi Pelanggan" value="<?php if (!empty($_SESSION['pelanggan'])) {
                                                                                                                                                echo $_SESSION['pelanggan'];
                                                                                                                                            } ?>" />
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Kode Pelanggan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="part_name" name="kode pelanggan" placeholder="Isi Kode Pelanggan" value="<?php if (!empty($_SESSION['kode_pelanggan'])) {
                                                                                                                                                            echo $_SESSION['kode_pelanggan'];
                                                                                                                                                        } ?>" />
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
                                        $kode_domisili = $data_j[0];
                                        $domisili = $data_j[1];
                                    ?>
                                        <option value="<?php echo $kode_domisili; ?>" <?php if (!empty($_SESSION['domisili'])) {
                                                                                            if ($kode_domisili == $_SESSION['domisili']) { ?> selected="selected" <?php }
                                                                                                                                                            } ?>>
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

                                    while ($data = mysqli_fetch_row($query_j)) {
                                        $kode_industri = $data[0];
                                        $industri = $data[1];
                                    ?>
                                        <option value="<?php echo $kode_industri; ?>" <?php if (!empty($_SESSION['industri'])) {
                                                                                            if ($kode_industri == $_SESSION['industri']) { ?> selected="selected" <?php }
                                                                                                                                                            } ?>>
                                            <?php echo $industri; ?><?php } ?>
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

                                    while ($data = mysqli_fetch_row($query_j)) {
                                        $kode_produk = $data[0];
                                        $produk = $data[1];
                                    ?>
                                        <option value="<?php echo $kode_produk; ?>" <?php if (!empty($_SESSION['produk'])) {
                                                                                        if ($kode_produk == $_SESSION['produk']) { ?> selected="selected" <?php }
                                                                                                                                                    } ?>>
                                            <?php echo $produk; ?><?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Instagram</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="email" name="instagram" placeholder="Isi Instagram" value="<?php if (!empty($_SESSION['instagram'])) {
                                                                                                                                            echo $_SESSION['instagram'];
                                                                                                                                        } ?>" />
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Facebook</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="username" name="facebook" placeholder="Isi Facebook" value="<?php if (!empty($_SESSION['facebook'])) {
                                                                                                                                            echo $_SESSION['facebook'];
                                                                                                                                        } ?>" />
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Nama Perwakilan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Isi Nama Perwakilan" value="<?php if (!empty($_SESSION['nama_perwakilan'])) {
                                                                                                                                            echo $_SESSION['nama_perwakilan'];
                                                                                                                                        } ?>" />
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Whatsapp</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="wa" name="wa" placeholder="Isi Whatsapp Perwakilan" value="<?php if (!empty($_SESSION['wa_perwakilan'])) {
                                                                                                                                            echo $_SESSION['wa_perwakilan'];
                                                                                                                                        } ?>" />
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

                                    while ($data = mysqli_fetch_row($query_j)) {
                                        $kode_status = $data[0];
                                        $status = $data[1];
                                    ?>
                                        <option value="<?php echo $kode_status; ?>" <?php if (!empty($_SESSION['status'])) {
                                                                                        if ($kode_status == $_SESSION['status']) { ?> selected="selected" <?php }
                                                                                                                                                    } ?>>
                                            <?php echo $status; ?><?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Gambar</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" id="gambar_projek" name="gambar_projek" value="<?php if (!empty($_SESSION['gambar_projek'])) {
                                                                                                                            echo $_SESSION['gambar_projek'];
                                                                                                                        } ?>" />
                                <h7> <span style="color: red;">maksimal 2mb</span> </h7>
                            </div>
                            <div class="form-group row mt-4">
                                <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Harga</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Isi Harga" value="<?php if (!empty($_SESSION['harga'])) {
                                                                                                                                        echo $_SESSION['harga'];
                                                                                                                                    } ?>" />

                                    <button type="submit" class="btn primary-bg second-text float-end mt-5 mb-3 "> <i class="fas fa-plus me-2"></i>Tambah </button>
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