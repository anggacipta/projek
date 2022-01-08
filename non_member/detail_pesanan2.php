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
                    $data2 = mysqli_query($connect,"select * from detail_transaksi as u inner join paket as i on u.id_paket = i.id_paket");
                    $i2 = mysqli_fetch_array($data2);
                    $data = mysqli_query($connect,"select * from detail_transaksi where id_transaksi='$id_transaksi'");
                    while($d = mysqli_fetch_array($data)){
                        ?>
                <form class="container" action="update2.php" method="post">
                    <h3 class="text-primary mb-3">Detail Pesanan</h3>
                <input type="hidden" name="id_transaksi" value="<?php echo $d['id_transaksi']; ?>">
                        <label for="">Id Transaksi</label>
                        <p class="text-muted"><?php echo $d['id_transaksi']; ?></p>
                        <hr style="height:2px;border-width:0;color:red;background-color:red">
                        <label for="">Id</label>
                        <p class="text-muted"><?php echo $d['id']; ?></p>
                        <hr style="height:2px;border-width:0;color:red;background-color:red">
                        <label for="">Id Paket</label>
                        <p class="text-muted"><?php echo $d['id_paket']; ?></p>
                        <hr style="height:2px;border-width:0;color:red;background-color:red">
                        <label for="">Tanggal Order</label>
                        <p class="text-muted"><?php echo $d['tanggal_order']; ?></p>
                        <hr style="height:2px;border-width:0;color:red;background-color:red">
                        <label for="">Jumlah</label>
                        <p class="text-muted"><?php echo $d['jumlah']; ?></p>
                </form>
  <?php
    }
  ?>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>