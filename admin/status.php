<?php
include('../koneksi/koneksi.php');
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $kode_status = $_GET['data'];
        //hapus status
        $sql_dh = "delete from `status`
  	where `kode_status` = '$kode_status'";
        mysqli_query($koneksi, $sql_dh);
    }
}
?>
<?php
session_start();

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

    <link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/boxicons-2.1.2/css/boxicons.min.css">
    <link rel="stylesheet" href="vendors/swiperjs/swiper-bundle.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="asset/css/sidebar.css" type="text/css" />
    <link rel="stylesheet" href="asset/css/styles.css" type="text/css" />
    <link rel="stylesheet" href="asset/css/table.css" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!--Boxicons CDN LINK-->
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
    <title>status</title>
</head>


<body style="background-color: #fdfdfd;">
    <div class="dashboard-page">
        <div class="wrapper">
            <?php include("sidebar.php") ?>
            <div class="content">
                <div class="content-header d-flex align-items-center justify-content-between">
                    <h2 class="content-title">status</h2>

                    <div class="menu-icons d-flex align-items-center gap-2">
                        <a href="profile.php"> <i class="bx bx-user" style="font-size: 30px;"></i></a>
                    </div>
                </div>
                <hr class="my-4">
                <?php if (!empty($_GET['notif'])) { ?>
                    <?php if ($_GET['notif'] == "tambahberhasil") { ?>
                        <div class="alert alert-success" role="alert"> Data Berhasil Ditambahkan</div>
                    <?php } else if ($_GET['notif'] == "editberhasil") { ?>
                        <div class="alert alert-success" role="alert">
                            Data Berhasil Diubah</div>
                    <?php } ?>
                <?php } ?>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Status</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="post" action="konfirmasi_tambah_status.php">

                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Status :</label>
                                        <input type="text" class="form-control" id="part_name" name="status" placeholder="Isi Status" />
                                        <button type="submit" class="btn btn-primary second-text float-end mt-5 mb-3 "> <i class="fas fa-plus me-2"></i>Tambah </button>

                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="container-fluid ">
                    <div class="row my-5">

                        <form method="get" action="status.php">
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
                                        <th scope="col">status</th>
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
                                    //menampilkan data status
                                    $sql_h = "select `kode_status`, `status` from `status` ";
                                    if (isset($_GET["katakunci"])) {
                                        $katakunci_status = $_GET["katakunci"];
                                        $sql_h .= " where `status` LIKE '%$katakunci_status%'";
                                    }
                                    $sql_h .= "order by `status` DESC limit $posisi, $batas";
                                    $query_h = mysqli_query($koneksi, $sql_h);
                                    $no = 1;
                                    while ($data_h = mysqli_fetch_row($query_h)) {
                                        $kode_status = $data_h[0];
                                        $status = $data_h[1];
                                    ?>
                                        <tr>
                                            <td data-label="No"><?php echo $no; ?></td>
                                            <td data-label="status"><?php echo $status; ?></td>
                                            <td data-label="Aksi">
                                                <a class="editbtn second-text btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModaledit<?= $kode_status ?>"> <i class="fas fa-edit me-2"></i>Edit</a>
                                                <div class="modal fade" id="exampleModaledit<?= $kode_status ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data industri</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal" method="post" action="konfirmasi_edit_status.php">
                                                                    <input type="hidden" name="kode" value="<?= $kode_status ?>">
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name" class="col-form-label float-start">Status:</label>
                                                                        <input type="text" class="form-control" id="status" name="status" value="<?php echo $status; ?>">
                                                                        <button type="submit" class="btn btn-primary second-text float-end mt-5 mb-3 "> <i class="bx bx-edit me-2"></i>Edit </button>

                                                                    </div>

                                                                </form>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <a href="javascript:if(confirm('Anda yakin ingin menghapus data?
                                                          <?php echo $status; ?>?'))	window.location.href = 'status.php?aksi=hapus&data=<?php echo
                                                                                                                                            $kode_status; ?>'" class="deletebtn    danger-text btn-sm"><i class="fas fa-trash me-2"></i>Delete</a>

                                            <?php
                                            $no++;
                                        } ?>
                                </tbody>
                            </table>
                            <div class="card-footer clearfix">
                                <?php
                                //Menghitung jumlah
                                $sql_jum = "SELECT `kode_status`,`status` FROM `status` order by `kode_status` ";
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
                                            $katakunci_status = $_GET["katakunci"];
                                            if ($halaman != 1) {
                                                echo "<li class='page-item'><a class='page-link'
                        	href='status.php?katakunci=$katakunci_status&halaman=1'>
                        	First</a></li>";
                                                echo "<li class='page-item'><a class='page-link'
                        	href='status.php?katakunci=$katakunci_status&halaman=$sebelum'> 18.		«</a></li>";
                                            }
                                            for ($i = 1; $i <= $jum_halaman; $i++) {
                                                if ($i != $halaman) {
                                                    echo "<li class='page-item'><a class='page-link'
                                	href='status.php?katakunci=$katakunci_status&halaman=$i'>
                                	$i</a></li>";
                                                } else {
                                                    echo "<li class='page-item'>
                                	<a class='page-link'>$i</a></li>";
                                                }
                                            }
                                            if ($halaman != $jum_halaman) {
                                                echo "<li class='page-item'><a class='page-link'
                                	href='status.php?katakunci=$katakunci_status&halaman=$setelah'>
                                		»</a></li>";
                                                echo "<li class='page-item'><a class='page-link'
                                		href='status.php?katakunci=$katakunci_status&=$jum_halaman'>
                                		Last</a></li>";
                                            }
                                        } else {
                                            if ($halaman != 1) {
                                                echo "<li class='page-item'><a class='page-link'
                                	href='status.php?halaman=1'>First</a></li>";
                                                echo "<li class='page-item'><a class='page-link'
                                	href='status.php?halaman=$sebelum'>«</a></li>";
                                            }
                                            for ($i = 1; $i <= $jum_halaman; $i++) {
                                                if ($i != $halaman) {
                                                    echo "<li class='page-item'><a class='page-link'
                                	href='status.php?halaman=$i'>$i</a></li>";
                                                } else {
                                                    echo "<li class='page-item'><a class='page-
                                	link'>$i</a></li>";
                                                }
                                            }
                                            if ($halaman != $jum_halaman) {
                                                echo "<li class='page-item'><a class='page-link'
                                	href='status.php?halaman=$setelah'>»</a></li>";
                                                echo "<li class='page-item'><a class='page-link'
                                	href='status.php?halaman=$jum_halaman'>Last</a></li>";
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