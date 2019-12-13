<?php

// $id_tool = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
// $nama = isset($_REQUEST['nama_teknisi']) ? $_REQUEST['nama_teknisi'] : '';

// id harian buka id user
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$tool = array('','','','','','' );
koneksi_db();
autentikasi();
aksesadmin();

// echo "$id";
  
//query untuk menampilkan data yang sebelumnya
// $query = mysqli_query($koneksi, "SELECT * FROM tools WHERE nama_teknisi='$nama'");
$query = mysqli_query($koneksi, "SELECT * FROM cek_tools WHERE id_harian='$id'" );
// $result = mysqli_fetch_object($query);
// while ( $k = mysqli_fetch_object($query)) {
// print_r($k);
//   # code...
// }

$sql = mysqli_query($koneksi, "SELECT tools.*,user.nama,presensi_harian.tanggal FROM $loc_tools WHERE cek_tools.id_harian='$id' ");
// print_r($sql);
// exit;
// while (
$tmp = mysqli_fetch_object($sql);
// {
// print_r($tmp);

// }
// exit;
?>


<section class="wrapper">
 <h3><i class="fa fa-angle-right"></i> Form Ubah Data Tools</h3>


 <div class="row mt">
  <div class="col-lg-12">
    <div class="form-panel">
      <h4 class="mb"><i class="fa fa-angle-right"></i> <?= $tmp->nama ?></h4>
      <form class="form-horizontal style-form" method="post" action="tools_proses_ubah.php">
        <input name="id" type="hidden" class="form-control" value="<?= $id ?>">
        <!-- <?= $tmp->id_tools ?> -->
        <input name="nama" type="hidden" class="form-control" value="<?= $tmp->nama ?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
          <div class="col-sm-10">
            <input name="tanggal" type="text" class="form-control" value="<?= $tmp->tanggal ?>" readonly>
          </div>
        </div>
        <!-- <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Nama Teknisi</label>
          <div class="col-sm-10">
            <input name="nama" type="text" class="form-control" value="<?= $tmp->nama ?>">
          </div>
        </div> -->
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
