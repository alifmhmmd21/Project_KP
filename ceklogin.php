<?php 
session_start();
include 'quer/config.php';

$user		= $_POST['user'];
$pass		= $_POST['password'];

$proses 	= "SELECT * FROM admin WHERE username ='$user' AND password ='$pass'";
$login		= mysqli_query($conn, $proses);

$cek		= mysqli_num_rows($login);

if ($cek > 0) {
	
	$data 			= mysqli_fetch_assoc($login);
	$db_id			= $data['id'];
	$db_user		= $data['username'];
	$db_pass		= $data['password'];
	$_SESSION['id']	= $db_id;
		header("location:DataPengunjung.php");	
}else{
	echo "<script>alert('LOGIN GAGAL');document.location.href='login.php'</script>";
}

?>