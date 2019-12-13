<section class="wrapper site-min-height">
  <h3><i class="fa fa-angle-right"></i>Selamat Datang</h3>
  <div class="row mt">
    <div class="col-lg-12">
        <p>
        	<?php

        	autentikasi();
        	aksesall();
        	koneksi_db();

// if ()
        	$dataPerPage = 5;

        	if (isset($_GET['page'])) {
        		$noPage = $_GET['page'];
        	}else{
        		$noPage = 1;
        	}

// $noPage = isset($_GET['page']) ? $_GET['page'] : 1;

        	$offset = ($noPage - 1) * $dataPerPage;
//membuat variabel cari
        	$cari = isset($_REQUEST['cari']) ? $_REQUEST['cari'] : '';
        	$query = mysqli_query($koneksi, "SELECT * FROM tools where nama_teknisi like '%$cari%' limit $offset,$dataPerPage");
        	print_r(mysqli_fetch_object($query));
        	?>
        </p>
    </div>
  </div>			
</section>
