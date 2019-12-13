<?php
//menjalankan session
session_start();
// $_SESSION['sukses_login']=TRUE;

//memasukkan file kebutuhan.php untuk memanggil fungsi koneksi_db
include 'app.php';
koneksi_db();

$username = isset($_REQUEST['username']) ? $_REQUEST['username'] : "kosong";
$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : "kosong" ;

//echo "$username / $password";

//buat query dari hasil username dan password

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password' 
	");
// print_r($query);
// exit;
$result = mysqli_fetch_object($query);

//script tambahan cocok tidak cocok

if (mysqli_num_rows($query) > 0 and $result->username == $username and $result->password == $password) {
	echo "
			<script>
				alert('Anda berhasil Login');
				window.location.href='dashboard.php';
			</script>
		";
}else{
	echo "
			<script>
				alert('Anda gagal Login');
				window.location.href='login.html';
			</script>
		";
}

// $_SESSION['akses']=$result->level;

// $_SESSION['idpengguna'] = $result->id_pengguna;
// $_SESSION['nama'] = $result->nama;

if (mysqli_num_rows($query)>0 and $result->username == $username and $result->password == $password) {
	$_SESSION['sukses_login'] = TRUE;
	//otorisasi
	$_SESSION['akses'] = $result->level;
	//otorisasi tambahan
	$_SESSION['id_user'] = $result->id_user;
	$_SESSION['nama'] = $result->nama;
}