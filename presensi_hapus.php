<?php

session_start();
include 'app.php';
autentikasi();
koneksi_db();
aksesadmin();

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";

$query = mysqli_query($koneksi, "DELETE FROM presensi_lembur WHERE id_harian='$id' ");
$query2 = mysqli_query($koneksi, "DELETE FROM presensi_harian WHERE id_harian='$id' ");
$query3 = mysqli_query($koneksi, "DELETE FROM cek_tools WHERE id_harian='$id' ");

if ($query AND $query2 AND $query3) {
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
