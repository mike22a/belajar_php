<?php

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
koneksi_db();
autentikasi();
aksesadmin();
$tool = array('','','','','','' );
//query untuk menampilkan data yang sebelumnya

$query = mysqli_query($koneksi, "SELECT presensi_harian.*,user.nama,presensi_lembur.jam FROM $loc_presensi where presensi_harian.id_harian='$id' ");

$result = mysqli_fetch_object($query);

// $tmpNama = "SELECT presensi_harian.*,user.nama FROM $loc_presensi where id_harian='$id'";
$query2 = mysqli_query($koneksi, "SELECT * FROM $loc_tools WHERE presensi_harian.id_harian='$id'");

  // echo $tmpNama;
  // while (
  // $result2 = mysqli_fetch_object($query2)
  // ){
  // print_r($result2);
  // }
  // exit;

?>

<section class="wrapper">
 <h3><i class="fa fa-angle-right"></i> Form Ubah Presensi</h3>


 <div class="row mt">
  <div class="col-lg-12">
    <div class="form-panel">
      <h4 class="mb"><i class="fa fa-angle-right">Data Presensi</i> </h4>
      <form class="form-horizontal style-form" method="post" action="presensi_proses_ubah.php">
        <input name="id" type="hidden" class="form-control" value="<?= $result->id_harian ?>">
        <div class="form-group">    
          <label class="col-sm-2 col-sm-2 control-label">Nama Teknisi</label>
          <div class="col-sm-10">
            <input name="nama" type="text" class="form-control" value="<?= $result->nama ?>">
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
            <input name="lembur" type="text" class="form-control" value="<?= $result->jam ?>">
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
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Tools</label>
          <div class="col-sm-10">
            <?php
            // echo "$id";
            $query3 = mysqli_query($koneksi, "SELECT * FROM tools left join cek_tools on tools.id_tools=cek_tools.id_tools WHERE id_harian='$id'");
            
            // $k=0;
            while ($result2 = mysqli_fetch_object($query3)) 
           // if ($tmpTgl == $result->tanggal && $tmpNama == $result->nama_teknisi){}
              // foreach(($result = mysqli_fetch_object($query)) as $selected){
            {
                $tool[$result2->id_tools]=$result2->nama_tool;
                // echo "$tool[$k]";
                // $k++;
            }

            // print_r($result2);
            //   }
              // $o = explode(',', $result2->tool);              
             ?>
             
             <label class="checkbox-inline">
              <input type="checkbox" id="tool1" name="tool[]" value="1" <?php $tool[1]=='tool 1' ? print 'checked' : '';?>> 1
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="tool2" name="tool[]" value="2" <?php $tool[2]=='tool 2' ? print 'checked' : '';?>> 2
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="tool3" name="tool[]" value="3" <?php $tool[3]=='tool 3' ? print 'checked' : '';?>> 3
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="tool4" name="tool[]" value="4" <?php $tool[4]=='tool 4' ? print 'checked' : '';?>> 4
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="tool5" name="tool[]" value="5" <?php $tool[5]=='tool 5' ? print 'checked' : '';?>> 5
            </label>
            <?php
          // }
          ?>
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
