<!DOCTYPE html>

<?php
include("../quer/config.php");
include("../login/pengecekanlogin.php");

$katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
$sqltambahan = "";
$per_halaman = 5;

if ($katakunci != '') {
    $array_katakunci = explode(" ", $katakunci);
    for ($x = 0; $x < count($array_katakunci); $x++) {
        $sqlcari[] = "(nama like '%" . $array_katakunci[$x] . "%' or ktp like '%" . $array_katakunci[$x] . "%' or hp like '%" . $array_katakunci[$x] . "%')";
    }
    $sqltambahan = " where" . implode(" or", $sqlcari);
}
//

$sql1 = "select * from penggunavps $sqltambahan";
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$mulai = ($page > 1) ? ($page * $per_halaman) - $per_halaman : 0;
$q1 = mysqli_query($conn, $sql1);
$total = mysqli_num_rows($q1);
$pages = ceil($total / $per_halaman);
$nomor = $mulai + 1;
$sql1 = $sql1 . " order by id desc limit $mulai,$per_halaman";
//
$previous = $page - 1;
$next = $page + 1;

$query = mysqli_query($conn, $sql1);


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
        <a href="DataPenggunaHosting.php" class="w3-bar-item w3-button">Data Pengguna Hosting</a>
        <a href="DataPenggunaVPS.php" class="w3-bar-item w3-button">Data Pengguna VPS</a>
        <a href="DataPengunjung.php" class="w3-bar-item w3-button">Data Pengunjung</a>
        <a href="DataPengajar.php" class="w3-bar-item w3-button">Data Pengajar</a>
        <a class="w3-bar-item w3-button" style="position: absolute; left: 0;bottom: 0;" href="../login/logout.php">
            <i class="fa fa-power-off fa-lg">
                <h7>
                    <b> Logout </b>
                </h7>
            </i>
        </a>
    </div>

    </div>

    <div id="main" style="margin-left: 18%;">
        <header class="p-3 mb-3 border-bottom" style="background-color: white; box-shadow: 1px 1px 6px 1px grey;">
            <div class="d-flex flex-wrap">
                <button id="openNav" class="w3-button w3-xlarge" style="padding:0px 16px; display: none"
                    onclick="w3_open()">&#9776;</button>
                <div class="dropdown text-end ms-auto">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle" />
                    </a>
                    <ul class="dropdown-menu text-small" style="">
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="w3-container">
            <h1 class="w3-center" style="font-family: 'Inter', sans-serif;">Data Pengguna Hosting</h1>
        </div>

        <div class="container-fluid">
            <div class="container-xl">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2 style="font-family: 'Inter', sans-serif;"><b>Data Pengguna Hosting</b></h2>
                                </div>
                                <div class="col-sm-4">
                                    <a href="#tambah-teks" class="btn btn-success align-center" data-toggle="modal"
                                        style="float: right;"><i class="material-icons">&#xE147;</i>
                                        <span>Tambah</span></a>
                                </div>
                            </div>
                            <!--Search bar -->
                        </div>
                        <form>
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col-5">
                                        <input type="text" class="form-control" placeholder="Nama / KTP / No HP"
                                            name="katakunci" value="<?php echo $katakunci ?>" />
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" name="cari" value="Cari Pengguna"
                                            class="btn btn-secondary" />
                                    </div>
                                    <div class="col-auto">
                                        <a href="DataPenggunaVPS.php">
                                            <input type="button" class="btn btn-primary" value="Refresh">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr style="font-family: 'Inter', sans-serif;">
                                    <th class="col-sm-1">No</th>
                                    <th class="col-md-4">Nomor KTP</th>
                                    <th class="col-md-4">Nama</th>
                                    <th class="col-md-4">Alamat</th>
                                    <th class="col-md-4">Nomor HP</th>
                                    <th class="col-md-4">Subdomain</th>
                                    <th class="col-md-4">Domain</th>
                                    <th class="col-sm-1">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($data = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <tr style="font-family: 'Inter', sans-serif;">
                                        <td>
                                            <?php echo $nomor++; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['ktp']; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['nama']; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['alamat']; ?>
                                        </td>
                                        <td>
                                            <?php echo '+62' . $data['hp']; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['subdomain']; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['domain']; ?>
                                        </td>
                                        <td>
                                            <a class='edit' title='Edit' data-toggle='tooltip'
                                                href="../edit/edit_penggunavps.php?id=<?php echo $data['id'] ?>"><i
                                                    class='material-icons'>&#xE254;</i></a>
                                            <a class='delete' title='Delete' data-toggle='tooltip'
                                                href="../delete/deletePenggunaVps.php?id=<?php echo $data['id']; ?>"
                                                onclick="return confirm('Apakah Yakin Hapus Data ?')"><i
                                                    class='material-icons'>&#xE872;</i></a>
                                        </td>
                                        <?php
                                }
                                ?>
                                </tr>
                            </tbody>
                        </table>

                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" <?php if ($page > 1) {
                                        echo "href='?page=$previous'";
                                    } ?>>Previous</a>
                                </li>
                                <?php
                                //Pagination (awal)
                                $cari = (isset($_GET['cari'])) ? $_GET['cari'] : "";
                                for ($i = 1; $i <= $pages; $i++) {
                                    ?>
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="DataPenggunaVPS.php?katakunci= <?php echo $katakunci ?>&cari=<?php echo $cari ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                                    </li>
                                    <?php
                                }
                                //Pagination (akhir)
                                ?>
                                <li class="page-item">
                                    <a class="page-link" <?php if ($page < $pages) {
                                        echo "href='?page=$next'";
                                    } ?>>Next</a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>

            <!-- Untuk Tampilan Add -->
            <div id="tambah-teks" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" id="contactForm" name="contactForm" class="contactForm"
                            action="../create/Tambah_PenggunaVPS.php">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Data Pengguna VPS</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" autocomplete="off" class="form-control" name="nama" id="nama"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor KTP</label>
                                    <input type="text" autocomplete="off" class="form-control" name="ktp" id="ktp"
                                        maxlength="16" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" autocomplete="off" class="form-control" name="alamat" id="alamat"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Nomor HP</label>
                                    <input type="text" autocomplete="off" class="form-control" name="hp" id="hp"
                                        maxlength="12" required>
                                </div>
                                <div class="form-group">
                                    <label>Sub Domain</label>
                                    <input type="text" autocomplete="off" class="form-control" name="subdomain"
                                        id="subdomain" required>
                                </div>
                                <div class="form-group">
                                    <label>Domain</label>
                                    <input type="text" autocomplete="off" class="form-control" name="domain" id="domain"
                                        required>
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