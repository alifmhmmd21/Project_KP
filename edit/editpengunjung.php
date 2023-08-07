<?php
$sukses     = "";
$error      = "";

include("../quer/config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

if ($id != "") {
    $sql1 = "select * from visiter where id='$id'";
    $q1         = mysqli_query($conn, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $noktp      = $r1['no_ktp'];
    $nama       = $r1['nama'];
    $alamat     = $r1['alamat'];
    $nohp       = $r1['no_hp'];
    $tujuan     = $r1['tujuan'];

}

if (isset($_POST['simpan'])) {
    $noktp      = $_POST['noktp'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $nohp       = $_POST['nohp'];
    $tujuan     = $_POST['tujuan'];

    if (empty($error)) {
        if ($id != "") {
            $sql1 = "update visiter set no_ktp ='$noktp',nama ='$nama',alamat ='$alamat', no_hp ='$nohp', tujuan ='$tujuan' where id = '$id'";
        }
        $q1 = mysqli_query($conn, $sql1);
        if ($q1) {
            $sukses = "Data berhasil diupdate";
        } else {
            $error  = "Data gagal diupdate";
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
    <script src="https://kit.fontawesome.com/177f980250.js" crossorigin="anonymous"></script>
    <title>Edit Data</title>
</head>

<body>
    <div class="login-page">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="contactForm" name="contactForm" class="contactForm" action="">
                    <a href="../dashboard/DataPenggunaHosting.php">
                        <i class="fa fa-solid fa-circle-xmark" style="float: right; display: flex; align-items: flex-end; position: absolute; top: 20px; right: 20px; font-size:25px; color:#ff0000;"></i>     
                    </a>
                    <div class="modal-header">
                        <h2 class="modal-title">Edit Data Kunjungan</h>
                    </div>
                    <div class="modal-body">
                        <?php
                            if ($error) {
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error ?>
                                </div>

                            <?php
                            }
                            ?>

                            <?php
                            if ($sukses) {
                            ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $sukses ?>
                                </div>
                            <?php
                            }
                        ?>
                        <div class="form-group">
                            <label>No KTP</label>
                            <input type="text" class="form-control" id="noktp" value=" <?php echo $noktp ?>"
                                name="noktp" required>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="nama" value=" <?php echo $nama ?>" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" id="alamat" class="form-control" value="<?php echo $alamat ?>"
                                name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor HP</label>
                            <input type="text" class="form-control" id="nohp" value=" <?php echo $nohp ?>" name="nohp" required>
                        </div>
                        <div class="form-group">
                            <label>Tujuan Kunjungan</label>
                            <input type="text" class="form-control" id="tujuan" value=" <?php echo $tujuan ?>"
                                name="tujuan" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="../dashboard/DataPengunjung.php">
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