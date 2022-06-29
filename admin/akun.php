<?php
include('../koneksi/koneksi.php');
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $id_user = $_GET['data'];
        //hapus akun
        $sql_dh = "delete from `akun`
  	where `id_user` = '$id_user'";
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
    <title>Pengaturan Akun </title>
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
                    <h2 class="content-title">Pengaturan Akun</h2>

                    <div class="menu-icons d-flex align-items-center gap-2">
                        <a href="profile.php"> <i class="bx bx-user" style="font-size: 30px;"></i></a>
                    </div>
                </div>
                <hr class="my-4">
                <?php if (!empty($_GET['notif'])) { ?>
                    <?php if ($_GET['notif'] == "tambahkosong") { ?>
                        <div class="alert alert-danger" role="alert">
                            Maaf data domisili wajib di isi</div>
                    <?php } ?>
                <?php } ?>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Akun</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="post" action="konfirmasi_tambah_akun.php">

                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Nama :</label>
                                        <input type="text" class="form-control" id="part_name" name="nama" placeholder="Isi User" />

                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Email :</label>
                                        <input type="text" class="form-control" id="email" name="email" value="" placeholder="Isi Email" />

                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Username :</label>
                                        <input type="text" class="form-control" id="username" name="username" value="" placeholder="Isi Username" />

                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Password :</label>
                                        <input type="password" class="form-control" id="password" name="password" value="" placeholder="Isi Password" />

                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Level :</label>
                                        <select type="text" class="form-control" id="level" name="level" placeholder="Pilih level">
                                            <option value="superadmin">superadmin</option>
                                            <option value="admin">admin</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary second-text float-end mt-5 mb-3 "> <i class="fas fa-plus me-2"></i>Tambah </button>

                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="container-fluid px-4">
                    <div class="row my-5">

                        <form method="get" action="akun.php">
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
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $batas = 5;
                                    if (!isset($_GET['halaman'])) {
                                        $posisi = 0;
                                        $halaman = 1;
                                    } else {
                                        $halaman = $_GET['halaman'];
                                        $posisi = ($halaman - 1) * $batas;
                                    }
                                    //menampilkan data akun
                                    $sql_h = "select `id_user`, `nama`, `email`, `username`, `password`, `level` from `akun`";
                                    if (isset($_GET['katakunci'])) {
                                        $katakunci_user = $_GET['katakunci'];
                                        $sql_h .= " where `email` LIKE '%$katakunci_user%' 
                                        OR `nama` LIKE '%$katakunci_user%'
                                        OR `username` LIKE '%$katakunci_user%'";
                                    }
                                    $sql_h .= " order by `nama`  DESC limit $posisi, $batas ";
                                    $query_h = mysqli_query($koneksi, $sql_h);
                                    $no = 1;
                                    while ($data_h = mysqli_fetch_array($query_h)) {
                                        // $id = $data_h[0];
                                        // $nama = $data_h[1];
                                        // $email = $data_h[2];
                                        // $username = $data_h[3];

                                        // $level = $data_h[5];
                                    ?>
                                        <tr>
                                            <td data-label="No"><?php echo $no++; ?></td>
                                            <td data-label="Nama"><?php echo $data_h['nama']; ?></td>
                                            <td data-label="Email"><?php echo $data_h['email']; ?></td>
                                            <td data-label="Username"><?php echo $data_h['username']; ?></td>

                                            <td data-label="Level"><?php echo $data_h['level']; ?></td>
                                            <td data-label="Aksi">
                                                <a class="btn editbtn second-text btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModaledit<?= $data_h['id_user'] ?>"> <i class="fas fa-edit me-2"></i>Edit</a>
                                                <div class="modal fade" id="exampleModaledit<?= $data_h['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Akun</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal" method="post" action="konfirmasi_edit_akun.php">
                                                                    <input type="hidden" name="kode" value="<?= $data_h['id_user']; ?>">
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name" class="col-form-label float-start">Nama:</label>
                                                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data_h['nama']; ?>">

                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="recipient-name" class="col-form-label float-start">Email:</label>
                                                                        <input type="text" class="form-control" id="email" name="email" value="<?= $data_h['email']; ?>">

                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="recipient-name" class="col-form-label float-start">Username:</label>
                                                                        <input type="text" class="form-control" id="username" name="username" value="<?= $data_h['username']; ?>">

                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="recipient-name" class="col-form-label float-start">Password:</label>
                                                                        <input type="password" class="form-control" id="password" name="password" value="<?= $data_h['password']; ?>" />

                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="recipient-name" class="col-form-label float-start">Level:</label>
                                                                        <select type="text" class="form-control" id="level" name="level">
                                                                            <option value="superadmin" <?= ($data_h['level'] == 'superadmin') ? 'selected' : '' ?>>superadmin</option>
                                                                            <option value="admin" <?= ($data_h['level'] == 'admin') ? 'selected' : '' ?>>admin</option>
                                                                        </select>
                                                                        <button type="submit" class="btn btn-primary second-text float-end mt-5 mb-3 "> <i class="bx bx-edit me-2"></i>Edit </button>

                                                                    </div>

                                                                </form>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <a href="javascript:if(confirm('Anda yakin ingin menghapus data?
                        <?php echo $nama; ?>?')) window.location.href = 'akun.php?aksi=hapus&data=<?php echo
                                                                                                    $id; ?>'" class="btn deletebtn danger-text btn-sm"><i class="fas fa-trash me-2 "></i>Delete</a>

                                            <?php
                                        } ?>
                                </tbody>

                            </table>
                            <div class="card-footer clearfix">
                                <?php
                                //Menghitung jumlah
                                $sql_jum = "SELECT `id_user`,`nama` FROM `akun` order by `nama` ";
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
                                            $katakunci_akun = $_GET["katakunci"];
                                            if ($halaman != 1) {
                                                echo "<li class='page-item'><a class='page-link'
                        	href='akun.php?katakunci=$katakunci_akun&halaman=1'>
                        	First</a></li>";
                                                echo "<li class='page-item'><a class='page-link'
                        	href='akun.php?katakunci=$katakunci_akun&halaman=$sebelum'> 18.		«</a></li>";
                                            }
                                            for ($i = 1; $i <= $jum_halaman; $i++) {
                                                if ($i != $halaman) {
                                                    echo "<li class='page-item'><a class='page-link'
                                	href='akun.php?katakunci=$katakunci_akun&halaman=$i'>
                                	$i</a></li>";
                                                } else {
                                                    echo "<li class='page-item'>
                                	<a class='page-link'>$i</a></li>";
                                                }
                                            }
                                            if ($halaman != $jum_halaman) {
                                                echo "<li class='page-item'><a class='page-link'
                                	href='akun.php?katakunci=$katakunci_akun&halaman=$setelah'>
                                		»</a></li>";
                                                echo "<li class='page-item'><a class='page-link'
                                		href='akun.php?katakunci=$katakunci_akun&=$jum_halaman'>
                                		Last</a></li>";
                                            }
                                        } else {
                                            if ($halaman != 1) {
                                                echo "<li class='page-item'><a class='page-link'
                                	href='akun.php?halaman=1'>First</a></li>";
                                                echo "<li class='page-item'><a class='page-link'
                                	href='akun.php?halaman=$sebelum'>«</a></li>";
                                            }
                                            for ($i = 1; $i <= $jum_halaman; $i++) {
                                                if ($i != $halaman) {
                                                    echo "<li class='page-item'><a class='page-link'
                                	href='akun.php?halaman=$i'>$i</a></li>";
                                                } else {
                                                    echo "<li class='page-item'><a class='page-
                                	link'>$i</a></li>";
                                                }
                                            }
                                            if ($halaman != $jum_halaman) {
                                                echo "<li class='page-item'><a class='page-link'
                                	href='akun.php?halaman=$setelah'>»</a></li>";
                                                echo "<li class='page-item'><a class='page-link'
                                	href='akun.php?halaman=$jum_halaman'>Last</a></li>";
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