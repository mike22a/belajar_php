<?php

$id_presensi = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
koneksi_db();
autentikasi();
aksesadmin();

//query untuk menampilkan data yang sebelumnya
$query = mysqli_query($koneksi, "SELECT * FROM presensi WHERE id_presensi='$id_presensi'");
$result = mysqli_fetch_object($query);
?>

<section class="wrapper">
 <h3><i class="fa fa-angle-right"></i> Form Ubah Presensi</h3>


 <div class="row mt">
  <div class="col-lg-12">
    <div class="form-panel">
      <h4 class="mb"><i class="fa fa-angle-right"></i> </h4>
      <form class="form-horizontal style-form" method="post" action="presensi_proses_ubah.php">
        <input name="id" type="hidden" class="form-control" value="<?= $result->id_presensi ?>">
        <div class="form-group">
          <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Nama Teknisi</label>
          <div class="col-sm-10">
            <input name="nama_teknisi" type="text" class="form-control" value="<?= $result->nama_teknisi ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Tanggal Masuk</label>
          <div class="col-sm-10">
            <input name="tanggal" type="text" class="form-control" value="<?= $result->tanggal ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Lembur</label>
          <div class="col-sm-10">
            <input name="lembur" type="text" class="form-control" value="<?= $result->lembur ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Tools</label>
          <div class="col-sm-10">
            <input name="tool" type="text" class="form-control" value="<?= $result->tool ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label"></label>
          <div class="col-sm-10">
            <button type="submit" class="btn btn-round btn-primary">Ubah</button>
          </div>
        </div>
      </form>  
    </div>
  </div><!-- col-lg-12-->       
</div><!-- /row -->
</section><! --/wrapper -->
