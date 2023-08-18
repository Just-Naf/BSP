<?php
    if (isset($_POST['submit'])) {
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
                $redirect = 'dasbor.php';
            }
        }
        echo ("<script languege='JavaScript'>
                window.alert('$pesan'); window.location.href='$redirect';
            </script>");
    }
    ?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="login.css">
 
    <title>Skanibar Tutorial</title>
</head>
<body>
<div class="login-container">
  <form action="" method="POST" class="login-form">
    <div class="login-form-inner">
      <h1>Login</h1>
      <p class="body-text">See your growth and get consulting support!</p>


      <div class="sign-in-seperator">
        <span>Sign in with Username</span>
      </div>

      <div class="login-form-group">
        <label for="username">Username <span class="required-star">*</span></label>
        <input type="text" placeholder="Your Username" id="username" name="username">
      </div>
      <div class="login-form-group">
        <label for="pwd">Password <span class="required-star">*</span></label>
        <input autocomplete="off" type="password" name="password" placeholder="Minimum 8 characters" id="pwd">
      </div>
            <div class="register-div">Not registered yet? <a href="register.php" class="link create-account" -link>Create an account ?</a></div>
  
       <button name="submit" class="rounded-button login-cta">Login</button>

  </div>

  </form>
  <div class="onboarding">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide color-1">
          <div class="slide-image">
            <img src="https://raw.githubusercontent.com/ismailvtl/ismailvtl.github.io/master/images/startup-launch.png" loading="lazy" alt="" />
          </div>
          <div class="slide-content">
            <h2>Turn your ideas into reality.</h2>
            <p>Consistent quality and eperience across all platform and devices</p>
          </div>
        </div>


      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
    </div>
  </div>
</div>


    </body>
    </html>
