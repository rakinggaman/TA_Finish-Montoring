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
<?php

if (!isset($_SESSION["login"])) {
    header("location:index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- CSS -->
    <link rel="stylesheet" href="asset/css/sidebar.css" type="text/css" />
    <link rel="stylesheet" href="asset/css/styles.css" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!--Boxicons CDN LINK-->
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
    <title>Profile</title>
</head>
<style>
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
            <?php include("sidebar.php") ?>
            <div class="content">
                <div class="content-header d-flex align-items-center justify-content-between">
                    <h2 class="content-title">Info Profil</h2>

                    <div class="menu-icons d-flex align-items-center gap-2">
                        <a href="profile.php"> <i class="bx bx-user" style="font-size: 30px;"></i></a>
                    </div>
                </div>
                <hr class="my-4">

                <div class="container-fluid mt-5 p-5 ">
                    <div class="card">

                        <form class="form-horizontal" method="post" action="konfirmasi_edit_profile.php">
                            <?php if (!empty($_GET['notif'])) { ?>
                                <?php if ($_GET['notif'] == "editkosong") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        Maaf data profile wajib di isi</div>
                                <?php } ?>
                            <?php } ?>


                            <div class="form-group row mt-4">
                                <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Nama</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" />
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" />
                                    <button type="submit" class="btn btn-primary second-text float-end mt-5 mb-3 "> <i class="fas fa-plus me-2"></i>Edit </button>
                                </div>
                            </div>


                    </div>
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