<!-- Insert Database -->
<?php
    require 'quer/config.php';
            $ktp        = $_POST['ktp'];
            $nama       = $_POST['nama'];
            $alamat     = $_POST['alamat'];
            $hp         = $_POST['hp'];
            $subdomain  = $_POST['subdomain'];
            $domain  = $_POST['domain'];

            $akhir = "INSERT INTO penggunavps (ktp,nama,alamat,hp,subdomain,domain) VALUES('$ktp','$nama','$alamat','$hp','$subdomain','$domain')";

            $query = mysqli_query($conn,$akhir);
            if($query){
                header('location:DataPenggunaVPS.php');
                }else{
                echo"Gagal Disimpan";
            }

?>