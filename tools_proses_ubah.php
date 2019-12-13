<?php

session_start();
include "app.php";
autentikasi();
koneksi_db();
aksesadmin();

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";  // id harian
$nama = isset($_REQUEST['nama']) ? $_REQUEST['nama'] : "";
$tanggal = isset($_REQUEST['tanggal']) ? $_REQUEST['tanggal'] : "";
$tool = isset($_REQUEST['tool']) ? $_REQUEST['tool'] : "";

// update data ke cek tools
$query3 = mysqli_query($koneksi, "DELETE FROM cek_tools WHERE id_harian=$id ");
$k=0;
while ($k < count($tool)) {	
	$query4 = mysqli_query($koneksi, "INSERT INTO cek_tools values ('', '$id' , '$tool[$k]')");
	// echo "$tool[$k]";
	$k++;
}




// $tool = implode(',',$_REQUEST['tools']);

// echo  $id_tool . " " . $nama . " " . $tanggal . " " . $tool;
// exit;

// $query = mysqli_query($koneksi, "UPDATE cek_tools SET tool='$tool' WHERE id_tools='$id_tool' ");

// print($query);
// exit;

// print_r($query);
// exit;

if ($query3) {
	echo "
		<script>
			alert('Data berhasil diupdate');
			// window.location.href='dashboard.php?tengah=tools_data';
			window.history.go(-2);
		</script>
	";
}else{
	echo "
		<script>
			alert('Data gagal untuk diupdate');
			// window.location.href='dashboard.php?tengah=tools_data';
			window.history.go(-1);
		</script>
	";
};

// echo "query selalu bernilai 1";
