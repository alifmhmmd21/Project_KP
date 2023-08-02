<?php 
session_start();
if (isset($_SESSION['id']) != '') {
    header("location:DataPenggunaVPS.php");
    exit();
}
include 'quer/config.php';

$username = "";
$password = "";
$err = "";

/*
$username = $_POST['username'];
$password = $_POST['password'];

$username = stripcslashes($_POST['username']);
$password = stripcslashes($_POST['password']);
$username = mysqli_escape_string($koneksi, $username);
$password = mysqli_escape_string($koneksi, $password);
*/

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
            header("location:DataPenggunaVPS.php");
            exit();
        }
    }
}
?>
