<?php
include("quer/config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

if ($id != "") {
    $sql1 = "select * from visiter where id='$id'";
    $q1 = mysqli_query($conn, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $noktp = $r1['no_ktp'];
    $nama = $r1['nama'];
    $alamat = $r1['alamat'];
    $nohp = $r1['no_hp'];
    $tujuan = $r1['tujuan'];

}

if (isset($_POST['simpan'])) {
    $noktp = $_POST['noktp'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $tujuan = $_POST['tujuan'];

    if (empty($error)) {
        if ($id != "") {
            $sql1 = "update visiter set no_ktp ='$noktp',nama = '$nama',alamat = '$alamat', no_hp = '$nohp', tujuan = '$tujuan' where id = '$id'";
        }
        $q1 = mysqli_query($conn, $sql1);
        if ($q1) {
            header('location:DataPengunjung.php');
        } else {
            header("location:editadmin.php?id");

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
                <form method="POST" id="contactForm" name="contactForm" class="contactForm" action="">
                    <div class="modal-header">
                        <h2 class="modal-title">Edit Data Kunjungan</h>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>No KTP</label>
                            <input type="text" class="form-control" id="noktp" value=" <?php echo $noktp ?>"
                                name="noktp">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="nama" value=" <?php echo $nama ?>" name="nama">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" id="alamat" class="form-control" value="<?php echo $alamat ?>"
                                name="alamat">
                        </div>
                        <div class="form-group">
                            <label>Nomor HP</label>
                            <input type="text" class="form-control" id="nohp" value=" <?php echo $nohp ?>" name="nohp">
                        </div>
                        <div class="form-group">
                            <label>Tujuan Kunjungan</label>
                            <input type="text" class="form-control" id="tujuan" value=" <?php echo $tujuan ?>"
                                name="tujuan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="DataPengunjung.php">
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