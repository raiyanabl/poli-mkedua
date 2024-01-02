<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once("koneksi.php");
?>
<!doctype html>
<html lang="en">


<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poliklinik UDINUS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Sistem Informasi Poliklinik UDINUS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
               

                <?php
                if (isset($_SESSION['username' . 'nama'])) {
                ?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="Logout.php">Logout (<?php echo $_SESSION['username' . 'nama'] ?>)</a>
                        </li>
                    </ul>
                <?php
                } else {
                ?>
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=loginAdmin">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=loginDokter">Dokter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=loginPasien">Pasien</a>
                        </li>
                    </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
    <div>
        

    <?php
    if (isset($_GET['page'])) {
        if ($_GET['page'] === 'login') {
            include("loginAdmin.php");
        } elseif ($_GET['page'] === 'loginAdmin') {
            include("loginAdmin.php");
        } elseif ($_GET['page'] === 'loginPasien') {
            include("loginPasien.php");
        } else {
            include($_GET['page'] . ".php");
        }
        
    } else {
        echo "<br><h2>&nbsp;Selamat Datang di Sistem Temu Janji Pasien - Dokter!";

        if (isset($_SESSION['username' . 'nama'])) {
            echo ", " . $_SESSION['username' . 'nama'] . "</h2><hr>";
        } else {
            echo "</h2><hr>&nbsp;&nbsp;﻿
            Silakan login untuk mengakses akun Anda. Jika Anda belum memiliki akun, silakan melakukan registrasi untuk mendapatkan akses penuh ke Poliklinik UDINUS.";
        }
    }
    ?><hr>
 
</html>
</body>
