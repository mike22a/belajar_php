<?php
autentikasi();
aksesadmin();
?>

<section class="wrapper">
 <h3><i class="fa fa-angle-right"></i> Tambah Presensi</h3>


 <div class="row mt">
  <div class="col-lg-12">
    <div class="form-panel">
      <h4 class="mb"><i class="fa fa-angle-right"></i> </h4>
      <form class="form-horizontal style-form" method="post" action="presensi_proses_tambah.php">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Nama Teknisi</label>
          <div class="col-sm-10">
            <input name="nama_teknisi" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Harian</label>
          <div class="col-sm-10">
            <input name="harian" type="text" class="form-control" placeholder="tahun-bulan-tanggal (0000-00-00)">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Lembur</label>
          <div class="col-sm-10">
            <input name="lembur" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Bonus</label>
          <div class="col-sm-10">
            <input name="bonus" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label"></label>
          <div class="col-sm-10">
            <button type="submit" class="btn btn-round btn-primary">Tambah</button>
          </div>
        </div>
      </form>  
    </div>
  </div><!-- col-lg-12-->       
</div><!-- /row -->
</section><! --/wrapper -->
