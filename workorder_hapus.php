<?php

session_start();
include 'app.php';
autentikasi();
koneksi_db();
aksesadmin();

$id_workorder = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";

$query = mysqli_query($koneksi, "DELETE FROM workorder WHERE id_workorder='$id_workorder'");

if ($query) {
	echo "
		<script>
			alert('Data berhasil dihapus.');
			window.location.href='dashboard.php?tengah=workorder_data';
		</script>
	";
}else{
	echo "
		<script>
			alert('Data gagal untuk dihapus.');
			window.location.href='dashboard.php?tengah=workorder_data';
		</script>
	";
};
