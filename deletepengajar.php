<?php 
include_once "quer/config.php";
$id=$_GET['id'];
$sql = "DELETE FROM pengajar WHERE id = '$id'";
$query = mysqli_query($conn,$sql);
if($query)
{
header('location:DataPengajar.php');
}
else
{
echo "hapus guru Gagal";
}
?>