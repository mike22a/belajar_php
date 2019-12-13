<?php

$id_user = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
koneksi_db();
autentikasi();
aksesall();

//query untuk menampilkan data yang sebelumnya
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
$result = mysqli_fetch_object($query);
?>

<section class="wrapper">
 <h3><i class="fa fa-angle-right"></i> Data User</h3>


 <div class="row mt">
  <div class="col-lg-12">
    <div class="form-panel">
      <h4 class="mb"><i class="fa fa-angle-right"></i> Data <?= $result->nama ?></h4>
      <form class="form-horizontal style-form" method="post" action="user_proses_ubah.php">
        <input name="id" type="hidden" class="form-control" value="<?= $result->id_pengguna ?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Nama</label>
          <div class="col-sm-10">
            <input name="nama" type="text" class="form-control" value="<?= $result->nama ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Username</label>
          <div class="col-sm-10">
            <input name="username" type="text" class="form-control" value="<?= $result->username ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Level</label>
          <div class="col-sm-10">
            <select name="level" class="form-control" >
              <option value="admin" <?php if ($result->level == 'admin') echo 'selected';  ?>>Admin</option>
              <option value="owner" <?php if ($result->level == 'owner') echo 'selected';  ?>>Owner</option>
              <option value="teknisi" <?php if ($result->level == 'teknisi') echo 'selected';  ?>>Teknisi</option>
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
