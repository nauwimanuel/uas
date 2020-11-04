<?php
require_once 'fungsi/functions.php';

if(!isset($_SESSION['login'])){
	header("Location: login.php");
	exit();
}

$id = $_GET["id"];

if( hapusdata($id) > 0 ) {
	buatpesan("data telah dihapus.", "Berhasil!", "success");
    header('Location: index.php');
    exit();
} else {
	buatpesan("data gagal dihapus", "Gagal!", "danger");
    header('Location: index.php');
    exit();
}