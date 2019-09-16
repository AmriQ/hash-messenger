<?php
require_once 'core/init.php';
if (!isset($_GET['nama'])) {
  header('Location: register.php');
} else {
  require_once 'view/header.php';
  ?>
  <div class="bungkus">
    <h3>Haloo,<?= $_GET['nama'] ?> <br>Untuk menyelesaikan proses pendaftaran silahkan cek email anda dan klik link aktivasi <br> Email mungkin di kotak masuk atau di spam</h3>
  </div>
<?php
}
require_once 'view/footer.php';
?>