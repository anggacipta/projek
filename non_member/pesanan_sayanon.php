<!doctype html>
<html lang="en">
  <head>
    <title>Belanjaan Saya</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="berandanon.php">BisaLaundry</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="beranda_non.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pesan_laundrynon.php">Pesan Laundry</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="pesanan_sayanon.php">Belanjaan Saya</a>
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
        <a href="logout.php"><input type="button" class="btn btn-outline-primary me-2" value="Logout"></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->

<!-- Table -->
<div class="container">
<h4>Data Pemesanan</h4>
<div class="table-responsive">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Id Transaksi</th>
      <th scope="col">Id Paket</th>
      <th scope="col">Id Barang</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Tanggal Order</th>
      <th scope="col">Cara Pengambilan</th>
      <th scope="col">Hapus Pesanan</th>
    </tr>
  </thead>
      

    <?php
include "../config.php";
$no=1;
$ambil= mysqli_query($connect, "select * from detail_transaksi where hidden='no'");
while($tampil = mysqli_fetch_array($ambil)){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $tampil['id_transaksi']; ?></td>
        <td><?php echo $tampil['id_paket']; ?></td>
        <td><?php echo $tampil['jumlah']; ?></td>
        <td><?php echo $tampil['tanggal_order']; ?></td>
        <td>
        <a href="kirim_sendirinon.php?id_transaksi=<?php echo $tampil['id_transaksi']; ?>" class="btn btn-primary">Kirim Sendiri</a>
        <a href="paket_diambilnon.php?id_transaksi=<?php echo $tampil['id_transaksi']; ?>" class="btn btn-primary">Paket Diambil</a>
        </td>
        <td><a href="hapus.php?id_transaksi=<?php echo $tampil['id_transaksi']; ?>" class="btn btn-danger">HAPUS</a></td>
    </tr>


<?php
}

    ?>
    </table>
    </div>
    </div>
    <!-- End Table -->

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