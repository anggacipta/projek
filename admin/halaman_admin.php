<!doctype html>
<html lang="en">
  <head>
    <title>Dashboard</title>
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
                <div class="nav_list"> <a href="halaman_admin.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
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
    <?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['role']==""){
		header("location:login.php?pesan=gagal");
	}

	?>

        <h4>Dashboard</h4>
        <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['role']; ?></b>.</p>

        <!-- Dashboard -->
    <div class="row align-items-md-stretch">
        <?php
          include "../config.php";
            // mengambil data barang
            $data_barang = mysqli_query($connect, "select * from transaksi where SUBSTR(tgl_bayar, 1,10) = DATE(NOW()) && hidden = 'yes'");
            $data_barang2 = mysqli_query($connect, "select * from transaksi where SUBSTR(tgl_bayar, 1,10) = DATE(NOW()) && hidden = 'no'");
            // menghitung data barang
            $jumlah_barang = mysqli_num_rows($data_barang);
            $jumlah_barang2 = mysqli_num_rows($data_barang2);
        ?>
      <div class="col-md-6">
        <div class="h-100 p-5 text-white bg-success rounded-3">
          <h2>Pesanan yang belum diverifikasi</h2>
          <p>Pesanan yang belum diverifikasi hari ini: <?php echo $jumlah_barang; ?></p>
          <a class="btn btn-outline-light" href="pembelian2.php">Verifikasi Sekarang</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="h-100 p-5 bg-primary text-light border rounded-3">
          <h2>Total pesanan</h2>
          <p>Total pesanan hari ini: <?php echo $jumlah_barang2; ?></p>
          <a class="btn btn-outline-light" href="pembelian3.php">Lihat pesanan</a>
        </div>
      </div>
    </div>

    <div class="row align-items-md-stretch mt-2">
        <?php
          include "../config.php";
            // mengambil data barang
            $data_barang = mysqli_query($connect, "select * from customer");
            $data_barang2 = mysqli_query($connect, "select * from user");
            // menghitung data barang
            $jumlah_barang = mysqli_num_rows($data_barang);
            $jumlah_barang2 = mysqli_num_rows($data_barang2);
        ?>
      <div class="col-md-6">
        <div class="h-100 p-5 text-dark bg-warning rounded-3">
          <h2>Pelanggan</h2>
          <p>Jumlah pelanggan: <?php echo $jumlah_barang; ?></p>
          <a class="btn btn-outline-dark" href="customer.php">Tambah Pelanggan</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="h-100 p-5 bg-info text-dark border rounded-3">
          <h2>Pegawai</h2>
          <p>Jumlah Pegawai: <?php echo $jumlah_barang2; ?></p>
          <a class="btn btn-outline-dark" href="pegawai.php">Tambah Pegawai</a>
        </div>
      </div>
    </div>
        <!-- End Dashboard -->

	<a href="/logout.php" class="btn btn-danger mt-4">LOGOUT</a>

    </div>
    <!--Container Main end-->
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="js/admin.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>