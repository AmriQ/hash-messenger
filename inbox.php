<?php
  session_start();
  require_once('functions/db.php');
  require_once('functions/function.php');

  if (!isset($_SESSION['user'])) {
    header('Location: login.php');
  }
  $tampilkan_pesan = tampikan_pesan($_SESSION['user']);
  require_once('view/header.php');
?>
<main>

    <?php while ($row = mysqli_fetch_assoc($tampilkan_pesan)) { ?>
      <?php if ($row['id'] > 0) { ?>
        <div class="bungkus_pesan">
            <h4 id="judul pengirim"> Dari : <?=nama_pengirim($row['nama_pengirim'])?></h4>
            <p id="waktu_pesan"> Waktu : <?=$row['waktu']?></p>
            <textarea name="isi_hash" class="isi_pesan" readonly rows="6"><?=$row['isi']?></textarea><br><br>
            <a href="singel.php?waktu=<?=$row['waktu']?>" id="lihat_pesan">Lihat Pesan</a>
        </div>
      <?php } else {?>
        <div class="bungkus_pesan">
          <h2>tidak ada pesan yang masuk</h2>
        </div>
      <?php } ?>
    <?php } ?>

</main>
<?php
  require_once('view/footer.php');
?>
