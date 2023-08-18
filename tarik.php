<?php

include("koneksi.php");

session_start();
$id_users = $_SESSION['id_users'];
$username = $_SESSION['username'];


if( isset($_GET['id_setor']) ){

    // ambil id dari query string
    $id_setor = $_GET['id_setor'];

    // buat query hapus
    $sql = "UPDATE setor SET flag_tarik ='1' WHERE flag_tarik='0' AND setor.id_users='$_SESSION[id_users]';";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        echo "<script>alert('Data telah tersimpan')</script>";
        header('Location: saldo.php');
    } else {
        die("gagal tarik...");
    }

} else {
    die("akses dilarang...");
}

?>
