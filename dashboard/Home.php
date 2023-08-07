<!doctype html>
<?php
include("../login/pengecekanlogin.php");
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Utama</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../css/data.css">

    <script src="https://kit.fontawesome.com/177f980250.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="font-family: 'Inter', sans-serif;"
        id="mySidebar">
        <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
        <a href="Home.php" class="w3-bar-item w3-button">Home</a>
        <a href="DataPenggunaHosting.php" class="w3-bar-item w3-button">Data Pengguna Hosting</a>
        <a href="DataPenggunaVPS.php" class="w3-bar-item w3-button">Data Pengguna VPS</a>
        <a href="DataPengunjung.php" class="w3-bar-item w3-button">Data Pengunjung</a>
        <a href="DataPengajar.php" class="w3-bar-item w3-button">Data Pengajar</a>
    </div>
    <div id="main" style="font-family: 'Inter', sans-serif;">
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
                        <li><a class="dropdown-item" href="../login/logout.php">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="w3-container">
            <h1 class="w3-center">Halo Admin</h1>
        </div>

        <section class="p-5">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg">
                        <div class="card bg-primary-subtle text-secondary">
                            <div class="card-body text-center" style="height: 25rem">
                                <i class="fa-solid fa-cloud-arrow-up" style="font-size:90px"></i>
                                <h4>Data Pengguna Hosting</h4>
                                <p>
                                    Berisi informasi mengenai pengguna yang menggunakan layanan Hosting di PT. Teknologi
                                    Server Indonesia.
                                </p>
                                <a href="DataPenggunaHosting.php">
                                    <button type="button" class="btn btn-primary"
                                        style="position: absolute; top: 300px; left: 50px; right: 50px;">Selengkapnya</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="card bg-danger-subtle text-secondary">
                            <div class="card-body text-center" style="height: 25rem">
                                <i class="fa fa-server" style="font-size:90px"></i>
                                <h4>Data Pengguna VPS</h4>
                                <p>
                                    Berisi informasi mengenai pengguna yang menggunakan layanan VPS di PT. Teknologi
                                    Server Indonesia.

                                </p>
                                <a href="DataPenggunaVPS.php">
                                    <button href="DataPenggunaVPS.php" type="button" class="btn btn-danger"
                                        style="position: absolute; top: 300px; left: 50px; right: 50px;">Selengkapnya</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="card bg-warning-subtle text-secondary">
                            <div class="card-body text-center" style="height: 25rem">
                                <i class="fa fa-user" style="font-size:90px"></i>
                                <h4>Data Pengunjung</h4>
                                <p>
                                    Berisi informasi mengenai pengunjung di PT. Teknologi Server Indonesia.

                                </p>
                                <a href="DataPengunjung.php">
                                    <button href="DataPengunjung.php" type="button" class="btn btn-warning"
                                        style="position: absolute; top: 300px; left: 50px; right: 50px;">Selengkapnya</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="card bg-success-subtle text-secondary">
                            <div class="card-body text-center" style="height: 25rem">
                                <i class='fas fa-person-chalkboard' style='font-size:90px'></i>
                                <h4>Data Pengajar</h4>
                                <p>
                                    Berisi informasi mengenai pengajar di PT. Teknologi Server Indonesia.

                                </p>
                                <a href="DataPengajar.php">
                                    <button href="DataPengajar.php" type="button" class="btn btn-success"
                                        style="position: absolute; top: 300px; left: 50px; right: 50px;">Selengkapnya</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
</body>

</html>