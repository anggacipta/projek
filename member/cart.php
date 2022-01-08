<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

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
          <a class="nav-link" href="pesanan_membernon.php">Pesanan Membership</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user.php">User</a>
        </li>
        <li class="nav-item">
          <a href="cart.php" class="nav-link active">Cart</a>
        </li>
        <li class="nav-item">
        <a href="logout.php"><input type="button" class="btn btn-outline-primary me-2" value="Logout"></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->

<!-- Form Pembayaran -->


<div class="container">
    <a href="pesan_laundrynon.php" class="btn btn-warning mb-3 mt-3">Continue Shopping</a>

    <?php
    require '../config.php';
    require 'item.php';
    if (isset ( $_GET ['id_paket'] ) && !isset($_POST['update'])) {

      $result = mysqli_query ( $connect, 'select * from paket where id_paket=' . $_GET ['id_paket'] );
      $product = mysqli_fetch_object ( $result );
      $item = new Item ();
      $item->id_paket = $product->id_paket;
      $item->nama_paket = $product->nama_paket;
      $item->harga_paket = $product->harga_paket;
      $item->quantity = 1;
      // Check product is existing in cart
      $index = - 1;
      if (isset ( $_SESSION ['cart'] )) {
        $cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
        for($i = 0; $i < count ( $cart ); $i ++)
        if ($cart [$i]->id_paket == $_GET ['id_paket']) {
          $index = $i;
          break;
        }
      }
      if ($index == - 1)
      $_SESSION ['cart'] [] = $item;
      else {
        $cart [$index]->quantity ++;
        $_SESSION ['cart'] = $cart;
      }
    }


    // Delete product in cart
    if (isset ( $_GET ['index'] ) && !isset($_POST['update'])) {
      $cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
      unset ( $cart [$_GET ['index']] );
      $cart = array_values ( $cart );
      $_SESSION ['cart'] = $cart;
    }

    // Update quantity in cart
    if(isset($_POST['update'])) {
      $arrQuantity = $_POST['quantity'];

      // Check validate quantity
      $valid = 1;
      for($i=0; $i<count($arrQuantity); $i++)
      if(!is_numeric($arrQuantity[$i]) || $arrQuantity[$i] < 1){
        $valid = 0;
        break;
      }
      if($valid==1){
        $cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
        for($i = 0; $i < count ( $cart ); $i ++) {
          $cart[$i]->quantity = $arrQuantity[$i];
        }
        $_SESSION ['cart'] = $cart;
      }
      else
        $error = 'Quantity is InValid';
    }

    ?>
    <form action="" method="post">
    <?php echo isset($error) ? $error : ''; ?>
    <table cellpadding="2" cellspacing="2" border="1" class="table">
        <tr>
          <th>Option</th>
          <th>Id</th>
          <th>Name</th>
          <th>Price</th>
          <th>Quantity <button class="btn btn-info text-light" placeholder="Submit">Submit</button> <input
            type="hidden" name="update">
          </th>
          <th>Sub Total</th>
        </tr>
        <?php
        $cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
        
    if(!$cart){
      echo "Anda belum memesan apa apa. Jika ada error, itu bukan error yang berbahaya. Cara mengatasi, pesan apa saja di
      menu pesan laundry. Setelah masuk ke cart hapus pesanan tersebut. Error pun hilang";
    }
        $s = 0;
        $a = 0;
        $j = 0;
        $index = 0;
        for($i = 0; $i < count ( $cart ); $i ++) {
          $s += $cart [$i]->harga_paket * $cart [$i]->quantity;
          $a += $cart [$i]->quantity;
          $j += $cart [$i]->harga_paket * $cart [$i]->quantity - (($cart [$i]->harga_paket * $cart [$i]->quantity) * 10 /100 );
          ?>
        <tr>
          <td><a href="cart.php?index=<?php echo $index; ?>"
            onclick="return confirm('Are you sure?')">Delete</a></td>
          <td><?php echo $cart[$i]->id_paket; ?></td>
          <td><?php echo $cart[$i]->nama_paket; ?></td>
          <td>Rp<?php echo $cart[$i]->harga_paket; ?></td>
          <td><input type="text" value="<?php echo $cart[$i]->quantity; ?>"
            style="width: 50px;" name="quantity[]"></td>
          <td>Rp<?php echo $cart[$i]->harga_paket * $cart[$i]->quantity; ?></td>
        </tr>
        <?php
        $index ++;
        }
        ?>
        <tr>
          <td colspan="5" align="right">Total</td>
          <td align="left">Rp<?php echo $s; ?></td>
        </tr>
        <tr>
        <td colspan="5" align="right">Total Berat</td>
          <td align="left"><?php echo $a; ?>Kg</td>
        </tr>
        <tr>
        <td colspan="5" align="right">Diskon</td>
          <td align="left">10%</td>
        </tr>
        <tr>
        <td colspan="5" align="right"> Harga setelah diskon</td>
          <td align="left">Rp<?php echo $j; ?></td>
        </tr>
      </table>
      </form>
    <form method="post" action="checkout.php" enctype="multipart/form-data">
      <input type="hidden" name="biaya" value="<?php echo $j; ?>">
      <input type="hidden" name="jumlah" value="<?php echo $a; ?>">
                  <div class="col-12 mb-2">
                    <big class="form-label">Isi data dengan lengkap</big>
                  </div>

                <div class="col-12">
                    <label for="username" class="form-label">Kode Invoice</label>
                    <div class="input-group has-validation">
                      <input type="text" name="kode_invoice" class="form-control" readonly value="<?php echo"INV".date("mdY") ?>"> 
                    <div class="invalid-feedback">
                        Your username is required.
                      </div>
                    </div>
                  </div>

                  <?php
                  
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
                    <label for="address" class="form-label">Keterangan</label>
                    <select class="form-select" aria-label="Default select example" name="keterangan">
                              <option value="non_member" style="color:black;">Non Member</option>
                          </select> 
                    <div class="invalid-feedback">
                      Please enter your shipping address.
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="address2" class="form-label">Tanggal Order</label>
                    <input type="date" name="tanggal_order" class="form-control" placeholder="id" readonly value="<?= date('Y-m-d') ?>">
                  </div>

                  <div class="col-12">
                    <label for="address2" class="form-label">Tanggal Bayar</label>
                    <input type="date" name="tgl_bayar" class="form-control" placeholder="tgl_bayar">
                  </div>

                  <div class="col-12">
                    <label for="address2" class="form-label">Total Bayar</label>
                    <p>Rp<input type="text" name="total_bayar" class="form-control" placeholder=""></p>
                  </div>

                  <div class="col-12">
                    <label for="address" class="form-label">Status</label>
                    <select class="form-select" aria-label="Default select example" name="status">
                              <option value="laundry_belum_diterima" style="color:black;">Laundry belum diterima</option>
                          </select> 
                    <div class="invalid-feedback">
                      Please enter your shipping address.
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="address" class="form-label">Jenis Pengiriman</label>
                    <select class="form-select" aria-label="Default select example" name="jenis_pengiriman">
                              <option value="kirim_sendiri" style="color:black;">Kirim sendiri</option>
                              <option value="paket_diambil_kurir" style="color:black;">Paket Diambil</option>
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

    <button class="w-100 btn btn-primary btn-lg mb-3">Continue to checkout</button>
    </form>
</div>


    
</body>
</html>



<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

