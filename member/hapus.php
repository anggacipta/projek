<?php 
// koneksi database
include '../config.php';

// menangkap data id yang di kirim dari url
$id_transaksi = $_GET['id_transaksi'];


// menghapus data dari database
mysqli_query($connect,"delete from detail_transaksi where id_transaksi='$id_transaksi'");

// mengalihkan halaman kembali ke index.php
header("location: pesanan_sayanon.php");

?>