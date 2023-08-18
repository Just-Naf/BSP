<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>coba login</h1>
    <form action="" method="post">
        <input type="text" name="username" value="" placeholder="nama" required autofocus>
        <br>
        <input type="password" name="password" value="" placeholder="password" required>
        <br>
        <button type="submit" name="btnlogin">tambah</button>
    </form>
    <?php
    if (isset($_POST['btnlogin'])) {
        include "koneksi.php";
        $pesan=''; $redirect='';
        $un = $_POST['username'];
        $ps = md5($_POST['password']);

        $q = $koneksi->query("SELECT * FROM users WHERE username='$un'");
        $get_data = mysqli_fetch_array($q);

        if (empty($get_data)) {
            $pesan = "Username belum terdaftar";

        } else {
            if ($ps != $get_data['password'] ){
                $pesan = 'nama atau password salah';
            }else {
                session_start();
                $_SESSION['id_users'] = $get_data['id_users'];
                $_SESSION['username'] = $un;
                $pesan = 'selamat berhasil login';
                $redirect = 'data.php';
            }
        }
        echo ("<script languege='JavaScript'>
                window.alert('$pesan'); window.location.href='$redirect';
            </script>");
    }
    ?>
</body>
</html>