<?php
include('../koneksi/koneksi.php');
session_start();
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $sql_d = "select `nama`, `email` from `akun`
  	where `id_user` = '$id_user'";
    $query_d = mysqli_query($koneksi, $sql_d);
    while ($data_d = mysqli_fetch_row($query_d)) {
        $nama = $data_d[0];
        $email = $data_d[1];
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
    <title>Edit Profile</title>
</head>

<body>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid mt-5 p-5 justify-content-center">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-warning mt-3 mb-3" href="profile.php">
                        <i class="fas fa-arrow-circle-left "></i> Kembali
                    </a>
                </div>
                <form class="form-horizontal" method="post" action="index.php?include=konfirmasi_edit_profile.php">
                    <?php if (!empty($_GET['notif'])) { ?>
                        <?php if ($_GET['notif'] == "editkosong") { ?>
                            <div class="alert alert-danger" role="alert">
                                Maaf data profile wajib di isi</div>
                        <?php } ?>
                    <?php } ?>
                    <div class="card-body">
                        <h4 class="card-title mt-2">Form Edit Data</h4>
                        <div class="form-group row">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Profile</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" />
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Email</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" />
                                <button type="submit" class="btn primary-bg second-text float-end mt-5 mb-3 "> <i class="fas fa-plus me-2"></i>Edit </button>
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