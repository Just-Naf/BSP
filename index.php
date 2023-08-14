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

<div class="d-flex align-items-center justify-content-center flex-column "  style="height: 120vh; width: auto; font-size:x-large;     background-image: url(bg.jpg); background-size:cover;
" >
    <h1 class="" style="">Selamat Datang Di Bank Sampah</h1>
    <p style="text-align:center;">ini adalah website resmi dari BANK SAMPAH BANTUL Daerah Istimewa Yogyakarta (DIY).<br>Disini anda dapat menjual barang bekas anda yang sudah tidak terpakai</p>
   <div class="d-flex flex-row" style="">
    <a href="data_harga.php" class="btn btn-primary me-2">Data Sampah</a>
    <a href="form_jual.php" class="btn btn-primary ">Jual Sampah</a></div>
    <center>
    <p class="fs-5" style="margin-top:150px; margin-bottom: 100px;">lihat data penjualan ada<br>   
    <span class="material-symbols-outlined">
    keyboard_double_arrow_down
    </span></p></center>
</div>


<div class="parent">
<div class="div1">
  <div class="dutaSam"></div>
  <div class="dutaSam2"></div>
</div>
<div class="div2">
  <div class="nas row">
    <div class="col">
  <p class="text-center">2023</p>
  <h5 class="text-center">nama</h5>
    </div>
    <div class="col">
  <p class="text-center">2023</p>
  <h5 class="text-center">nama</h5>
    </div>
    <div class="col">
  <p class="text-center">2023</p>
  <h5 class="text-center">nama</h5>
    </div>
  </div> 
  <a href="#"class="btn btn-success p-3 mt-2 px-5 rounded-pill">cari tau lebih lanjut</a>
</div>
<div class="div3">    
  <h1>Visi Kami Terciptanya Lingkungan Yang Lestari</h1>
  <p>Sistem Bank Sampah Digital mendorong partisipasi aktif untuk memilah dan menabung sampah dengan bertujuan untuk membuat masyarakat lebih berdaya, lingkungan lebih <br>lestari dan membangun budaya gotong royong antar masyarakat</p>
</div>
</div>

          <div class="m-5 p-3 shadow rounded" >
<table id="dt" class="table align-middle cell-border stripe hover">
          <thead>
            <tr>
              <th class="text-center">No.</th>
              <th class="text-center">Username</th>
              <th class="text-center">Barang</th>
              <th class="text-center">jumlah</th>
              <th class="text-center">harga</th>
              <th class="text-center">tanggal</th>
              <th class="text-center">total</th>
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
              <td><?=$data['username']?></td>
              <td><?=$data['nama_sampah']?></td>
              <td><?=$data['jumlah_sampah']?></td>
              <td>Rp.<?=$data['harga_sampah']?></td>
              <td><?=$data['Tanggal']?></td>
              <td>Rp.<?php echo number_format($total);?></td>
            </tr>
            <?php
            }
        ?>
            </tbody>
        </table>
        </div>


        <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative  to help the upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as the code wants to be simple. We will help programmers build up concepts in different programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
            <ul class="footer-links">
              <li><a href="http://scanfcode.com/category/c-language/">C</a></li>
              <li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
              <li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
              <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
              <li><a href="http://scanfcode.com/category/android/">Android</a></li>
              <li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="http://scanfcode.com/about/">About Us</a></li>
              <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
              <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
              <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
              <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by 
         <a href="#">Scanfcode</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>
</body>
</html>