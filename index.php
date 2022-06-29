<?php
include('koneksi/koneksi.php');

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
    <title>Proyek</title>
</head>


<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);

    body {
        background: #f2f2f2;
        font-family: 'Open Sans', sans-serif;
    }

    section {
        margin-top: 300px;
    }

    .search {
        width: 100%;
        position: relative;
        display: flex;
    }

    .form-control {
        width: 100%;
        border: 3px solid #4564e5;
        border-right: none;
        padding: 5px;
        height: 35px;
        border-radius: 5px 0 0 5px;
        outline: none;
        color: #9DBFAF;
    }

    .form-control:focus {
        color: #4564e5;
    }

    .searchButton {
        width: 40px;
        height: 35px;
        border: 1px solid #4564e5;
        background: #4564e5;
        text-align: center;
        color: #fff;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        font-size: 20px;
    }

    /*Resize the wrap to see the search bar change!*/
    .wrap {
        width: 50%;
        position: absolute;
        top: 30%;
        left: 50%;
        transform: translate(-50%, -50%);

    }

    .data {
        margin-top: 30vh;
    }

    table {}
</style>

<body>
    <section class="searchbar">

        <form method="get" action="index.php">

            <div class="wrap">

                <div class="search">
                    <input type="text" class="form-control" id="kata_kunci" name="katakunci" placeholder="Cari Proyek Anda..">
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </section>
    <section class="data">
        <div class="container-fluid row my-5 ">
            <div class=" mt-5">
                <div class="table-responsive">
                    <table style="border: 1;" class="table bg-white rounded shadow-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col" width="50">No</th>
                                <th scope="col">Pelanggan</th>
                                <th scope="col">Kode Pelanggan</th>
                                <th scope="col">Domisili</th>
                                <th scope="col">Industri</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Aksi</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET['katakunci'])) {
                                $batas = 8;
                                if (!isset($_GET['halaman'])) {
                                    $posisi = 0;
                                    $halaman = 1;
                                } else {
                                    $halaman = $_GET['halaman'];
                                    $posisi = ($halaman - 1) * $batas;
                                }
                                //menampilkan data projek
                                $sql_pjk = "SELECT kp.kode_projek, kp.pelanggan, kp.kode_pelanggan, kd.domisili, ki.industri, pp.produk, kp.instagram, kp.facebook
                                    FROM projek kp INNER JOIN domisili kd ON kp.kode_domisili = kd.kode_domisili
                                    INNER JOIN industri ki ON kp.kode_industri = ki.kode_industri
                                    INNER JOIN produk pp ON kp.kode_produk = pp.kode_produk";
                                if (isset($_GET["katakunci"])) {
                                    $katakunci_pjk = $_GET["katakunci"];
                                    $_SESSION['katakunci_projek'] = $katakunci_pjk;
                                    $sql_pjk .= " WHERE kp.kode_pelanggan LIKE '%$katakunci_pjk%' ";
                                }
                                $sql_pjk .= " order by `pelanggan` DESC limit $posisi, $batas";
                                $query_pjk = mysqli_query($koneksi, $sql_pjk);
                                $no = 1;
                                while ($data_pjk = mysqli_fetch_row($query_pjk)) {
                                    $id = $data_pjk[0];
                                    $pelanggan = $data_pjk[1];
                                    $kode_pelanggan = $data_pjk[2];
                                    $domisili = $data_pjk[3];
                                    $industri = $data_pjk[4];
                                    $produk = $data_pjk[5];
                            ?>
                                    <tr>

                                        <td data-label="No"><?php echo $no; ?></td>
                                        <td data-label="Pelanggan"><?php echo $pelanggan; ?></td>
                                        <td data-label="Kode_pelanggan"><?php echo $kode_pelanggan; ?></td>
                                        <td data-label="Domisili"><?php echo $domisili; ?></td>
                                        <td data-label="Industri"><?php echo $industri; ?></td>
                                        <td data-label="Produk"> <?php echo $produk; ?></td>
                                        <td data-label="Aksi">
                                            <a href="detail_proyek.php?data=<?php echo $id; ?>" class="btn detailbtn second-text btn-sm"> <i class="fas fa-eye me-2"></i>Detail</a>
                                        </td>
                                <?php $no++;
                                }
                            }
                                ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
</body>

<!-- <body>
    <div class="d-flex" id="wrapper">

        <!-- /#sidebar-wrapper -->

<!-- Page Content -->
<!-- <div class="container-fluid px-4 ">
    <div class="row my-5 ">
        <h3 class="fs-4 mb-3 text-center ">List Proyek</h3>
        <form method="get" action="index.php">
            <div class="row ">
                <div class="bottom-10 w-100 mt-3">
                    <input type="text" class="form-control" id="kata_kunci" name="katakunci">
                </div>
                <div class="bottom-10 ">
                    <button type="submit" class="btn editbtn second-text "> </button>

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
                            <th scope="col">Aksi</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET['katakunci'])) {
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
                                $sql_pjk .= " WHERE kp.pelanggan LIKE '%$katakunci_pjk%' ";
                            }
                            $sql_pjk .= " order by `pelanggan` DESC limit $posisi, $batas";
                            $query_pjk = mysqli_query($koneksi, $sql_pjk);
                            $no = 1;
                            while ($data_pjk = mysqli_fetch_row($query_pjk)) {
                                $id = $data_pjk[0];
                                $pelanggan = $data_pjk[1];
                                $domisili = $data_pjk[2];
                                $industri = $data_pjk[3];
                                $produk = $data_pjk[4];
                        ?>
                                <tr>

                                    <td data-label="No"><?php echo $no; ?></td>
                                    <td data-label="Pelanggan"><?php echo $pelanggan; ?></td>
                                    <td data-label="Domisili"><?php echo $domisili; ?></td>
                                    <td data-label="Industri"><?php echo $industri; ?></td>
                                    <td data-label="Produk"> <?php echo $produk; ?></td>
                                    <td data-label="Aksi">
                                        <a href="detail_proyek.php?data=<?php echo $id; ?>" class="btn detailbtn second-text btn-sm"> <i class="fas fa-eye me-2"></i>Detail</a>



                                    </td>
                            <?php $no++;
                            }
                        }
                            ?>
                    </tbody>
                </table>

            </div>
    </div>

</div>
</div>
</div>
<!-- /#page-content-wrapper -->
<!-- </div>
<footer class="text-center p-2">Created by Not Today || <span style="color: #4564e5; font-weight:bold;">ONLENKAN 2022</span> </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function() {
        el.classList.toggle("toggled");
    };
</script>
</body> -->

</html>