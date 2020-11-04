<?php 
	require_once 'fungsi/functions.php';

  // if(!isset($_SESSION['login'])){
  //   header("Location: login.php");
  //   exit();
  // }

	require_once 'header.php'; 

	$result = mysqli_query($konek, "SELECT * FROM seminar");
	$row    = mysqli_num_rows($result);
?>

<div class="row">
  <div class="col-md-12">
    <?php pesan() ?>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <p class="h5 text-center">Daftar Seminaris</p>
    <ul class="list-group">
    	<?php while ( $tampil = mysqli_fetch_assoc($result) ) : ?>
      <li class="list-group-item">
        <?= $tampil['nama'] ?>
        <?php if(isset($_SESSION['login'])) { ?>
          <a href="hapus.php?id=<?= $tampil['id'] ?>" onclick="return confirm('Anda akan menghapus Data ini..! Yakin');" class="badge badge-danger float-right">Hapus</a>
        <?php } ?>
        <a href="lihat.php?id=<?= $tampil['id'] ?>" class="badge badge-primary float-right mr-1">Lihat</a>
      </li>
    	<?php endwhile; ?>
    </ul>

    <?php  
    // $teks = urldecode("menggambarkan sebuah sistem memiliki fitur-fitur atau fungis-fungsi apa saja dan fungis-fungsi tersebut dapat diakses oleh siapa");
    // echo $teks;
    if( isset($_SESSION['login']) ){
      echo '<a href="tambah.php" class="btn btn-primary btn-sm btn-block mt-2">Tambah Data</a>';
    }

    ?>
    <!-- <a href="api.whatsapp.com/send?phone=6281228430523&text=<?=$teks?>" class="btn btn-success mt-2">WA Me</a> -->
  </div>
</div>

<?php require_once 'footer.php'; ?>