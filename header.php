<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">   

    <title>UAS</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
      <a class="navbar-brand" href="index.php">Sistem Informasi</a>
      <?php  
      if(isset($_SESSION["login"])){
        echo "<a href='logout.php' class='btn btn-danger btn-sm'>Keluar</a>";
      } else {
        echo "<a href='login.php' class='btn btn-success btn-sm'>Masuk</a>";
      }
      ?>
      
    </nav>
    <div class="container">