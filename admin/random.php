<?php 
	include('koneksi/koneksi.php');
	session_start();
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$kode_jurusan = $_POST['jurusan'];
	 
	$_SESSION['nim']=$nim;
	$_SESSION['nama']=$nama;
	$_SESSION['jurusan']=$kode_jurusan;
	if(empty($nim)){
	header("Location:tambah_mahasiswa.php?data=".$nim."&notif=tambahkosong&jenis=nim");
	}else if(empty($nama)){
	header("Location:tambah_mahasiswa.php?data=".$nama."&notif=tambahkosong&jenis=nama");
	}else if(empty($kode_jurusan)){
	header("Location:tambah_mahasiswa.php?data=".$kode_jurusan."&notif=tambahkosong&data=jurusan");
	}else{
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$nama_file = $nim.".jpg";
		$direktori = 'foto/'.$nama_file;

		if(move_uploaded_file($lokasi_file,$direktori)){
			$sql = "insert into `mahasiswa` (`nim`, `nama`, `kode_jurusan`, `foto`) values ('$nim', '$nama', '$kode_jurusan', '$nama_file')";
			mysqli_query($koneksi,$sql);
		}else{
			$sql = "insert into `mahasiswa` (`nim`, `nama`, `kode_jurusan`) values ('$nim', '$nama', '$kode_jurusan')";
			mysqli_query($koneksi,$sql);
		}

		if(isset($_POST['hobi'])){
	   		foreach($_POST['hobi'] as $kode_hobi){
	     	$sql_i = "insert into `hobi_mahasiswa` (`nim`, `kode_hobi`) values ('$nim', '$kode_hobi')";
	     	mysqli_query($koneksi,$sql_i);
	   	}
	}
	unset($_SESSION['nim']);
	unset($_SESSION['nama']);
	unset($_SESSION['jurusan']);
	header("Location:mahasiswa.php?notif=tambahberhasil");
	}
	?>

$rand=rand();
$ekstensi=
$filename=$_FILES[ 'foto']['name'];
$ukuran=$_FILES['foto']['size'];
$ext=pathinfo($filename, PATHINFO_EXTENSION);
             array('png', 'jpg','jpeg');
                             |if($ukuran<1044070){
    $xx=$filename;
    move_uploaded_file($_FILES['foto']['tmp_name'], 'image/' $filename);
    $sql="INSERT INTO admin (nama, email, username, password, level, `foto`)
        values ('$nama', '$email', '$username', MD5 ('$password'), '$level', '$xx')";
   mysqli_query($koneksi, $sql);
    $tambah++;
}else{
    $sql="INSERT INTO admin` ('nama`, `email, `username`, password,`level)
        values ('$nama', '$email', '$username', MD5('$password'), '$level')";
   mysqli_query ($koneksi,$sq1);
    $tambah++;
}

<?php 
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$level = $_POST['level'];
	$_SESSION['nama'] = $nama;
	$tambah = 0;
	if(empty($nama)){
		header("Location:index.php?include=tambah_user&notif=tambahKosong&jenis=Nama");
	}else if (empty($email)){
		header("Location:index.php?include=tambah_user&notif=tambahKosong&jenis=Email");
	}else if (empty($username)){
		header("Location:index.php?include=tambah_user&notif=tambahKosong&jenis=Username");
	}else if (empty($password)){
		header("Location:index.php?include=tambah_user&notif=tambahKosong&jenis=Password");
	}else if (empty($level)){
		header("Location:index.php?include=tambah_user&notif=tambahKosong&jenis=Level");
	}else{
		$rand = rand();
		$ekstensi =  array('png','jpg','jpeg');
		$filename = $_FILES['foto']['name'];
		$ukuran = $_FILES['foto']['size'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);

		if($ukuran < 1044070){		
			$xx = $filename;
			move_uploaded_file($_FILES['foto']['tmp_name'], 'image/'.$filename);
			$sql="INSERT INTO admin (`nama`, `email`, `username`, `password`, `level`, `foto`) values ('$nama', '$email', '$username', MD5('$password'), '$level', '$xx')";
			mysqli_query($koneksi,$sql);
			$tambah++;
		}else{
			$sql = "INSERT INTO `admin` (`nama`, `email`, `username`, `password`, `level`) values ('$nama', '$email', '$username', MD5('$password'), '$level')";
			mysqli_query($koneksi,$sql);
			$tambah++;
		}

	// header("Location:index.php?include=barang_masuk&notif=tambahberhasil");	
	header("location:index.php?include=user&tambah=$tambah");
	}
	?>

<!-- header("Location:index.php?include=tambah_barang_masuk&notif=tambahkosong"); -->
<?php 
    include('../koneksi/koneksi.php');

    $pelanggan = $_POST['pelanggan'];
	$domisili = $_POST['domisili'];
	$industri = $_POST['industri']; 
    $produk = $_POST['produk']; 
    $instagram = $_POST['instagram']; 
    $facebook = $_POST['facebook']; 
    $nama = $_POST['nama']; 
    $wa = $_POST['wa']; 
    $status = $_POST['status']; 
    $harga = $_POST['harga']; 
	

	if(empty($pelanggan)){
		header("Location:tambah_proyek.php?notif=tambahkosong&data=Pelanggan");
	}else if(empty($domisili)){
		header("Location:tambah_proyek.php?notif=tambahkosong&data=Domisili");
	}else if(empty($industri)){
		header("Location:tambah_proyek.php?notif=tambahkosong&data=industri");
	}else if(empty($produk)){
		header("Location:tambah_proyek.php?notif=tambahkosong&data=Produk");
	}else if(empty($instagram)){
		header("Location:tambah_proyek.php?notif=tambahkosong&data=instagram");
	}else if(empty($facebook)){
		header("Location:tambah_proyek.php?notif=tambahkosong&data=Facebook");
	}else{
		$lokasi_file = $_FILES['gambar_projek']['tmp_name'];
		$nama_file = $pelanggan.".jpg";
		$direktori = 'img/'.$nama_file;
	
		if(move_uploaded_file($lokasi_file,$direktori)){
			$sql = "INSERT INTO `projek` (`pelanggan`, `kode_domisili`, `kode_industri`, `kode_produk`, `instagram`, `facebook`, `nama_perwakilan`, `wa_perwakilan`, `kode_status`, `gambar_projek`, `harga_projek`) 
			VALUES ('$pelanggan', '$domisili', '$industri', '$produk', '$instagram', '$facebook', '$nama', '$wa', '$status','$nama_fille', '$harga')";
			mysqli_query($koneksi,$sql);
		}else{
			$sql = "INSERT INTO `projek` (`pelanggan`, `kode_domisili`, `kode_industri`, `kode_produk`, `instagram`, `facebook`, `nama_perwakilan`, `wa_perwakilan`, `kode_status`, `harga_projek`) 
			VALUES ('$pelanggan', '$domisili', '$industri', '$produk', '$instagram', '$facebook', '$nama', '$wa', '$status', '$harga')";
			mysqli_query($koneksi,$sql);
		}
        header("Location:proyek.php?notif=tambahberhasil");	
	}

?>

