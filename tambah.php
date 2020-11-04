<?php  
  require_once 'fungsi/functions.php';

  if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
  }


  require_once 'header.php';

  if( isset($_POST["submit"]) ){
    $nama = $_POST["nama"];
    $nim  = $_POST["nim"];
    $jdl  = $_POST["judul"];
    $tgl  = $_POST["tanggal"];
    $jam  = $_POST["jam"];

    if( !empty($nama) || !empty($nim) || !empty($jdl) || !empty($tgl) || !empty($jam) ){
      if( masukandata($nama, $nim, $jdl, $tgl, $jam) ){
        buatpesan("data telah ditambahkan.", "Berhasil!", "success");
        header('Location: index.php');
        exit();
      } else {
        buatpesan("data gagal ditambahkan.", "Gagal!", "danger");
        header('Location: tambah.php');
        exit();
      }
    } else {
      buatpesan("form tidak boleh kosong.", "Gagal!", "danger");
      header('Location: tambah.php');
      exit();
    }
  }
?>

<div class="row">
  <div class="col-sm-12">
    <?php pesan() ?>
  </div>
</div>

<p class="h2 text-center">Form Tambah Data</p>
<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Seminaris</label>
    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama..">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2">NIM Seminaris</label>
    <input name="nim" type="number" class="form-control" id="exampleInputEmail2" placeholder="Masukan N I M..">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail3">Judul Seminar</label>
    <input name="judul" type="text" class="form-control" id="exampleInputEmail3" placeholder="Masukan Judul..">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail4">Tanggal Seminar</label>
    <input name="tanggal" type="date" class="form-control" id="exampleInputEmail4">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail5">Jam Seminar</label>
    <input name="jam" type="time" class="form-control" id="exampleInputEmail5">
  </div>
  <button name="submit" type="submit" class="btn btn-primary btn-sm">Tambahkan</button>
  <a href="index.php" class="btn btn-danger btn-sm float-right">Kembali</a>
</form>

<?php require_once 'footer.php'; ?>