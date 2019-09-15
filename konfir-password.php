<?php
 require_once 'core/init.php';

  if (isset($_GET['email'], $_GET['kode'])) {
    if (cek_password($_GET['email'], $_GET['kode'])) {

      if (reset_password($_GET['email'], $_GET['kode'])) {
        $_SESSION['user'] = $_GET['email'];
        header('location: index.php');
      }

    }else {
      echo "<h2>password sama tidak perlu dirubah</h2>";
    }

  }else{
    echo "<h2>konfirmasi email gagal</h2>";
  }
