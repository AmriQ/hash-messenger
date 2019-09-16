<?php
require_once 'core/init.php';
if (!isset($_GET['email2'])) {
  header('Location: register.php');
} else {
  require_once 'view/header.php';
  ?>
  <div class="bungkus">
    <h3>Untuk menyelesaikan proses reset password silahkan cek email anda dan klik link reset<br> Email mungkin di kotak masuk atau di spam</h3>
  </div>
<?php
}
require_once 'view/footer.php';
?>