<!doctype html>
<html lang="en">
  <head>
    <title>Cetak Laporan</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <h1 class="text-center">Laporan Transaksi Hari ini</h1>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Id Transaksi</th>
      <th scope="col">Kode Invoice</th>
      <th scope="col">Id Cust</th>
      <th scope="col">Tanggal Order</th>
      <th scope="col">Tanggal Bayar</th>
      <th scope="col">Biaya</th>
      <th scope="col">Diskon</th>
      <th scope="col">Total Bayar</th>
      <th scope="col">Id User</th>
      <th scope="col">status</th>
    </tr>
  </thead>
      

    <?php
include "../config.php";
$no=1;
$ambil= mysqli_query($connect, "select * from transaksi where SUBSTR(tgl_bayar, 1,10) = DATE(NOW())");
while($tampil = mysqli_fetch_array($ambil)){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $tampil['id_transaksi']; ?></td>
        <td><?php echo $tampil['kode_invoice']; ?></td>
        <td><?php echo $tampil['id_cust']; ?></td>
        <td><?php echo $tampil['tanggal_order']; ?></td>
        <td><?php echo $tampil['tgl_bayar']; ?></td>
        <td><?php echo $tampil['biaya']; ?></td>
        <td><?php echo $tampil['diskon']; ?></td>
        <td><?php echo $tampil['total_bayar']; ?></td>
        <td><?php echo $tampil['id_user']; ?></td>
        <td><?php echo $tampil['status']; ?></td>
       
    </tr>


<?php
}

    ?>
    </table>
                    
                   
  <script>
      window.print();
  </script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
