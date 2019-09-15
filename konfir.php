<?php
  session_start();
  require_once('functions/db.php');
  require_once('functions/function.php');

  if (isset($_GET['email'], $_GET['kode'], $_GET['username'])) {
    if (cek_user_register($_GET['email'])) {

      if (register_user($_GET['username'], $_GET['email'], $_GET['kode'])) {
        $_SESSION['user'] = $_GET['email'];
        header('location: index.php');
      }

    }else {
      echo "<h2>user sudah terdaftar</h2>";
    }

  }else{
    echo "<h2>konfirmasi email gagal</h2>";
  }
?>
