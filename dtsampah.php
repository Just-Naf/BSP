<?php
    include "koneksi.php";

    session_start();
    $username = $_SESSION['username'];

//$tampilPeg=mysqli_query($koneksi, "SELECT * FROM setor WHERE username='$_SESSION[username]'");
//$peg=mysqli_fetch_array($tampilPeg);
//var_dump($peg);

//Query untuk menampilkan tabel jenis kelamin
$nama_sm= "";
$jumlah=null;

$sql="SELECT id_sampah,COUNT(*) as 'total' FROM setor GROUP by id_sampah";

$hasil=mysqli_query($koneksi,$sql);

while ($data = mysqli_fetch_array($hasil)) {
$sm=$data['id_sampah'];
$nama_sm .= "'$sm'". ", ";

$jum=$data['total'];
$jumlah .= "$jum". ", ";

}
//Query untuk menampilkan tabel mahasiswa2


?>

<?php
        $id_usr= "";
        $jumlah=null;

        $sql="SELECT id_users,COUNT(*) as 'total' FROM users";

          $hasil=mysqli_query($koneksi,$sql);

    while ($data = mysqli_fetch_array($hasil)) {

        $jum=$data['total'];
        $jumlah .= "$jum". ", ";
    }

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
    <!-- fontawsome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <!-- bootstrap js -->
    
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
              <a class="nav-link" href="dtsampah.php">
                <span class="menu-title">Data Sampah</span>
                <i class="icon-chart menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/tables/basic-table.html">
                <span class="menu-title">Tables</span>
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
            
            
            <?php
     include "koneksi.php";

     $query = "SELECT * FROM sampah;";
     $sql = mysqli_query($koneksi, $query );
     $no = 0;
?>
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
            echo "<a href='edit_sampah.php?id_sampah=".$data['id_sampah']."' class='btn btn-success ml-1'>Edit</a>";
            echo "<a href='hapus.php?id_sampah=".$data['id_sampah']."' class='btn btn-danger'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>
        <a href="form_jual.php" class="mt-5 btn btn-primary">Jual Barang</a>
        <a href="tambah_sampah.php" class="mt-5 btn btn-primary">Tambah Barang</a>
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