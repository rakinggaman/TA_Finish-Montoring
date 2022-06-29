<?php
session_start();
include('../koneksi/koneksi.php');
if (isset($_GET['data'])) {
    $id_user = $_GET['data'];
    $data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM akun WHERE id_user = $id_user"));
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
    <title>Edit Akun</title>
</head>

<body>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid mt-5 p-5 justify-content-center">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-warning mt-3 mb-3" href="akun.php">
                        <i class="fas fa-arrow-circle-left "></i> Kembali
                    </a>
                </div>
                <form class="form-horizontal" method="post" action="konfirmasi_edit_akun.php">
                    <?php if (!empty($_GET['notif'])) { ?>
                        <?php if ($_GET['notif'] == "editkosong") { ?>
                            <div class="alert alert-danger" role="alert">
                                Maaf data akun wajib di isi</div>
                        <?php } ?>
                    <?php } ?>
                    <div class="card-body">
                        <h4 class="card-title mt-2">Form Edit Data</h4>
                        <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $data['id_user']; ?>" />
                        <div class="form-group row">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Nama</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="part_name" name="nama" value="<?= $data['nama']; ?>" />
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Email</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="email" name="email" value="<?= $data['email']; ?>" />
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Username</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="username" name="username" value="<?= $data['username']; ?>" />
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="password" name="password" value="<?= $data['password']; ?>" />
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Level</label>
                            <div class="col-sm-6">
                                <select type="text" class="form-control" id="level" name="level">
                                    <option value="superadmin" <?= ($data['level'] == 'superadmin') ? 'selected' : '' ?>>superadmin</option>
                                    <option value="admin" <?= ($data['level'] == 'admin') ? 'selected' : '' ?>>admin</option>
                                </select>

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