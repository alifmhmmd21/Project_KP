<?php
session_start();
include ("../quer/config.php");

$user = stripcslashes($_POST['user']);
$pass = stripcslashes($_POST['password']);
$user = mysqli_escape_string($conn, $user);
$pass = mysqli_escape_string($conn, $pass);


$proses = "SELECT * FROM admin WHERE username ='$user' AND password ='$pass'";
$login = mysqli_query($conn, $proses);
$cek = mysqli_num_rows($login);

if ($cek > 0) {
	$data 		= mysqli_fetch_assoc($login);	
	$db_id			= $data['id'];
	$db_user		= $data['username'];
	$db_pass		= $data['password'];
	$_SESSION['id']	= $db_id;
		header("location:../dashboard/DataPenggunaVPS.php");	

	}elseif($login != $user && $pass){
		header("location:login.php?pesan=gagal");
		
	}else{
		header("location:login.php?pesan=kosong");
	}
?>