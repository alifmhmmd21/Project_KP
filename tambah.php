<!-- Insert Database -->
<?php
    include 'quer/config.php';
            $no_ktp = $_POST['noktp'];
            $nama=$_POST['nama'];
            $alamat = $_POST['alamat'];
            $no_hp = $_POST['nohp'];
            $tujuan = $_POST['pesan'];

            $akhir = "INSERT INTO visiter (nama,no_ktp,alamat,no_hp,tujuan) VALUES('$nama','$no_ktp','$alamat','$no_hp','$tujuan')";

            $query = mysqli_query($conn,$akhir);
            if($query){
                header('location:Hasil.php');
                }else{
                echo"Gagal Disimpan";
            }

?>