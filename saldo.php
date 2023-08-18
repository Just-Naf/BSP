<?php
    include "koneksi.php";

    session_start();
    $id_users = $_SESSION['id_users'];
    $username = $_SESSION['username'];

//$tampilPeg=mysqli_query($koneksi, "SELECT * FROM setor WHERE username='$_SESSION[username]'");
//$peg=mysqli_fetch_array($tampilPeg);
//var_dump($peg);

//Query untuk menampilkan tabel jenis kelamin

//Query untuk menampilkan tabel mahasiswa2


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BANK SAMPAH</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="./images/favicon.png" />
  </head>
  <body>



    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="" href="index.html">
            <img src="gb-1.png" alt="logo" class="mt-5" width="30%" height="30%" />   
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <form class="search-form d-none d-md-block" action="#">
              <i class="icon-magnifier"></i>
              <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>


            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ml-2" src="images/faces/face8.jpg" alt="Profile image"> <?php
                echo "<span class='navbar-text'><b>". $_SESSION['username'] ."</b></span>";?></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <a href="logout.php" class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">


              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dasbor.php">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">UI Elements</span></li>
            <li class="nav-item">
              <a class="nav-link" href="saldo.php">
                <span class="menu-title">Saldo Anda</span>
                <i class="icon-chart menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dtsampah.php">
                <span class="menu-title">Data Sampah</span>
                <i class="icon-grid menu-icon"></i>
              </a>
            </li>

          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row purchace-popup">
              <div class="col-12 stretch-card grid-margin">
                <div class="card card-secondary">

                </div>
              </div>
            </div>     
               
             <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Riwayat Penjualan</h4>
                      <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Products</a>
                    </div>


                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">No</th>
                            <th class="font-weight-bold">nama</th>
                            <th class="font-weight-bold">barang</th>
                            <th class="font-weight-bold">jumlah</th>
                            <th class="font-weight-bold">harga</th>
                            <th class="font-weight-bold">Tanggal</th>
                            <th class="font-weight-bold">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
            $no=1;
            $query = "SELECT setor.id_users, users.username, setor.jumlah_sampah, setor.Tanggal,  
            sampah.harga_sampah, 
            sampah.nama_sampah, 
            SUM(setor.jumlah_sampah) * sampah.harga_sampah AS harga_total 
            FROM setor 
            INNER JOIN users ON  setor.id_users=users.id_users
            INNER JOIN sampah ON setor.id_sampah=sampah.id_sampah
            WHERE setor.id_users='$_SESSION[id_users]'
            GROUP BY setor.id_setor;";
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
              <td><?=$data['jumlah_sampah']?></td>
              <td><?=$data['harga_sampah']?></td>
              <td><?=$data['harga_total']?></td>
              <td><?=$data['Tanggal']?>.</td>
            </tr>
                          <?php
            }
        ?>
                        </tbody>
                      </table>

                      <?php
                    
                      ?>

                    </div>
                    <div class="d-flex mt-4 flex-wrap">
                      <p class="text-muted">Showing 1 to 10 of 57 entries</p>
                      <nav class="ml-auto">
                        <ul class="pagination separated pagination-info">
                          <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-left"></i></a></li>
                          <li class="page-item active"><a href="#" class="page-link">1</a></li>
                          <li class="page-item"><a href="#" class="page-link">2</a></li>
                          <li class="page-item"><a href="#" class="page-link">3</a></li>
                          <li class="page-item"><a href="#" class="page-link">4</a></li>
                          <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-right"></i></a></li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Sessions by channel</h4>
                    <div class="aligner-wrapper">
                      <canvas id="grafik" height="210"></canvas>
                      <div class="wrapper d-flex flex-column justify-content-center absolute absolute-center">
                        <h2 class="text-center mb-0 font-weight-bold">8.234</h2>
                        <small class="d-block text-center text-muted  font-weight-semibold mb-0">Total Leads</small>
                      </div>
                    </div>
                    <div class="wrapper mt-4 d-flex flex-wrap align-items-cente">
                      <div class="d-flex">
                        <span class="square-indicator bg-danger ml-2"></span>
                        <p class="mb-0 ml-2">Assigned</p>
                      </div>
                      <div class="d-flex">
                        <span class="square-indicator bg-success ml-2"></span>
                        <p class="mb-0 ml-2">Not Assigned</p>
                      </div>
                      <div class="d-flex">
                        <span class="square-indicator bg-warning ml-2"></span>
                        <p class="mb-0 ml-2">Reassigned</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body performane-indicator-card">
                    <div class="d-sm-flex">
                      <h4 class="card-title flex-shrink-1">Performance Indicator</h4>
                      <p class="m-sm-0 ml-sm-auto flex-shrink-0">
                        <span class="data-time-range ml-0">7d</span>
                        <span class="data-time-range active">2w</span>
                        <span class="data-time-range">1m</span>
                        <span class="data-time-range">3m</span>
                        <span class="data-time-range">6m</span>
                      </p>
                    </div>
                    <div class="d-sm-flex flex-wrap">
                      <div class="d-flex align-items-center">
                        <span class="dot-indicator bg-primary ml-2"></span>
                        <p class="mb-0 ml-2 text-muted font-weight-semibold">Complaints (2098)</p>
                      </div>
                      <div class="d-flex align-items-center">
                        <span class="dot-indicator bg-info ml-2"></span>
                        <p class="mb-0 ml-2 text-muted font-weight-semibold"> Task Done (1123)</p>
                      </div>
                      <div class="d-flex align-items-center">
                        <span class="dot-indicator bg-danger ml-2"></span>
                        <p class="mb-0 ml-2 text-muted font-weight-semibold">Attends (876)</p>
                      </div>
                      <div class="table-responsive border rounded p-1">
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
            include "koneksi.php";
            $no=1;
            $query2 = "SELECT users.id_users, users.username, setor.id_setor, 
            SUM(setor.jumlah_sampah)  AS jumlah_total_sam, 
            SUM(setor.jumlah_sampah * sampah.harga_sampah) AS tabungan
            FROM setor
            INNER JOIN users ON  setor.id_users=users.id_users
            INNER JOIN sampah ON setor.id_sampah=sampah.id_sampah
            WHERE setor.id_users='$_SESSION[id_users]' AND flag_tarik='0';";
            $sql2=mysqli_query($koneksi, $query2) or die (mysqli_error($koneksi));
            //$t = mysqli_fetch_array($sql);
            while ($data2 = mysqli_fetch_array($sql2))
            //var_dump($t['username']);
            //while ($data2 = mysqli_fetch_array($sql2)) 
            { //$total = $data['harga_sampah'] + $data['harga_total'];
             ?>
            <tr>
              <td><?=$no++?></td>
              <td><?=$data2['id_users']?></td>
              <td><?=$data2['username']?></td>
              <td><?=$data2['tabungan']?></td>

            </tbody>              
            <?php
              echo "<a href='tarik.php?id_setor=".$data2['id_setor']."' class='btn btn-danger'>tarik</a>";

            }
        ?>
        </table>

                    </div>

                    </div>
                    <div id="performance-indicator-chart" class="ct-chart mt-4"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row income-expense-summary-chart-text">
                      <div class="col-xl-4">
                        <h5>Income And Expenses Summary</h5>
                        <p class="small text-muted">A comparison of people who mark themselves of their ineterest from the date range given above. Learn more.</p>
                      </div>
                      <div class=" col-md-3 col-xl-2">
                        <p class="income-expense-summary-chart-legend"> <span style="border-color: #6469df"></span> Total Income </p>
                        <h3>$ 1,766.00</h3>
                      </div>
                      <div class="col-md-3 col-xl-2">
                        <p class="income-expense-summary-chart-legend"> <span style="border-color: #37ca32"></span> Total Expense </p>
                        <h3>$ 5,698.30</h3>
                      </div>
                      <div class="col-md-6 col-xl-4 d-flex align-items-center">
                        <div class="input-group" id="income-expense-summary-chart-daterange">
                          <div class="inpu-group-prepend input-group-text"><i class="icon-calendar"></i></div>
                          <input type="text" class="form-control">
                          <div class="input-group-prepend input-group-text"><i class="icon-arrow-down"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="row income-expense-summary-chart mt-3">
                      <div class="col-md-12">
                        <div class="ct-chart" id="income-expense-summary-chart"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <script>
    var ctx = document.getElementById('grafik').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
            labels: [<?php echo $nama_sm; ?>],
            datasets: [{
                label:'Data Sampah',
                backgroundColor: ['rgba(225, 0, 0, 0.5)', 'rgb( 0, 0, 252, 0.5)','rgb(255, 105, 180, 0.5)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah; ?>]
            },
            ]
        },
    })
    </script>
  </body>
</html>