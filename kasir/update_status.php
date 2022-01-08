<!doctype html>
<html lang="en">
  <head>
    <title>Update Status</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <h3>Update Status Pembelian</h3>
  <?php
	include '../config.php';
	$id_transaksi = $_GET['id_transaksi'];
	$data = mysqli_query($connect,"select * from transaksi where id_transaksi='$id_transaksi'");
	while($d = mysqli_fetch_array($data)){
		?>
  <form class="container" action="update2.php" method="post">
  <input type="hidden" name="id_transaksi" value="<?php echo $d['id_transaksi']; ?>">
  <div class="mb-3">
    <label for="address" class="form-label">Status</label>
    <select class="form-select" aria-label="Default select example" name="status">
                        <option selected value="laundry_belum_diterima" style="color:black;">laundry_belum_diterima</option>
                        <option value="laundry_telah_diterima" style="color:black;">laundry_telah_diterima</option>
                        <option value="laundry_diproses" style="color:black;">laundry_diproses</option>
                        <option value="laundry_selesai" style="color:black;">laundry_selesai</option>
                        <option value="laundry_telah_dikirim" style="color:black;">laundry_telah_dikirim</option>
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
  </div>
  <input type="submit" class="btn btn-primary mt-3" value="SIMPAN">
</form>
<?php 
	}
	?>


  
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>