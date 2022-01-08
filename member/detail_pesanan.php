<!doctype html>
<html lang="en">
  <head>
    <title>Detail Pesanan</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>

                <?php
                    include '../config.php';
                    $id_transaksi = $_GET['id_transaksi'];
                    $data = mysqli_query($connect,"select * from transaksi where id_transaksi='$id_transaksi'");
                    while($d = mysqli_fetch_array($data)){
                        ?>
                <form class="container" action="update2.php" method="post">
                <input type="hidden" name="id_transaksi" value="<?php echo $d['id_transaksi']; ?>">
                <center>
                        <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
                        <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                        <span style='font-size:18pt'><b>BisaLaundry</b></span></br>
                        Jalan Gatot Mujahidin No. 4, Mates, Wagersari, Kota MajaKarta  </br>
                        Telp : 08123456789
                        </td>
                        <td style='vertical-align:top' width='30%' align='left'>
                        <b><span style='font-size:12pt'>FAKTUR PENJUALAN</span></b></br>
                        Id Transaksi : <?php echo $d['id_transaksi']; ?></br>
                        Tanggal Order : <?php echo $d['tanggal_order']; ?></br>
                        </td>
                        </table>
                        <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
                        <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                        <?php
                          session_start();
                          include '../config.php'; 
                              $data = mysqli_query($connect,"select * from customer where username='$_SESSION[username]'");
                              while($d1 = mysqli_fetch_array($data)){
                              ?>
                           <p>Nama Pelanggan : <?php echo $d1['nama']; ?> </br> 
                           Id Customer : <?php echo $d1['id_cust']; ?>
                          </p>
                          <?php
                              }
                              ?>
                       Kode Invoice : <?php echo $d['kode_invoice']; ?></br>
                       Tanggal Order : <?php echo $d['tanggal_order']; ?></br>
                        Keterangan : <?php echo $d['keterangan']; ?></br>
                        <h6>Detail Pesanan</h6>
                        </td>
                        </table>
                        
                        <table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
                        <?php 
                        include '../config.php';
                         $data2 = mysqli_query($connect,"select * from detail_transaksi as u inner join paket as i on u.id_paket = i.id_paket where id_transaksi='$id_transaksi'");
                         while($i2 = mysqli_fetch_array($data2)){
                        ?>
                        <tr align='center'>
                        <td width='10%'>Kode Barang : <?php echo $i2['id_paket'] ?></td>
                        <td width='20%'>Nama Barang</td>
                        <td width='13%'>Harga</td>
                        <td width='4%'>Qty</td>
                        <td width='7%'>Discount</td>
                        <td width='13%'>Total Harga Per Paket</td>
                        <tr><td></td>
                        <td><?php echo $i2['nama_paket'] ?></td>
                        <td>Rp<?php echo $i2['harga_paket'] ?></td>
                        <td><?php echo $i2['jumlah'] ?>Kg</td>
                        <td>Rp0</td>
                        <td style='text-align:right'>Rp<?php echo $i2['harga_paket']*$i2['jumlah']  ?></td>
                        <?php
                         }
                         ?>
                        </table>
                        
                        <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
                        <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                        Biaya : Rp<?php echo $d['biaya']; ?></br>
                        Diskon : Rp<?php echo $d['diskon']; ?></br>
                        Total Bayar : Rp<?php echo $d['total_bayar']; ?></br>
                        Kembali : Rp<?php echo $d['kembalian']; ?></br>
                        Jenis Pembayaran : <?php echo $d['jenis_pembayaran']; ?></br>
                        Tanggal Bayar : <?php echo $d['tgl_bayar']; ?></br>
                        Id User : <?php echo $d['id_user']; ?></br>
                        </td>
                        </table>
                          
                        <table style='width:650; font-size:7pt;' cellspacing='2'>
                        <tr>
                        <td align='center'>Diterima Oleh,</br></br></br><u>(............)</u></td>
                        <td style='padding:5px; text-align:left; width:30%'></td>
                        <td align='center'>TTD,</br></br></br><u>(...........)</u></td>
                        </tr>
                        </table>
                        <a href="cetak.php?id_transaksi=<?php echo $d['id_transaksi']; ?>" class="btn btn-dark mt-3" target="_blank">Cetak</a>
                        </center>
                      
                </form>
  <?php
    }
  ?>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>