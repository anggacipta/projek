<?php

include '../config.php';
	


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Membership</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <!-- Checkout -->
      <main class="container">
    <div class="py-5 text-center">
      <h2>Checkout Membership</h2>
      <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>

    <!-- Product -->
  <form method="post" action="tambah_member.php" enctype="multipart/form-data">
      <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Belanjaan saya</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Product name</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <p class="text-muted">Member</p>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Harga</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <p class="text-muted">Rp100000 <input type="hidden" name="harga" placeholder="id" class="text-muted" readonly value="100000"></p>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (IDR)</span>
              <p class="text-muted">Rp100000 <input type="hidden" name="total_bayar" placeholder="total_bayar" readonly value="100000"</p>
            </li>
          </ul>
        </div>
        <!-- End Product -->

        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate="">

                  <?php
                  session_start();
                  include '../config.php'; 
                  $data = mysqli_query($connect,"select * from customer where username='$_SESSION[username]'");
                  while($d = mysqli_fetch_array($data)){
                  ?>
                  <div class="col-12">
                    <label for="email" class="form-label">Id Cust</label>
                    <input type="text" class="form-control" id="id_cust" name="id_cust" placeholder="<?php echo $d['id_cust']; ?>" 
                    readonly value="<?php echo $d['id_cust']; ?>">
                  </div>
                  <?php
                  }
                  ?>

              <div class="col-12">
                <label for="address2" class="form-label">Tanggal Bayar</label>
                <input type="date" name="tgl_bayar" class="form-control" placeholder="tgl_bayar">
              </div>


              <div class="col-12">
                <label for="address" class="form-label">Verifikasi</label>
                <select class="form-select" aria-label="Default select example" name="verifikasi">
                          <option value="belum_diverifikasi" style="color:black;">Belum Diverifikasi</option>
                      </select> 
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

            <!-- Payment -->
            <hr class="my-4">

            <h4 class="mb-3">Pembayaran</h4>

            <div class="col-12">
                <label for="address" class="form-label">Jenis Pembayaran</label>
                <select class="form-select" aria-label="Default select example" name="jenis_pembayaran">
                <option selected value="dana" style="color:black;">Dana</option>
                        <option value="ovo" style="color:black;">OVO</option>
                        <option value="gopay" style="color:black;">Gopay</option>
                      </select> 
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

            <div class="col-12">
                <label for="address2" class="form-label">Bukti Pembayaran</label>
                <input type="file" name="foto" class="form-control" placeholder="foto">
              </div>

              <div class="col-12">
                <input type="hidden" name="hidden" class="form-control" value="yes">
              </div>
              
            <!-- End Payment -->

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>
    </main>
  </form>
      <!-- End Checkout -->

      



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>