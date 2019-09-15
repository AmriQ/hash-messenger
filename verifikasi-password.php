<?php
  session_start();
  require_once('functions/db.php');
  require_once('functions/function.php');
  if (!isset($_GET['email2'])) {
    header('Location: register.php');
  }else {
    require_once('view/header.php');
?>
    <main>
      <div class="bungkus">
        <h3>Untuk menyelesaikan proses reset password silahkan cek email anda dan klik link reset<br> Email mungkin di kotak masuk atau di spam</h3>
      </div>
    </main>
<?php
  }
  require_once('view/footer.php');
?>
