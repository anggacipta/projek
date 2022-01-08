<?php
include "../config.php";

$id_cust = $_POST['id_cust'];
$tgl_bayar = $_POST['tgl_bayar'];
$harga = $_POST['harga'];
$total_bayar = $_POST['total_bayar'];
$verifikasi = $_POST['verifikasi'];
$jenis_pembayaran = $_POST['jenis_pembayaran'];
$hidden = $_POST['hidden'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

$fotobaru = date('dmYHis').$foto;
$path = "../img/".$fotobaru;

if(move_uploaded_file($tmp, $path)){
    $query = "INSERT INTO membership VALUES('".$id_cust."', '".$tgl_bayar."', '".$fotobaru."',
    '".$harga."', '".$total_bayar."', '".$verifikasi."',  '".$jenis_pembayaran."', '".$hidden."')";
    $sql = mysqli_query($connect, $query);
    if($sql){
        header("location: pesanan_membernon.php");
    }else{
        echo"<script>alert('Maaf terjadi kesalahan')</script>";
        echo"<br><a href='form_tambah.php'>Kembali ke Form</a>";
    }
    }else{
        echo"<script>alert('Gambar gagal di upload')</script>";
        echo"<br><a href='form_tambah.php'>Kembali ke Form</a>";
}
?>