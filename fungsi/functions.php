<?php
session_start();

$konek = mysqli_connect("127.0.0.1", "root", "", "test");

function buatpesan($ket, $aksi, $type){
  $_SESSION['pesan'] = [
    'ket' => $ket,
    'aksi' => $aksi,
    'type' => $type,
  ];
}

function pesan(){
  if(isset($_SESSION["pesan"])){
    echo "<div class='alert alert-".$_SESSION['pesan']['type']." alert-dismissible fade show' role='alert'>
					  <strong> ".$_SESSION['pesan']['aksi']." </strong> ".$_SESSION['pesan']['ket']."
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					    <span aria-hidden='true'>&times;</span>
					  </button>
					</div>";
    unset($_SESSION['pesan']);
  }
}

function cekjumlahuser(){
	global $konek;

	$result = mysqli_query($konek, "SELECT * FROM users");
	$row    = mysqli_num_rows($result);

	return $row;
}

function cekusername($user){
	global $konek;

	$result1 = mysqli_query($konek, "SELECT username FROM users WHERE username = '$user'");
	$row = mysqli_num_rows($result1);
	
	return $row;
}

function verifikasiemail($username, $email, $password){
	$headers[0] = 'MIME-Version: 1.0';
	$headers[1] = 'Content-type: text/html; charset=iso-8859-1';
	$subject = 'Verifikasi Akun Sistem Informasi Seminar';
  $pesan = "Silahkan Klik link dibawah untuk verifikasi akun anda \r\n\r\n
            <a href='verifikasi_akun.php?username=" . $username . "&email=" . $email . "&password=" . $password ."'>\r\n Verifikasi akun</a>";
  if (mail($email, $subject, $pesan, implode("\r\n", $headers))) {
    return true;
  } else {
    return false;
  }
}

function daftarkanuser($user, $mail, $pass){
	global $konek;

	$user = strtolower(stripslashes($user));
	$mail = mysqli_real_escape_string($konek, $mail);
	$pass = mysqli_real_escape_string($konek, $pass);
	$stus = 1;

	if(cekjumlahuser() == 0){
		$stus = 0;
	}

	$result = mysqli_query($konek, "INSERT INTO users VALUES ('', '$user', '$mail', '$pass', $stus)");
	if($result){
		return true;
	} else {
		return false;
	}
}

function cekpassword($user, $pass){
	global $konek;

	$user = mysqli_real_escape_string($konek, $user);
	$pass = mysqli_real_escape_string($konek, $pass);

	$result = mysqli_query($konek, "SELECT * FROM users WHERE username = '$user'");
	if( mysqli_fetch_assoc($result)['password'] == $pass ){
		return true;
	} else {
		return false;
	}
}

function masukandata($nama, $nim, $jdl, $tgl, $jam){
	global $konek;

	$nama = mysqli_real_escape_string($konek, $nama);
	$nim  = mysqli_real_escape_string($konek, $nim);
	$jdl  = mysqli_real_escape_string($konek, $jdl);
	$tgl  = mysqli_real_escape_string($konek, $tgl);
	$jam  = mysqli_real_escape_string($konek, $jam);

	$reault = mysqli_query($konek, "INSERT INTO seminar VALUES ('', '$nama', '$nim', '$jdl', '$tgl', '$jam')");

	if($reault){
		return true;
	} else{
		return false;
	}
}

function tampilsemuadata(){
	global $konek;

	$result = mysqli_query($konek, "SELECT * FROM seminar");
	$tampil = mysqli_fetch_assoc($result);

	return $tampil;
}

function hapusdata($id) {
	global $konek;
	mysqli_query($konek, "DELETE FROM seminar WHERE id = $id");
	return mysqli_affected_rows($konek);
}

function ubahdata($data) {
	global $konek;

	$id   = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$nim  = htmlspecialchars($data["nim"]);
	$jdl  = htmlspecialchars($data["judul"]);
	$jam  = htmlspecialchars($data["jam"]);	

	$query = "UPDATE seminar SET
							nama  = '$nama',
							nim   = '$nim',
							judul = '$jdl',
							jam   = '$jam'
						  WHERE id = '$id'
						";

	mysqli_query($konek, $query);

	return mysqli_affected_rows($konek);	
}