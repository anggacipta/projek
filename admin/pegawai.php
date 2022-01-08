<!doctype html>
<html lang="en">
  <head>
    <title>Data Pegawai</title>
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
    <h4>Data Pegawai</h4>
    <div class="table-responsive">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Id User</th>
      <th scope="col">Nama</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
      

    <?php
include "../config.php";
$no=1;
$ambil= mysqli_query($connect, "select * from user");
while($tampil = mysqli_fetch_array($ambil)){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $tampil['id_user']; ?></td>
        <td><?php echo $tampil['name']; ?></td>
        <td><?php echo $tampil['username']; ?></td>
        <td><?php echo $tampil['password']?></td>
        <td><?php echo $tampil['role']; ?></td>
        <td>
            <a href="tambah_pegawai.php">TAMBAH</a>
            <a href="edit_pegawai.php?id_user=<?php echo $tampil['id_user']; ?>">EDIT</a>
            <a href="hapus_pegawai.php?id_user=<?php echo $tampil['id_user']; ?>">HAPUS</a>
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