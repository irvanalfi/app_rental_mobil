<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<!-- Nb: Template yang digunakan untuk menampilkan semua pada tampilan client /customer -->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&amp;display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url() ?>assets/assets_customer/css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/assets_customer/css/font-awesome.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/assets_customer/css/animate.css">

	<link rel="stylesheet" href="<?= base_url() ?>assets/assets_customer/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/assets_customer/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/assets_customer/css/magnific-popup.css">

	<link rel="stylesheet" href="<?= base_url() ?>assets/assets_customer/css/aos.css">

	<link rel="stylesheet" href="<?= base_url() ?>assets/assets_customer/css/ionicons.min.css">
	<!-- Date and Time picker  -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/assets_customer/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/assets_customer/css/jquery.timepicker.css">
	<!-- css  -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/assets_customer/css/flaticon.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/assets_customer/css/icomoon.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/assets_customer/css/style.css">

	<title>HRC</title>
</head>

<body>
	<!-- Nav Start  -->
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html">H<span>RC</span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item <?= $this->uri->segment(1) == '' || $this->uri->segment(1) == 'beranda' ? 'active' : ''; ?>">
						<a href="<?= site_url('beranda'); ?>" class="nav-link">Beranda</a>
					</li>
					<li class="nav-item <?= $this->uri->segment(1) == 'mobil' ? 'active' : ''; ?>"><a href="<?= site_url('mobil'); ?>" class="nav-link">Mobil</a></li>
					<!-- <li class="nav-item"><a href="#" class="nav-link">Blog</a></li> -->
					<li class="nav-item <?= $this->uri->segment(1) == 'contact' ? 'active' : ''; ?>"><a href="<?= site_url('contact'); ?>" class="nav-link">Contact</a></li>
					<?php if ($this->session->userdata('nama')) { ?>
						<li class="nav-item <?= $this->uri->segment(1) == 'transaksi' ? 'active' : ''; ?>"><a href="<?= site_url('transaksi'); ?>" class="nav-link">Transaction</a></li>
					<?php } ?>
					<div class="ml-5"></div>
					<?php if ($this->session->userdata('nama')) { ?>
						<li class="nav-item">
							<a href="<?= site_url('auth/logout'); ?>" class="nav-link"><?= $this->session->userdata('nama'); ?> | Logout</a>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<a href="<?= site_url('auth/login'); ?>" class="nav-link">Login</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->

	<!-- Start Content  -->
	<?php echo $contents ?>
	<!-- End Content  -->

	<!-- Footer Start  -->
	<footer class="ftco-footer ftco-bg-dark ftco-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2"><a href="#" class="logo">H<span>RC</span></a></h2>
						<p>Solusi cepat &amp; mudah untuk rental mobil di Banyuwangi, Kenyamanan dan kepuasan anda
							adalah prioritas kami</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-5">
						<h2 class="ftco-heading-2">Information</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">Tentang</a></li>
							<li><a href="#" class="py-2 d-block">Layanan</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Customer Support</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">Opsi Pembayaran</a></li>
							<li><a href="#" class="py-2 d-block">Booking Tips</a></li>
							<li><a href="#" class="py-2 d-block">Hubungi Kami</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><a href="#"><span class="icon icon-map-marker"></span><span class="text">Pringsejuta, Genteng, Banyuwangi.</span></a></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">+62
											82244922833</span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span class="text">halim@gmail.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">

					<p>
						Copyright &copy;
						<script>
							document.write(new Date().getFullYear());
						</script>
						<i class="icon-heart color-danger" aria-hidden="true"></i> By <a href="" target="_blank">Do'a
							Ibu</a>
					</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen">
		<svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg>
	</div>

	<script src="<?= base_url() ?>assets/assets_customer/js/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/assets_customer/js/jquery-migrate-3.0.1.min.js"></script>
	<script src="<?= base_url() ?>assets/assets_customer/js/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/assets_customer/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/assets_customer/js/jquery.easing.1.3.js"></script>
	<script src="<?= base_url() ?>assets/assets_customer/js/jquery.waypoints.min.js"></script>
	<script src="<?= base_url() ?>assets/assets_customer/js/jquery.stellar.min.js"></script>
	<script src="<?= base_url() ?>assets/assets_customer/js/owl.carousel.min.js"></script>
	<script src="<?= base_url() ?>assets/assets_customer/js/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url() ?>assets/assets_customer/js/aos.js"></script>
	<script src="<?= base_url() ?>assets/assets_customer/js/jquery.animateNumber.min.js"></script>
	<script src="<?= base_url() ?>assets/assets_customer/js/bootstrap-datepicker.js"></script>
	<script src="<?= base_url() ?>assets/assets_customer/js/jquery.timepicker.min.js"></script>
	<script src="<?= base_url() ?>assets/assets_customer/js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false">
	</script>
	<script src="<?= base_url() ?>assets/assets_customer/js/google-map.js"></script>
	<script src="<?= base_url() ?>assets/assets_customer/js/playbtn.js"></script>
	<script src="<?= base_url() ?>assets/assets_customer/js/main.js"></script>
	<script>
		// enabel submit button
		$(document).ready(function() {
			$('#centang2').click(function() {
				if ($(this).is(':checked')) {
					$('#btn-rntl').removeAttr('disabled');
				} else {
					$('#btn-rntl').attr('disabled', 'disabled');
				}
			})
		})
	</script>


</body>

</html>