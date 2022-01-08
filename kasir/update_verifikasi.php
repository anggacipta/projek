<!doctype html>
<html lang="en">
  <head>
    <title>Update Verifikasi</title>
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
	$id_cust = $_GET['id_cust'];
	$data = mysqli_query($connect,"select * from membership where id_cust='$id_cust'");
	while($d = mysqli_fetch_array($data)){
		?>
  <form class="container" action="update3.php" method="post">
  <input type="hidden" name="id_cust" value="<?php echo $d['id_cust']; ?>">
  <input type="hidden" name="hidden" value="<?php echo $d['hidden']; ?>">
  <div class="mb-3">
    <label for="address" class="form-label">Verifikasi Pembayaran</label>
    <select class="form-select" aria-label="Default select example" name="verifikasi">
                        <option selected value="telah_diverifikasi" style="color:black;">Telah Diverifikasi</option>
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