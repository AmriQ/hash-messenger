<?php
require_once 'core/init.php';

if (!isset($_SESSION['user'])) {
  header('Location: login.php');
}
$tampilkan_pesan = tampikan_pesan($_SESSION['user']);
require_once 'view/header.php';
?>
<main>

  <?php if ($tampilkan_pesan->num_rows != 0) { ?>
    <?php while ($row = mysqli_fetch_assoc($tampilkan_pesan)) { ?>
      <div class="bungkus_pesan">
        <h4 id="judul pengirim"> Dari : <?= nama_pengirim($row['nama_pengirim']) ?></h4>
        <p id="waktu_pesan"> Waktu : <?= $row['waktu'] ?></p>
        <textarea name="isi_hash" class="isi_pesan" readonly rows="6"><?= $row['isi'] ?></textarea><br><br>
        <a href="singel.php?waktu=<?= $row['waktu'] ?>" id="lihat_pesan">Lihat Pesan</a>
      </div>
    <?php } ?>
  <?php } else { ?>
    <div class="bungkus_pesan text-center">
      <h2>Belum ada pesan yang tersimpan</h2>
    </div>
  <?php } ?>

</main>
<?php
require_once 'view/footer.php';
?>