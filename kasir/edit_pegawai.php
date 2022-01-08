<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP dan MySQLi - WWW.MALASNGODING.COM</title>

    	<!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="fontawesome/css/all.css" rel="stylesheet"> 
</head>
<body>
	<h3>EDIT DATA CUSTOMER</h3>
	<br/>
	<br/>
	<a href="customer.php">KEMBALI</a>

	<?php
	include '../config.php';
	$id_user = $_GET['id_user'];
	$data = mysqli_query($connect,"select * from user where id_user='$id_user'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="update_pegawai.php">
			<table>
				<tr>			
					<td>Nama Pegawai</td>
					<td>
						<input type="hidden" name="id_user" value="<?php echo $d['id_user']; ?>">
						<input type="text" name="name" value="<?php echo $d['name']; ?>">
					</td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" value="<?php echo $d['username']; ?>"></td>
				</tr>
					<td>Role</td>
					<td> <select class="form-select" aria-label="Default select example" name="role">
                        <option selected value="kasir" style="color:black;">Kasir</option>
                        <option value="admin" style="color:black;">Admin</option>
                    </select> </td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="SIMPAN"></td>
				</tr>		
			</table>
		</form>
		<?php 
	}
	?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>