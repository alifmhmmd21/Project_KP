<?php
include_once "quer/config.php";
$id = $_GET['id'];
$sql = "DELETE FROM visiter WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
if ($query) {
    header('location:DataPengunjung.php');
} else {
    echo "hapus guru Gagal";
}
?>