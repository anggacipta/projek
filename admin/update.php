<?php 
// koneksi database
include '../config.php';
 
// menangkap data yang di kirim dari form
$id_cust = $_POST['id_cust'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telepon = $_POST['telepon'];
$keterangan = $_POST['keterangan'];
 
// update data ke database
mysqli_query($connect,"update customer set nama='$nama', username='$username', password='$password', alamat='$alamat', jenis_kelamin='$jenis_kelamin', 
telepon='$telepon', keterangan='$keterangan' where id_cust='$id_cust'");
 
// mengalihkan halaman kembali ke index.php
header("location:customer.php");
 
?>