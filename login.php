<?php
require_once 'core/init.php';

if (isset($_SESSION['user'])) {
  header('location: index.php');
} else {

  $error = '';
  if (isset($_POST['submit'])) {
    $email = $_POST['username'];
    $sandi = $_POST['password'];

    if (!empty(trim($email)) && !empty(trim($sandi))) {
      if (cek_user_login($email)) {
        if (login_user($email, $sandi)) {
          $_SESSION['user'] = $email;
          header('location: index.php');
        } else {
          $error = 'password salah';
        }
      } else {
        $error = 'username belum terdaftar';
      }
    } else {
      $error = 'Email dan password kosong';
    }
  }
  require_once 'view/header.php';
  ?>
  <main>
    <div class="bungkus">
      <form class="login" action="" method="post"><br>
        <input type="text" name="username" placeholder="Email" class="input_user"><br>
        <input type="password" name="password" placeholder="password" class="input_user"><br>
        <p id="error"><?= $error ?></p><br>
        <a href="reset-password.php" id="reset_password">Reset Password</a><br><br>
        <input type="submit" name="submit" value="Masuk" id="submit_user">
      </form>
    </div>
  </main>
<?php
}
require_once 'view/footer.php';
?>