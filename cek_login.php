<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'config.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($connect,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['role']=="admin"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/halaman_admin.php");

	// cek jika user login sebagai pegawai
	}else if($data['role']=="kasir"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "kasir";
		// alihkan ke halaman dashboard pegawai
		header("location:kasir/halaman_kasir.php");

    }else{

		// alihkan ke halaman login kembali
		header("location:login_admin.php?pesan=gagal");
	}	
}else{
	header("location:login_admin.php?pesan=gagal");
}

?>