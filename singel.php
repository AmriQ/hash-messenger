<?php
  session_start();
  require_once('functions/db.php');
  require_once('functions/function.php');

  if (!isset($_SESSION['user'])) {
    header('Location: login.php');
  }
  $id = $_GET['waktu'];
  $tampilkan_pesan = tampilkan_pesan_singel($id);

  if (isset($_POST['hash'])) {
    $isi_hash = $_POST['isi_hash'];
    if (!empty($isi_hash)) {
      $pesan = pesan_hash($isi_hash);
    }
  }
  require_once('view/header.php');
?>
<main>
  <form action="singel.php?waktu=<?=$id?>" method="post">
  <?php while ($row = mysqli_fetch_assoc($tampilkan_pesan)) { ?>
      <div class="bungkus_pesan">
        <h4 id="judul pengirim"> Dari : <?=nama_pengirim($row['nama_pengirim'])?></h4>
        <h4 id="waktu_pesan">Waktu : <?=$id?></h4>
        <textarea name="isi_hash" class="isi_pesan" readonly cols="100" rows="6"><?=$row['isi']?></textarea><br><br>
        <h4>Hasil Hash : </h4><br>
        <textarea name="isi_pesan" class="isi_pesan" readonly cols="100" rows="6"><?php if(isset($pesan)){echo $pesan;}?></textarea><br><br>
        <input type="submit" name="hash" value="hash" id="submit_user2">
      </div>
  <?php } ?>
    </form>
</main>
<?php
  require_once('view/footer.php');
?>
