<?php 
// koneksi database
include '../config.php';
 
// menangkap data yang di kirim dari form
$id_user = $_POST['id_user'];
$name = $_POST['name'];
$username = $_POST['username'];
$role = $_POST['role'];
 
// update data ke database
mysqli_query($connect,"update user set name='$name', username='$username', role='$role' where id_user='$id_user'");
 
// mengalihkan halaman kembali ke index.php
header("location:pegawai.php");
 
?>