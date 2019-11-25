<?php $this->load->view('web/diagnosa/atas'); ?>

<div class="col-md-3"></div>
<div class="col-md-6">
  <?php
  echo $this->session->flashdata('msg');
  ?>
  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-lg-3">Username</label>
      <div class="col-lg-9">
        <input type="text" name="username" class="form-control" value="" placeholder="Username & Password" maxlength="100" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-3">Nama Lengkap</label>
      <div class="col-lg-9">
        <input type="text" name="nama" class="form-control" value="" placeholder="Nama Lengkap" maxlength="100" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-3">Email</label>
      <div class="col-lg-9">
        <input type="email" name="email" class="form-control" value="" placeholder="Email" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-3">No HP</label>
      <div class="col-lg-9">
        <input type="no_hp" name="no_hp" class="form-control" value="" placeholder="No HP" onkeypress="return hanyaAngka(this);" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-3">Alamat</label>
      <div class="col-lg-9">
        <textarea name="alamat" class="form-control" rows="2" cols="80" placeholder="Alamat" required></textarea>
      </div>
    </div>

    <button type="submit" name="btnmulai" class="btn btn-primary" style="float:right;">Simpan & Mulai Konsultasi</button>

  </form>
</div>
<div class="col-md-3"></div>

<script type="text/javascript">
function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
  return true;
}
</script>

<?php $this->load->view('web/diagnosa/bawah'); ?>
