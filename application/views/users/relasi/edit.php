<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">
    <!-- Dashboard content -->
		<?php
		echo $this->session->flashdata('msg');
		?>
    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h6 class="panel-title"><i class="icon-link"></i> Data <?php echo $judul_web; ?> <a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
          <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <!-- <li><a data-action="close"></a></li> -->
            </ul>
           </div>
        </div>
				<hr style="margin:0px;">
        <!-- <div class="panel-body"> -->
          <?php //$this->load->view('users/relasi/data'); ?>
        <!-- </div> -->
        <?php $baris = $query->row();  ?>
        <form action="" method="post">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" width="100%">
              <thead>
                <tr>
                  <th colspan="<?php echo $v_gejala->num_rows()+1; ?>">
                    KRITERIA : <?php echo "[$baris->kode_penyakit] ".ucwords($baris->nama_penyakit); ?>
                  </th>
                </tr>
                <tr style="background:#263238;color:#fff;">
                  <th colspan="<?php echo $v_gejala->num_rows()+1; ?>" style="text-align:center">GEJALA</th>
                </tr>
                <tr style="background:#263238;color:#fff;">
                  <th>KODE</th>
                  <th>NAMA</th>
                  <th colspan="<?php echo $v_gejala->num_rows(); ?>">PILIHAN</th>
                </tr>
              </thead>
              <tbody>
                      <?php
                      foreach ($v_gejala->result() as $key => $value) {
                        $cek_data = $this->db->get_where('tbl_relasi', array('kode_penyakit'=>$baris->kode_penyakit,'kode_gejala'=>$value->kode_gejala));
                        ?>
                        <tr>
                          <th width="1%"><?php echo $value->kode_gejala; ?></th>
                          <td width="94%"><?php echo $value->nama_gejala; ?></td>
                          <td width="5%">
                            <select class="form-control" name="ket_<?php echo $value->kode_gejala;?>" style="width:80px;">
                              <option value=""></option>
                              <option value="Tidak" <?php if ($cek_data->num_rows()!=0) {if ($cek_data->row()->ket=='Tidak') {echo "selected";}} ?>>Tidak</option>
                              <option value="Ya" <?php if ($cek_data->num_rows()!=0) {if ($cek_data->row()->ket=='Ya') {echo "selected";}} ?>>Ya</option>
                            </select>
                          </td>
                        </tr>
                      <?php
                      } ?>
              </tbody>
            </table>
          </div>

      <br>
        <a href="relasi/view" class="btn btn-warning" style="margin-left:20px;"><b><< Data Relasi</b></a>
        <button type="submit" class="btn btn-primary" name="btnsimpan" style="float:right;margin-right:20px;"><b>Simpan</b></button>

      </form>
      <br>
          <!-- </div> -->
        </div>
      </div>

      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
