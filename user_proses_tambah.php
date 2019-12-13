<?php

//penambahan data butuh koneksi

session_start();
include "app.php";
autentikasi();
aksesall();
koneksi_db();

$nama = isset($_REQUEST['nama']) ? $_REQUEST['nama'] : "";
$username = isset($_REQUEST['username']) ? $_REQUEST['username'] : "";
$password1 = isset($_REQUEST['password1']) ? $_REQUEST['password1'] : "";
$password2 = isset($_REQUEST['password2']) ? $_REQUEST['password2'] : "";
$level = isset($_REQUEST['level']) ? $_REQUEST['level'] : "";

//echo $nama . " " . $username . " " . $password1 . " " . $password2 . " " . $level;

if ($password1 != $password2) {
	echo "
		<script>
			alert('Password tidak sama.');
			window.history.go(-1);
		</script>
	";
	exit;
}

if (cek_username1($username, '')) {
	$query = mysqli_query($koneksi,"INSERT INTO user values ('', '$nama', '$username', '$password1', '$level')");
}else{
	echo "
		<script>
			alert('Username sudah terdaftar');
			window.history.go(-1);
		</script>
	";
}

//cek apakah berhasil disimpan apa tidak
if ($query) {
	echo "
		<script>
			alert('Data berhasil ditambahkan');
			window.location.href='dashboard.php?tengah=user_data';
		</script>
	";
}else{
	echo "
		<script>
			alert('Data gagal untuk disimpan');
			window.history.go(-1);
		</script>
	";
};