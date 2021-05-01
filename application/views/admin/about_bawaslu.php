<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Tentang Bawaslu</title>
	<!-- General CSS Files -->
	<link rel="icon" href="<?= base_url('assets/') ?>img/bawaslu.png" type="image/png">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:500,600,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>stisla-assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>stisla-assets/css/components.css">
	<script src="//cdn.jsdelivr.net/npm/afterglowplayer@1.x"></script>
</head>

<body>

	<!-- Start Sidebar -->
	<div id="app">
		<div class="main-wrapper">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<form class="form-inline mr-auto">
					<ul class=" navbar-nav mr-3">
						<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
						</li>
					</ul>
				</form>
				<ul class="navbar-nav navbar-right">
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
							<img alt="image" style="margin-bottom:4px !important;" src="<?= base_url('assets/') ?>stisla-assets/img/avatar/avatar-2.png" class="rounded-circle mr-1 my-auto border-white">
							<div class="d-sm-none d-lg-inline-block" style="font-size:15px;">Hello, <?php
																									$data['user'] = $this->db->get_where('admin', ['email' =>
																									$this->session->userdata('email')])->row_array();
																									echo $data['user']['username'];
																									?></div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="dropdown-title">Admin</div>
							<a href="<?= base_url('welcome/logout_admin') ?>" class="dropdown-item has-icon text-danger">
								<i class="fas fa-sign-out-alt"></i> Logout
							</a>
						</div>
					</li>
				</ul>
			</nav>

			<!-- Sidebar -->
			<div class="main-sidebar">
				<aside id="sidebar-wrapper">
					<div class="sidebar-brand text-danger mb-4">
						<div>
							<a href="<?= base_url('admin') ?>" style="font-size: 30px;font-weight:900;font-family: 'Poppins', sans-serif;" class="text-success text-center">
								<img class="mt-1" src="<?= base_url('assets/') ?>img/bawaslu.png" alt="" height="70px" width="70px">
							</a>
						</div>
					</div>
					<div class="sidebar-brand sidebar-brand-sm">
						<img class="mt-1" src="<?= base_url('assets/') ?>img/bawaslu.png" alt="" height="40px" width="40px">
					</div>
					<!-- Menu sidebar -->
					<ul class="sidebar-menu">
						<li class="nav-item">
							<a href="<?= base_url('admin') ?>" class="nav-link"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
						</li>
						<li class="menu-header">Manajemen</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/data_user') ?>" class="nav-link"><i class="fas fa-chalkboard-teacher"></i><span>User</span></a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/data_kegiatan') ?>" class="nav-link"><i class="fas fa-clipboard-list"></i><span>Kegiatan</span></a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/data_divisi') ?>" class="nav-link"><i class="fas fa-book"></i><span>Divisi</span></a>
						</li>
						<li class="nav-item active">
							<a href="<?= base_url('admin/about_bawaslu') ?>" class="nav-link"><i class="fas fa-address-card"></i><span>Tentang Bawaslu</span></a>
						</li>
					</ul>
				</aside>
			</div>
			<!-- End Sidebar -->

			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1 style="font-size: 27px; letter-spacing:-0.5px; color:black;">Tentang Project BAWASLU </h1>
					</div>
					<div class="">
						<video class="afterglow" autoplay id="myvideo" width="1280" height="720">
							<source type="video/mp4" src="<?= base_url('assets/') ?>profilbawaslu.mkv" />
						</video>
					</div>
					<br>
					<div class="">
						<div class="card" style="width:100%;">
							<div class="card-body">
								<h2 class="card-title" style="color: black;">Tentang Bawaslu</h2>
								<hr>
								<p class="card-text">Web Edukasi Open Source yang dibuat oleh Herman Jordan DKK. <br> BAWASLU adalah Web edukasi yang dilengkapi video, materi dan sistem ujian yang tersedia secara gratis. <br> Bawaslu dibuat ditujukan agar para pengguna dapat terus belajar dan mengajar dimana saja dan kapan saja. </p>
							</div>
						</div>
					</div>
				</section>
			</div>
			<!-- End Main Content -->

			<!-- Start Footer -->
			<footer class="main-footer">
				<div class="text-center">
					Copyright &copy; 2021 <div class="bullet"></div><a href="#">Jordan</a>
				</div>
			</footer>
			<!-- End Footer -->

		</div>
	</div>

	<!-- General JS Scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="<?= base_url('assets/') ?>stisla-assets/js/stisla.js"></script>
	<!-- Template JS File -->
	<script src="<?= base_url('assets/') ?>stisla-assets/js/scripts.js"></script>
	<script src="<?= base_url('assets/') ?>stisla-assets/js/custom.js"></script>
	<!-- Page Specific JS File -->
</body>

</html>
