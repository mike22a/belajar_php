<?php

//penambahan data butuh koneksi

session_start();
include "app.php";
autentikasi();
aksesteknisi();
aksesadmin();
koneksi_db();

$nama = isset($_REQUEST['nama']) ? $_REQUEST['nama'] : "";
$tanggal = isset($_REQUEST['tanggal']) ? $_REQUEST['tanggal'] : "";
$lembur = isset($_REQUEST['lembur']) ? $_REQUEST['lembur'] : "";
$tool = isset($_REQUEST['tool']) ? $_REQUEST['tool'] : "";
$presensi = isset($_REQUEST['presensi']) ? $_REQUEST['presensi'] : "";

// cari nama berdasarkan id
$tmp = mysqli_query($koneksi, "SELECT id_user from user where nama='$nama'");
$tmp2 = mysqli_fetch_object($tmp);


//  memasukkan data ke presensi harian
$query = mysqli_query($koneksi, "INSERT INTO presensi_harian values ('', '$tmp2->id_user', '$tanggal', 'presensi')");

// mau cari id_harian yang diinput
$tmp3 = mysqli_query($koneksi, "SELECT * FROM presensi_harian WHERE tanggal='$tanggal' AND id_user='$tmp2->id_user' ");
$id_harian = mysqli_fetch_object($tmp3)->id_harian;

//  memasukkan data ke presensi lembur
$query2 = mysqli_query($koneksi, "INSERT INTO presensi_lembur values ('', '$id_harian','$lembur' )");

// input ke check_tools
$k=0;

while ($k < count($tool)) {	
	$query3 = mysqli_query($koneksi, "INSERT INTO cek_tools values ('', '$id_harian' , '$tool[$k]')");
	$k++;

}



// $tool = isset($_REQUEST['tool']) ? implode(',',$_REQUEST['tool']) : "";
// print_r($tmp2);
// echo " " . $nama . " " . $tanggal . " " . $lembur .  " " . $tool[0] .  " " . $tmp2->id_user;


// <br>
// echo count($tool);
// exit;

// $query4 = mysqli_query($koneksi, "INSERT INTO tools  values ('','$tool')");

// $tmp3 = mysqli_query($koneksi, "INSERT INTO cek_tools values ('', '$tmp4->id_harian' , '$tmp4->id_tools'");

// print_r($tmp5);

// while ($tmp4 = mysqli_fetch_object($tmp3)) {
// }

// exit;

//input di tools tapi ga bisa hahaha
// masukin dulu id_harian ke cek_tools
// while ($k = mysqli_fetch_object($tmp3)) {
// ?><br><?php
// print_r($k);
// }
// $query4 = mysqli_query($koneksi, "SELECT * FROM cek_tools join tools on cek_tools.id_tools=tools.id_tools");

// while ($tmp6 = mysqli_fetch_object($query4)) {
// ?><br><?php
// print_r($tmp6);
// }

// exit;


// $query = mysqli_query($koneksi, "INSERT INTO tools values ('','$tanggal', '$nama_teknisi', '$tool')");

// echo "\n query2 "; print_r($query2);
// if ($tmp4-> != ){	
// // input data ke presensi lembur
// }

// echo " tmp3 "; print_r($tmp3);
// echo "\n query "; print_r(mysqli_fetch_object($query));
// echo "\n query2 f "; print_r(mysqli_fetch_object($tmp3));
// exit;

//cek apakah berhasil disimpan apa tidak
if ($query) {
	echo "
		<script>
			alert('Data berhasil ditambahkan');
			window.location.href='dashboard.php?tengah=presensi_data';
		</script>
	";
}else{
	echo "
		<script>
			alert('Data gagal untuk disimpan');
			// window.location.href='dashboard.php?tengah=workorde_data';
			window.history.go(-1);
		</script>
	";
};