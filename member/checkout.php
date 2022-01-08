<?php
session_start ();
require '../config.php';
require 'item.php';

$kode_invoice = $_POST['kode_invoice'];
$id_cust = $_POST['id_cust'];
$keterangan = $_POST['keterangan'];
$tanggal_order = $_POST['tanggal_order'];
$tgl_bayar = $_POST['tgl_bayar'];
$biaya = $_POST['biaya'];
$total_bayar = $_POST['total_bayar'];
$jumlah = $_POST['jumlah'];
$status = $_POST['status'];
$jenis_pengiriman = $_POST['jenis_pengiriman'];
$jenis_pembayaran = $_POST['jenis_pembayaran'];
$hidden = $_POST['hidden'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];


$fotobaru = date('dmYHis').$foto;
$path = "../img/".$fotobaru;


// Save new order
mysqli_query($connect, 'insert into orders(name, datecreation, status, username)
values("New Order", "'.date('Y-m-d').'", 0, "acc2")');
$idtransaksi = mysqli_insert_id($connect);
$idtransaksi2 = mysqli_insert_id($connect);

// Save order details for new order
$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
$s = 0;
for($i=0; $i<count($cart); $i++) 
{
	mysqli_query($connect, 'insert into detail_transaksi(id_transaksi, id, id_paket, jumlah, tanggal_order, hidden)
values('.$idtransaksi.', "'.date('Ymd').'", '.$cart[$i]->id_paket.', '.$cart[$i]->quantity.', "'.date('Y-m-d').'", "no")');

$s += $cart [$i]->harga_paket * $cart [$i]->quantity;

if(move_uploaded_file($tmp, $path)){
    $query = "INSERT INTO transaksi(id_transaksi, kode_invoice, id_cust, keterangan, tanggal_order, tgl_bayar, jumlah, biaya, diskon, total_bayar, kembalian, status, jenis_pengiriman, jenis_pembayaran, foto, hidden) 
    VALUES('".$idtransaksi."', '".$kode_invoice."', 
    '".$id_cust."', '".$keterangan."', '".$tanggal_order."', '".$tgl_bayar."', '".$jumlah."', 
    '".$biaya."', '.10.', '".$total_bayar."', '".$total_bayar-$biaya."', '".$status."', 
    '".$jenis_pengiriman."', '".$jenis_pembayaran."', '".$fotobaru."', '".$hidden."')";
    $query2 = "INSERT INTO detail_transaksi(hidden)  VALUES('.$hidden.') WHERE id_transaksi='$idtransaksi'";
    $sql = mysqli_query($connect, $query);
    $sql2 = mysqli_query($connect, $query2);
    }
}



// Clear all products in cart
unset($_SESSION['cart']);

?>
Thanks for buying products. Click <a href="pesan_laundrynon.php">here</a> to continue buy product.