<?php

include "koneksi.php";

if( isset($_GET['id_setor']) ){

    // ambil id dari query string
    $id_setor = $_GET['id_setor'];

    // buat query hapus
    $sql = "UPDATE setor SET flag ='1' WHERE flag='0' AND setor.id_users = 1;";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: dasbor.php');
        die("selamat saldo anda berhasil di tarik");
    } else {
        die("gagal tarik...");
    }

} else {
    die("akses dilarang...");
}

?>
