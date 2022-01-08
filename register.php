<?php
include 'config.php';

error_reporting(0);

if(isset($_POST['submit'])){
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$role = $_POST['role'];

if($password == $cpassword){
  $sql="SELECT * FROM user WHERE username='$username'";
  $result= mysqli_query($connect, $sql);
  if(!$result -> num_rows > 0){
    $sql= "INSERT INTO user (name, username, password, role)
    VALUES ('$name', '$username', '$password', '$role')";
    $result = mysqli_query($connect, $sql);
    if($result){
      echo"<script>alert('User berhasil registrasi.')</script>";
      $name="";
      $username="";
      $_POST['password']="";
      $_POST['cpassword']="";
      $role="";
    }else{
      echo"<script>alert('Ada yang salah sepertinya.')</script>";
   }
  }else{
    echo"<script>alert('Username sudah tersedia')</script>";
  } 
   
}
else{
  echo"<script>alert('Password Not Matched.')</script>";
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
                    <input type="text" name="name" placeholder="Nama Pengguna" value="<?php echo $name; ?>"> 
                    <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>"> 
                    <input type="password" name="password" placeholder="Password"  value="<?php echo $_POST['password']; ?>"> 
                    <input type="password" name="cpassword" placeholder=" Confirm Password" value="<?php echo $_POST['cpassword']; ?>"> 
                    <select class="form-select" aria-label="Default select example" name="role">
                        <option selected value="kasir" style="color:black;">kasir</option>
                        <option value="admin" style="color:black;">admin</option>
                    </select>
                    <a class="forgot text-muted" href="#">Forgot password?</a> 
                    <p class="text-muted">Have an account? <a class="forgot text-muted" href="login.php">Login Here</a></p>
                    <button type="submit" name="submit">Register</button>
                    <div class="col-md-12">
                        <ul class="social-network social-circle">
                            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" class="icoGoogle" title="Google +"><i class="fab fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>