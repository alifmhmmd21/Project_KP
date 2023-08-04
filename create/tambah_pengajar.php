<?php
    require '../quer/config.php';

            $name      = $_POST['name'];
            $email     = $_POST['email'];
            $phone     = $_POST['phone'];
            $address   = $_POST['address'];
            $materi    = $_POST['materi'];

            $akhir = "INSERT INTO pengajars (name,email,phone,address,materi) VALUES('$name','$email','$phone','$address','$materi')";

            $query = mysqli_query($conn,$akhir);
            if($query){
                header('location:../dashboard/DataPengajar.php');
                }else{
                echo"Gagal Disimpan";
            }

?>