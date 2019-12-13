<?php

session_start();
include 'app.php';
autentikasi();
koneksi_db();
aksesadmin();

$id_presensi = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";

$query = mysqli_query($koneksi, "DELETE FROM presensi WHERE id_presensi='$id_presensi'");

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
