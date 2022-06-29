<?php
	$koneksi = mysqli_connect("localhost","root","","db_manajemen");
	// cek koneksi
	if (!$koneksi){
    	die("Error koneksi: " . mysqli_connect_errno()); 
    }
    ?>