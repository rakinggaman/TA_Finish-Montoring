<div class="sidebar">
    <div class="sidebar-header mb-5">
        <a href="dashboard.php" class="sidebar-logo fs-5 fw-bold mb-3"> Sistem Monitoring
        </a>
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
        <?php
        error_reporting(0);
        session_start();
        if (isset($_SESSION['level'])) {
            if ($_SESSION['level'] == "superadmin") { ?>
                <a href="akun.php" class="sidebar-link">
                    <i class="bx bxs-user-account"> </i> <span>Pengaturan</span></i>
                </a>
        <?php }
        } ?>

        <a href="logout.php" class="sidebar-link" style="color: red;">
            <i class="bx bx-log-out-circle"> </i> <span>Log Out</span></i>
        </a>
    </div>
</div>