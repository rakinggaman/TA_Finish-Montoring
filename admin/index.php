<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="asset/css/login.css" />


    <title>Monitoring Proyek | ONLENKAN</title>

</head>

<body>

    <div class="login-box mt-5">
        <h4 class="title text-center mb-5">Sistem Monitoring Proyek ONLENKAN</h4>
        <?php if (!empty($_GET['gagal'])) { ?>
            <?php if ($_GET['gagal'] == "userKosong") { ?>
                <span class="text-danger"> Maaf Username Tidak Boleh Kosong</span>
            <?php } else if ($_GET['gagal'] == "passKosong") { ?>
                <span class="text-danger"> Maaf Password Tidak Boleh Kosong </span>
            <?php } else { ?>
                <span class="text-danger"> Maaf Username dan Password Anda Salah </span>
            <?php } ?>
        <?php } ?>
        <form action="konfirmasi_login.php" method="post">
            <div class="user-box">
                <input type="text" id="username" name="username" required="">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" id="password" name="password" required="">
                <label>Password</label>
            </div>
            <button type="submit" name="login" value="login"><span></span>
                <span></span>
                <span></span>
                <span></span> Masuk </button>
        </form>
    </div>
    <!-- Sign In -->
    <!--section class="sign-in mx-auto">

        <div class="row">
            <div class="col-xxl-5 col-lg-6 my-auto py-lg-0 pt-lg-50 pb-lg-50 pt-30 pb-47 px-0">
                <?php if (!empty($_GET['gagal'])) { ?>
                    <?php if ($_GET['gagal'] == "userKosong") { ?>
                        <span class="text-danger"> Maaf Username Tidak Boleh Kosong</span>
                    <?php } else if ($_GET['gagal'] == "passKosong") { ?>
                        <span class="text-danger"> Maaf Password Tidak Boleh Kosong </span>
                    <?php } else { ?>
                        <span class="text-danger"> Maaf Username dan Password Anda Salah </span>
                    <?php } ?>
                <?php } ?>
                <form action="konfirmasi_login.php" method="post">
                    <div class="container mx-auto">
                        <div class="pb-50">

                            <a class="navbar-brand" href="../index.html">

                                <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="60" height="60">
                                    <circle cx="30" cy="30" r="30" fill="#3546AB" />
                                </mask>
                                <g mask="url(#mask0)">
                                    <circle cx="30" cy="30" r="30" fill="#00BAFF" />
                                    <path d="M41.5001 35.0001C52.3001 38.2001 49.6668 48.0001 47.0001 52.5001L71.0001 60.5001L79.5001 -12.9999C63.6667 -13.8333 29.5001 -14.9999 19.5001 -12.9999C7.00007 -10.4999 13.5001 4.00006 12.0001 14.0001C10.5001 24.0001 28.0001 31.0001 41.5001 35.0001Z" fill="#4D17E2" />
                                    <path d="M54.495 47.785C54.495 51.285 53.655 54.54 51.975 57.55C50.295 60.56 47.74 63.01 44.31 64.9C40.88 66.79 36.645 67.735 31.605 67.735C26.705 67.735 22.33 66.86 18.48 65.11C14.7 63.29 11.655 60.84 9.345 57.76C7.105 54.61 5.81 51.04 5.46 47.05H15.645C15.855 49.15 16.555 51.215 17.745 53.245C19.005 55.205 20.755 56.85 22.995 58.18C25.305 59.44 28.07 60.07 31.29 60.07C35.49 60.07 38.71 58.95 40.95 56.71C43.19 54.47 44.31 51.6 44.31 48.1C44.31 45.09 43.505 42.64 41.895 40.75C40.355 38.86 38.43 37.39 36.12 36.34C33.81 35.22 30.66 34.03 26.67 32.77C21.98 31.23 18.2 29.795 15.33 28.465C12.53 27.065 10.115 25 8.085 22.27C6.125 19.54 5.145 15.935 5.145 11.455C5.145 7.60499 6.055 4.20999 7.875 1.27C9.765 -1.67 12.425 -3.945 15.855 -5.555C19.355 -7.165 23.45 -7.97 28.14 -7.97C35.42 -7.97 41.195 -6.185 45.465 -2.615C49.735 0.884996 52.22 5.365 52.92 10.825H42.63C42.07 7.885 40.565 5.295 38.115 3.055C35.665 0.814997 32.34 -0.305003 28.14 -0.305003C24.29 -0.305003 21.21 0.709996 18.9 2.73999C16.59 4.69999 15.435 7.5 15.435 11.14C15.435 14.01 16.17 16.355 17.64 18.175C19.18 19.925 21.07 21.325 23.31 22.375C25.55 23.355 28.63 24.475 32.55 25.735C37.31 27.275 41.125 28.745 43.995 30.145C46.935 31.545 49.42 33.68 51.45 36.55C53.48 39.35 54.495 43.095 54.495 47.785Z" fill="white" />
                                </g>
                                </svg>
                            </a>
                        </div>
                        <h2 class="text-4xl fw-bold color-palette-1 mb-10">
                            Sign In Sistem
                        </h2>
                        <p class="text-lg color-palette-1 m-0">
                            Silahkan masuk kedalam sistem kami
                        </p>
                        <div class="pt-50">
                            <label for="exampleInputEmail1" class="form-label text-lg fw-medium color-palette-1 mb-10">Username
                            </label>
                            <input type="text" class="form-control rounded-pill text-lg" id="username" name="username" placeholder="Enter your username address" aria-describedby="username" />
                        </div>
                        <div class="pt-30">
                            <label for="exampleInputPassword1" class="form-label text-lg fw-medium color-palette-1 mb-10">Password</label>
                            <input type="password" class="form-control rounded-pill text-lg" id="password" name="password" aria-describedby="password" placeholder="Your password" />
                        </div>
                        <button type="submit" name="login" value="login" class="btn btn-sign-in fw-medium text-lg text-white rounded-pill mb-16 float-end mt-3"> Masuk </button>

                    </div>
                </form>
            </div>
            <div class="col-xxl-7 col-lg-6 bg-blue text-center pt-lg-145 pb-lg-145 d-lg-block d-none">
                <img src="asset/img/loginmage.svg" width="48%" height="10%" class="img-fluid pb-50" alt="" />
                <h2 class="text-4xl fw-bold text-white mb-30">
                    Sistem Monitoring<br />
                    Proyek ONLENKAN.COM
                </h2>
                <p class="text-white m-0">
                    <br>
                    Kami menyediakan layanan jasa <br />
                    pembuatan website dan aplikasi <br />
                    untuk para pelanggan
                    <br><br><br>
                </p>
            </div>
        </div>
    </section-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>