<?php

session_start();
include "app.php";
autentikasi();
koneksi_db();
aksesadmin();

$id_workorder = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
$nama_pelanggan = isset($_REQUEST['nama_pelanggan']) ? $_REQUEST['nama_pelanggan'] : "";
$tanggal = isset($_REQUEST['tanggal']) ? $_REQUEST['tanggal'] : "";
$alamat = isset($_REQUEST['alamat']) ? $_REQUEST['alamat'] : "";
$no_telp = isset($_REQUEST['no_telp']) ? $_REQUEST['no_telp'] : "";
$kendaraan = isset($_REQUEST['kendaraan']) ? $_REQUEST['kendaraan'] : "";
$keluhan = isset($_REQUEST['keluhan']) ? $_REQUEST['keluhan'] : "";
$nama_teknisi = isset($_REQUEST['nama_teknisi']) ? $_REQUEST['nama_teknisi'] : "";

// echo $id_workorder . " " . $tanggal . " " . $alamat . " " . $no_telp . " " . $kendaraan . " " . $keluhan . " " . $nama_teknisi;
// exit;
$query = mysqli_query($koneksi, "UPDATE workorder SET tanggal='$tanggal', nama_pelanggan='$nama_pelanggan' , alamat='$alamat', no_telp='$no_telp',kendaraan='$kendaraan', keluhan='$keluhan', nama_teknisi='$nama_teknisi' WHERE id_workorder=$id_workorder");

if ($query) {
	echo "
		<script>
			alert('Data berhasil diupdate');
			window.location.href='dashboard.php?tengah=workorder_data';
		</script>
	";
}else{
	echo "
		<script>
			alert('Data gagal untuk diupdate');
			// window.location.href='dashboard.php?tengah=workorder_data';
			window.history.go(-1);
		</script>
	";
};

// echo "query selalu bernilai 1";
