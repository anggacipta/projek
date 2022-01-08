<!doctype html>
<html lang="en">
  <head>
    <title>Pesanan Saya</title>
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
          <a class="nav-link" aria-current="page" href="beranda_non.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pesan_laundrynon.php">Pesan Laundry</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="pesanan_dibayarnon.php">Pesanan Saya</a>
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
<!-- Table -->
<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Id Transaksi</th>
      <th scope="col">Kode Invoice</th>
      <th scope="col">Id Cust</th>
      <th scope="col">Tanggal Order</th>
      <th scope="col">Tanggal Bayar</th>
      <th scope="col">Status Laundry</th>
      <th scope="col">Status Pembayaran</th>
      <th scope="col">Detail Pesanan</th>
    </tr>
  </thead>
      

    <?php
include "../config.php";
$no=1;
$ambil= mysqli_query($connect, "select * from customer as u inner join transaksi as i on u.id_cust = i.id_cust where username='$_SESSION[username]'");
while($tampil = mysqli_fetch_array($ambil)){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $tampil['id_transaksi']; ?></td>
        <td><?php echo $tampil['kode_invoice']; ?></td>
        <td><?php echo $tampil['id_cust']; ?></td>
        <td><?php echo $tampil['tanggal_order']; ?></td>
        <td><?php echo $tampil['tgl_bayar']; ?></td>
        <td><?php if($tampil['status'] == 'laundry_belum_diterima'){ ?>
            <a href=""><input type="button" class="btn btn-danger me-2" value="Laundry Belum Diterima"></a>
      <?php  }elseif($tampil['status'] == 'laundry_telah_diterima'){ ?>
        <a href=""><input type="button" class="btn btn-primary me-2" value="Laundry Telah Diterima"></a>
     <?php  }elseif($tampil['status'] == 'laundry_diproses'){ ?>
        <a href=""><input type="button" class="btn btn-warning me-2" value="Laundry Diproses"></a>
     <?php  }elseif($tampil['status'] == 'laundry_selesai'){ ?>
        <a href=""><input type="button" class="btn btn-info me-2" value="Laundry Selesai"></a>
     <?php  }elseif($tampil['status'] == 'laundry_telah_dikirim'){ ?>
        <a href=""><input type="button" class="btn btn-success me-2" value="Laundry Telah Dikirim"></a>
     <?php } ?>
    </td>
    <td>
    <?php if($tampil['id_user'] == 0 ){ ?>
            <a href=""><input type="button" class="btn btn-danger me-2" value="Pembayaran Belum Diverifikasi"></a>
      <?php  }elseif($tampil['status'] > 0){ ?>
        <a href=""><input type="button" class="btn btn-success me-2" value="Pembayaran Telah Diverifikasi"></a>
     <?php } ?>
    </td>
    <td>
    <a href="detail_pesanan.php?id_transaksi=<?php echo $tampil['id_transaksi']; ?>" class="btn btn-dark">Detail Transaksi</a>
        </td>
    </tr>
<?php
}
    ?>
    </table>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  </body>
</html>