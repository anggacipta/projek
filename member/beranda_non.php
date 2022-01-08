<!doctype html>
<html lang="en">
  <head>
    <title>Beranda</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="file.css">

    
  </head>
  <body>
 
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
          <a class="nav-link active" aria-current="page" href="beranda_non.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pesan_laundrynon.php">Pesan Laundry</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pesanan_dibayarnon.php">Pesanan Saya</a>
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

<!-- Jumbotron -->
  <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5" style="background-image:url(/img/florian-olivo-Pvs1hfZrxwA-unsplash.jpg); background-size:cover">
        <h1 class="display-5 fw-bold text-light">Selamat Datang Member</h1>
        <p class="col-md-8 fs-4 text-light">Kami selalu senantiasa melayani pembeli kami. 
        Kami akan berusaha untuk membuat pembeli menikmati pelayanan kami.</p>
      </div>
    </div>
    <!-- End Jumbotron -->

<!-- Features -->
    <div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">Columns with icons</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="feature col">
        <div class="feature-icon">
         <img src="/img/lucian-alexe-afDu-GuxjjM-unsplash.jpg" alt="" width="250px" height="200px">
        </div>
        <h2>Pesan sekarang</h2>
        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
        <a href="pesan_laundrynon.php" class="icon-link">
          Pesan sekarang
          <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
        </a>
      </div>
      <div class="feature col">
        <div class="feature-icon">
         <img src="/img/jon-tyson-vD6UFu8QYUI-unsplash.jpg" alt="" width="250px" height="200px">
        </div>
        <h2>Membership</h2>
        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
      </div>
      <div class="feature col">
        <div class="feature-icon">
         <img src="/img/frabpos-team-aCkaR5G4Zd4-unsplash.jpg" alt="" width="250px" height="200px">
        </div>
        <h2>Pesanan saya</h2>
        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
        <a href="pesanan_dibayarnon.php" class="icon-link">
          Pesanan saya
          <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
        </a>
      </div>
    </div>
  </div>
  <!-- End Features -->

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  </body>
</html>