<!DOCTYPE html>
<?php
$menu 		= strtolower($this->uri->segment(1));
$sub_menu = strtolower($this->uri->segment(2));
$sub_menu3 = strtolower($this->uri->segment(3));

$ceks = $this->session->userdata('username');
$nama = $this->session->userdata('nama');
?>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<base href="<?php echo base_url(); ?>">
	<title><?php echo $judul_web; ?></title>
	<meta content="<?php echo $this->M_Web->judul_web(); ?>" name="description" />
	<meta content="" name="author" />
	<meta name="keywords" content="<?php echo $this->M_Web->judul_web(); ?>">

	<link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />

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
	<?php
if ($menu == "web" AND $sub_menu == "riwayat") {?>
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
	<!-- /theme JS files -->
	<style>
		th{
			font-weight: bold;
		}
		table.dataTable tbody th, table.dataTable tbody td, table.table tbody th, table.table tbody td {
		  vertical-align: top;
		}
	</style>
</head>
<body class="login-container">
	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href=""><img src="img/logo.png" alt="Logo" width="28" height="28">	</a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile">MENU</a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<!-- <p class="navbar-text"><span class="label bg-success-400">Online</span></p> -->

			<ul class="nav navbar-nav navbar-right">
				<li<?php if($menu=='web' AND $sub_menu=='' or $menu==''){echo ' class="active"';} ?>><a href=""><i class="icon-home4"></i> Beranda</a></li>
				<li<?php if($menu=='diagnosa' AND $sub_menu!='riwayat'){echo ' class="active"';} ?>><a href="diagnosa"><i class="icon-search4"></i> Konsultasi</a></li>
				<!-- <li><a href="abcd"><i class="icon-book"></i> Menu Baru</a></li> -->
				<?php if ($ceks == ''){ ?>
								<li><a href="web/login"><i class="icon-circle-right2"></i> Login </a></li>
				<?php }else{ ?>
								<li class="dropdown dropdown-user">
									<a class="dropdown-toggle" data-toggle="dropdown">
										<img src="assets/images/default.png" alt="foto" width="30" height="28">
										<span><?php echo $nama; ?></span>
										<i class="caret"></i>
									</a>

									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="users"><i class="icon-home4"></i> Beranda</a></li>
										<li><a href="users/profile"><i class="icon-user"></i> Profile</a></li>
										<li class="divider"></li>
										<li><a href="web/logout"><i class="icon-switch2"></i> Logout</a></li>
									</ul>
								</li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


		<!-- Page container -->
		<div class="page-container">

			<!-- Page content -->
			<div class="page-content">

				<!-- Main content -->
				<div class="content-wrapper">

					<!-- Content area -->
					<div class="content">
