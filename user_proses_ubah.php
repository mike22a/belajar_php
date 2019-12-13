<?php

session_start();
include "app.php";
autentikasi();
koneksi_db();
aksesall();

$id_user = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
$nama = isset($_REQUEST['nama']) ? $_REQUEST['nama'] : "";
// $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : "";
$usernamenew = isset($_REQUEST['username']) ? $_REQUEST['username'] : "";
$usernameold = isset($_REQUEST['usernameold']) ? $_REQUEST['usernameold'] : "";
$level = isset($_REQUEST['level']) ? $_REQUEST['level'] : "";

// echo "$id_user $nama $username $level";

if (cek_username1($usernamenew, $usernameold)) {
	$query = mysqli_query($koneksi, "UPDATE user SET nama='$nama', username='$usernamenew', level='$level' WHERE id_user=$id_user");	
}else{
	echo "
		<script>
			alert('Username sudah terdaftar.');
			window.history.go(-1);
		</script>
	";
	exit;
}




if ($query) {
	echo "
		<script>
			alert('Data berhasil diupdate');
			window.location.href='dashboard.php?tengah=user_data';
		</script>
	";
}else{
	echo "
		<script>
			alert('Data gagal untuk diupdate');
			window.history.go(-1);
		</script>
	";
};

// echo "query selalu bernilai 1";
