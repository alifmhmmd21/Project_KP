<!doctype html>
<?php
?>
<!--Uji Coba Start-->
<?php
session_start();
if (isset($_SESSION['admin_username']) != '') {
    header("location:DataPenggunaVPS.php");
    exit();
}
include("quer/config.php");

$username = "";
$password = "";
$err = "";

if (isset($_POST['Login'])) {
    $username = stripcslashes($_POST['username']);
    $password = stripcslashes($_POST['password']);
    $username = mysqli_escape_string($conn, $username);
    $password = mysqli_escape_string($conn, $password);


    if ($username == '' && $password == '') {
        $err .= "<li>Silakan masukkan username dan password.</li>";
    } elseif ($username == '') {
        $err .= "<li>Silakan masukkan username.</li>";
    } elseif ($password == '') {
        $err .= "<li>Silakan masukkan password.</li>";
    } else {
        $sql1 = "select * from admin where username = '$username'";
        $q1 = mysqli_query($conn, $sql1);
        $r1 = mysqli_fetch_array($q1);
        $n1 = mysqli_num_rows($q1);

        if ($n1 < 1) {
            $err = "Username tidak ditemukan";
        } elseif ($r1['password'] != md5($password)) {
            $err = "Password yang kamu masukkan tidak sesuai";
        } else {
            $_SESSION['admin_username'] = $username;
            header("location:DataPengunjung.php");
            exit();
        }
    }
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

	<link rel="stylesheet" href="css/hasil.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<?php
					$err = "";

					if ($err) {
						?>
						<div class="alert alert-danger">
							<?php echo $err ?>
						</div>
						<?php
					}
					?>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<img src="asset/logo.png"
							style="display: block; margin-left: auto; margin-right:auto; width:200px; height:50px;">
						<br>
						<h5 class="mb-4"
							style="background:-webkit-linear-gradient(#000000,#F21717); -webkit-background-clip:text; -webkit-text-fill-color: transparent; text-align:center;">
							Login Admin<br>PT. Teknologi Server Indonesia</h5>

						<form method="POST" id="contactForm" name="contactForm" class="contactForm"
							action="">
							<div class="input-group flex-nowrap">
								<span class="input-group-text" id="addon-wrapping">@</span>
								<input type="text" class="form-control" placeholder="Username" aria-label="Username"
									aria-describedby="addon-wrapping" name="user" id="user" value="<?php echo $username ?>">
							</div>
							<br>
							<div class="input-group flex-nowrap">
								<span class="input-group-text" id="addon-wrapping">#</span>
								<input type="password" class="form-control" placeholder="Password" aria-label="Password"
									aria-describedby="addon-wrapping" name="password" id="paswword">
							</div>
							<br>
							<div class="form-group">
								<div class="right">
									<input type="submit" autocomplete="off" value="Login" class="btn btn-danger "
										name="Login">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
	</section>
</body>

</html>