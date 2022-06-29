<?php
include('../koneksi/koneksi.php');


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/boxicons-2.1.2/css/boxicons.min.css">
    <link rel="stylesheet" href="vendors/swiperjs/swiper-bundle.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="asset/css/sidebar.css" type="text/css" />
    <link rel="stylesheet" href="asset/css/styles.css" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!--Boxicons CDN LINK-->
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
    <title>Progres Proyek</title>
</head>
<style>
    body {
        background: linear-gradient(-50deg, #ffd369 50%, #fff 50.1%);
    }

    footer {
        background-color: #FCFCFC;
        opacity: 0.8;
    }

    footer:hover {
        background-color: #cccc;
        opacity: 1;
    }

    table {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        table-layout: fixed;
    }

    table caption {
        font-size: 1.5em;
        margin: .5em 0 .75em;
    }

    table tr {

        border: 1px solid #ddd;
        padding: .35em;
    }

    table th,
    table td {
        padding: .625em;
        text-align: center;
    }

    table th {
        font-size: .85em;
        letter-spacing: .1em;
        text-transform: uppercase;
    }

    @media screen and (max-width: 600px) {
        table {
            border: 0;
        }

        table caption {
            font-size: 1.3em;
        }

        table thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        table tr {
            border-bottom: 3px solid #ddd;
            display: block;
            margin-bottom: .625em;
        }

        table td {
            border-bottom: 1px solid #ddd;
            display: block;
            font-size: .8em;
            text-align: right;
        }

        table td::before {

            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
        }

        table td:last-child {
            border-bottom: 0;
        }
    }
</style>

<body style="background-color: #fdfdfd;">
    <div class="dashboard-page">
        <div class="wrapper">
            <div class="sidebar">
                <div class="sidebar-header mb-5">
                    <a href="dashboard.php" class="sidebar-logo fs-5 fw-bold mb-3"> Sistem Monitoring </a>
                    <button class="btn btn-white d-block d-md-none" type="button" onclick="sidebarMenu()">
                        <i class="bx bx-menu"></i>
                    </button>
                </div>

                <div class="sidebar-menu " id="sidebarMenu">
                    <!--Sidebar Top-->
                    <a href="dashboard.php" class="sidebar-link">
                        <i class="bx bx-grid-alt"></i> <span>Dashboard</span></i>
                    </a>
                    <a href="domisili.php" class="sidebar-link">
                        <i class="bx bxs-building"></i> <span>Domisili</span></i>
                    </a>
                    <a href="industri.php" class="sidebar-link">
                        <i class="bx bx-briefcase"> </i> <span>Industri</span></i>
                    </a>
                    <a href="status.php" class="sidebar-link">
                        <i class="bx bx-loader"> </i> <span>Status</span></i>
                    </a>
                    <a href="proyek.php" class="sidebar-link">
                        <i class="bx bx-folder-open"> </i> <span>Proyek</span></i>
                    </a>
                    <a href="progres.php" class="sidebar-link">
                        <i class="bx bx-loader-circle"> </i> <span>Progres</span></i>
                    </a>
                    <hr class="my-3" style="color: white;">
                    <!--Sidebar Middle-->
                    <a href="akun.php" class="sidebar-link">
                        <i class="bx bxs-user-account"> </i> <span>Pengaturan</span></i>
                    </a>
                    <a href="./" class="sidebar-link" style="color: red;">
                        <i class="bx bx-log-out-circle"> </i> <span>Log Out</span></i>
                    </a>
                </div>
            </div>
            <div class="content">
                <div class="content-header d-flex align-items-center justify-content-between">
                    <h2 class="content-title">Progres Proyek</h2>
                    <div class="menu-icons d-flex align-items-center gap-2">
                        <a href="profile.php"> <i class="bx bx-user" style="font-size: 30px;"></i></a>
                    </div>
                </div>
                <hr class="my-4">

                <div class="container-fluid ">
                    <?php if (!empty($_GET['notif'])) { ?>
                        <?php if ($_GET['notif'] == "tambahberhasil") { ?>
                            <div class="alert alert-success" role="alert"> Data Berhasil Ditambahkan</div>
                        <?php } else if ($_GET['notif'] == "editberhasil") { ?>
                            <div class="alert alert-success" role="alert">
                                Data Berhasil Diubah</div>
                        <?php } ?>
                    <?php } ?>
                    <form class="form-horizontal" method="post" action="konfirmasi_tambah_progres.php" enctype="multipart/form-data">
                        <?php if (!empty($_GET['notif'])) { ?>
                            <?php if ($_GET['notif'] == "editkosong") { ?>
                                <div class="alert alert-danger" role="alert">
                                    Maaf data proyek wajib di isi</div>
                            <?php } ?>
                        <?php } ?>
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Kode Projek</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="projek" name="projek">
                                        <option value="0">- Pilih Proyek -</option>
                                        <?php
                                        $sql_j = "select `kode_projek`, `kode_pelanggan` from `projek` order by `kode_projek`";
                                        $query_j = mysqli_query($koneksi, $sql_j);
                                        while ($data_j = mysqli_fetch_row($query_j)) {
                                            $kode_dom = $data_j[0];
                                            $domisili = $data_j[1];
                                        ?>
                                            <option value="<?php echo $kode_dom; ?>" <?php  ?>>
                                                <?php echo $domisili; ?><?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Deskripsi</label>
                                <div class="col-sm-6 ">
                                    <textarea type="textarea" rows="6" class="form-control" id="part_name" name="deskripsi" placeholder="Isi Deskripsi"></textarea>
                                    <button type="submit" class="btn btn-primary second-text float-end mt-5 mb-3 "> <i class="fas fa-plus me-2"></i>Tambah </button>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script>
        function sidebarMenu() {
            const sidebar = document.getElementById('sidebarMenu');
            sidebar.classList.toggle('active');
        }
    </script>
</body>


</html>