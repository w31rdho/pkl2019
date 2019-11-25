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
                        <input type="text" name="kode_penyakit" class="form-control" value="<?php echo $query->kode_penyakit; ?>" placeholder="Kode penyakit" maxlength="100" readonly required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2">Nama penyakit</label>
                      <div class="col-lg-10">
                        <input type="text" name="nama_penyakit" class="form-control" value="<?php echo $query->nama_penyakit; ?>" placeholder="Nama penyakit" required autofocus>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2">keterangan</label>
                      <div class="col-lg-10">
                        <textarea name="keterangan" class="form-control" placeholder="keterangan" rows="4" cols="80" required><?php echo $query->keterangan; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      
                    <a href="penyakit/view" class="btn btn-default">Data penyakit</a>
                    <button type="submit" name="btnupdate" class="btn btn-primary" style="float:right;">Simpan</button>
                  </form>
              </fieldset>


            </div>

        </div>
      </div>
    </div>
    <!-- /dashboard content -->
