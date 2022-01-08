<?php 
// koneksi database
include '../config.php';

// menangkap data id yang di kirim dari url
$id_cust = $_GET['id_cust'];


// menghapus data dari database
mysqli_query($connect,"delete from customer where id_cust='$id_cust'");

// mengalihkan halaman kembali ke index.php
header("location:customer.php");

?>