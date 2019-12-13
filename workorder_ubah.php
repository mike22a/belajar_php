<?php

$id_workorder = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
koneksi_db();
autentikasi();
aksesadmin();

//query untuk menampilkan data yang sebelumnya
$query = mysqli_query($koneksi, "SELECT * FROM $loc_workorder WHERE id_workorder='$id_workorder'");
$result = mysqli_fetch_object($query);
?>

<section class="wrapper">
 <h3><i class="fa fa-angle-right"></i> Form Ubah Workorder</h3>


 <div class="row mt">
  <div class="col-lg-12">
    <div class="form-panel">
      <h4 class="mb"><i class="fa fa-angle-right"></i> </h4>
      <form class="form-horizontal style-form" method="post" action="workorder_proses_ubah.php">
        <input name="id" type="hidden" class="form-control" value="<?= $result->id_workorder ?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
          <div class="col-sm-10">
            <input name="tanggal" type="text" class="form-control" value="<?= $result->tanggal ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Nama Pelanggan</label>
          <div class="col-sm-10">
            <input name="nama_pelanggan" type="text" class="form-control" value="<?= $result->nama_pelanggan ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
          <div class="col-sm-10">
            <input name="alamat" type="text" class="form-control" value="<?= $result->alamat ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">No. Telepon</label>
          <div class="col-sm-10">
            <input name="no_telp" type="text" class="form-control" value="<?= $result->no_telp ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Kendaraan</label>
          <div class="col-sm-10">
            <input name="kendaraan" type="text" class="form-control" value="<?= $result->kendaraan ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Keluhan</label>
          <div class="col-sm-10">
            <input name="keluhan" type="text" class="form-control" value="<?= $result->keluhan ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Nama Teknisi</label>
          <div class="col-sm-10">
            <input name="nama" type="text" class="form-control" value="<?= $result->nama ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Penilaian</label>
          <div class="col-sm-10">
            <select name="penilaian" class="form-control" >
              <option value="Kurang Puas" <?php if ($result->penilaian == 'Kurang Puas') echo 'selected';  ?>>Kurang Puas</option>
              <option value="Puas" <?php if ($result->penilaian == 'Puas') echo 'selected';  ?>>Puas</option>
              <option value="Sangat Puas" <?php if ($result->penilaian == 'Sangat Puas') echo 'selected';  ?>>Sangat Puas</option>
            </select>           
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
