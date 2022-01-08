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
	$id_cust = $_GET['id_cust'];
	$data = mysqli_query($connect,"select * from customer where id_cust='$id_cust'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="update.php">
			<table>
				<tr>			
					<td>Nama Pengguna</td>
					<td>
						<input type="hidden" name="id_cust" value="<?php echo $d['id_cust']; ?>">
						<input type="text" name="nama" value="<?php echo $d['nama']; ?>">
					</td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" value="<?php echo $d['username']; ?>"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="text" name="password" value="<?php echo $d['password']; ?>"></td>
				</tr>
                <tr>
					<td>Alamat</td>
					<td><input type="text" name="alamat" value="<?php echo $d['alamat']; ?>"></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td> <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                        <option selected value="laki_laki" style="color:black;">laki-laki</option>
                        <option value="perempuan" style="color:black;">perempuan</option>
                    </select> </td>
				</tr>
                <tr>
					<td>Telepon</td>
					<td><input type="number" name="telepon" placeholder="Nomor telepon" value="<?php echo $d['telepon']; ?>"></td>
				</tr>
                <tr>
					<td>Status</td>
					<td> <select class="form-select" aria-label="Default select example" name="keterangan">
                        <option selected value="member" style="color:black;">member</option>
                        <option value="non_member" style="color:black;">non_member</option>
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