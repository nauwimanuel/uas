<?php
  require_once 'fungsi/functions.php';

  if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
  }

  
  require_once 'header.php';

  $id = $_GET["id"];

  $result = mysqli_query($konek, "SELECT * FROM seminar WHERE id = '$id' ");
  $tampil = mysqli_fetch_assoc($result);

  if( isset($_POST["submit"]) ) {
    
    if( ubahdata($_POST) > 0 ) {
      buatpesan("data telah diubah.", "Berhasil!", "success");
      header('Location: lihat.php?id='.$id);
      exit();
    } else {
      buatpesan("data gagal diubah.", "Gagal!", "danger");
      header('Location: ubah.php?id='.$id);
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
    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" value="<?= $tampil['nama'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2">NIM Seminaris</label>
    <input name="nim" type="number" class="form-control" id="exampleInputEmail2" value="<?= $tampil['nim'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail3">Judul Seminar</label>
    <input name="judul" type="text" class="form-control" id="exampleInputEmail3" value="<?= $tampil['judul'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail5">Jam Seminar</label>
    <input name="jam" type="time" class="form-control" id="exampleInputEmail5" value="<?= $tampil['jam'] ?>">
  </div>
  <input type="hidden" name="id" value="<?= $tampil['id'] ?>">
  <button name="submit" type="submit" class="btn btn-primary btn-sm">Simpan</button>
  <a href="lihat.php?id=<?= $tampil['id'] ?>" class="btn btn-danger btn-sm float-right">Kembali</a>
</form>

<?php require_once 'footer.php'; ?>