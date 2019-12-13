<?php

session_start();
include 'app.php';
autentikasi();
koneksi_db();
aksesadmin();

$id_penggajian = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";

$tmpNama = "select nama_teknisi from penggajian where id_gaji = '$id_penggajian'"

$query = mysqli_query($koneksi, "DELETE FROM penggajian WHERE nama_teknisi='$nama_teknisi'");

if ($query) {
	echo "
		<script>
			alert('Data berhasil dihapus.');
			window.location.href='dashboard.php?tengah=presensi_data';
		</script>
	";
}else{
	echo "
		<script>
			alert('Data gagal untuk dihapus.');
			window.location.href='dashboard.php?tengah=presensi_data';
		</script>
	";
};
