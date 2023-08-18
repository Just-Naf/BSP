<?php 
 
include 'koneksi.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: login.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($koneksi, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, password)
                    VALUES ('$username', '$password')";
            $result = mysqli_query($koneksi, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="login.css">
 
    <title>Register</title>
</head>
<body>
<div class="login-container">
  <form action="" method="POST" class="login-form">
    <div class="login-form-inner">
      <h1>Register</h1>
      <p class="body-text">See your growth and get consulting support!</p>


      <div class="sign-in-seperator">
        <span>Sign in with Username</span>
      </div>

      <div class="login-form-group">
        <label for="username">Username <span class="required-star">*</span></label>
        <input type="text" placeholder="Your Username" id="username" name="username" value="<?php echo $username; ?>">
      </div>
      <div class="login-form-group">
          <label for="pwd">Password <span class="required-star">*</span></label>
          <input type="password" name="password" placeholder="Minimum 8 characters" id="pwd" value="<?php echo $password; ?>" required>
        </div>
        <div class="login-form-group">
            <label for="pwd">Password <span class="required-star">*</span></label>
            <input type="password" name="cpassword" placeholder="Minimum 8 characters" id="pw" value="<?php echo $cpassword; ?>" required>
        </div>
            <div class="register-div">yuo have account? <a href="login.php" class="link create-account" -link>Login</a></div>
  
       <button name="submit" class="rounded-button login-cta">Register</button>

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
    
    <!--<div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Kalian sudah punya akun? <a href="login.php">Login </a></p>
        </form>
    </div>-!>