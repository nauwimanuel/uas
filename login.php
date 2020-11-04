<?php 
  require_once 'fungsi/functions.php';

  if(isset($_SESSION['login'])){
    header("Location: index.php");
    exit();
  }


  require_once 'header.php';

  if(isset($_POST["submit"])){
    $data["username"]  = $_POST["username"];
    $data["password"]  = $_POST["password"];

    if( !empty(trim($data["username"])) || !empty(trim($data["password"])) ){
      if( cekusername($data['username']) == 1 ){
        if( cekpassword($data['username'], $data['password'])){
          $_SESSION['login'] = $data['username'];
          buatpesan("Selamat datang.", "Berhasil!", "success");
          header('Location: index.php');
          exit();
        } else {
          buatpesan("password yang Anda masukan salah.", "Gagal!", "danger");
          header('Location: login.php');
          exit();
        }
      } else {
        buatpesan("Username tidak dikenal.", "Gagal!", "danger");
        header('Location: login.php');
        exit();
      }
    } else {
      buatpesan("setiap inputan tidak boleh kosong.", "Gagal!", "danger");
      header('Location: login.php');
      exit();
    }
  }
?>

<div class="row">
  <div class="col-sm-12">
    <?php pesan() ?>
  </div>
</div>

<p class="h2 text-center">Form Login</p>
<div class="text-center">
  <img src="icon.png" height="100" class="rounded">
</div>
<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input name="username" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Username..">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukan Password..">
  </div>
  <div class="form-group form-check">
    <small class="form-text text-muted">Register <a href="register.php">disini</a></small>
  </div>
  <button name="submit" type="submit" class="btn btn-primary btn-sm btn-block">Masuk</button>
</form>

<?php require_once 'footer.php'; ?>