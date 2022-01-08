<?php
include '../config.php';

error_reporting(0);

if(isset($_POST['submit'])){
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telepon = $_POST['telepon'];
$keterangan = $_POST['keterangan'];

if($password == $cpassword){
  $sql="SELECT * FROM customer WHERE username='$username'";
  $result= mysqli_query($connect, $sql);
  if(!$result -> num_rows > 0){
    $sql= "INSERT INTO customer (nama, username, password, alamat, jenis_kelamin, telepon, keterangan)
    VALUES ('$nama', '$username', '$password', '$alamat', '$jenis_kelamin', '$telepon', '$keterangan')";
    $result = mysqli_query($connect, $sql);
    if($result){
      echo"<script>alert('User berhasil registrasi.')</script>";
      $nama="";
      $username ="";
      $_POST['password']="";
      $_POST['cpassword']="";
      $alamat="";
      $jenis_kelamin="";
      $telepon="";
      $keterangan="";
    }else{
      echo"<script>alert('Ada yang salah sepertinya.')</script>";
   }
  }else{
    echo"<script>alert('Username sudah tersedia')</script>";
  } 
   
}
else{
  echo"<script>alert('Nama tidak sama.')</script>";
}
}
?>


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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="box" action="" method="post">
                    <h1>Register</h1>
                    <p class="text-muted" > Please enter your data to register!</p> 
                    <input type="text" name="nama" placeholder="Nama" value="<?php echo $nama; ?>">  
                    <input type="text" name="username" placeholder="username" value="<?php echo $username; ?>">
                    <input type="text" name="password" placeholder="Password" value="<?php echo $_POST['password']; ?>"> 
                    <input type="text" name="cpassword" placeholder="Konfirmasi Password" value="<?php echo $_POST['cpassword']; ?>"> 
                    <input type="text" name="alamat" placeholder="alamat" value="<?php echo $alamat; ?>"> 
                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                        <option selected value="laki_laki" style="color:black;">laki-laki</option>
                        <option value="perempuan" style="color:black;">perempuan</option>
                    </select> 
                    <input type="text" name="telepon" placeholder="Nomor Telepon" value="<?php echo $telepon; ?>"> 
                    <select class="form-select" aria-label="Default select example" name="keterangan">
                        <option value="non_member" style="color:black;">non_member</option>
                    </select> 
                    <p class="text-muted">Succes to make data <a class="forgot text-muted" href="login.php">Login Here</a></p>
                    <button type="submit" name="submit">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>