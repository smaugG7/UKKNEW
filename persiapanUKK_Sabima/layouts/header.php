<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi Pegaduan Masyarakat | Sabima Maulana Putra</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">Aplikasi Pengaduan Masyarakat</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
          <?php
          if ($_SESSION['login']=='admin') { ?>
           <a class="nav-link" href="index.php?=pengaduan">Data Pengaduan </a>
           <a class="nav-link" href="../config/aksi_logout.php">Keluar</a>


            <?php }  else if ($_SESSION['login']=='petugas'){ ?>
              <a class="nav-link" href="index.php?=pengaduan">Data Pengaduan </a>
              <a class="nav-link" href="../config/aksi_logout.php">Keluar</a>

            <?php }else if ($_SESSION['login']=='masyarakat'){ ?>
              <a class="nav-link" href="../config/aksi_logout.php">Keluar</a>

            <?php } else{ ?>
              <a class="nav-link" href="index.php?=registrasi">Daftar Akun</a>
              <a class="nav-link" href="?page=login">Login</a>


           <?php } ?>

          </li>
        </ul>
      </div>
    </div>
  </nav>