<!doctype html>
<html lang="en">
  <head>
    <title>User</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
          <a class="nav-link" aria-current="page" href="beranda_non.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pesan_laundrynon.php">Pesan Laundry</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pesanan_dibayarnon.php">Pesanan Saya</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="membershipnon.php">Membership</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pesanan_membernon.php">Pesanan Membership</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="user.php">User</a>
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

      <!-- Profile -->
  <?php
    include '../config.php'; 
    $data = mysqli_query($connect,"select * from customer where username='$_SESSION[username]'");
    while($d = mysqli_fetch_array($data)){
    ?>
  <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
              <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $d['nama']; ?></span><span> </span></div>
        </div>
        <div class="col-md-7 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                <input type="hidden" name="id_transaksi" value="<?php echo $d['id_cust']; ?>">
                    <div class="col-md-6"><label class="labels">Id Cust/Id Customer:</label><p><?php echo $d['id_cust']; ?></p></div>
                </div>
                <div class="row mt-3">
                <div class="col-md-6"><label class="labels">Nama:</label><p><?php echo $d['nama']; ?></p></div>
                <div class="col-md-6"><label class="labels">Username:</label><p><?php echo $d['username']; ?></p></div>
                <div class="col-md-6"><label class="labels">Alamat:</label><p><?php echo $d['alamat']; ?></p></div>
                <div class="col-md-6"><label class="labels">Jenis Kelamin:</label><p><?php echo $d['jenis_kelamin']; ?></p></div>
                <div class="col-md-6"><label class="labels">Telepon:</label><p><?php echo $d['telepon']; ?></p></div>
                <div class="col-md-6"><label class="labels">Keterangan:</label><p><?php echo $d['keterangan']; ?></p></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<!-- End Profile -->

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