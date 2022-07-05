<?php
include('../koneksi/koneksi.php');
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $kode_progres = $_GET['data'];
        //hapus 
        $sql_dh = "delete from `progres_projek`
  	where `kode_projek_id` = '$kode_progres'";
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
    <title>Progres Proyek</title>
</head>


<body style="background-color: #fdfdfd;">
    <div class="dashboard-page">
        <div class="wrapper">
            <?php include("sidebar.php") ?>
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
                                    <input type="file" class="form-control" id="gambar" name="gambar" value="<?php if (!empty($_SESSION['gambar'])) {
                                                                                                                    echo $_SESSION['gambar'];
                                                                                                                } ?>" />
                                    <h7> <span style="color: red;">maksimal 2mb</span> </h7>


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
                    <div class="col mt-5">

                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">No</th>
                                    <th scope="col">progres</th>
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
                                //menampilkan data progres
                                $sql_h = "select `kode_projek_id`, `deskripsi` from `progres_projek` ";
                                if (isset($_GET["katakunci"])) {
                                    $katakunci_progres = $_GET["katakunci"];
                                    $sql_h .= " where `deskripsi` LIKE '%$katakunci_progres%'";
                                }
                                $sql_h .= "order by `kode_projek_id` DESC limit $posisi, $batas";
                                $query_h = mysqli_query($koneksi, $sql_h);
                                $no = 1;
                                while ($data_h = mysqli_fetch_row($query_h)) {
                                    $kode_projek_id = $data_h[0];
                                    $deskripsi = $data_h[1];
                                ?>
                                    <tr>
                                        <td data-label="No"><?php echo $no; ?></td>
                                        <td data-label="progres"><?php echo $deskripsi; ?></td>
                                        <td data-label="Aksi">

                                            <a href="javascript:if(confirm('Anda yakin ingin menghapus data?
                              <?php echo $deskripsi; ?>?'))	window.location.href = 'progres.php?aksi=hapus&data=<?php echo
                                                                                                                    $kode_projek_id; ?>'" class="deletebtn    danger-text btn-sm"><i class="fas fa-trash me-2"></i>Delete</a>

                                        <?php
                                        $no++;
                                    } ?>
                            </tbody>
                        </table>



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