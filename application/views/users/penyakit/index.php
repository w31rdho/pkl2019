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
          <h6 class="panel-title"><i class="icon-clipboard6"></i> Data <?php echo $judul_web; ?> <a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
          <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <!-- <li><a data-action="close"></a></li> -->
            </ul>
           </div>
        </div>
				<hr style="margin:0px;">
        <div class="panel-body">
                <a href="penyakit/view/t" class="btn btn-primary"><i class="icon-plus2"></i> <?php echo $judul_web; ?> Baru</a>
        </div>
            <div class="table-responsive">
              <table class="table datatable-basic table-bordered table-striped" width="100%">
                <thead>
                  <tr>
                    <th width="1%">No.</th>
                    <th width="10%">Kode</th>
                    <th width="20%">Nama Penyakit</th>
                    <th width="22%">Keterangan</th>
                    <th width="10%">Tanggal</th>
                    <th class="text-center" width="13%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach ($sql->result() as $baris) {
                    ?>
                      <tr>
                        <th><?php echo $no++.'.'; ?></th>
                        <th><?php echo $baris->kode_penyakit; ?></th>
                        <td><?php echo ucwords($baris->nama_penyakit); ?></td>
                        <td><p style="white-space: pre-wrap;"><?php echo $baris->keterangan; ?></p></td>
                        <td><?php echo $baris->tgl_penyakit; ?></td>
                        <td class="text-center">
                          <a href="penyakit/view/e/<?php echo $baris->kode_penyakit; ?>" class="btn btn-success btn-xs" title="Edit"><i class="icon-pencil7"></i></a>
                          <a href="penyakit/view/h/<?php echo $baris->kode_penyakit; ?>" class="btn btn-danger btn-xs" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><i class="icon-trash"></i></a>
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
