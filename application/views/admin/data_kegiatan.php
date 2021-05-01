<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Data Kegiatan</title>
	<!-- General CSS Files -->
	<link rel="icon" href="<?= base_url('assets/') ?>img/bawaslu.png" type="image/png">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:500,600,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>stisla-assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>stisla-assets/css/components.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.all.min.js"></script>

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
						<li class="nav-item active">
							<a href="<?= base_url('admin/data_kegiatan') ?>" class="nav-link"><i class="fas fa-clipboard-list"></i><span>Kegiatan</span></a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/data_divisi') ?>" class="nav-link"><i class="fas fa-book"></i><span>Divisi</span></a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/about_bawaslu') ?>" class="nav-link"><i class="fas fa-address-card"></i><span>Tentang Bawaslu</span></a>
						</li>
					</ul>
				</aside>
			</div>
			<!-- End Sidebar -->


			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="card">
						<div class="card-body">
							<h2 class="card-title" style="color: black;">Management Data Kegiatan</h2>
							<hr>
							<p class="card-text"> After I ran into Helen at a restaurant, I realized she was just office pretty drop-dead date put in in a deck for our standup today. Who's responsible for the ask for this request? who's responsible for the ask for this request? but moving the goalposts gain traction. </p>
							<a href="<?= base_url('admin/add_kegiatan') ?>" class="btn btn-success">
								Tambah Data Kegiatan ⭢ </a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="bg-white p-4" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
								<div class="table-responsive">
									<table id="example" class="table align-items-center table-flush">
										<thead class="thead-light">
											<tr class="text-center">
												<th scope="col">ID</th>
												<th scope="col">Nama Kegiatan</th>
												<th scope="col">Tanggal</th>
												<th scope="col">Foto</th>
												<th scope="col">Divisi</th>
												<th scope="col">Detail</th>
												<th scope="col">Option</th>
											</tr>
										</thead>

										<tbody>
											<?php

											foreach ($user as $u) {
											?>
												<tr class="text-center">

													<th scope="row">
														<?php echo $u->id ?>
													</th>

													<td>
														<?php echo $u->nama ?>
													</td>

													<td>
														<?php echo $u->tanggal ?>
													</td>

													<td>
														<img class="rounded-circle" height="40px" width="40px" src="<?= base_url() . $u->image; ?>">
													</td>

													<td>
														<?php echo $u->divisi ?>
													</td>

													<td class="text-center">
														<a href="<?php echo site_url('admin/detail_kegiatan/' . $u->id); ?>" class="btn btn-success">Detail ⭢</a>
													</td>

													<td class="text-center">
														<a href="<?php echo site_url('admin/update_kegiatan/' . $u->id); ?>" class="btn btn-info">Update ⭢</a>

														<a href="<?php echo site_url('admin/delete_kegiatan/' . $u->id); ?>" class="btn btn-danger remove">Delete ✖</a>
													</td>

												</tr>
											<?php
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<!-- End Main Content -->

	<!-- Start Sweetalert -->

	<?php if ($this->session->flashdata('success-edit')) : ?>
		<script>
			Swal.fire({
				icon: 'success',
				title: 'Data Kegiatan Telah Dirubah!',
				text: 'Selamat data berubah!',
				showConfirmButton: false,
				timer: 2500
			})
		</script>
	<?php endif; ?>

	<?php if ($this->session->flashdata('user-delete')) : ?>
		<script>
			Swal.fire({
				icon: 'success',
				title: 'Data Kegiatan Telah Dihapus!',
				text: 'Selamat data telah Dihapus!',
				showConfirmButton: false,
				timer: 2500
			})
		</script>
	<?php endif; ?>

	<!-- End Sweetalert -->

	<!-- Start Footer -->
	<footer class="main-footer">
		<div class="text-center">
			Copyright &copy; 2021 <div class="bullet"></div><a href="#">Jordan</a>
		</div>
	</footer>
	<!-- End Footer -->

	<!-- General JS Scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="<?= base_url('assets/') ?>stisla-assets/js/stisla.js"></script>
	<!-- JS Libraies -->
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>
	<!-- Template JS File -->
	<script src="<?= base_url('assets/') ?>stisla-assets/js/scripts.js"></script>
	<script src="<?= base_url('assets/') ?>stisla-assets/js/custom.js"></script>
</body>

</html>