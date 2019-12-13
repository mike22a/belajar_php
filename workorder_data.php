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
$query = mysqli_query($koneksi, "SELECT workorder.*,user.nama FROM $loc_workorder WHERE nama_pelanggan like '%$cari%' limit $offset,$dataPerPage");
// $result = mysqli_fetch_object($query);

// print_r($query);
// print_r($result);
// exit;

if(mysqli_num_rows($query)==0) {
  echo "
  <script>
  alert('Data tidak ada');
  // window.location.href='dashboard.php?tengah=workorder_data';
  </script>
  ";
}

?>


<section class="wrapper">
 <h3><i class="fa fa-angle-right"></i> Data Workorder</h3>

 <div class="row mt">
  <div class="col-md-12">
    <div class="content-panel">
      <!-- <form method="post" action="dashboard.php?tengah=data_user">
        <div class="col-lg-6 pull-right">
          <div class="input-group">
            <span class="input-group-btn">
              <button class="btn btn-default" aria-hidden="true" type="submit" name="tampil1" value=1>1</button>
              <button class="btn btn-default" aria-hidden="true" type="submit" name="tampil2" value=2>2</button>
            </span>
          </div>
        </div>
      </form> -->
      <form method="post" action="dashboard.php?tengah=data_user">
        <div class="col-lg-4 pull-right">
          <div class="input-group">
            <span class="input-group-btn">
              <button class="btn btn-default glyphicon glyphicon-search" aria-hidden="true" type="submit"></button>
            </span>
            <input name="cari" type="text" class="form-control" placeholder="Cari nama pelanggan...">
          </div>
        </div>
      </form>
      <table class="table table-striped table-advance table-hover">
       <h4><i class="fa fa-angle-right"></i> Workorder</h4>
       <hr>
       <thead>
        <tr>
          <th>#</th>
          <th><i class="fa fa-date"></i> Tanggal</th>
          <th class="hidden-phone"><i class="fa fa-archive"></i> Pelanggan</th>
          <th><i class="fa fa-user"></i> Alamat</th>
          <th><i class=" fa fa-phone"></i> No. Telp</th>
          <th><i class=" fa "></i>Kendaraan</th>
          <th><i class=" fa "></i>Keluhan</th>
          <th><i class=" fa "></i>Nama Teknisi</th>
          <th><i class=" fa "></i>Penilaian</th>
          <th><i class=" fa "></i>Aksi</th>
          <th><a href="dashboard.php?tengah=workorder_tambah" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a></th> <!-- kolom edit -->
        </tr>
      </thead>
      <tbody>
        <?php $i=1; 
        while ($result = mysqli_fetch_object($query)) {
          ?>
          <tr>
            <td><a href="basic_table.html#"><?= $i ?></a></td>
            <td><?= $result->tanggal ?></td>
            <td><?= $result->nama_pelanggan ?></td>
            <td><?= $result->alamat  ?></td>
            <td><?= $result->no_telp  ?></td>
            <td><?= $result->kendaraan  ?></td>
            <td><?= $result->keluhan  ?></td>
            <td><?= $result->nama  ?></td>            
            <td><?= $result->penilaian  ?></td>
            <td>
              <a href="dashboard.php?tengah=workorder_ubah&id=<?= $result->id_workorder ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
              <a href="workorder_hapus.php?id=<?= $result->id_workorder ?>" class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
          <?php
        $i++;
        }
        ?>          
      </tbody>
    </table>
  </div><!-- /content-panel -->
</div><!-- /col-md-12 -->
</div><!-- /row -->



<?php
  $qcount = "SELECT count(*) AS jumData FROM $loc_workorder where nama_pelanggan like '%$cari%'"; 
  $hasil = mysqli_query($koneksi,$qcount);
  //SELECT count (*) menghitung semua row yang ada pada tabel pengguna baik isi ataupun null
  $data = mysqli_fetch_array($hasil);

  $jumData = $data['jumData']; //$data->jumData fetch object

  $jumPage = ceil($jumData / $dataPerPage);

  //link untuk previous tampilan
  echo "<ul class='pagination'>";
  if ($noPage > 1)
    echo " <li>
                <a href='" .$_SERVER['PHP_SELF'] . "?cari=" . $cari . "&tengah=workorder_data&page=" . ($noPage - 1) .  "'>&lt;&lt; Prev</a></li>"
                ;

  //menambah nomor dan link halaman
  //penggunaan -3 dan +3 untuk membatasi posisi kiri maks 3 page dan kanan maks 3 page
  for ($page = 1; $page <= $jumPage; $page++) {
    if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page ==  $jumPage)) {
      if ((@$showPage == 1) && ($page != 2))
        echo "<li><a href= '#'>...</a></li>";
      if ((@$showPage != ($jumPage-1)) && ($page == $jumPage))
        echo "<li><a href = '#'>...</a></li>";
      if ($page == $noPage)
        echo "<li class='active'><a href = '#'>". $page . "</a></li>"; //membuat class active jika page = halaman yang terbuka
      else
        echo "<li><a href = '" . $_SERVER['PHP_SELF'] . "?cari=" . $cari . "&tengah=workorder_data&page=" . $page . "'>" . $page . "</a></li>";
      $showPage = $page;
    }
  }

  // tombol next  -_-
  if ($noPage < $jumPage)
    echo "<li>
              <a href='" . $_SERVER['PHP_SELF'] . "?cari" . $cari . "&tengah=workorder_data&page=" . ($noPage + 1) . "'>Next &gt;&gt;</a></li>
    </ul>";
?>




</section><! --/wrapper -->

<!-- <script>
  function alert_box() {
    if (confirm("Apakah Anda yakin akan menghapus data?")) {
      window.location.href="hapus.php?id=<?= $result->id_pengguna ?>";
    }else{

    };
  }
</script> -->
