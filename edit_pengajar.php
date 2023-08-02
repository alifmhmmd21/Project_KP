
<?php
include ("quer/config.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = "";
}

if($id != ""){
    $sql1       = "select * from pengajars where id='$id'";
    $q1         = mysqli_query($conn,$sql1);
    $r1         = mysqli_fetch_array($q1);
    $name       = $r1['name'];
    $email      = $r1['email'];
    $phone      = $r1['phone'];
    $address    = $r1['address'];
    $materi     = $r1['materi'];
    
}

if (isset($_POST['simpan'])) {
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone'];
    $address    = $_POST['address'];
    $materi     = $_POST['materi'];

    if (empty($error)) {
        if($id != ""){
            $sql1 = "update pengajars set name ='$name',email = '$email',phone = '$phone', address = '$address', materi='$materi', where id = '$id'";
        }
        $q1       = mysqli_query($conn,$sql1);
        if ($q1) {
            header('location:DataPengajar.php');
        } else {
            header("location:edit_pengajar.php?id");

        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Edit Data</title>
</head>
<body>
<div class="login-page">
  <div class="modal-dialog">
            <div class="modal-content">
                <form  method="POST" id="contactForm" name="contactForm" class="contactForm" action="">
                    <div class="modal-header">
                        <h2 class="modal-title">Edit Data Pengajar</h>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="name" value=" <?php echo $name?>" name="name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="email" value=" <?php echo $email?>" name="email">
                        </div>
                        <div class="form-group">
                            <label>No. HP</label>
                            <input type="text" id="phone" class="form-control" value="<?php echo $phone?>" name="phone">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" id="address" value=" <?php echo $address?>" name="address">
                        </div>
                        <div class="form-group">
                            <label>Materi</label>
                            <input type="text" class="form-control" id="materi" value=" <?php echo $materi ?>" name="materi">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="DataPengajar.php">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        </a>
                        <input type="submit" class="btn btn-success" name="simpan" value="Simpan Data">
                    </div>
                </form>
            </div>
        </div>
</div>
</body>
</html>