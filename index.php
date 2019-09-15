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
        $hash = proses_hash($isi_hash);
      }else {
        $error='pesan kosong';
      }
    }
    if (isset($_POST['submit'])) {

      $pengirim = $_SESSION['user'];
      $penerima = $_POST['penerima'];
      $pesan = $_POST['isi'];

      if (!empty(trim($pesan))) {

        if (kirim_pesan($pengirim, $penerima, $pesan)) {
          $notif_pesan = 'pesan berhasil terkirim';
        }else {
          $error = 'pesan gagal terkirim';
        }
      }else {
        $error = 'pesan kosong';
      }
    }
    require_once('view/header.php');
?>
<main>
  <div class="bungkus">
  <h3>Kirim Pesan Anda</h3>
    <form action="index.php" method="post" id='form_pesan'>
      <textarea name="isi_hash" id='texarea_home'></textarea><br><br>
      <p id="error"><?=$error?></p><br>
      <input type="submit" name="submit_hash" value="Hash" id="submit_user"><br><br>
      <textarea name="isi" id='texarea_home' readonly><?php if (isset($hash)) {echo $hash;}?></textarea><br><br>
      <p id="pesan"><?=$notif_pesan?></p><br>
      <h4 id='to'>kepada</h4><br>
      <select name="penerima">
        <?php while ($row = mysqli_fetch_assoc($nama_penerima)) { ?>
          <option value="<?=$row['username']?>"><?=$row['name']?></option>
        <?php } ?>
      </select><br><br>
      <input type="submit" name="submit" value="Kirim" id="submit_user">
    </form>
  </div>
</main>
<?php
  }
  require_once('view/footer.php');
?>
