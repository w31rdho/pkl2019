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
                <a href="gejala/view/t" class="btn btn-primary"><i class="icon-plus2"></i> <?php echo $judul_web; ?> Baru</a>
        </div>
            <div class="table-responsive">
              <table class="table datatable-basic table-bordered table-striped" width="100%">
                <thead>
                  <tr>
                    <th width="1%">No.</th>
                    <th width="10%">KODE</th>
                    <th width="67%">Nama Gejala</th>
                    <th width="10%">Tanggal</th>
                    <th class="text-center" width="12%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach ($sql->result() as $baris) {
                    ?>
                      <tr>
                        <th><?php echo $no++.'.'; ?></th>
                        <th><?php echo $baris->kode_gejala; ?></th>
                        <td><?php echo ucwords($baris->nama_gejala); ?></td>
                        <td><?php echo $baris->tgl_gejala; ?></td>
                        <td>
                          <a href="gejala/view/e/<?php echo $baris->kode_gejala; ?>" class="btn btn-success btn-xs" title="Edit"><i class="icon-pencil7"></i></a>
                          <a href="gejala/view/h/<?php echo $baris->kode_gejala; ?>" class="btn btn-danger btn-xs" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><i class="icon-trash"></i></a>
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
