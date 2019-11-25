<?php
               $this->db->order_by('kode_penyakit','DESC');
               $this->db->limit(1);
$data_keterangan = $this->db->get('tbl_penyakit');
if ($data_keterangan->num_rows() == 0) {
  $kode_new   = "P001";
}else{
  $row 		   = $data_keterangan->row();
  $noUrut    = substr($row->kode_penyakit, 1, 3);
  $noUrut++;
  $kode_new	 = "P".sprintf("%03s", $noUrut);
}
?>
<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">
    <?php
		echo $this->session->flashdata('msg');
		?>
    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="panel panel-flat">

            <div class="panel-body">

              <fieldset class="content-group">
                <legend class="text-bold"><i class="icon-clipboard6"></i> <?php echo $judul_web; ?></legend>

                  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="control-label col-lg-2">Kode Penyakit</label>
                      <div class="col-lg-10">
                        <input type="text" name="kode_penyakit" class="form-control" value="<?php echo $kode_new; ?>" placeholder="Kode Penyakit" maxlength="100" readonly required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2">Nama Penyakit</label>
                      <div class="col-lg-10">
                        <input type="text" name="nama_penyakit" class="form-control" value="" placeholder="nama penyakit" required autofocus>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2">keterangan</label>
                      <div class="col-lg-10">
                        <textarea name="keterangan" class="form-control" placeholder="keterangan" rows="4" cols="80" required></textarea>
                      </div>
                    </div>
                    

                    <a href="penyakit/view" class="btn btn-default">Data Penyakit</a>
                    <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>
                  </form>
              </fieldset>


            </div>

        </div>
      </div>
    </div>
    <!-- /dashboard content -->
