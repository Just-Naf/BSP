<?php
     include "koneksi.php";
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
 


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
<nav class="navbar navbar-expand-lg" style="background-color: rgba(127, 255, 0, 1.0); position:sticky; top:0;">
  <div class="container-fluid">
    <img src="logo.png" width="60px"/>
    <a href="logout.php" class="btn">Logout</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      </ul>
      <?php
      echo "<span class='navbar-text'>". $_SESSION['username'] ."</span>";
      ?>
    </div>
  </div>
</nav>

<div class=" container-fluid   d-flex align-items-start justify-content-center  flex-column" style="height: 500px;" >
   <?php echo "<h1 class='pt-5'>Selamat Datang, " . $_SESSION['username'] ."</h1>"; ?>
    <p>ini adalah website resmi dari BANK SAMPAH BANTUL Daerah Istimewa Yogyakarta (DIY).<br>Disini anda dapat menjual barang bekas anda yang sudah tidak terpakai</p>
   <div class="d-flex flex-row">
    <a href="data_harga.php" class="btn btn-primary me-2">Data Sampah</a>
    <a href="form_jual.php" class="btn btn-primary">Jual Sampah</a></div>
</div>
<center>
lihat data penjualan ada<br>   
<span class="material-symbols-outlined">
keyboard_double_arrow_down
</span></center>

<table id="dt" class="table align-middle   cell-border stripe hover">
          <thead>
            <tr>
              <th><center>No.</center></th>
              <th>id</th>
              <th>Username</th>
              <th>Barang</th>
              <th>jumlah</th>
              <th>harga</th>
              <th>tanggal</th>
              <th>total</th>
            </tr>
            </thead>
          <tbody>
            <?php 
            $no=1;
            $total=0;
            $query = "SELECT setor.*, users.username,users.id_users, sampah.nama_sampah, sampah.harga_sampah FROM setor 
                   INNER JOIN users ON  setor.id_users=users.id_users
                   INNER JOIN sampah ON setor.id_sampah=sampah.id_sampah;";
            $sql=mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
            while ($data = mysqli_fetch_array($sql)) 
            { $total = $data['harga_sampah'] * $data['jumlah_sampah']; ?>
            <tr>
              <td><?=$no++?>.</td>
              <td><?=$data['id_users']?>.</td>
              <td><?=$data['username']?>.</td>
              <td><?=$data['nama_sampah']?>.</td>
              <td><?=$data['jumlah_sampah']?>.</td>
              <td>Rp.<?=$data['harga_sampah']?>.</td>
              <td><?=$data['Tanggal']?>.</td>
              <td>Rp.<?php echo number_format($total);?>.</td>
            </tr>
            <?php
            }
        ?>
            </tbody>
        </table>

</body>
</html>