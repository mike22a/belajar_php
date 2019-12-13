<?php
autentikasi();
aksesadmin();
$query = mysqli_query($koneksi, "SELECT user.nama FROM user where nama like '%Teknisi%'");

?>

<section class="wrapper">
 <h3><i class="fa fa-angle-right"></i> Tambah Workorder</h3>


 <div class="row mt">
  <div class="col-lg-12">
    <div class="form-panel">
      <h4 class="mb"><i class="fa fa-angle-right"></i> </h4>
      <form class="form-horizontal style-form" method="post" action="workorder_proses_tambah.php">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
          <div class="col-sm-10">
            <input name="tanggal" type="text" class="form-control" placeholder="tahun-bulan-tanggal (0000-00-00)">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Nama Pelanggan</label>
          <div class="col-sm-10">
            <input name="nama_pelanggan" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
          <div class="col-sm-10">
            <input name="alamat" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">No. Telepon</label>
          <div class="col-sm-10">
            <input name="no_telp" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Kendaraan</label>
          <div class="col-sm-10">
            <input name="kendaraan" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Keluhan</label>
          <div class="col-sm-10">
            <input name="keluhan" type="text" class="form-control">
          </div>
        </div><div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Nama Teknisi</label>
          <div class="col-sm-10">
            <!-- <input name="nama" type="text" class="form-control"> -->
            <select name="nama" class="form-control" >
            <?php
            while ($result = mysqli_fetch_object($query)) {
            echo '
              <option value="' . $result->nama . '">' . $result->nama . '</option>
            ';  
            }
            ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Penilaian</label>
          <div class="col-sm-10">
            <select name="penilaian" class="form-control" >
              <option value="Kurang Puas">Kurang Puas</option>
              <option value="Puas">Puas</option>
              <option value="Sangat Puas">Sangat Puas</option>
            </select>           
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
