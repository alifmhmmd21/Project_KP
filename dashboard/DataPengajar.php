<!DOCTYPE html>

<?php
include("../quer/config.php");
include("../login/pengecekanlogin.php");

$katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
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
    <title>Data Pengajar</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/data.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Sidebar Container -->
    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left"
        style="display:block; width: 18% ;font-family: 'Inter', sans-serif;" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
        <a href="Home.php" class="w3-bar-item w3-button">Home</a>
        <a href="DataPenggunaHosting.php" class="w3-bar-item w3-button">Data Pengguna Hosting</a>
        <a href="DataPenggunaVPS.php" class="w3-bar-item w3-button">Data Pengguna VPS</a>
        <a href="DataPengunjung.php" class="w3-bar-item w3-button">Data Pengunjung</a>
        <a href="DataPengajar.php" class="w3-bar-item w3-button">Data Pengajar</a>
    </div>

    </div>

    <div id="main" style="margin-left: 18%;font-family: 'Inter', sans-serif;">
        <header class="p-3 mb-3 border-bottom" style="background-color: white; box-shadow: 1px 1px 6px 1px grey;">
            <div class="d-flex flex-wrap">
                <button id="openNav" class="w3-button w3-xlarge" style="padding:0px 16px; display: none"
                    onclick="w3_open()">&#9776;</button>
                <div class="dropdown text-end ms-auto">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../asset/user.png" alt="mdo" width="32" height="32" class="rounded-circle" />
                    </a>
                    <ul class="dropdown-menu text-small" style="">
                        <li><a class="dropdown-item" href="../login/logout.php">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="w3-container">
            <h1 class="w3-center">Data Pengajar</h1>
        </div>

        <div class="container-fluid">
            <div class="container-lg">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                        <div class="row">
                            </div>
                        </div>
                        <form>
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col-5">
                                        <input type="text" class="form-control" placeholder="Masukan Kata Kunci"
                                            name="katakunci" value="<?php echo $katakunci ?>" />
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" name="cari" value="Cari Pengajar"
                                            class="btn btn-secondary" />
                                    </div>
                                    <div class="col-auto">
                                        <a href="DataPengajar.php">
                                            <input type="button" class="btn btn-primary" value="Refresh">
                                        </a>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-right">
                                            <a href="#tambah-teks" class="btn btn-success" data-toggle="modal"
                                                style="float: right; display: flex; align-items: flex-end; position: absolute; top: 0; right: -50px;"><i class="material-icons">&#xE147;</i>
                                                <span>Tambah</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-md-1">No</th>
                                    <th class="col-md-3">Nama</th>
                                    <th class="col-md-4">Email</th>
                                    <th class="col-md-2">No. HP</th>
                                    <th class="col-md-4">Alamat</th>
                                    <th class="col-md-3">Materi</th>
                                    <th class="col-sm-3">Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //keyword search
                                $sqltambahan = "";
                                if ($katakunci != '') {
                                    $array_katakunci = explode(" ", $katakunci);
                                    for ($x = 0; $x < count($array_katakunci); $x++) {
                                        $sqlcari[] = "(name like '%" . $array_katakunci[$x] . "%' or email like '%" . $array_katakunci[$x] . "%' or phone like '%" . $array_katakunci[$x] . "%')";
                                    }
                                    $sqltambahan = " where" . implode(" or", $sqlcari);
                                }
                                $sql1 = "select * from pengajars $sqltambahan";
                                $q1 = mysqli_query($conn, $sql1);
                                $total = mysqli_num_rows($q1);
                                $sql1 = $sql1 . " order by id desc limit $halaman_awal,$batas";
                                $query = mysqli_query($conn, $sql1);
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
                                                href="../edit/edit_pengajar.php?id=<?php echo $data['id'] ?>"><i
                                                    class='material-icons'>&#xE254;</i></a>
                                            <a class='delete' title='Delete' data-toggle='tooltip'
                                                href="../delete/deletepengajar.php?id=<?php echo $data['id']; ?>"
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
                            action="../create/tambah_pengajar.php">
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
                                    <input type="text" autocomplete="off" class="form-control" name="phone" id="phone">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" autocomplete="off" class="form-control" name="address"
                                        id="address">
                                </div>
                                <div class="form-group">
                                    <label>Materi</label>
                                    <input type="text" autocomplete="off" class="form-control" name="materi"
                                        id="materi">
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