<?php
include "../config.php";

$id_transaksi = $_POST['id_transaksi'];
$kode_invoice = $_POST['kode_invoice'];
$id_cust = $_POST['id_cust'];
$keterangan = $_POST['keterangan'];
$tanggal_order = $_POST['tanggal_order'];
$tgl_bayar = $_POST['tgl_bayar'];
$jumlah = $_POST['jumlah'];
$biaya = $_POST['biaya'];
$diskon = $_POST['diskon'];
$total_bayar = $_POST['total_bayar'];
$id_user = $_POST['id_user'];
$status = $_POST['status'];
$jenis_pengiriman = $_POST['jenis_pengiriman'];
$jenis_pembayaran = $_POST['jenis_pembayaran'];
$hidden = $_POST['hidden'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

$fotobaru = date('dmYHis').$foto;
$path = "../img/".$fotobaru;

if(move_uploaded_file($tmp, $path)){
    $query = "INSERT INTO transaksi VALUES('".$id_transaksi."', '".$kode_invoice."', 
    '".$id_cust."', '".$keterangan."', '".$tanggal_order."', '".$tgl_bayar."', '".$jumlah."', 
    '".$biaya."', '".$diskon."', '".$total_bayar."', '".$id_user."', '".$status."', 
    '".$jenis_pengiriman."', '".$jenis_pembayaran."', '".$fotobaru."')";
    $query2 = "UPDATE detail_transaksi SET hidden='$hidden' WHERE id_transaksi='$id_transaksi'";
    $sql = mysqli_query($connect, $query);
    $sql2 = mysqli_query($connect, $query2);
    if($sql){
        header("location: pesanan_dibayarnon.php");
    }else{
        echo"<script>alert('Maaf terjadi kesalahan')</script>";
        echo"<br><a href='form_tambah.php'>Kembali ke Form</a>";
    }
    }else{
        echo"<script>alert('Gambar gagal di upload')</script>";
        echo"<br><a href='form_tambah.php'>Kembali ke Form</a>";
}
?>