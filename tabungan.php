<?php include 'koneksi.php';
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
  <a href="index.php">
    <img src="logo.png" width="60px"/>
  </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      </ul>
      <span class="navbar-text">
        NAMA USER
      </span>
    </div>
  </div>
</nav> 


<table id="dt" class="table align-middle   cell-border stripe hover">
          <thead>
            <tr>
              <th><center>No.</center></th>
              <th>id</th>
              <th>Username</th>
              <th>Barang</th>
              <th>jumlah</th>
              <th>harga satuan</th>
              <th>harga</th>
              <th>tanggal</th>
            </tr>
            </thead>
          <tbody>
            <?php 
            $no=1;
            $query = "SELECT setor.*, 
            SUM(sampah.harga_sampah) AS cek, 
            users.username,users.id_users, sampah.nama_sampah,  
            SUM(setor.jumlah_sampah)  AS jumlah_total, 
            SUM(setor.jumlah_sampah) * sampah.harga_sampah AS harga_total 
            FROM setor 
            INNER JOIN users ON  setor.id_users=users.id_users
            INNER JOIN sampah ON setor.id_sampah=sampah.id_sampah
            GROUP BY users.id_users, sampah.nama_sampah;";
            $sql=mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
            //$sql2=mysqli_query($koneksi, $query2) or die (mysqli_error($koneksi));
            //$t = mysqli_fetch_array($sql);
            while ($data = mysqli_fetch_array($sql))
            //var_dump($t['username']);
            //while ($data2 = mysqli_fetch_array($sql2)) 
            { //$total = $data['harga_sampah'] + $data['harga_total'];
             ?>
            <tr>
              <td><?=$no++?>.</td>
              <td><?=$data['id_users']?>.</td>
              <td><?=$data['username']?>.</td>
              <td><?=$data['nama_sampah']?>.</td>
              <td><?=$data['jumlah_total']?></td>
              <td><?=$data['cek']?></td>
              <td><?=$data['harga_total']?></td>
              <td><?=$data['Tanggal']?>.</td>
            </tr>
            <?php
            }
        ?>
            </tbody>
        </table>

        <table id="dt" class="table align-middle   cell-border stripe hover">
          <thead>
            <tr>
              <th><center>No.</center></th>
              <th>id</th>
              <th>Username</th>
              <th>tabungan</th>
            </tr>
            </thead>
          <tbody>
            <?php 
            $no=1;
            $query2 = "SELECT setor.*, 
            SUM(sampah.harga_sampah) AS cek, 
            users.username,users.id_users,
            SUM(setor.jumlah_sampah)  AS jumlah_total, 
            SUM(setor.jumlah_sampah * sampah.harga_sampah) AS tabungan 
            FROM setor 
            INNER JOIN users ON  setor.id_users=users.id_users
            INNER JOIN sampah ON setor.id_sampah=sampah.id_sampah
            GROUP BY users.id_users;";
            //$sql=mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
            $sql2=mysqli_query($koneksi, $query2) or die (mysqli_error($koneksi));
            //$t = mysqli_fetch_array($sql);
            while ($data2 = mysqli_fetch_array($sql2))
            //var_dump($t['username']);
            //while ($data2 = mysqli_fetch_array($sql2)) 
            { //$total = $data['harga_sampah'] + $data['harga_total'];
             ?>
            <tr>
              <td><?=$no++?>.</td>
              <td><?=$data2['id_users']?>.</td>
              <td><?=$data2['username']?>.</td>
              <td><?=$data2['tabungan']?>.</td>
            <?php
            }
        ?>
            </tbody>
        </table>
</body>
</html>