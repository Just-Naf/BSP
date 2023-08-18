<!DOCTYPE html>

<?php
include 'koneksi.php';

$id_setor = '';
$id_users = '';
$username = '';
$nama_sampah = '';
$id_sampah = '';
$jumlah_sampah = '';
$harga_sampah = '';

if(isset($_GET['ubah'])){
$id_siswa = $_GET['ubah'];


$sql = mysqli_query($koneksi,"SELECT sampah.id_sampah, setor.id_sampah, users.id_users
FROM sampah
JOIN setor ON setor.id_setor = sampah.id_sampah
JOIN users ON users.id_users = sampah.id_sampah
;");

$result = mysqli_fetch_assoc($sql);

$id_setor = $result['id'];
$id_users = $result['nik'];
$username = $result['username'];
$nama_sampah = $result['nama_sampah'];
$id_sampah = $result['no'];
$jumlah_sampah = $result['jumlah_sampah'];
$harga_sampah = $result['harga'];

    //var_dump($result);

    //die();
    
  }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

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
        NAMA USERS
      </span>
    </div>
  </div>
</nav>
      <div class="container-fluid mt-4">
        <form method="POST" action="" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $id_setor; ?>" name="id_setor">
        <div class="mb-3 row">
              <label for="id_users" class="col-sm-2 col-form-label">NIK</label>
              <div class="col-sm-10">
                <input required type="text" name="id_users" class="form-control" id="id_users" placeholder="123132" value="<?php echo $id_users; ?>">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="username" class="col-sm-2 col-form-label">username</label>
              <div class="col-sm-10">
                <select required id="username" name="username" class="form-select">
                <option>---</option>
                <?php
                include "koneksi.php";
                $query = mysqli_query($koneksi,"SELECT * FROM users") or die (mysqli_error($koneksi));
                while($data = mysqli_fetch_array($query)){
                    echo "<option value=$data[id_users]> $data[username] </option>";
                }
                ?>
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="id_sampah" class="col-sm-2 col-form-label">Sampah</label>
              <div class="col-sm-10">
                <select required id="id_sampah" name="id_sampah" class="form-select">
                <option>---</option>
                <?php
                include "koneksi.php";
                $query = mysqli_query($koneksi,"SELECT * FROM sampah") or die (mysqli_error($koneksi));
                while($data = mysqli_fetch_array($query)){
                    echo "<option value=$data[id_sampah]> $data[nama_sampah] </option>";
                }
                ?>
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="jumlah_sampah" class="col-sm-2 col-form-label">jumlah</label>
              <div class="col-sm-10">
                <input required type="text" name="jumlah_sampah" class="form-control" id="jumlah_sampah" placeholder="99" value="<?php echo $jumlah_sampah; ?>">
              </div>
            </div>
            <div class="mb-3 row mt-4">
              <div class="col">
              <?php
              if(isset($_GET['ubah'])){
              ?>
                <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                <i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan Perubahan
                </button>
                <?php
              } else {
              ?>
                  <button type="submit" name="proses" value="simpan" class="btn btn-success">
                <i class="fa fa-floppy-o" aria-hidden="true"></i>Jual
                </button>
              <?php
              } 
              ?>
              <a href="index.php" type="button" class="btn btn-danger">
              <i class="fa fa-reply" aria-hidden="true"></i> Batal
              </a>
              </div>     
              </div>
          </form>
        </div>
</body>
</html>
<?php

if(isset($_POST['proses'])){

    mysqli_query($koneksi,"INSERT INTO setor SET
    id_users = '$_POST[id_users]',
    id_sampah = '$_POST[id_sampah]',
    jumlah_sampah = '$_POST[jumlah_sampah]'") or die(mysqli_error($koneksi));
    
    echo "<script>alert('Data telah tersimpan')</script>";
}
 
?>