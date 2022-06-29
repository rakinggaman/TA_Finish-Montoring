<!DOCTYPE html>
<html>
<head>
    <title>Export Data Projek</title>
</head>
<body>
    <style type="text/css">
    body{
        font-family: sans-serif;
    }
    table{
        margin: 20px auto;
        border-collapse: collapse;
    }
    table th,
    table td{
        border: 1px solid #3c3c3c;
        padding: 3px 8px;

    }
    a{
        background: blue;
        color: #fff;
        padding: 8px 10px;
        text-decoration: none;
        border-radius: 2px;
    }
    </style>

    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Proyek.xls");
    ?>

    <center>
        <h1>Data Proyek <br/> </h1>
    </center>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Dosmili</th>
            <th>Industri</th>
            <th>Produk</th>
            <th>Intagram</th>
            <th>Facebook</th>
            <th>Nama Perwakilan</th>
            <th>WA Perwakilkan</th>
            <th>Status</th>
            <th>Harga Projek</th>
        </tr>
        <?php 
        // koneksi database
        $koneksi = mysqli_connect("localhost","root","","db_manajemen");

        // menampilkan data pegawai
        $data = mysqli_query($koneksi,"select * from projek");
        $no = 1;
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['pelanggan']; ?></td>
            <td><?php echo $d['kode_domisili']; ?></td>
            <td><?php echo $d['kode_industri']; ?></td>
            <td><?php echo $d['kode_produk']; ?></td>
            <td><?php echo $d['instagram']; ?></td>
            <td><?php echo $d['facebook']; ?></td>
            <td><?php echo $d['nama_perwakilan']; ?></td>
            <td><?php echo $d['wa_perwakilan']; ?></td>
            <td><?php echo $d['kode_status']; ?></td>
            <td><?php echo $d['harga_projek']; ?></td>
        </tr>
        <?php 
        }
        ?>
    </table>
</body>
</html>