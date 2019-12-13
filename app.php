<?php

$koneksi = mysqli_connect("localhost","root","","bengkel_mobil");
$loc_presensi = "((presensi_harian LEFT JOIN user on presensi_harian.id_user=user.id_user) LEFT JOIN presensi_lembur ON presensi_harian.id_harian=presensi_lembur.id_harian)";
// " LEFT JOIN cek_tools ON presensi_harian.id_harian=cek_tools.id_harian";
$loc_tools = "((tools JOIN cek_tools ON tools.id_tools=cek_tools.id_tools)LEFT JOIN presensi_harian ON presensi_harian.id_harian = cek_tools.id_harian) LEFT JOIN user ON user.id_user=presensi_harian.id_user";
$loc_penggajian="((penggajian left JOIN user ON penggajian.id_user=user.id_user) left JOIN presensi_harian ON penggajian.id_user=presensi_harian.id_user) LEFT JOIN presensi_lembur on presensi_lembur.id_harian=presensi_harian.id_harian";
$loc_workorder="workorder left join user on workorder.id_user=user.id_user";

// cari nama berdasarkan id
// $tmp = mysqli_query($koneksi, "SELECT id_user from user where nama='$nama'");
// $nama_id = mysqli_fetch_object($tmp);

//akan dibuat fungsi koneksi

function koneksi_db() {
	$koneksi = mysqli_connect("localhost","root","","bengkel_mobil");
	if (!$koneksi) {
		die('terjadi kesalahan koneksi : ' . mysqli_connect_error());
	}
	// else{
	// 	echo "berhasil";
	// }

}

function autentikasi() {
	if (!isset($_SESSION['sukses_login'])) {
		echo "
			<script>
				alert('Anda Harus Login Terlebih Dahulu');
				window.location.href='login.html';
			</script>
		";
		exit;
	}
}

function aksesall() {
	if (!($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'owner' || $_SESSION['akses'] == 'teknisi')) {
		echo  "
			<script>
				alert('Anda Tidak mendapat ijin akses halaman ini');
				window.history.go(-1);
			</script>
		";
		exit;
	}
}

function aksesteknisi() {
	if (!($_SESSION['akses'] == 'teknisi' || $_SESSION['akses'] == 'admin')) {
		echo  "
			<script>
				alert('Anda Tidak mendapat ijin akses halaman ini');
				window.history.go(-1);
			</script>
		";
		exit;
	}
}

function aksesowner() {
	if (!($_SESSION['akses'] == 'owner')) {
		echo  "
			<script>
				alert('Anda Tidak mendapat ijin akses halaman ini');
				window.history.go(-1);
			</script>
		";
		exit;
	}
}

function aksesadmin() {
	if (!($_SESSION['akses'] == 'admin')) {
		echo  "
			<script>
				alert('Anda Tidak mendapat ijin akses halaman ini');
				window.history.go(-1);
			</script>
		";
		exit;
	}
}

//akses previleges dengna tabel

// function akses($priv) {
// 	koneksi_db();
// 	$idregistered = $_SESSION['idpengguna'];
// 	$query = mysqli_query($koneksi, "select * from pengguna p 
// 		join akses a on p.level=a.level
// 		join previleges pv on a.id_priv=pv.id_priv
// 		where p.id_pengguna=$idregistered and pv.priv='$priv'
// 		");
// 	$result = mysqli_fetch_object($query);
// 	$akses = isset($result->level) ? $result->level : "kosong";

// 	// echo $priv." ".$akses." ".$_SESSION['akses']
// 	// exit

// 	if (!($_SESSION['akses'] == $akses)) {
// 		echo "
// 			<script>
// 				alert('Anda tidak mendapat ijin akses halaman ini');
// 				window.location.href='dashboard.php';
// 			</script>
// 		";
// 		exit;
// 	}
// }

// function cek_username($new) {
// 	$query1 = mysqli_query($koneksi, "select * from pengguna where nama='$new'");
// 	if (mysqli_num_rows($query1)>0) {
// 		return FALSE;
// 	}else{
// 		return TRUE;
// 	}
// }

function cek_username1($new, $old) {
	$koneksi = mysqli_connect("localhost","root","","bengkel_mobil");
	$old1 = isset($old) ? $old : '';
	$query2 = mysqli_query($koneksi, "select * from (select * from pengguna where username not IN ('$old1')) as p where username='$new'");
	if (mysqli_num_rows($query2)>0) {
		return FALSE;
	}else{
		return TRUE;
	}
}