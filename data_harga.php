<?php
     include "koneksi.php";

     $query = "SELECT * FROM sampah;";
     $sql = mysqli_query($koneksi, $query );
     $no = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
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
<div class="container">
  <center class="mt-4 fs-semibold"><h2>DATA SAMPAH</h2></center>
    <table border="1" class="table align-middle mt-5">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>harga</th>
            <th>Opsi</th>

        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM sampah";
        $query = mysqli_query($koneksi, $sql);

        while($data = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>". ++$no."</td>";
            echo "<td>".$data['nama_sampah']."</td>";
            echo "<td>".$data['harga_sampah']."</td>";

            echo "<td>";
            //echo "<a href='edit_sampah.php?id_sampah=".$data['id_sampah']."' class='btn btn-success ml-1'>Edit</a>";
            //echo "<a href='hapus.php?id_sampah=".$data['id_sampah']."' class='btn btn-danger'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>
        <!--<a href="form_jual.php" class="btn btn-primary ">Jual Barang</a>
        <a href="tambah_sampah.php" class="btn btn-primary">Tambah Barang</a>-->
        </div>
</body>
</html>