<?php

session_start();
include 'app.php';
autentikasi();
koneksi_db();
aksesadmin();

$id_tool = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";

$tmpNama = "select nama_teknisi from tools where id_tool = '$id_tool'"
// $tmp = "select tool from tools where $"

$query = mysqli_query($koneksi, "DELETE FROM tools WHERE nama_teknisi='$tmpNama'");

if ($query) {
	echo "
		<script>
			alert('Data berhasil dihapus.');
			window.location.href='dashboard.php?tengah=tools_data';
		</script>
	";
}else{
	echo "
		<script>
			alert('Data gagal untuk dihapus.');
			window.location.href='dashboard.php?tengah=tools_data';
		</script>
	";
};
