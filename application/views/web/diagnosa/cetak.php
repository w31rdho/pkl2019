<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<base href="<?php echo base_url(); ?>">
	<title>CETAK <?php echo $judul; ?></title>

	<link id="favicon" rel="shortcut icon" href="assets/images/favicon.png" type="image/png" />

	<!-- Global stylesheets -->
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="assets/css/docs.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/custom_radio_button.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<!-- /theme JS files -->
	<style>
		th{
			font-weight: bold;
		}
		table.dataTable tbody th, table.dataTable tbody td {
		  vertical-align: top;
		}
    #jarak{
        padding-left:5px;padding-right:5px;vertical-align:top;
    }
    #v_top{
			padding-left:10px;
      vertical-align:top;
    }
	</style>
</head>
<body onload="window.print();">

  <h3 align="center">
    <b>
      HASIL <?php echo $this->M_Web->judul_web(2); ?>
      <br>
      <?php echo $this->M_Web->judul_web(3); ?>
    </b>
  </h3>
	<br>
    <table class="table table-bordered" width="100%">
      <tr>
        <th width="25%" id="v_top">NAMA LENGKAP</th>
        <th width="1%" id="jarak">:</th>
        <td width="78%" id="jarak"><?php echo ucwords($query->nama); ?></td>
      </tr>
      <!-- <tr>
        <th>JENIS KELAMIN</th>
        <th id="jarak">:</th>
        <td id="jarak"><?php echo $query->jk; ?></td>
      </tr> -->
      <tr>
        <th id="v_top">E-MAIL</th>
        <th id="jarak">:</th>
        <td id="jarak"><?php echo $query->email; ?></td>
      </tr>
      <tr>
        <th id="v_top">NO. HP</th>
        <th id="jarak">:</th>
        <td id="jarak"><?php echo $query->no_hp; ?></td>
      </tr>
      <tr>
        <th id="v_top">ALAMAT</th>
        <th id="jarak">:</th>
        <td id="jarak"><?php echo $query->alamat; ?></td>
      </tr>
      <tr>
        <th id="v_top">JAWABAN PENGGUNA</th>
        <th id="jarak">:</th>
        <td id="jarak">
          <ul>
            <?php foreach ($v_diagnosa->result() as $key => $value):?>
              <li><?php echo $value->kode_gejala; ?> - <?php echo ucwords($value->nama_gejala); ?> <b>(<?php echo strtoupper($value->jawab); ?>)</b></li>
            <?php endforeach; ?>
          </ul>
        </td>
      </tr>
      <tr>
        <th id="v_top">HASIL <br> <div style="font-size:10px;">Forward Chaining</div> </th>
        <th id="jarak">:</th>
        <td id="jarak">
          <?php echo $this->M_Web->hasil_diagnosa($query->id_user,'hasil',$diagnosa_ke); ?>
        </td>
      </tr>
      <tr>
        <th id="v_top">KETERANGAN</th>
        <th id="jarak">:</th>
        <td id="jarak">
          <?php echo $this->M_Web->hasil_diagnosa($query->id_user,'keterangan',$diagnosa_ke); ?>
        </td>
      </tr>
    </table>

  </body>
</html>
