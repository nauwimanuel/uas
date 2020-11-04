<?php 
  require_once 'fungsi/functions.php';

  if(isset($_SESSION['login'])){
    header("Location: index.php");
    exit();
  }


  require_once 'header.php'; 

  if(isset($_POST["submit"])){
    $data["username"]  = $_POST["username"];
    $data["email"]     = $_POST["email"];
    $data["password"]  = $_POST["password"];
    $data["password2"] = $_POST["password2"];

    if( !empty(trim($data["username"])) || !empty(trim($data["email"])) || !empty(trim($data["password"])) || !empty(trim($data["password2"])) ){
      if( $data["password"] == $data["password2"] ){
        if( cekusername($data['username']) == 0 ){
          if( daftarkanuser($data["username"], $data["email"], $data["password2"]) ){
            buatpesan("silahkan login", "Berhasil!", "success");
            header('Location: login.php');
            exit();
          } else {
            buatpesan("silahkan coba lagi.", "Gagal!", "danger");
            header('Location: register.php');
            exit();
          }
        } else {
          buatpesan("Username sudah terdaftar, coba yang lain.", "Gagal!", "danger");
          header('Location: register.php');
          exit();
        }
      } else {
        buatpesan("password konfirmasi tidak sama dengan password.", "Gagal!", "danger");
        header('Location: register.php');
        exit();
      }
    } else {
      buatpesan("inputan tidak boleh kosong.", "Gagal!", "danger");
      header('Location: register.php');
      exit();
    }
  }

?>

<div class="row">
  <div class="col-sm-12">
    <?php pesan() ?>
  </div>
</div>

<p class="h2 text-center">Form Register</p>
<div class="text-center">
  <img src="icon.png" height="100" class="rounded">
</div>
<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input name="username" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Username..">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Email..">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukan Password..">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Konfirmasi Password</label>
    <input name="password2" type="password" class="form-control" id="exampleInputPassword1" placeholder="Ulangi Password..">
  </div>
  <div class="form-group form-check">
    <small class="form-text text-muted">Login <a href="login.php">disini</a></small>
  </div>
  <button name="submit" type="submit" class="btn btn-primary btn-sm btn-block">Daftar</button>
</form>

<?php require_once 'footer.php'; ?>