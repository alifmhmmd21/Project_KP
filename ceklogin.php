<?php 
session_start();
if (isset($_SESSION['id']) != '') {
    header("location:DataPengunjung.php");
    exit();
}
include 'quer/config.php';

$user		= stripcslashes($_POST['user']);
$pass		= stripcslashes($_POST['password']);
$user		= mysqli_escape_string($conn,$user);
$pass		= mysqli_escape_string($conn,$pass);


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