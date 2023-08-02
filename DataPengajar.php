<!DOCTYPE html>

<?php
session_start();
if ($_SESSION['admin_username'] == '') {
    header("location:login.php");
    exit();
}
include 'quer/config.php';
$batas = 5;
$halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($conn, "select * from pengajars");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$query = mysqli_query($conn, "select * from pengajars limit $halaman_awal, $batas");
$nomor = $halaman_awal + 1;

?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pengguna Hosting</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/data.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
        <a href="DataPenggunaHosting.php" class="w3-bar-item w3-button">Data Pengguna Hosting</a>
        <a href="DataPenggunaVPS.php" class="w3-bar-item w3-button">Data Pengguna VPS</a>
        <a href="DataPengunjung.php" class="w3-bar-item w3-button">Data Pengunjung</a>
        <a href="#" class="w3-bar-item w3-button">Data Pengajar</a>
        <a class="w3-bar-item w3-button" style="position: absolute; left: 0;bottom: 0;" href="logout.php">
            <i class="fa fa-power-off fa-lg">
                <h7>
                    <b> Logout </b>
                </h7>
            </i>
        </a>
    </div>

    </div>

    <div id="main">
        <button id="openNav" class="w3-button w3-xlarge" onclick="w3_open()">&#9776;</button>
        <div class="w3-container">
            <h1 class="w3-center">Data Pengajar</h1>
        </div>

        <div class="container-fluid">
            <div class="container-lg">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2>Data <b>Pengajar</b></h2>
                                </div>
                                <div class="col-sm-4">
                                    <a href="#tambah-teks" class="btn btn-success " data-toggle="modal"
                                        style="float: right;"><i class="material-icons">&#xE147;</i>
                                        <span>Tambah</span></a>
                                </div>
                            </div>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-md-1">No</th>
                                    <th class="col-md-3">Nama</th>
                                    <th class="col-md-4">Email</th>
                                    <th class="col-md-4">No. HP</th>
                                    <th class="col-md-4">Alamat</th>
                                    <th class="col-md-2">Materi</th>
                                    <th class="col-sm-3">Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($data = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <tr>
                                    <td>
                                        <?php echo $nomor++ ?>
                                        </td>
                                        <td>
                                            <?php echo $data['name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $data['email'] ?>
                                        </td>
                                        <td>
                                            <?php echo $data['phone'] ?>
                                        </td>
                                        <td>
                                            <?php echo $data['address'] ?>
                                        </td>
                                        <td>
                                            <?php echo $data['materi'] ?>
                                        </td>
                                        <td>
                                            <a class='edit' title='Edit' data-toggle='tooltip'
                                                href="edit_pengajar.php?id=<?php echo $data['id'] ?>"><i
                                                    class='material-icons'>&#xE254;</i></a>
                                            <a class='delete' title='Delete' data-toggle='tooltip'
                                                href="deletepengajar.php?id=<?php echo $data['id']; ?>"
                                                onclick="return confirm('Apakah Yakin Hapus Data ?')"><i
                                                    class='material-icons'>&#xE872;</i></a>
                                        </td>
                                        <?php
                                }
                                ?>
                                </tr>
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" <?php if ($halaman > 1) {
                                        echo "href='?halaman=$previous'";
                                    } ?>>Previous</a>
                                </li>
                                <?php
                                for ($x = 1; $x <= $total_halaman; $x++) {
                                    ?>
                                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                    <?php
                                }
                                ?>
                                <li class="page-item">
                                    <a class="page-link" <?php if ($halaman < $total_halaman) {
                                        echo "href='?halaman=$next'";
                                    } ?>>Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Untuk Tampilan Add -->
            <!-- Edit Modal HTML -->
            <div id="tambah-teks" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" id="contactForm" name="contactForm" class="contactForm"
                            action="tambah_pengajar.php">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Pengajar</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" autocomplete="off" class="form-control" name="name" id="name">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" autocomplete="off" class="form-control" name="email" id="email"
                                        maxlength="50" required>
                                </div>
                                <div class="form-group">
                                    <label>No. HP</label>
                                    <input type="text" autocomplete="off" class="form-control" name="phone"
                                        id="phone">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" autocomplete="off" class="form-control" name="address" id="address">
                                </div>
                                <div class="form-group">
                                    <label>Materi</label>
                                    <input type="text" autocomplete="off" class="form-control" name="materi" id="materi">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" class="btn btn-success" value="Tambah" name="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <script>
        function w3_open() {
            document.getElementById("main").style.marginLeft = "18%";
            document.getElementById("mySidebar").style.width = "18%";
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("openNav").style.display = 'none';
        }
        function w3_close() {
            document.getElementById("main").style.marginLeft = "0%";
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("openNav").style.display = "inline-block";
        }
    </script>
    <!-- <script src="js/tujuan.js"></script>                         -->
</body>

</html>