<?php
include('../koneksi/koneksi.php');
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $id_projek = $_GET['data'];
        //hapus projek
        $sql_dh = "delete from `projek`
  	where `kode_projek` = '$id_projek'";
        mysqli_query($koneksi, $sql_dh);
    }
}
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
    <title>Proyek</title>
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
                    <a href="produk.php" class="sidebar-link">
                        <i class='bx bxs-shopping-bag'></i> <span>Produk</span></i>
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
                    <a href="logout.php" class="sidebar-link" style="color: red;">
                        <i class="bx bx-log-out-circle"> </i> <span>Log Out</span></i>
                    </a>
                </div>
            </div>
            <div class="content">
                <div class="content-header d-flex align-items-center justify-content-between">
                    <h2 class="content-title">Daftar Proyek</h2>

                    <div class="menu-icons d-flex align-items-center gap-2">
                        <a href="profile.php"> <i class="bx bx-user" style="font-size: 30px;"></i></a>
                    </div>
                </div>
                <hr class="my-4">
                <?php if (!empty($_GET['notif'])) { ?>
                    <?php if ($_GET['notif'] == "tambahkosong") { ?>
                        <div class="alert alert-danger" role="alert">
                            Maaf data proyek wajib di isi</div>
                    <?php } ?>
                <?php } ?>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Proyek</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="post" action="konfirmasi_tambah_proyek.php" enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Pelanggan :</label>
                                        <input type="text" class="form-control" id="part_name" name="pelanggan" placeholder="Isi Pelanggan" value="<?php if (!empty($_SESSION['pelanggan'])) {
                                                                                                                                                        echo $_SESSION['pelanggan'];
                                                                                                                                                    } ?>" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Kode Pelanggan :</label>

                                        <input type="text" class="form-control" id="part_name" name="kode pelanggan" placeholder="Isi Kode Pelanggan" value="<?php if (!empty($_SESSION['kode_pelanggan'])) {
                                                                                                                                                                    echo $_SESSION['kode_pelanggan'];
                                                                                                                                                                } ?>" />

                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Domisili :</label>
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
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Industri :</label>
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
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Produk :</label>
                                        <select class="form-control" id="produk" name="produk">
                                            <option value="0">- Pilih Produk -</option>
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
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Instagram :</label>
                                        <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Isi Instagram" value="<?php if (!empty($_SESSION['instagram'])) {
                                                                                                                                                        echo $_SESSION['instagram'];
                                                                                                                                                    } ?>" />

                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Facebook :</label>
                                        <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Isi Facebook" value="<?php if (!empty($_SESSION['facebook'])) {
                                                                                                                                                    echo $_SESSION['facebook'];
                                                                                                                                                } ?>" />

                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Nama Perwakilan :</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Isi Nama Perwakilan" value="<?php if (!empty($_SESSION['nama_perwakilan'])) {
                                                                                                                                                    echo $_SESSION['nama_perwakilan'];
                                                                                                                                                } ?>" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Wa :</label>
                                        <input type="text" class="form-control" id="wa" name="wa" placeholder="Isi Whatsapp Perwakilan" value="<?php if (!empty($_SESSION['wa_perwakilan'])) {
                                                                                                                                                    echo $_SESSION['wa_perwakilan'];
                                                                                                                                                } ?>" />

                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Status :</label>
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
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Gambar :</label>

                                        <input type="file" class="form-control" id="gambar_projek" name="gambar_projek" value="<?php if (!empty($_SESSION['gambar_projek'])) {
                                                                                                                                    echo $_SESSION['gambar_projek'];
                                                                                                                                } ?>" />
                                        <h7> <span style="color: red;">maksimal 2mb</span> </h7>

                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Harga :</label>
                                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Isi Harga" value="<?php if (!empty($_SESSION['harga'])) {
                                                                                                                                            echo $_SESSION['harga'];
                                                                                                                                        } ?>" />

                                        <button type="submit" class="btn btn-primary second-text float-end mt-5 mb-3 "> <i class="fas fa-plus me-2"></i>Tambah </button>
                                    </div>


                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="container-fluid px-4">
                    <div class="row my-5">

                        <form method="get" action="proyek.php">
                            <div class="row ">
                                <div class="col-md-4 bottom-10 ">
                                    <input type="text" class="form-control" id="kata_kunci" name="katakunci">
                                </div>
                                <div class="col-md-5 bottom-10 ">
                                    <button type="submit" class="btn btn-outline-primary second-text "><i class="fas fa-search"></i>&nbsp; </button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Tambah</button>
                                    <a target="_blank" href="export_excel.php" class="btn btn-success  second-text "> <i class="fas fa-file-import me-2"></i>Export </a>
                                </div>

                                <div class="form-check">
                                    </label>

                                </div>
                            </div>
                            <div class="col mt-5">

                                <table style="border: 1;" class="table bg-white rounded shadow-sm  table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="50">No</th>
                                            <th scope="col">Pelanggan</th>
                                            <th scope="col">Domisili</th>
                                            <th scope="col">Industri</th>
                                            <th scope="col">Produk</th>
                                            <th scope="col" width="400">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $batas = 8;
                                        if (!isset($_GET['halaman'])) {
                                            $posisi = 0;
                                            $halaman = 1;
                                        } else {
                                            $halaman = $_GET['halaman'];
                                            $posisi = ($halaman - 1) * $batas;
                                        }
                                        //menampilkan data projek
                                        $sql_pjk = "SELECT kp.kode_projek, kp.pelanggan, kd.domisili, ki.industri, pp.produk, kp.instagram, kp.facebook
                                    FROM projek kp INNER JOIN domisili kd ON kp.kode_domisili = kd.kode_domisili
                                    INNER JOIN industri ki ON kp.kode_industri = ki.kode_industri
                                    INNER JOIN produk pp ON kp.kode_produk = pp.kode_produk";
                                        if (isset($_GET["katakunci"])) {
                                            $katakunci_pjk = $_GET["katakunci"];
                                            $_SESSION['katakunci_projek'] = $katakunci_pjk;
                                            $sql_pjk .= " WHERE kp.pelanggan LIKE '%$katakunci_pjk%' 
                                        OR kd.domisili LIKE '%$katakunci_pjk%' OR ki.industri LIKE '%$katakunci_pjk%' OR pp.produk LIKE '%$katakunci_pjk%'";
                                        }
                                        $sql_pjk .= " order by `pelanggan` DESC limit $posisi, $batas";
                                        $query_pjk = mysqli_query($koneksi, $sql_pjk);
                                        $no = 1;
                                        while ($data_pjk = mysqli_fetch_array($query_pjk)) {
                                            $id = $data_pjk[0];
                                            // $pelanggan = $data_pjk[1];
                                            // $domisili = $data_pjk[2];
                                            // $industri = $data_pjk[3];
                                            // $produk = $data_pjk[4];

                                        ?>
                                            <tr>
                                                <td data-label="No"><?php echo $no; ?></td>
                                                <td data-label="Pelanggan"><?php echo $data_pjk['pelanggan']; ?></td>
                                                <td data-label="Domisili"><?php echo $data_pjk['domisili']; ?></td>
                                                <td data-label="Industri"><?php echo $data_pjk['industri']; ?></td>
                                                <td data-label="Produk"> <?php echo $data_pjk['produk']; ?></td>
                                                <td data-label="Aksi">
                                                    <a href="detail_proyek.php?data=<?php echo $id; ?>" class="btn detailbtn second-text btn-sm"> <i class="fas fa-eye me-2"></i>Detail</a>
                                                    <a class="btn editbtn second-text btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModaledit<?= $data_pjk['kode_projek'] ?>"> <i class="fas fa-edit me-2"></i>Edit</a>
                                                    <div class="modal fade" id="exampleModaledit<?= $data_pjk['kode_projek'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel ">Edit Data Proyek</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="form-horizontal" method="post" action="konfirmasi_edit_proyek.php">
                                                                        <input type="hidden" name="kode" value="<?= $data_pjk['kode_projek'] ?>">
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label float-start">Pelanggan :</label>
                                                                            <input type="text" class="form-control" id="part_name" name="pelanggan" value="<?= $data_pjk['pelanggan']; ?>" />
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label float-start">Kode Pelanggan :</label>

                                                                            <input type="text" class="form-control" id="part_name" name="kode pelanggan" value="<?= $data_pjk['kode_pelanggan']; ?>" />

                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label float-start">Domisili :</label>

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
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label float-start">Industri :</label>
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
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label float-start">Produk :</label>
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
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label float-start">Instagram :</label>
                                                                            <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Isi Instagram" value="<?= $data_pjk['instagram']; ?>" />

                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label float-start">Facebook :</label>
                                                                            <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Isi Facebook" value="<?= $data_pjk['facebook']; ?>" />

                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label float-start">Nama Perwakilan :</label>
                                                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Isi Nama Perwakilan" value="<?= $data_pjk['nama']; ?>" />
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label float-start">Wa :</label>
                                                                            <input type="text" class="form-control" id="wa" name="wa" placeholder="Isi Whatsapp Perwakilan" value="<?= $data_pjk['wa']; ?>" />

                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label float-start">Status :</label>
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
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label float-start">Gambar :</label>

                                                                            <input type="file" class="form-control" id="gambar_projek" name="gambar_projek" value="<?php if (!empty($_SESSION['gambar_projek'])) {
                                                                                                                                                                        echo $_SESSION['gambar_projek'];
                                                                                                                                                                    } ?>" />
                                                                            <h7> <span style="color: red;">maksimal 2mb</span> </h7>

                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name" class="col-form-label float-start">Harga :</label>
                                                                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $data_pjk['harga']; ?>" />

                                                                            <button type="submit" class="btn btn-primary second-text float-end mt-5 mb-3 "> <i class="bx bx-edit me-2"></i>Edit </button>
                                                                        </div>

                                                                    </form>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <a href="javascript:if(confirm('Anda yakin ingin menghapus data 
                      <?php echo $pelanggan . ' - ' . $domisili; ?>?'))
                      window.location.href = 'proyek.php?aksi=hapus&data=<?php echo
                                                                            $id; ?>'" class="btn deletebtn danger-text btn-sm"><i class="fas fa-trash me-2"></i>Delete</a>

                                                </td>
                                            <?php $no++;
                                        } ?>
                                    </tbody>
                                </table>
                                <div class="card-footer clearfix">
                                    <?php
                                    //Menghitung jumlah
                                    $sql_jum = "SELECT `kode_projek`,`pelanggan` FROM `projek` order by `pelanggan` ";
                                    $query_jum = mysqli_query($koneksi, $sql_jum);
                                    $jum_data = mysqli_num_rows($query_jum);
                                    $jum_halaman = ceil($jum_data / $batas);
                                    ?>
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        <?php
                                        if ($jum_halaman == 0) {
                                            //tidak ada halaman
                                        } else if ($jum_halaman == 1) {
                                            echo "<li class='page-item'><a class='page-link'>1</a></li>";
                                        } else {
                                            $sebelum = $halaman - 1;
                                            $setelah = $halaman + 1;
                                            if (isset($_GET["katakunci"])) {
                                                $katakunci_projek = $_GET["katakunci"];
                                                if ($halaman != 1) {
                                                    echo "<li class='page-item'><a class='page-link'
                        	href='proyek.php?katakunci=$katakunci_projek&halaman=1'>
                        	First</a></li>";
                                                    echo "<li class='page-item'><a class='page-link'
                        	href='proyek.php?katakunci=$katakunci_projek&halaman=$sebelum'> 18.		«</a></li>";
                                                }
                                                for ($i = 1; $i <= $jum_halaman; $i++) {
                                                    if ($i != $halaman) {
                                                        echo "<li class='page-item'><a class='page-link'
                                	href='proyek.php?katakunci=$katakunci_projek&halaman=$i'>
                                	$i</a></li>";
                                                    } else {
                                                        echo "<li class='page-item'>
                                	<a class='page-link'>$i</a></li>";
                                                    }
                                                }
                                                if ($halaman != $jum_halaman) {
                                                    echo "<li class='page-item'><a class='page-link'
                                	href='proyek.php?katakunci=$katakunci_projek&halaman=$setelah'>
                                		»</a></li>";
                                                    echo "<li class='page-item'><a class='page-link'
                                		href='proyek.php?katakunci=$katakunci_projek&=$jum_halaman'>
                                		Last</a></li>";
                                                }
                                            } else {
                                                if ($halaman != 1) {
                                                    echo "<li class='page-item'><a class='page-link'
                                	href='proyek.php?halaman=1'>First</a></li>";
                                                    echo "<li class='page-item'><a class='page-link'
                                	href='proyek.php?halaman=$sebelum'>«</a></li>";
                                                }
                                                for ($i = 1; $i <= $jum_halaman; $i++) {
                                                    if ($i != $halaman) {
                                                        echo "<li class='page-item'><a class='page-link'
                                	href='proyek.php?halaman=$i'>$i</a></li>";
                                                    } else {
                                                        echo "<li class='page-item'><a class='page-
                                	link'>$i</a></li>";
                                                    }
                                                }
                                                if ($halaman != $jum_halaman) {
                                                    echo "<li class='page-item'><a class='page-link'
                                	href='proyek.php?halaman=$setelah'>»</a></li>";
                                                    echo "<li class='page-item'><a class='page-link'
                                	href='proyek.php?halaman=$jum_halaman'>Last</a></li>";
                                                }
                                            }
                                        } ?>
                                    </ul>
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