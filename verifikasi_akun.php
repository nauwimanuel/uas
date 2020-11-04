<?php
require_once 'fungsi/functions.php';

if (isset($_GET['username']) && isset($_GET['email']) && isset($_GET['password'])) {
  if( daftarkanuser($_GET['username'], $_GET['email'], $_GET['password']) ) {
    buatpesan("akun Anda telah diverifikasi, silahkan login.", "Berhasil!", "success");
  	header('Location: login.php');
  }
}