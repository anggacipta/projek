<?php 
// koneksi database
include '../config.php';
 
// menangkap data yang di kirim dari form
$id_transaksi = $_POST['id_transaksi'];
$status = $_POST['status'];

 
// update data ke database
mysqli_query($connect,"update transaksi set status='$status' where id_transaksi='$id_transaksi'");
 
// mengalihkan halaman kembali ke index.php
header("Location: pembelian.php");
 
?>