<?php

autentikasi();
aksesall();
koneksi_db();

function rupiah($angka){
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
}

// if ()
$dataPerPage = 5;

if (isset($_GET['page'])) {
  $noPage = $_GET['page'];
}else{
  $noPage = 1;
}

$id_user = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
  
$query =mysqli_query($koneksi, "SELECT * FROM $loc_penggajian where user.id_user='$id_user' ");
// $query = mysqli_query($koneksi, "SELECT * FROM penggajian where nama like '%$cari%' limit $offset,$dataPerPage");
$sql = mysqli_fetch_object($query);

// print_r($sql);
// exit;

if(mysqli_num_rows($query)==0) {
  echo "
  <script>
  alert('Data tidak ada');
  //window.location.href='dashboard.php';
  </script>
  ";
}

?>


<section class="wrapper">
 <h3><i class="fa fa-angle-right"></i> Data Gaji</h3>

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
      <table class="table table-striped table-advance table-hover">
       <h4><i class="fa fa-angle-right"></i> <?= $sql->nama ?></h4>
       <hr>
       <thead>
        <tr>
          <th><i class="fa fa-eye"></i>#</th>
          <th class="hidden-phone"><i class="fa fa-archive"></i> Jenis </th>
          <th><i class="fa fa-user"></i> Banyak </th>
          <th><i class=" fa fa-phone"></i> Bayaran </th>
          <th><i class=" fa fa-key"></i> Total </th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1;
        // while ($result = mysqli_fetch_object($query)) {
          ?>
          <tr>
            <td><a href="basic_table.html#"><?= $i ?></a></td>            
            <td>Harian</td>
            <td><?= ($sql->harian)  ?></td>
            <td><?= rupiah($sql->gaji_harian  )?></td>
            <td><?= rupiah($sql->gaji_harian*$sql->harian)?></td>
          </tr>
          <tr>
            <td><a href="basic_table.html#"><?= $i+1 ?></a></td>            
            <td>Lemburan</td>
            <td><?= ($sql->jam)?></td>
            <td><?= rupiah($sql->gaji_lembur  )?></td>
            <td><?= rupiah($sql->gaji_lembur*$sql->jam)?></td>
          </tr>
          <tr>
            <td><a href="basic_table.html#"><?= $i+2 ?></a></td>            
            <td>Bonus</td>
            <td><?= 1 ?></td>
            <td><?= rupiah($sql->gaji_bonus ) ?></td>
            <td><?= rupiah($sql->gaji_bonus*1) ?></td>
          </tr>
              <?php 
            $i++;
          // }
            $total  = 2*$sql->gaji_harian + $sql->gaji_lembur*$sql->jam + $sql->gaji_bonus*1;
            ?>
            
          <tr>
            <td></td><td></td><td></td><td></td>
            <td><?= rupiah($total) ?></td>
          </tr>
      </tbody>
    </table>
  </div><!-- /content-panel -->
</div><!-- /col-md-12 -->
</div><!-- /row -->

</section><! --/wrapper -->

<!-- <script>
  function alert_box() {
    if (confirm("Apakah Anda yakin akan menghapus data?")) {
      window.location.href="hapus.php?id=<?= $result->id_pengguna ?>";
    }else{

    };
  }
</script> -->