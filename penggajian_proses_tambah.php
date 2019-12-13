<?php

//penambahan data butuh koneksi

session_start();
include "app.php";
autentikasi();
aksesall();
koneksi_db();

$nama_teknisi = isset($_REQUEST['nama_teknisi']) ? $_REQUEST['nama_teknisi'] : "";
$harian = isset($_REQUEST['harian']) ? $_REQUEST['harian'] : "";
$lembur = isset($_REQUEST['lembur']) ? $_REQUEST['lembur'] : "";
$bonus = isset($_REQUEST['bonus']) ? $_REQUEST['bonus'] : "";


// echo $id_workorder . " " . $tanggal . " " . $alamat . " " . $no_telp . " " . $kendaraan . " " . $keluhan . " " . $nama_teknisi;
// exit;
$query = mysqli_query($koneksi, "INSERT INTO penggajian values ('','$nama_teknisi', '$harian', '$lembur', '$bonus')");

// 	$query = mysqli_query($koneksi,"INSERT INTO pengguna values ('', '$nama', '$username', '$password1', '$level')");

//cek apakah berhasil disimpan apa tidak
if ($query) {
	echo "
		<script>
			alert('Data berhasil ditambahkan');
			window.location.href='dashboard.php?tengah=penggajian_data';
		</script>
	";
}else{
	echo "
		<script>
			alert('Data gagal untuk disimpan');
			window.location.href='dashboard.php?tengah=penggajian_data';
		</script>
	";
};