<!doctype html>
<!--Uji Coba Start-->
<?php
include("../quer/config.php");

session_start();
if (isset($_SESSION['id']) != '') {
	header("location:../dashboard/DataPenggunaVPS.php");
	exit();
}
?>
<!--Uji Coba Finish-->
<html lang="en">

<head>
	<title>Login Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="../css/hasil.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
				</div>
			</div>
			<br>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<img src="../asset/logo.png"
							style="display: block; margin-left: auto; margin-right:auto; width:200px; height:50px;">
						<br>
						<h5 class="mb-4"
							style="background:-webkit-linear-gradient(#000000,#F21717); -webkit-background-clip:text; -webkit-text-fill-color: transparent; text-align:center;">
							Login Admin<br>PT. Teknologi Server Indonesia</h5>

						<form method="POST" id="contactForm" name="contactForm" class="contactForm"
							action="ceklogin.php">
							<!-- Notification untuk Login -->
							<?php
							if (isset($_GET['pesan'])) {
								if ($_GET['pesan'] == "gagal") {
									echo "<div class='alert alert-danger' role='alert'>
									<b>Username atau Password salah</b>, Isi kembali
								  </div>";
								}
								else if($_GET['pesan'] == "kosong"){
									echo "<div class='alert alert-danger' role='alert'>
									Silakan masukkan username dan password.
								  </div>";
								}
							}
							?>
							
							<!-- Form untuk login -->
							<div class="input-group flex-nowrap">
								<span class="input-group-text" id="addon-wrapping">@</span>
								<input type="text" class="form-control" placeholder="Username" aria-label="Username"
									aria-describedby="addon-wrapping" name="user" id="user">
							</div>
							<br>
							<div class="input-group flex-nowrap">
								<span class="input-group-text" id="addon-wrapping">#</span>
								<input type="password" class="form-control" placeholder="Password" aria-label="Password"
									aria-describedby="addon-wrapping" name="password" id="password">
							</div>
							<br>
							<div class="form-group">
								<div class="right">
									<input type="submit" autocomplete="off" value="Login" class="btn btn-danger "
										name="submit">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
	</section>
</body>

</html>