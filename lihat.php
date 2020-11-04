<?php 
	require_once 'fungsi/functions.php';

 //  if(!isset($_SESSION['login'])){
	// header("Location: login.php");
	// exit();
 //  }

	require_once 'header.php';

	$id = $_GET['id'];
	$result = mysqli_query($konek, "SELECT * FROM seminar WHERE id = '$id' ");
	$tampil = mysqli_fetch_assoc($result);
	
?>

<div class="row">
  <div class="col-md-12">
	<?php pesan() ?>
  </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card mb-3">
			<div class="card-header">
				<h5 class="card-title">Informasi Lengkap Seminaris</h5>
			</div>

			<div class="card-body">
				<p class="card-text">
					<div class="row">
						<strong class="col-sm">Nama </strong>
						<h5 class="col-sm"><?= $tampil['nama'] ?></h5>
					</div>
					<div class="row">
						<strong class="col-sm">NIM </strong>
						<h5 class="col-sm"><?= $tampil['nim'] ?></h5>
					</div>
					<div class="row">
						<strong class="col-sm">Judul </strong>
						<h5 class="col-sm"><?= $tampil['judul'] ?></h5>
					</div>
					<div class="row">
						<strong class="col-sm">Tanggal </strong>
						<h5 class="col-sm"><?= $tampil['tanggal'] ?></h5>
					</div>
					<div class="row">
						<strong class="col-sm">Jam </strong>
						<h5 class="col-sm"><?= $tampil['jam'] ?></h5>
					</div>
				</p>
			</div>
		</div>
		<?php if( isset($_SESSION['login']) ){ ?>
			<a href="ubah.php?id=<?= $tampil['id'] ?>" class="btn btn-primary btn-sm">Ubah</a>
		<?php } ?>
		<a href="index.php" class="btn btn-danger btn-sm float-right">Kembali</a>
	</div>
</div>

<?php require_once 'footer.php'; ?>