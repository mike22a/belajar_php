<?php
autentikasi();
aksesadmin();

$query = mysqli_query($koneksi, "SELECT user.nama FROM user where nama like '%Teknisi%'");


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
          <label class="col-sm-2 col-sm-2 control-label">Tanggal Masuk</label>
          <div class="col-sm-10">
            <input name="tanggal" type="text" class="form-control" placeholder="tahun-bulan-tanggal (0000-00-00)">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Lembur</label>
          <div class="col-sm-10">
            <input name="lembur" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Presensi</label>
          <div class="col-sm-10">
            <select name="presensi" class="form-control" >
              <option value="ya">ya</option>
              <option value="tidak">tidak</option>
            </select>
          </div>
        </div>
        <!-- input tools via presensi -->
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Tools</label>
          <div class="col-sm-10">
          <label class="checkbox-inline">
            <input type="checkbox" id="tool1" value="1"  name="tool[]"> 1
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" id="tool2" value="2"  name="tool[]"> 2
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" id="tool3" value="3"  name="tool[]"> 3
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" id="tool4" value="4"  name="tool[]"> 4
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" id="tool5" value="5"  name="tool[]"> 5
          </label>
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
