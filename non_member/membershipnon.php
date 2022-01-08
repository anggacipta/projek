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
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check" viewBox="0 0 16 16">
    <title>Check</title>
    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path>
  </symbol>
</svg>  

  <!-- Navbar -->
  <?php 
      session_start();
      
      ?>
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="berandanon.php">BisaLaundry</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
        <a href="" class="nav-link" aria-current="page">Halo <b><?php echo $_SESSION['keterangan']; ?></b>, <b><?php echo $_SESSION['username']; ?></b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="beranda_non.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pesan_laundrynon.php">Pesan Laundry</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pesanan_dibayarnon.php">Pesanan Saya</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="membershipnon.php">Membership</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pesanan_membernon.php">Pesanan Membership</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user.php">User</a>
        </li>
        <li class="nav-item">
          <a href="cart.php" class="nav-link">Cart</a>
        </li>
        <li class="nav-item">
        <a href="logout.php"><input type="button" class="btn btn-outline-primary me-2" value="Logout"></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->

<!-- Pricing -->
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <h1 class="display-4 fw-normal">Harga</h1>
      <p class="fs-5 text-muted">Kami disini menawarkan fitur membership. Yang dimana fitur memiliki beberapa kelebihan lainnya.</p>
    </div>
    <div class="row row-cols-1 row-cols-md-2 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Non Member</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">Rp0<small class="text-muted fw-light">/selamanya</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Tanpa Diskon</li>
            </ul>
            <button type="button" class="w-100 btn btn-lg btn-outline-primary">Paket yang dimiliki saat ini</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Member</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">Rp100.000,00<small class="text-muted fw-light">/selamanya</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Diskon 10%</li>
              <li>Paket laundry lebih diprioritaskan</li>
            </ul>
            <a href="bayar_member.php" class="w-100 btn btn-lg btn-primary">Mulai Sekarang</a>
          </div>
        </div>
      </div>
    </div>

    <h2 class="display-6 text-center mb-4">Komparasi Keuntungan</h2>
    <div class="table-responsive">
      <table class="table text-center">
        <thead>
          <tr>
            <th style="width: 34%;"></th>
            <th style="width: 22%;">Non Member</th>
            <th style="width: 22%;">Member</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row" class="text-start">Diskon</th>
            <td></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
          </tr>
          <tr>
            <th scope="row" class="text-start">Paket laundry cepat selesai</th>
            <td></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
          </tr>
        </tbody> 
      </table>
    </div>
    <!-- End Pricing -->

     <!-- Footer -->
  <div>
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <span>© 2021 Company, Inc</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
    </ul>
  </footer>
</div>
<!-- End Footer -->

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>