<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../config.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login1 = mysqli_query($connect,"select * from customer where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek1 = mysqli_num_rows($login1);

// cek apakah username dan password di temukan pada database
if($cek1 > 0){

	$data = mysqli_fetch_assoc($login1);

	// cek jika user login sebagai admin
	if($data['keterangan']=="non_member"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['keterangan'] = "non_member";
		// alihkan ke halaman dashboard admin
		header("location:beranda_non.php");

	// cek jika user login sebagai pegawai
	}else if($data['keterangan']=="member"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['keterangan'] = "member";
		// alihkan ke halaman dashboard pegawai
		header("location:../member/beranda_non.php");

    }else{

		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}

?>