<?php
autentikasi();
aksesall();
?>

<section class="wrapper">
 <h3><i class="fa fa-angle-right"></i> Tambah User</h3>


 <div class="row mt">
  <div class="col-lg-12">
    <div class="form-panel">
      <h4 class="mb"><i class="fa fa-angle-right"></i></h4>
      <form class="form-horizontal style-form" method="post" action="user_proses_tambah.php">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Nama</label>
          <div class="col-sm-10">
            <input name="nama" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Username</label>
          <div class="col-sm-10">
            <input name="username" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
            <input name="password1" type="password" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Retype</label>
          <div class="col-sm-10">
            <input name="password2" type="password" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Level</label>
          <div class="col-sm-10">
            <select name="level" class="form-control">
              <option value="admin">Admin</option>
              <option value="owner">Owner</option>
              <option value="teknisi">Teknisi</option>
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
