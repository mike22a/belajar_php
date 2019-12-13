<?php

//penambahan data butuh koneksi

session_start();
include "app.php";
autentikasi();
aksesall();
koneksi_db();

$id_workorder = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
$nama_pelanggan = isset($_REQUEST['nama_pelanggan']) ? $_REQUEST['nama_pelanggan'] : "";
$tanggal = isset($_REQUEST['tanggal']) ? $_REQUEST['tanggal'] : "";
$alamat = isset($_REQUEST['alamat']) ? $_REQUEST['alamat'] : "";
$no_telp = isset($_REQUEST['no_telp']) ? $_REQUEST['no_telp'] : "";
$kendaraan = isset($_REQUEST['kendaraan']) ? $_REQUEST['kendaraan'] : "";
$keluhan = isset($_REQUEST['keluhan']) ? $_REQUEST['keluhan'] : "";
$nama = isset($_REQUEST['nama']) ? $_REQUEST['nama'] : "";
$penilaian = isset($_REQUEST['penilaian']) ? $_REQUEST['penilaian'] : "";

// cari nama berdasarkan id
$tmp = mysqli_query($koneksi, "SELECT id_user from user where nama='$nama'");
$nama_id = mysqli_fetch_object($tmp)->id_user;

// echo $penilaian . " " . $nama_id . " " ;
// echo $query;
// exit;

$query = mysqli_query($koneksi, "INSERT INTO workorder values ('', '$nama_id','$tanggal', '$nama_pelanggan', '$alamat', '$no_telp','$kendaraan','$keluhan', '$penilaian')");

// 	$query = mysqli_query($koneksi,"INSERT INTO pengguna values ('', '$nama', '$username', '$password1', '$level')");

//cek apakah berhasil disimpan apa tidak
if ($query) {
	echo "
		<script>
			alert('Data berhasil ditambahkan');
			window.location.href='dashboard.php?tengah=workorder_data';
		</script>
	";
}else{
	echo "
		<script>
			alert('Data gagal untuk disimpan');
			// window.location.href='dashboard.php?tengah=workorder_data';
			window.history.go(-1);
		</script>
	";
};