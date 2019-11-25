<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">
    <?php
		echo $this->session->flashdata('msg');
		?>
    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="panel panel-flat">

            <div class="panel-body">

              <fieldset class="content-group">
                <legend class="text-bold"><i class="icon-clipboard6"></i> <?php echo $judul_web; ?></legend>

                  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="control-label col-lg-3">Kode Gejala</label>
                      <div class="col-lg-9">
                        <input type="text" name="kode_gejala" class="form-control" value="<?php echo $query->kode_gejala; ?>" placeholder="Kode Gejala" maxlength="100" readonly required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-3">Nama Gejala</label>
                      <div class="col-lg-9">
                        <input type="text" name="nama_gejala" class="form-control" value="<?php echo $query->nama_gejala; ?>" placeholder="Nama Gejala" required autofocus>
                      </div>
                    </div>

                    <a href="gejala/view" class="btn btn-default">Data Gejala</a>
                    <button type="submit" name="btnupdate" class="btn btn-primary" style="float:right;">Simpan</button>
                  </form>
              </fieldset>


            </div>

        </div>
      </div>
    </div>
    <!-- /dashboard content -->
