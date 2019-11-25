<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">
    <!-- Dashboard content -->
		<?php
		echo $this->session->flashdata('msg');
		$level = $this->session->userdata('level');
		?>
    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h6 class="panel-title"><i class="icon-clipboard6"></i> Data <?php echo $judul_web; ?> <a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
          <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <!-- <li><a data-action="close"></a></li> -->
            </ul>
           </div>
        </div>
        <div class="panel-body">

        </div>
            <div class="table-responsive">
              <table class="table datatable-basic table-bordered table-striped" width="100%">
                <thead>
                  <tr>
                    <th width="1%">No.</th>
                    <th width="19%">Nama Lengkap</th>
                    <th width="16%">E-mail</th>
                    <th width="14%">No. HP</th>
                    <th width="22%">Alamat</th>
                    <th width="10%">Tanggal</th>
                    <th class="text-center" width="18%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach ($sql->result() as $baris) {
                    ?>
                      <tr>
                        <th><?php echo $no++.'.'; ?></th>
                        <th><?php echo ucwords($baris->nama); ?></th>
                        <td><?php echo $baris->email; ?></td>
                        <td><?php echo $baris->no_hp; ?></td>
                        <td><?php echo $baris->alamat; ?></td>
                        <td><?php echo $baris->tgl_daftar; ?></td>
                        <td class="text-center">
                          <a href="diagnosa/hasil/<?php echo $baris->id_user; ?>/0/<?php echo $baris->diagnosa_ke; ?>" class="btn btn-info btn-xs" title="Detail" target="_blank"><i class="icon-list"></i></a>
                          <a href="diagnosa/hasil/<?php echo $baris->id_user; ?>/cetak/<?php echo $baris->diagnosa_ke; ?>" class="btn btn-default btn-xs" title="Cetak" target="_blank"><i class="icon-printer2"></i></a>
                          <a href="diagnosa/hapus/<?php echo $baris->id_user; ?>/<?php echo $baris->diagnosa_ke; ?>" class="btn btn-danger btn-xs" title="Hapus" onclick="return confirm('Anda Yakin?')"><i class="icon-trash"></i></a>
                        </td>
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
