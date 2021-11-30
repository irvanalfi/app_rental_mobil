<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>HRC Register</title>
	<!-- General CSS Files -->
	<link rel="stylesheet"
		href="<?= base_url() ?>assets/assets_admin/node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet"
		href="<?= base_url() ?>assets/assets_admin/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/selectric/public/selectric.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/assets/css/components.css">
</head>

<body>
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div
						class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

						<div class="card card-primary mt-5">
							<div class="card-header" style="align-items: center !important;">
								<h4>Buat Password Baru</h4> <br>
							</div>
							<div class="card-body">
								<?php if ($this->session->flashdata('success') != null) : ?>
								<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert1">
									<?php echo $this->session->flashdata('success') ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<?php endif ?>
								<?php if ($this->session->flashdata('failed') != null) : ?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert1">
									<?php echo $this->session->flashdata('failed') ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<?php endif ?>

								<form method="POST" action="<?= base_url('password/ubah'); ?>">
									<div class="form-group">
										<small for="password">Password : </small>
										<input type="password" name="password" id="password" class="form-control"
											value="<?= set_value('') ?>" placeholder="Password">
										<span class="eye" onclick="tampilPassword()">
											<div id="tpassword" style="display: none;">
												<i class="fas fa-eye mt-2"></i><span style="font-size: 12px;">
													Sembunyikan Password</span>
											</div>
											<div id="tpassword1">
												<i class="fas fa-eye-slash mt-2"></i><small style="font-size: 12px;">
													Tampilkan Password</small>
											</div>
										</span>
										<?= form_error('password', '<div class="text-small text-danger">', '</div>') ?>
									</div>

									<div class="form-group">
										<small for="cpassword">Konfirmasi Password : </small>
										<input type="password" name="cpassword" id="cpassword" class="form-control"
											value="<?= set_value('') ?>" placeholder="Konfirmasi Password">
										<span class="eye" onclick="tampilCPassword()">
											<div id="tcpassword" style="display: none;">
												<i class="fas fa-eye mt-2"></i><span style="font-size: 12px;">
													Sembunyikan Password</span>
											</div>
											<div id="tcpassword1">
												<i class="fas fa-eye-slash mt-2"></i><span style="font-size: 12px;">
													Tampilkan Password</span>
											</div>
										</span>
										<?= form_error('cpassword', '<div class="text-small text-danger">', '</div>') ?>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
											Ubah Password
										</button>
									</div>
								</form>
							</div>
						</div>
						<div class="simple-footer fixed-bottom">
							<p>
								Copyright &copy;
								<script>
									document.write(new Date().getFullYear());

								</script>
								<i class="icon-heart color-danger" aria-hidden="true"></i> By <a href=""
									target="_blank">Do'a Ibu</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- General JS Scripts -->
	<script src="<?= base_url() ?>assets/assets_admin/node_modules/jquery/dist/jquery.min.js"></script>
	<!-- <script src="<?= base_url() ?>assets/assets_admin/node_modules/popper.js/dist/popper.min.js"></script> -->
	<script src="<?= base_url() ?>assets/assets_admin/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/assets_admin/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js">
	</script>
	<script src="<?= base_url() ?>assets/assets_admin/node_modules/moment/min/moment.min.js"></script>
	<script src="<?= base_url() ?>assets/assets_admin/assets/js/stisla.js"></script>

	<!-- JS Libraies -->

	<!-- Page Specific JS File -->

	<!-- Template JS File -->
	<script src="<?= base_url() ?>assets/assets_admin/assets/js/scripts.js"></script>
	<script src="<?= base_url() ?>assets/assets_admin/assets/js/custom.js"></script>

	<script>
		// auto close alert
		$("#alert1").fadeTo(2000, 500).slideUp(500, function () {
			$("#alert1").slideUp(1000);
		});

	</script>

	<script>
		// upload foto profile
		function previewPhoto() {
			const photo = document.querySelector('#avatar');
			const photoLabel = document.querySelector('.cfl');
			const imgPreview = document.querySelector('.ip');

			photoLabel.textContent = photo.files[0].name;

			const filePhoto = new FileReader();
			filePhoto.readAsDataURL(photo.files[0]);

			filePhoto.onload = function (e) {
				imgPreview.src = e.target.result;
			}
		}

		// upload gambar ktp
		function previewPhoto1() {
			const photo = document.querySelector('#ktp');
			const photoLabel = document.querySelector('.cfl1');
			const imgPreview = document.querySelector('.ip1');

			photoLabel.textContent = photo.files[0].name;

			const filePhoto = new FileReader();
			filePhoto.readAsDataURL(photo.files[0]);

			filePhoto.onload = function (e) {
				imgPreview.src = e.target.result;
			}
		}

		// tampil password 
		function tampilPassword() {
			var x = document.getElementById("password");
			var y = document.getElementById("tpassword");
			var z = document.getElementById("tpassword1");

			if (x.type === 'password') {
				x.type = "text";
				y.style.display = "block";
				z.style.display = "none";
			} else {
				x.type = "password";
				y.style.display = "none";
				z.style.display = "block";
			}
		}

		// tampil password confirm 
		function tampilCPassword() {
			var x = document.getElementById("cpassword");
			var y = document.getElementById("tcpassword");
			var z = document.getElementById("tcpassword1");

			if (x.type === 'password') {
				x.type = "text";
				y.style.display = "block";
				z.style.display = "none";
			} else {
				x.type = "password";
				y.style.display = "none";
				z.style.display = "block";
			}
		}

	</script>

</body>

</html>
