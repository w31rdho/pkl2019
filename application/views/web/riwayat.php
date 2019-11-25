<div class="col-md-1"></div>
<div class="col-md-10" style="margin-top:-40px;">

  <div class="panel panel-flat panel-collapsed">
		<div class="panel-heading">
			<h6 class="panel-title"><i class="icon-clipboard5"></i> DATA RIWAYAT <a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
			<div class="heading-elements">
				<ul class="icons-list">
						<li><a data-action="collapse"></a></li>
				</ul>
			 </div>
		</div>
            <div class="table-responsive">
              <table class="table datatable-basic table-bordered table-striped" width="100%">
                <thead>
                  <tr>
                    <th width="1%">No.</th>
                    <th width="17%">Nama Lengkap</th>
                    <th width="16%">E-mail</th>
                    <th width="14%">No. HP</th>
                    <th width="27%">Alamat</th>
                    <th width="10%">Tanggal</th>
                    <th class="text-center" width="15%">Aksi</th>
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
                        </td>
                      </tr>
                    <?php
                    } ?>
                </tbody>
              </table>
            </div>
      </div>

</div>
