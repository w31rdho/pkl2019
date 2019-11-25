<div class="col-md-1"></div>
<div class="col-md-10" style="margin-top:-40px;">

	<div class="panel panel-flat panel-collapsed">
		<div class="panel-heading">
			<h6 class="panel-title"><i class="icon-clipboard6"></i> DATA GEJALA <a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
			<div class="heading-elements">
				<ul class="icons-list">
						<li><a data-action="collapse"></a></li>
				</ul>
			 </div>
		</div>
		  <div class="table-responsive">
				<table class="table table-bordered table-striped" width="100%">
					<tr style="background:#263238;color:#fff;">
						<th width="1%">NO.</th>
						<th width="2%">KODE</th>
						<th>NAMA GEJALA</th>
					</tr>
			    <?php
					$no=1;
					foreach ($v_gejala->result() as $key => $value): ?>
			      <tr>
							<th><?php echo $no++; ?>.</th>
			        <td><?php echo $value->kode_gejala; ?></td>
			        <td><?php echo $value->nama_gejala; ?></th>
			      </tr>
			    <?php endforeach; ?>
			  </table>
		  </div>
	</div>

	<div class="panel panel-flat panel-collapsed">
		<div class="panel-heading">
			<h6 class="panel-title"><i class="icon-clipboard6"></i> DATA penyakit <a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
			<div class="heading-elements">
				<ul class="icons-list">
						<li><a data-action="collapse"></a></li>
				</ul>
			 </div>
		</div>
		  <div class="table-responsive">
				<table class="table table-bordered table-striped" width="100%">
					<tr style="background:#263238;color:#fff;">
						<th width="1%">NO.</th>
						<th width="2%">KODE</th>
						<th width="27%">NAMA PENYAKIT</th>
						<th width="35%">KETERANGAN</th>
						
					</tr>
			    <?php
					$no=1;
					foreach ($v_penyakit->result() as $key => $value): ?>
			      <tr>
							<th><?php echo $no++; ?>.</th>
			        <td><?php echo $value->kode_penyakit; ?></td>
			        <td><?php echo $value->nama_penyakit; ?></th>
			        <td>
								<p style="white-space: pre-wrap;"><?php echo $value->keterangan; ?></p>
							</th>
			        
			      </tr>
			    <?php endforeach; ?>
			  </table>
		  </div>
	</div>

	<div class="panel panel-flat panel-collapsed">
		<div class="panel-heading">
			<h6 class="panel-title"><i class="icon-link"></i> DATA RELASI <a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
			<div class="heading-elements">
				<ul class="icons-list">
						<li><a data-action="collapse"></a></li>
				</ul>
			 </div>
		</div>
		  <div class="table-responsive">
				<table class="table table-bordered table-striped" width="100%">
					<tr style="background:#263238;color:#fff;">
						<th width="1%">NO.</th>
						<th width="27%">PENYAKIT</th>
						<?php
						foreach ($v_gejala->result() as $key => $value) {?>
							<th width="1%"><?php echo $value->kode_gejala; ?></th>
						<?php
						} ?>
					</tr>
			    <?php
					$no=1;
					foreach ($v_penyakit->result() as $baris): ?>
			      <tr>
							<th><?php echo $no++; ?>.</th>
							<td><?php echo "($baris->kode_penyakit) ".ucwords($baris->nama_penyakit); ?></td>
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
								<td width="1%" align="center"><?php echo $ket; ?></td>
							<?php
							} ?>
			      </tr>
			    <?php endforeach; ?>
			  </table>
		  </div>
	</div>

</div>
