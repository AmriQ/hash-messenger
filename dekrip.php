<?php
  session_start();
  require_once('functions/db.php');
  require_once('functions/function.php');

  if (!isset($_SESSION['user'])) {
    header('Location: login.php');
  }else{

    $error = '';
    $notif_pesan = '';
    $nama_penerima = tampilkan_user();

    if (isset($_POST['submit_hash'])) {
      $isi_hash = $_POST['isi_hash'];
      if (!empty($isi_hash)) {
        $hash = pesan_hash($isi_hash);
      }else {
        $error='pesan kosong';
      }
    }
    require_once('view/header.php');
?>
<main>
  <div class="bungkus">
    <h3>Dekrip Pesan Anda</h3>
    <form action="dekrip.php" method="post" id='form_pesan'>
      <textarea name="isi_hash" id='texarea_home'></textarea><br><br>
      <p id="error"><?=$error?></p>
      <input type="submit" name="submit_hash" value="Hash" id="submit_user"><br><br>
      <textarea name="isi" id='texarea_home' readonly><?php if (isset($hash)) {echo $hash;}?></textarea><br><br>
      <p id="pesan"><?=$notif_pesan?></p><br>
    </form>
  </div>
</main>
<?php
}
require_once('view/footer.php');
?>
