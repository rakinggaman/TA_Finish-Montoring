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

    <!-- CSS -->
    <link rel="stylesheet" href="asset/css/sidebar.css" type="text/css" />
    <link rel="stylesheet" href="asset/css/styles.css" type="text/css" />
    <link rel="stylesheet" href="asset/css/table.css" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!--Boxicons CDN LINK-->
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
    <title>Dashboard</title>

</head>


<body style="background-color: #fdfdfd;">
    <div class="dashboard-page">
        <div class="wrapper">
            <?php include("sidebar.php") ?>
            <div class="content">
                <div class="content-header d-flex align-items-center justify-content-between">
                    <h2 class="content-title">Dashboard</h2>

                    <div class="menu-icons d-flex align-items-center gap-2">
                        <a href="profile.php"> <i class="bx bx-user" style="font-size: 30px;"></i></a>
                    </div>
                </div>
                <hr class="my-4">
                <div class="row statistics mt-4">
                    <!-- Proyek-->
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="icons">
                                        <i class="bx bx-table" style=" color: #4564e5;"></i>
                                    </div>
                                    <span class="card-title text-dark">
                                        <?php
                                        include('../koneksi/koneksi.php');
                                        $sql = mysqli_query($koneksi, "SELECT COUNT(*) FROM `projek` ");
                                        while ($data = mysqli_fetch_array($sql)) {
                                        ?>
                                            <th style="font-size: 34px;"><?php echo number_format($data['COUNT(*)']); ?></th>
                                        <?php } ?>
                                    </span>
                                </div>

                                <p class="m-0 text-secondary mt-3">Total Proyek</p>
                            </div>
                        </div>
                    </div>
                    <!--Industri-->
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="icons">
                                        <i class="bx bx-building-house" style=" color: #4564e5;"></i>
                                    </div>
                                    <span class="card-title text-dark"><?php
                                                                        include('../koneksi/koneksi.php');
                                                                        $sql = mysqli_query($koneksi, "SELECT COUNT(*) FROM `industri` ");
                                                                        while ($data = mysqli_fetch_array($sql)) {
                                                                        ?>
                                            <th style="font-size: 34px;"><?php echo number_format($data['COUNT(*)']); ?></th>
                                        <?php } ?>
                                    </span>
                                </div>

                                <p class="m-0 text-secondary mt-3">Total Industri</p>
                            </div>
                        </div>
                    </div>
                    <!--Domisili-->
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="icons">
                                        <i class="bx bx-home-circle" style=" color: #4564e5;"></i>
                                    </div>
                                    <span class="card-title text-dark"> <?php
                                                                        include('../koneksi/koneksi.php');
                                                                        $sql = mysqli_query($koneksi, "SELECT COUNT(*) FROM `domisili` ");
                                                                        while ($data = mysqli_fetch_array($sql)) {
                                                                        ?>
                                            <th style="font-size: 34px;"><?php echo number_format($data['COUNT(*)']); ?></th>
                                        <?php } ?>
                                    </span>
                                </div>

                                <p class="m-0 text-secondary mt-3">Total Domisili</p>
                            </div>
                        </div>
                    </div>
                    <!--Pendapatan-->
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="icons">
                                        <i class="bx bx-money" style=" color: #4564e5;"></i>
                                    </div>
                                    <span class="card-title text-dark"> <?php
                                                                        include('../koneksi/koneksi.php');
                                                                        $sql = mysqli_query($koneksi, "SELECT SUM(harga_projek) FROM `projek` ");
                                                                        while ($data = mysqli_fetch_array($sql)) {
                                                                        ?>
                                            <th style="font-size: 34px; font-weight: bold;"> Rp <?php echo number_format($data['SUM(harga_projek)']); ?> </th>
                                        <?php } ?>
                                    </span>
                                </div>

                                <p class="m-0 text-secondary mt-3">Total Pendapatan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="statistics mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-5">
                                <h4 class="card-title">Data</h4>
                            </div>
                            <div class="container-fluid px-4">
                                <div class="row my-5">
                                    <div class="col mt-1">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Pelanggan</th>
                                                    <th scope="col">Domisili</th>
                                                    <th scope="col">Industri</th>
                                                    <th scope="col">Produk</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                //menampilkan data projek
                                                $sql_pjk = "SELECT kp.kode_projek, kp.pelanggan, kd.domisili, ki.industri, pp.produk, ss.status
                                      FROM projek kp INNER JOIN domisili kd ON kp.kode_domisili = kd.kode_domisili
                                      INNER JOIN industri ki ON kp.kode_industri = ki.kode_industri
                                      INNER JOIN produk pp ON kp.kode_produk = pp.kode_produk
                                      INNER JOIN status ss ON kp.kode_status = ss.kode_status";
                                                if (isset($_POST["katakunci"])) {
                                                    $katakunci_pjk = $_POST["katakunci"];
                                                    $_SESSION['katakunci_projek'] = $katakunci_pjk;
                                                    $sql_pjk .= " where `projek`.`pelanggan` LIKE '%$katakunci_pjk%' 
                                                  OR `domisili`.`domisili` LIKE '%$katakunci_pjk%' OR `industri`.`industri` LIKE '%$katakunci_pjk%' OR `produk`.`produk` LIKE '%$katakunci_pjk%' OR `status`.`status` LIKE '%$katakunci_pjk%'";
                                                }
                                                $query_pjk = mysqli_query($koneksi, $sql_pjk);
                                                $no = 1;
                                                while ($data_pjk = mysqli_fetch_row($query_pjk)) {
                                                    $id = $data_pjk[0];
                                                    $pelanggan = $data_pjk[1];
                                                    $domisili = $data_pjk[2];
                                                    $industri = $data_pjk[3];
                                                    $produk = $data_pjk[4];
                                                    $status = $data_pjk[5];

                                                ?>
                                                    <tr>
                                                        <td data-label="No">
                                                            <?php echo $no; ?>
                                                        </td>
                                                        <td data-label="Pelanggan">
                                                            <?php echo $pelanggan; ?>
                                                        </td>
                                                        <td data-label="Domisili">
                                                            <?php echo $domisili; ?>
                                                        </td>
                                                        <td data-label="Industri">
                                                            <?php echo $industri; ?>
                                                        </td>
                                                        <td data-label="Produk">
                                                            <?php echo $produk; ?>
                                                        </td>
                                                        <td data-label="Status">
                                                            <?php echo $status; ?>
                                                        </td>
                                                    <?php $no++;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <canvas id="incomeStatistic" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
        function sidebarMenu() {
            const sidebar = document.getElementById('sidebarMenu');
            sidebar.classList.toggle('active');
        }
    </script>

</body>

</html>