<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>ETAK Komunika</title>
    <meta name="viewport" content="width=device-width, initial-scale=">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://kit.fontawesome.com/a81368914c.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/log.css" />
</head>
<body background="images/background.jpg">

	<div class="container">
		<div class="img">
			<img src="svg/admin.svg">
		</div>
		<div class="login-container">
			<form action="" method="POST">
				<img class="avatar" src="svg/avataaars.svg">
				<h2>Admin</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="i">
						<h5>Username</h5>
						<input class="input" type="text" name="nama_pengguna" autocomplete="off"></input>
					</div>
				</div>
				<div class="input-div two">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="i">
						<h5>Password</h5>
						<input class="input" type="password" name="kata_sandi"></input>
					</div>
				</div>
				<a href="#">Forget Password</a>
				<input type="submit" class="btn" value="login" name="login">
			</form>
			<?php
				if(isset($_POST['login'])){
					include"admin/koneksi.php";
					$nama_pengguna = $_POST['nama_pengguna'];
					$kata_sandi = $_POST['kata_sandi'];

					$cek_admin = mysqli_query($koneksi, "SELECT * FROM login WHERE nama_pengguna ='$nama_pengguna'");
					$row = mysqli_num_rows($cek_admin);
					
					if($row == 1){
						//Jalankan prosedur seleksi password
						$fetch_sandi = mysqli_fetch_assoc($cek_admin);
						$cek_admin = $fetch_sandi['kata_sandi'];
						if($cek_admin <> $kata_sandi){
							echo"<script>alert('Kata Sandi Salah!');</script>";
						}else{
							$_SESSION['log'] = true;
							echo"<script>alert('Login Berhasil');document.location.href='admin/index.php'</script>";
						}
					}else{
						echo"<script>alert('Nama Pengguna salah atau belum terdaftar');</script>";
					}
				}
			?>
		</div>
	</div>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>