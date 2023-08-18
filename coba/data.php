<?php
    include "koneksi.php";

    session_start();
    $id_users = $_SESSION['id_users'];
    $username = $_SESSION['username'];
?>

<h1>nama : <?= $username; ?></h1>

<table border="1" width="100%">
    <tr>
        <th>no</th>
        <th>nama S</th>
        <th>juml S</th>
        <th>harga</th>
        <th>tgl</th>
    </tr>
    <tr>
        <?php
          $query = "SELECT setor.*, users.username,users.id_users, sampah.nama_sampah, sampah.harga_sampah FROM setor
                    INNER JOIN users ON  setor.id_users=users.id_users
                    INNER JOIN sampah ON setor.id_sampah=sampah.id_sampah;
                    ";
          $i=1;
          $sql=mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
          while ($value = mysqli_fetch_array($sql)) {  var_dump($value)?>
        <tr>
          <th><?= $i++?></th>
          <td><?= $value['nama_sampah']?></td>
          <td><?= $value['jumlah_sampah']?></td>
          <td><?= $value['harga_sampah']?></td>
          <td><?= $value['Tanggal']?></td>

        </tr>
    <?php
        }
        ?>
    </tr>
</table>