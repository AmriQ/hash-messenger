<?php
  session_start();
  require_once('functions/db.php');
  require_once('functions/function.php');
  if (isset($_SESSION['user'])) {
    header('location: index.php');
  }else {

  $error = '';

  if (isset($_POST['submit'])) {

     $email = $_POST['username'];
     $password_1 = $_POST['password_1'];
     $password_2 = $_POST['password_2'];

     if (!empty(trim($email)) && !empty(trim($password_1)) && !empty(trim($password_2))) {
       if (cek_user_login($email)) {
         if (strlen($sandi) >= 6) {
            if ($password_1 == $password_2) {
               if (verifikasi_password($password_1, $email)) {
                 header('location: verifikasi-password.php?email2='.$email);
               }else {
                 $error = "ada gangguan pada pendaftaran";
               }
            }else {
              $error = "password tidak sama";
            }
          }else {
            $error = "password terlalu pendek minimal 6";
          }
       }else {
         $error = 'Username belum terdaftar';
       }
     }else {
       $error = 'Email dan sandi kosong';
     }
   }
  require_once('view/header.php');
?>
  <main>
    <div class="bungkus">
      <form class="login" action="" method="post"><br>
        <input type="text" name="username" placeholder="Email" class="input_user" required><br>
        <input type="password" name="password_1" placeholder="Password baru" class="input_user"><br>
        <input type="password" name="password_2" placeholder="Ulangi password" class="input_user"><br>
        <p id="error"><?=$error?></p><br>
        <input type="submit" name="submit" value="Masuk" id="submit_user">
      </form>
    </div>
  </main>
<?php
}
require_once('view/footer.php');
?>
