<!-- Insert Database -->
<?php
require '../quer/config.php';
$no_ktp = $_POST['noktp'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['nohp'];
$tujuan = $_POST['pesan'];

$akhir = "INSERT INTO visiter (no_ktp,nama,alamat,no_hp,tujuan) VALUES('$no_ktp','$nama','$alamat','$no_hp','$tujuan')";

$query = mysqli_query($conn, $akhir);
if ($query) {
    header('location:../dashboard/DataPengunjung.php');
} else {
    echo "Gagal Disimpan";
}

?>