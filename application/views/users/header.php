<!DOCTYPE html>
<?php
$menu 		= strtolower($this->uri->segment(1));
$sub_menu = strtolower($this->uri->segment(2));
$sub_menu3 = strtolower($this->uri->segment(3));

$ceks = $this->session->userdata('username');
$nama = $this->session->userdata('nama');
$mod='';

$level = $this->session->userdata('level');
?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<base href="<?php echo base_url(); ?>">
	<title><?php echo $judul_web; ?></title>
	<link id="favicon" rel="shortcut icon" href="img/logo.png" type="image/png" />

	<!-- Global stylesheets -->
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.maskMoney.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<?php
	if ($menu == 'users' AND $sub_menu == "" or $sub_menu == "profile") {?>
	<!-- Theme JS files -->

		<link rel="stylesheet" href="assets/calender/css/style.css">
		<link rel="stylesheet" href="assets/calender/css/pignose.calendar.css">

	<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>

	<!-- <script type="text/javascript" src="assets/js/core/app.js"></script> -->
	<!-- <script type="text/javascript" src="assets/js/pages/dashboard.js"></script> -->
	<script src="assets/calender/js/pignose.calendar.js"></script>
	<!-- /theme JS files -->
	<?php
	} ?>

		<?php
	if ($menu == "gejala" or $menu == "penyakit" or $menu == "relasi" or $menu == "diagnosa" AND $sub_menu == "riwayat") {?>
	<!-- Theme JS files -->
			<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/editors/summernote/summernote.min.js"></script>
			<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

			<!-- <script type="text/javascript" src="assets/js/core/app.js"></script> -->
			<script type="text/javascript" src="assets/js/pages/editor_summernote.js"></script>
			<script type="text/javascript" src="assets/js/pages/datatables_basic.js"></script>

	<!-- /theme JS files -->
	<?php
	} ?>
<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script src="assets/js/select2.min.js"></script>
	<script src="assets/js/jquery-ui.js"></script>

	<script type="text/javascript">
	$(document).ready(function () {
	  $(".cari_indikator").select2({
	      placeholder: "- Cari Indikator -"
	  });
	  $(".cari_gejala").select2({
	      placeholder: "- Cari Gejala -"
	  });
	});
	</script>

	<style>
		th{
			font-weight: bold;
		}
		table.dataTable tbody th, table.dataTable tbody td {
		  vertical-align: top;
		}
	</style>
</head>
<body class="<?php if($menu=='relasi'){echo "sidebar-xs";} ?>">

	<!-- Main navbar -->
	<div class="navbar navbar-default header-highlight">
		<div class="navbar-header">
			<a class="navbar-brand" href="" style="color:white;"><center> Panel <span class="label bg-purple-400">Pakar</span> </center></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a href="" target="_blank"><i class="icon-eye"></i> Web</a></li>
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
				<li><a class="hidden-xs" href="" target="_blank"><i class="icon-eye"></i> Web</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="assets/images/default.png" class="img-circle" alt="" width="30" height="28">
						<span><?php echo ucwords($nama); ?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="users/profile"><i class="icon-user"></i> Profile</a></li>
						<li><a href="users/ubah_pass"><i class="icon-key"></i> Ubah Password</a></li>
						<li class="divider"></li>
						<li><a href="web/logout" onclick="return confirm('Anda Yakin ingin Log Out?');"><i class="icon-switch2"></i> Log Out</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="users/profile" class="media-left"><img src="assets/images/default.png" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo $nama; ?></span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;<?php echo ucwords($ceks); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main Menu</span> <i class="icon-menu" title="Main Menu"></i></li>
								<li class="<?php if ($menu=="users" AND $sub_menu=="") { echo 'active';}?>"><a href="users"><i class="icon-home4"></i> <span>Beranda</span></a></li>

								<li class="<?php if ($sub_menu=="profile" AND $sub_menu3=='') { echo 'active';}?>"><a href="users/profile"><i class="icon-user"></i> <span>Profile</span></a></li>
							<?php if ($level=='admin') { ?>
								<li class="<?php if ($menu=="gejala") { echo 'active';}?>"><a href="gejala"><i class="icon-clipboard6"></i> <span>Data Gejala</span></a></li>
								<li class="<?php if ($menu=="penyakit") { echo 'active';}?>"><a href="penyakit"><i class="icon-clipboard6"></i> <span>Data penyakit</span></a></li>
								<li class="<?php if ($menu=="relasi") { echo 'active';}?>"><a href="relasi"><i class="icon-link"></i> <span>Relasi</span></a></li>
							<?php } ?>
								<li class="<?php if ($menu=="diagnosa" AND $sub_menu=="riwayat") { echo 'active';}?>"><a href="diagnosa/riwayat"><i class="icon-clipboard5"></i> <span>Riwayat Konsultasi</span></a></li>
								<li class="<?php if ($sub_menu=="ubah_pass") { echo 'active';}?>"><a href="users/ubah_pass"><i class="icon-lock"></i> <span>Ubah Password</span></a></li>
								<!-- /main -->

								<!-- Logout -->
								<li class="navigation-header"><span>Lainnya</span> <i class="icon-menu" title="Lainnya"></i></li>
								<li><a href="web/logout" onclick="return confirm('Anda Yakin ingin Log Out?');"><i class="icon-switch2"></i> <span>Log Out </span></a></li>

								<!-- /logout -->

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->
