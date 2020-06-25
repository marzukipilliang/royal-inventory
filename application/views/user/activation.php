<?php 
$body = '<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  </head>
  <body>
    <p align="center"><img
        src="'.base_url().'uploads/512/dac-smi.png" alt=""
        class="" width="355" height="74"></p>
    <p align="center">Hi, '.strtoupper($nama).'<br>
    </p>
    <p align="center">Ini adalah data Aplikasi DAC kamu.<br>
      <br>
      username: '.$nik.'<br>
      password: '.$password.'<br>
      kode aktifasi: '.$token.'<br>
      <font size="-1"><i>*kode aktifasi hanya sekali pakai.</i></font><br>
      <br>
      <b>Ayo segera aktifkan Akun DAC Anda.</b><br>
      <br><a href="'. $activation_url.'">
      <img src="'.base_url().'uploads/512/dac-btn-aktifasi.png" alt=""
        class=""></a><br>
      <br>
      Klik <b>aktifkan sekarang</b> atau klik: <a
        moz-do-not-send="true" href="'. $activation_url.'">'.$activation_url.'</a><br>
      Jika halaman tidak terbuka, <i>copy</i> dan <i>paste link</i> ke
      internet browser Anda dan coba lagi.<br>
      Perlu bantuan? Silakan <i>call</i> atau <i>chat</i> IT Support
      Cabang atau IT NOC Pusat.<br>
      PLANET BAN!!! GO!!!<br>
    </p>
  </body>
</html>
';

?>