<?php
session_start();
require_once('functions/db.php');
require_once('functions/function.php');

  if (isset($_SESSION['user'])) {
    header('location: index.php');
  }else {

    $error = '';
    if (isset($_POST['submit'])) {
      $nama = $_POST['name'];
      $email = $_POST['username'];
      $sandi = $_POST['password'];

      if (!empty(trim($email)) && !empty(trim($sandi)) && !empty(trim($nama))) {
        if(!preg_match("/^[a-zA-Z_]*$/",$nama) ){
    			$error = "Tidak boleh menggunakan spasi";
    		}else{
          if (strlen($sandi) >= 5) {

            if (cek_user_register($email)) {
              
              if (verifikasi_email($email, $nama, $sandi)) {
                header('location: verifikasi.php?nama='.$nama);
              }else {
                $error = 'ada kesalahan saat mendaftar';
              }
            }else {
              $error = 'Username sudah ada';
            }
          }else {
            $error = "password terlalu pendek minimal 5";
          }
        }
      }else {
        $error = 'Email dan sandi kosong';
      }
    }
    require_once('view/header.php');
?>
    <main>
      <div class="bungkus">
        <form class="register" action="register.php" method="post"><br>
          <input type="text" name="name" placeholder="Nama" class="input_user"><br>
          <input type="text" name="username" placeholder="Email" class="input_user" required><br>
          <input type="password" name="password" placeholder="password" class="input_user"><br>
          <p id="error"><?=$error?></p><br>
          <input type="submit" name="submit" value="Daftar" id="submit_user">
        </form>
      </div>
    </main>
<?php
  }
  require_once('view/footer.php');
?>
