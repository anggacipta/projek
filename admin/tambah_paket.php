<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
    <link rel="stylesheet" href="css/style_admin.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="box" action="tambah_pemesanan.php" method="post">
                    <h1>Tambah Pesanan</h1>
                    <p class="text-muted" > Tambahkan pesanan anda</p> 
                    <input type="text" name="id" placeholder="id = ddmmyy"> 
                    <select class="form-select" aria-label="Default select example" name="id_paket">
                        <option selected value="2 - Kering" style="color:black;">2 - Kering</option>
                        <option value="3 - Basah" style="color:black;">3 - Basah</option>
                        <option value="4 - Setrika" style="color:black;">4 - Setrika</option>
                    </select>  
                    <input type="text" name="jumlah" placeholder="jumlah"> 
                    <input type="date" name="tanggal_order" placeholder="tanggal_order"> 
                    <input type="hidden" name="hidden" value="no">
                    <p class="text-muted">Succes to make data <a class="forgot text-muted" href="data_user.php">Check Here</a></p>
                    <button type="submit" name="submit">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
 
 // Check If form submitted, insert form data into users table.
 if(isset($_POST['submit'])) {
     $id = $_POST['id'];
     $id_paket = $_POST['id_paket'];
     $jumlah = $_POST['jumlah'];
     $tanggal_order = $_POST['tanggal_order'];
     $hidden = $_POST['hidden'];
     
     // include database connection file
     include_once("../config.php");
             
     // Insert user data into table
     $result = mysqli_query($connect, "INSERT INTO detail_transaksi(id,id_paket,jumlah,tanggal_order,hidden) VALUES('$id','$id_paket','$jumlah','$tanggal_order','$hidden')");
     
     // Show message when user added
     echo "User added successfully. <a href='pemesanan.php'>View Users</a>";
 }
 ?>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>