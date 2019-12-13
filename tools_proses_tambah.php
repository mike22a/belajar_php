<?php

//penambahan data butuh koneksi

session_start();
include "app.php";
autentikasi();
aksesall();
koneksi_db();

$id_tool = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
$tanggal = isset($_REQUEST['tanggal']) ? $_REQUEST['tanggal'] : "";
$nama = isset($_REQUEST['nama']) ? $_REQUEST['nama'] : "";
$tool = isset($_REQUEST['tool']) ? implode(',',$_REQUEST['tool']) : "";

echo $nama . " " . $tanggal  . " " . $tool . " " ;
// mencari id_harian dari presensi harian yang baru diinput
$tmp = mysqli_query($koneksi, "SELECT user.id_user,user.nama,presensi_harian.id_harian from $loc_presensi where presensi_harian.tanggal='$tanggal'");
$tmp2 = mysqli_fetch_object($tmp);

// masukan data ke tools
// $query = mysqli_query($koneksi, "INSERT INTO tools values ('', '$tool')");

// masukkan data ke cek_tools
while ($tmp2 = mysqli_fetch_object($tmp)) {
?> <br> <?php
print_r($tmp2);
// $query2 = mysqli_query($koneksi, "INSERT INTO cek_tools values ('', '$tmp2->id_harian', '')");
}

// memasukkan id_tools ke cek_tools
$tmp = mysqli_query($koneksi, "SELECT user.id_user,user.nama,presensi_harian.id_harian from $loc_presensi where presensi_harian.tanggal='$tanggal'");
$tmp2 = mysqli_fetch_object($tmp);

// 	$query = mysqli_query($koneksi,"INSERT INTO pengguna values ('', '$nama', '$username', '$password1', '$level')");

//cek apakah berhasil disimpan apa tidak
if ($query) {
	echo "
		<script>
			// alert('Data berhasil ditambahkan');
			// window.location.href='dashboard.php?tengah=tools_data';
		</script>
	";
}else{
	echo "
		<script>
			// alert('Data gagal untuk disimpan');
			// window.location.href='dashboard.php?tengah=tools_data';
		</script>
	";
};