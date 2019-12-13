<?php

session_start();
include "app.php";
autentikasi();
koneksi_db();
aksesadmin();

$id_gaji = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
$nama_teknisi = isset($_REQUEST['nama_teknisi']) ? $_REQUEST['nama_teknisi'] : "";
$harian = isset($_REQUEST['harian']) ? $_REQUEST['harian'] : "";
$lembur = isset($_REQUEST['lembur']) ? $_REQUEST['lembur'] : "";
$bonus = isset($_REQUEST['bonus']) ? $_REQUEST['bonus'] : "";

// echo $id_workorder . " " . $tanggal . " " . $alamat . " " . $no_telp . " " . $kendaraan . " " . $keluhan . " " . $nama_teknisi;
// exit;
$query = mysqli_query($koneksi, "UPDATE gaji SET nama_teknisi='$nama_teknisi', harian='$harian', lembur='$lembur' , bonus='$bonus' WHERE id_gaji=$id_gaji");

if ($query) {
	echo "
		<script>
			alert('Data berhasil diupdate');
			window.location.href='dashboard.php?tengah=pengggajian_data';
		</script>
	";
}else{
	echo "
		<script>
			alert('Data gagal untuk diupdate');
			// window.location.href='dashboard.php?tengah=pengggajian_data';
			window.history.go(-1);
		</script>
	";
};

// echo "query selalu bernilai 1";
