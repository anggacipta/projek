<!doctype html>
<html lang="en">
  <head>
    <title>Membership</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

  </head>
  <body id="body-pd">
  
  <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">BBBootstrap</span> </a>
                <div class="nav_list"> <a href="halaman_kasir.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
			        	<a href="customer.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Pengguna</span> </a> 
                <li class="nav-item dropdown">
                <a  class="nav_link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false"> <i class="fas fa-user-tie"></i> <span class="nav_name">Membership</span> </a> 
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                      <li><a class="dropdown-item" href="membership.php">Belum Diverifikasi</a></li>
                      <li><a class="dropdown-item" href="membership2.php">Telah Diverifikzsi</a></li>
                    </ul>
                </li>
                <a href="jenis_paket.php" class="nav_link"> <i class="fas fa-box"></i> <span class="nav_name">Paket Laundry</span> </a> 
                <li class="nav-item dropdown">
                <a  class="nav_link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false"> <i class="fas fa-cart-plus"></i> <span class="nav_name">Pembelian</span> </a> 
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                      <li><a class="dropdown-item" href="pembelian2.php">Belum Diverifikasi</a></li>
                      <li><a class="dropdown-item" href="pembelian.php">Telah Diverifikasi</a></li>
                      <li><a class="dropdown-item" href="pembelian3.php">Hari Ini</a></li>
                      <li><a class="dropdown-item" href="pembelian4.php">Minggu Ini</a></li>
                      <li><a class="dropdown-item" href="pembelian5.php">Bulan Ini</a></li>
                    </ul>
                </li>
                <a href="pemesanan.php" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Pemesanan</span> </a> 
                <a href="pegawai.php" class="nav_link">  <i class="fas fa-users-cog"></i> <span class="nav_name">Pegawai</span> </a>        
            </div> <a href="/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
    
    <h2>Pemesanan Membership(belum diverifikasi)</h2>
    <div class="table-responsive">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Id Customer</th>
      <th scope="col">Tanggal Bayar</th>
      <th scope="col">Bukti Pembayaran</th>
      <th scope="col">Harga</th>
      <th scope="col">Total Bayar</th>
      <th scope="col">Verifikasi</th>
      <th scope="col">Jenis Pembayaran</th>
      <th scope="col">Verifikasi Pembayaran</th>
    </tr>
  </thead>
      

    <?php
include "../config.php";
$no=1;
$ambil= mysqli_query($connect, "select * from membership where hidden='yes'");
while($tampil = mysqli_fetch_array($ambil)){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $tampil['id_cust']; ?></td>
        <td><?php echo $tampil['tgl_bayar']; ?></td>
        <td><?php echo"<img src='/img/".$tampil['foto']."' width='50%' height='50%'>"; ?></td>
        <td><?php echo $tampil['harga']; ?></td>
        <td><?php echo $tampil['total_bayar']; ?></td>
        <td><?php if($tampil['verifikasi'] == 'belum_diverifikasi'){ ?>
            <a href=""><input type="button" class="btn btn-danger me-2" value="Belum Diverifikasi"></a>
      <?php  }elseif($tampil['verifikasi'] == 'telah_diverifikasi'){ ?>
        <a href=""><input type="button" class="btn btn-success me-2" value="Telah Diverifikasi"></a>
     <?php  }?>
    </td>
        <td><?php echo $tampil['jenis_pembayaran']; ?></td>
        <td>
        <a href="update_verifikasi.php?id_cust=<?php echo $tampil['id_cust']; ?>" class="btn btn-primary">Verifikasi</a>
        </td>
    </tr>


<?php
}

    ?>


    </table>
    </div>
    </div>
    <!--Container Main end-->
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="js/admin.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>