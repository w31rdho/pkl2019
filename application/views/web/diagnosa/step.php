<?php $this->load->view('web/diagnosa/atas'); ?>
<center>
  <h1 style="margin-top:-10px;">
    <b><?php echo $this->M_Web->pertanyaan($query->nama_gejala); ?></b>
  </h1>
</center>
<hr>
<div class="col-md-3"></div>
<div class="col-md-6">
  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <div class="col-lg-3"></div>
      <div class="col-lg-4">
        <label class="container" id="container">YA
          <input type="radio" name="status" value="ya" required>
          <span class="checkmark"></span>
        </label>
      </div>
      <div class="col-lg-3">
        <label class="container" id="container">TIDAK
          <input type="radio" name="status" value="tidak" required>
          <span class="checkmark"></span>
        </label>
      </div>
      <div class="col-lg-2"></div>
    </div>

    <center><button type="submit" name="btnstep" class="btn btn-primary btn-lg">Jawab</button></center>
  </form>
</div>
<div class="col-md-3"></div>
<?php $this->load->view('web/diagnosa/bawah'); ?>
