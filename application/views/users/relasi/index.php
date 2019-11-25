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
        <div class="panel-body">
          <?php $this->load->view('users/relasi/data'); ?>
        </div>
            <div class="table-responsive">
              <table class="table table-bordered table-striped" width="100%">
                <thead>
                  <tr style="background:#263238;color:#fff;">
                    <th width="1%" style="text-align:center">#</th>
                    <th width="20%">Nama penyakit</th>
                    <?php
                    foreach ($v_gejala->result() as $key => $value) {?>
                      <th width="1%"><?php echo $value->kode_gejala; ?></th>
                    <?php
                    } ?>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach ($v_penyakit->result() as $baris) {
                    ?>
                      <tr>
                        <td class="text-center">
                          <a href="relasi/view/e/<?php echo $baris->kode_penyakit; ?>" class="btn btn-info btn-xs" title="Edit">ATUR</a>
                        </td>
                        <th><?php echo "[$baris->kode_penyakit] ".ucwords($baris->nama_penyakit); ?></th>
                        <?php
                        foreach ($v_gejala->result() as $key => $value) {
                          $cek_data = $this->db->get_where('tbl_relasi', array('kode_penyakit'=>$baris->kode_penyakit,'kode_gejala'=>$value->kode_gejala));
                          if ($cek_data->num_rows()==0) {
                            $ket = '-';
                          }else {
                            if ($cek_data->row()->ket=='Ya') {
                              $ket = '<i class="icon-checkmark4" style="color:green"></i>';
                            }else {
                              $ket = '-';
                            }
                          }
                          ?>
                          <th width="1%"><center><?php echo $ket; ?></center></th>
                        <?php
                        } ?>
                      </tr>
                    <?php
                    } ?>
                </tbody>
              </table>
            </div>

          <!-- </div> -->
        </div>
      </div>

      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
