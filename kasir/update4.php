<?php 
session_start();
// koneksi database
include '../config.php';
 
// menangkap data yang di kirim dari form
$id_transaksi = $_POST['id_transaksi'];
$hidden = $_POST['hidden'];
$id_user = $_POST['id_user'];

 
// update data ke database
mysqli_query($connect,"update transaksi set id_user='$id_user', hidden='no' where id_transaksi='$id_transaksi'");
 
// mengalihkan halaman kembali ke index.php
header("Location: pembelian.php");
 
?>