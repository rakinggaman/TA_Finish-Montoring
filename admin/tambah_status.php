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
    <title>Tambah Status</title>
</head>

<body>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid mt-5 p-5 justify-content-center">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-warning mt-3 mb-3" href="status.php">
                        <i class="fas fa-arrow-circle-left "></i> Kembali
                    </a>
                </div>
                <form class="form-horizontal" method="post" action="konfirmasi_tambah_status.php">
                    <div class="card-body">
                        <h4 class="card-title mt-2">Form Tambah Data</h4>
                        <?php if(!empty($_GET['notif'])){?>
      	        <?php if($_GET['notif']=="tambahkosong"){?>
      	        <div class="alert alert-danger" role="alert">
	                 Maaf data status wajib di isi</div> 
                <?php }?>
                <?php }?>
                        <div class="form-group row"  >
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">status</label >
                         <div class="col-sm-6">
             <input type="text" class="form-control"id="part_name" name="status" placeholder="Isi Status"/>
             <button type="submit" class="btn primary-bg second-text float-end mt-5 mb-3 "> <i class="fas fa-plus me-2"></i>Tambah </button>
             </div>
             </div> 
          </div>
        </div>
      </div>
     
    </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>