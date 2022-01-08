<?php 
// koneksi database
include '../config.php';
 
// menangkap data yang di kirim dari form
$id_cust = $_POST['id_cust'];
$verifikasi = $_POST['verifikasi'];
$hidden = $_POST['hidden'];

 
// update data ke database
$sql = mysqli_query($connect,"update membership set verifikasi='$verifikasi', hidden='no' where id_cust='$id_cust'");
$sql2 = mysqli_query($connect, "update customer set keterangan='member' where id_cust='$id_cust'");
 
// mengalihkan halaman kembali ke index.php
header("Location: membership.php");
 
?>