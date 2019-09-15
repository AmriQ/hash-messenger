<?php
  //fungsi mengecek user register
  function cek_user_register($user){
    global $link;
    $user = mysqli_real_escape_string($link, $user);
    $query = "SELECT username FROM user WHERE username='$user'";
    if ($hasil = mysqli_query($link, $query)) {
      if (mysqli_num_rows($hasil) == 0) {
        return true;
      }else {
        return false;
      }
    }
  }

  //fungsi verivikasi pendaftaran dengan email
  function verifikasi_email($email, $nama, $sandi){
    $kepada  = $email;
    $sandi   = md5($sandi);
    $subject = 'Aktivasi Akun';
    $pesan   = "Haloo, ".$nama."\r\n".
               "Silahkan klik tombol di bawah untuk menyelesaikan pendaftaran"."\r\n".
               "localhost/kemjar/konfir.php?email=".$email."&kode=".$sandi."&username=".$nama."\r\n".
               "copyright: Kelompok 1 kemjar 2018";
    if (mail($kepada, $subject, $pesan)) {
      return true;
    }else {
      return false;
    }
  }

  //fungsi mendaftarkan user
  function register_user($nama, $user, $sandi){
    global $link;
    $nama  = mysqli_real_escape_string($link, $nama);
    $user  = mysqli_real_escape_string($link, $user);
    $sandi = mysqli_real_escape_string($link, $sandi);
    $query = "INSERT INTO user (name, username, password) VALUES ('$nama', '$user', '$sandi')";
    if (mysqli_query($link, $query)) {
      return true;
    }else {
      return false;
    }
  }

  //fungsi mengecek user login
  function cek_user_login($user){
    global $link;
    $user  = mysqli_real_escape_string($link, $user);
    $query = "SELECT username FROM user WHERE username='$user'";
    if ($hasil = mysqli_query($link, $query)) {
      if (mysqli_num_rows($hasil) == 1) {
        return true;
      }else {
        return false;
      }
    }
  }

  //fungsi login user
  function login_user($user, $sandi){
    global $link;
    //$sandi = md5($sandi);
    $user = mysqli_real_escape_string($link, $user);
    $query = "SELECT password FROM user WHERE username='$user'";
    if ($hasil = mysqli_query($link, $query)) {
       $row = mysqli_fetch_assoc($hasil);
      if ($row['password'] == $sandi) {
        return true;
      }else {
        return false;
      }
    }
  }

  //fungsi menampilkan user
  function tampilkan_user(){
    global $link;

    $query = "SELECT * FROM user";
    if ($hasil = mysqli_query($link, $query)) {
      return $hasil;
    }
  }

  //fungsi mengirim pesan
  function kirim_pesan($pengirim, $penerima, $pesan){
    global $link;
    $pengirim = mysqli_real_escape_string($link, $pengirim);
    $penerima = mysqli_real_escape_string($link, $penerima);
    $pesan    = mysqli_real_escape_string($link, $pesan);
    $query = "INSERT INTO pesan (nama_pengirim, nama_penerima, isi) VALUES ('$pengirim', '$penerima', '$pesan')";
    if (mysqli_query($link, $query)) {
      return true;
    }else {
      return false;
    }
  }

  //fungsi menampilkan pesan
  function tampikan_pesan($user){
    global $link;

    $query = "SELECT * FROM pesan WHERE nama_penerima='$user'";
    if ($hasil = mysqli_query($link, $query)) {
      return $hasil;
    }
  }

  //fungsi menampilkan pesan singel
  function tampilkan_pesan_singel($id){
    global $link;

    $query = "SELECT * FROM pesan WHERE waktu='$id'";
    $hasil = mysqli_query($link, $query);

    return $hasil;
  }

  //fungsi merubah user menjadi nama (pengirim)
  function nama_pengirim($nama){
    global $link;

    $query = "SELECT name FROM user WHERE username='$nama'";
    if ($hasil=mysqli_query($link, $query)) {
      if ($row= mysqli_fetch_assoc($hasil)) {
        return $row['name'];
      }
    }
  }

  //fungsi hash pesan
  function proses_hash($isi_hash){
    $hash = base64_encode($isi_hash);
    return $hash;
  }

  //fungsi mengembalikan hash
  function pesan_hash($isi_hash){
    $hash = base64_decode($isi_hash);
    return $hash;
  }

  //fungsi verifikasi reset password
  function verifikasi_password($sandi, $email){
    $kepada  = $email;
    $sandi   = md5($sandi);
    $subject = 'Reset Password';
    $pesan   = "Silahkan klik tombol di bawah untuk menyelesaikan proses reset password"."\r\n".
               "localhost/kemjar/konfir-password.php?email=".$email."&kode=".$sandi."\r\n".
               "copyright: Kelompok 1 kemjar 2018";
    if (mail($kepada, $subject, $pesan)) {
      return true;
    }else {
      return false;
    }
  }

  function cek_password($email, $sandi){
    global $link;

    $query = "SELECT * FROM user WHERE username='$email'";
    $hasil = mysqli_query($link, $query);
    $hasil = mysqli_fetch_assoc($hasil);

    if ($hasil['password'] === $sandi) {
      return false;
    }else {
      return true;
    }
  }

  //fungsi reset password
  function reset_password($user, $sandi){
    global $link;
    $user  = mysqli_real_escape_string($link, $user);
    $sandi = mysqli_real_escape_string($link, $sandi);
    $query = "UPDATE user SET password='$sandi' WHERE username='$user'";
    if(mysqli_query($link, $query)){
      return true;
    }else {
      return false;
    }

  }
?>
