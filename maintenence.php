<?php
     include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet"  type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="datatables/datatables.js"></script>
    <title>Document</title>

<script type="text/javascript">
          $(document).ready(function() {
            $('#dt').DataTable();
          });
        </script>

</head>
<body>
<nav class="navbar navbar-expand-lg px-3" style="background-color:#ffffff00;">
  <div class="container-fluid" style="margin: 0px 150px;">
  <a href="index.php">
    <img src="logo.png" width="80px"/>
  </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      </ul>
      <span class="navbar-text"><a href="login.php" class="btn">
       LOGIN</a>
      </span>
    </div>
  </div>
</nav>

<div class="d-flex align-items-center justify-content-center flex-column "  style="height: 120vh; width: auto; font-size:x-large;     background-image: url(error1.png); background-size:cover;
" >
<div class="d-flex align-items-center justify-content-center flex-column" style="position: absolute; top: 450px; right: 450px">
    <h1 class="mt-10" style="">Dalam Tahap Pengembangan</h1>
    <p style="text-align:center;">maaf halaman yang anda cari masi dalam tahap pengembangan.</p>
   <div class="d-flex flex-row" style="">
    <a href="index.php" class="btn btn-success me-2">kembali</a>
   </div>
</div>
</div>
<div class="d-flex align-items-center justify-content-center flex-column "  style="height: 120vh; width: auto; font-size:x-large;     background-image: url(bg.jpg); background-size:cover;
" >
    
</div>