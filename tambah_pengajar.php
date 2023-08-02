<!-- Insert Database -->
<?php
    require 'quer/config.php';

            $nama      = $_POST['nama'];
            $email     = $_POST['email'];
            $phone     = $_POST['phone'];
            $alamat    = $_POST['alamat'];
            $materi    = $_POST['materi'];

            $akhir = "INSERT INTO pengajars (nama,email,phone,alamat,materi) VALUES('$nama','$email','$phone','$alamat','$materi')";

            $query = mysqli_query($conn,$akhir);
            if($query){
                header('location:DataPengajar.php');
                }else{
                echo"Gagal Disimpan";
            }

?>