<?php
include_once "../quer/config.php";
$id = $_GET['id'];
$sql = "DELETE FROM pengajars WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
if ($query) {
    header('location:../dashboard/DataPengajar.php');
} else {
    echo "hapus guru Gagal";
}
?>