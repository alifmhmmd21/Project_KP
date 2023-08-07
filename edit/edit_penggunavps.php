<?php
include("../quer/config.php");

$sukses     ="";
$error      ="";



if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

if ($id != "") {
    $sql1 = "select * from penggunavps where id='$id'";
    $q1 = mysqli_query($conn, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $ktp = $r1['ktp'];
    $nama = $r1['nama'];
    $alamat = $r1['alamat'];
    $hp = $r1['hp'];
    $subdomain = $r1['subdomain'];
    $domain = $r1['domain'];

}

if (isset($_POST['simpan'])) {
    $ktp = $_POST['ktp'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $subdomain = $_POST['subdomain'];
    $domain = $_POST['domain'];

    if (empty($error)) {
        if ($id != "") {
            $sql1 ="update penggunavps set ktp='$ktp',nama='$nama',alamat='$alamat', hp='$hp',subdomain='$subdomain',domain='$domain' where id = '$id'";
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
    <title>Edit Data</title>
</head>

<body>
    <div class="login-page">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="contactForm" name="contactForm" class="contactForm" action="">
                    <div class="modal-header">
                        <h2 class="modal-title">Edit Data Pengguna VPS</h>
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
                            <input type="number" class="form-control" id="ktp" value="<?php echo $ktp ?>" name="ktp"
                                maxlength="16" required>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="nama" value="<?php echo $nama ?>" name="nama"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" id="alamat" class="form-control" value="<?php echo $alamat ?>"
                                name="alamat">
                        </div>
                        <div class="form-group">
                            <label>Nomor HP</label>
                            <input type="tel" class="form-control" id="hp" value="<?php echo $hp ?>" name="hp">
                        </div>
                        <div class="form-group">
                            <label>SubDomain</label>
                            <input type="text" class="form-control" id="subdomain" value="<?php echo $subdomain ?>"
                                name="subdomain">
                        </div>
                        <div class="form-group">
                            <label>Domain</label>
                            <input type="text" class="form-control" id="domain" value="<?php echo $domain ?>"
                                name="domain">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="../dashboard/DataPenggunaVPS.php">
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