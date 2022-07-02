<?php
include('../koneksi/koneksi.php');
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $kode_produk = $_GET['data'];
        //hapus produk
        $sql_dh = "delete from `produk`
  	where `kode_produk` = '$kode_produk'";
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
    <title>produk</title>
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
                    <h2 class="content-title">produk</h2>

                    <div class="menu-icons d-flex align-items-center gap-2">
                        <a href="profile.php"> <i class="bx bx-user" style="font-size: 30px;"></i></a>
                    </div>
                </div>
                <hr class="my-4">
                <!--Modal Tambah-->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="post" action="konfirmasi_tambah_produk.php">

                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">produk :</label>
                                        <input type="text" class="form-control" id="part_name" name="produk" placeholder="Isi produk" />
                                        <button type="submit" class="btn btn-primary second-text float-end mt-5 mb-3 "> <i class="fas fa-plus me-2"></i>Tambah </button>

                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!--Modal Edit-->
                <?php if (!empty($_GET['notif'])) { ?>
                    <?php if ($_GET['notif'] == "editkosong") { ?>
                        <div class="alert alert-danger" role="alert">
                            Maaf data produk wajib di isi</div>
                    <?php } ?>
                <?php } ?>

                <div class="container-fluid ">
                    <div class="row my-5">

                        <form method="get" action="produk.php">
                            <div class="row ">

                                <div class="col-md-4 bottom-10 ">
                                    <input type="text" class="form-control" id="kata_kunci" name="katakunci">
                                </div>
                                <div class="col-md-5 bottom-10 ">

                                    <button type="submit" class="btn btn-outline-primary second-text "><i class="fas fa-search"></i>&nbsp; </button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Tambah</button>
                                </div>
                                <div class="form-check">
                                    </label>

                                </div>
                            </div>
                        </form>
                        <div class="col mt-5">

                            <table class="table bg-white rounded shadow-sm  table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" width="50">No</th>
                                        <th scope="col">produk</th>
                                        <th scope="col">Aksi</th>

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
                                    //menampilkan data produk
                                    $sql_h = "select `kode_produk`, `produk` from `produk` ";
                                    if (isset($_GET["katakunci"])) {
                                        $katakunci_produk = $_GET["katakunci"];
                                        $sql_h .= " where `produk` LIKE '%$katakunci_produk%'";
                                    }
                                    $sql_h .= "order by `produk` DESC limit $posisi, $batas";
                                    $query_h = mysqli_query($koneksi, $sql_h);
                                    $no = 1;
                                    while ($data_h = mysqli_fetch_row($query_h)) {
                                        $kode_produk = $data_h[0];
                                        $produk = $data_h[1];
                                    ?>
                                        <tr>
                                            <td data-label="No"><?php echo $no; ?></td>
                                            <td data-label="produk"><?php echo $produk; ?></td>
                                            <td data-label="Aksi">
                                                <a class="btn editbtn second-text btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModaledit<?= $kode_produk ?>"> <i class="fas fa-edit me-2"></i>Edit</a>
                                                <div class="modal fade" id="exampleModaledit<?= $kode_produk ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data produk</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal" method="post" action="konfirmasi_edit_produk.php">
                                                                    <input type="hidden" name="kode" value="<?= $kode_produk ?>">
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name" class="col-form-label float-start">produk :</label>
                                                                        <input type="text" class="form-control" id="produk" name="produk" value="<?php echo $produk; ?>">
                                                                        <button type="submit" class="btn btn-primary second-text float-end mt-5 mb-3 "> <i class="bx bx-edit me-2"></i>Edit </button>

                                                                    </div>

                                                                </form>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>

                                                <a href="javascript:if(confirm('Anda yakin ingin menghapus data?
                                                        <?php echo $produk; ?>?'))	window.location.href = 'produk.php?aksi=hapus&data=<?php echo
                                                                                                                                            $kode_produk; ?>'" class="btn deletebtn           danger-text btn-sm"><i class="fas fa-trash me-2"></i>Delete</a>



                                            <?php
                                            $no++;
                                        } ?>
                                </tbody>
                            </table>
                            <div class="card-footer clearfix">
                                <?php
                                //Menghitung jumlah
                                $sql_jum = "SELECT `kode_produk`,`produk` FROM `produk` order by `kode_produk` ";
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
                                            $katakunci_produk = $_GET["katakunci"];
                                            if ($halaman != 1) {
                                                echo "<li class='page-item'><a class='page-link'
                        	href='produk.php?katakunci=$katakunci_produk&halaman=1'>
                        	First</a></li>";
                                                echo "<li class='page-item'><a class='page-link'
                        	href='produk.php?katakunci=$katakunci_produk&halaman=$sebelum'> 18.		«</a></li>";
                                            }
                                            for ($i = 1; $i <= $jum_halaman; $i++) {
                                                if ($i != $halaman) {
                                                    echo "<li class='page-item'><a class='page-link'
                                	href='produk.php?katakunci=$katakunci_produk&halaman=$i'>
                                	$i</a></li>";
                                                } else {
                                                    echo "<li class='page-item'>
                                	<a class='page-link'>$i</a></li>";
                                                }
                                            }
                                            if ($halaman != $jum_halaman) {
                                                echo "<li class='page-item'><a class='page-link'
                                	href='produk.php?katakunci=$katakunci_produk&halaman=$setelah'>
                                		»</a></li>";
                                                echo "<li class='page-item'><a class='page-link'
                                		href='produk.php?katakunci=$katakunci_produk&=$jum_halaman'>
                                		Last</a></li>";
                                            }
                                        } else {
                                            if ($halaman != 1) {
                                                echo "<li class='page-item'><a class='page-link'
                                	href='produk.php?halaman=1'>First</a></li>";
                                                echo "<li class='page-item'><a class='page-link'
                                	href='produk.php?halaman=$sebelum'>«</a></li>";
                                            }
                                            for ($i = 1; $i <= $jum_halaman; $i++) {
                                                if ($i != $halaman) {
                                                    echo "<li class='page-item'><a class='page-link'
                                	href='produk.php?halaman=$i'>$i</a></li>";
                                                } else {
                                                    echo "<li class='page-item'><a class='page-
                                	link'>$i</a></li>";
                                                }
                                            }
                                            if ($halaman != $jum_halaman) {
                                                echo "<li class='page-item'><a class='page-link'
                                	href='produk.php?halaman=$setelah'>»</a></li>";
                                                echo "<li class='page-item'><a class='page-link'
                                	href='produk.php?halaman=$jum_halaman'>Last</a></li>";
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