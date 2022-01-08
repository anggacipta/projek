<!doctype html>
<html lang="en">
  <head>
    <title>Pesan Laundry</title>
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
          <a class="nav-link active" href="pesan_laundrynon.php">Pesan Laundry</a>
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
<!-- Text and Search bar-->
  <div class="container">
    <h3 class="text-dark mb-3">Paket Laundry</h3>

<form action="pesan_laundrynon.php" method="get">
	<label class="mb-3">Cari Paket:</label>
	<input type="text" name="cari" placeholder="Cari Nama Paket" class="mb-3">
	<input type="submit" value="Cari" class="btn btn-outline-danger">
</form>


  </div>
<!-- End -->

<!-- Form -->
<?php
	require '../config.php';
  if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    echo "<b>Hasil pencarian : ".$cari."</b>";
  }
  ?>
  
    <?php 
    if(isset($_GET['cari'])){
      $cari = $_GET['cari'];
      $data = mysqli_query($connect, "select * from paket where nama_paket like '%".$cari."%'");				
    }else{
      $data = mysqli_query($connect, "select * from paket");		
    }
    while($product = mysqli_fetch_object($data)){
    ?>
  
	
<!-- Card -->
  <div class="container">
    <div class="accordion accordion-flush" id="accordionFlushExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
          <?php echo $product->nama_paket; ?>
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
          <h6 class="text-muted"><?php echo $product->jenis; ?></h6>
          <small class="text-disabled">Id Paket: <?php echo $product->id_paket; ?></small>
          <h4>Rp<?php echo $product->harga_paket; ?></h4>
          <a href="cart.php?id_paket=<?php echo $product->id_paket; ?>" class="card-link btn btn-primary" role="button">Order Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Card -->
  <?php } ?>
<!-- End Form -->

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

<?php
 
 // Check If form submitted, insert form data into users table.
 if(isset($_POST['submit'])) {
     $id = $_POST['id'];
     $id_paket = $_POST['id_paket'];
     $id_barang = $_POST['id_barang'];
     $jumlah = $_POST['jumlah'];
     $tanggal_order = $_POST['tanggal_order'];
     $hidden = $_POST['hidden'];
     
     // include database connection file
     include_once("../config.php");
             
     // Insert user data into table
     $result = mysqli_query($connect, "INSERT INTO detail_transaksi(id,id_paket,id_barang,jumlah,tanggal_order,hidden) VALUES('$id','$id_paket','$id_barang','$jumlah','$tanggal_order','$hidden')");
     
     // Show message when user added
     echo "Pesanan berhasil ditambahkan. <a href='pesanan_sayanon.php'>Lihat pesanan saya</a>";
 }
 ?>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>