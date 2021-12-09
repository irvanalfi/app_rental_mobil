<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url() ?>assets/assets_customer/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
			<div class="col-md-9 ftco-animate">
				<p class="breadcrumbs"><span><?= $this->uri->segment(1); ?> <i class="ion-ios-arrow-forward"></i>
						<span><?= $this->uri->segment(2); ?></span></p>
				<h1 class="mb-3 bread">Profil Customer</h1>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section contact-section">
	<div class="container">

		<?php if ($this->session->flashdata('success') != null) : ?>
			<div class="row">
				<div class="col-md-12 mx-0" id="flash" data-flash="<?= $this->session->flashdata('success'); ?>">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?php echo $this->session->flashdata('success') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
		<?php endif ?>

		<?php if ($this->session->flashdata('failed') != null) : ?>
			<div class="row">
				<div class="col-md-12 mx-0" id="flash" data-flash="<?= $this->session->flashdata('failed'); ?>">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?php echo $this->session->flashdata('failed') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
		<?php endif ?>

		<div class="row d-flex mb-5 contact-info">
			<div class="col-md-4">
				<div class="row mb-5">
					<div class="col-md-12">
						<div class="border w-100 p-4 rounded mb-2 text-center">
							<div class="img-user">
								<img alt="image" src="<?= base_url('assets/upload/user/avatar/') . $user['avatar']; ?>" class="rounded-circle" style="height: 200px!important; width: 200px!important;">
								<hr>
							</div>
							<p><?php echo $user['nama'] ?></p>
							<p><?php echo $user['no_ktp'] ?></p>
							<?php if ($user['gender'] == 'L') : ?>
								<p>Laki-laki</p>
							<?php else : ?>
								<p>Perempuan</p>
							<?php endif ?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="border w-100 p-4 rounded mb-2 d-flex">
							<div class="icon mr-3">
								<span class="icon-mobile-phone"></span>
							</div>
							<p><span>Telpon:</span><?php echo $user['no_telepon'] ?></p>
						</div>
					</div>
					<div class="col-md-12">
						<div class="border w-100 p-4 rounded mb-2 d-flex">
							<div class="icon mr-3">
								<span class="icon-envelope-o"></span>
							</div>
							<p><span>Email:</span> <?php echo substr($user['email'], 0, 20) . '...'; ?></p>
						</div>
					</div>
					<div class="col-md-12">
						<div class="border w-100 p-4 rounded mb-2 d-flex">
							<div class="icon mr-3">
								<span class="icon-map"></span>
							</div>
							<div class="col-md-12">
								<p><span>Alamat:</span> <?php echo substr($user['alamat'], 0, 20) . '...'; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-umum-tab" data-toggle="tab" href="#nav-umum" role="tab" aria-controls="nav-umum" aria-selected="true">Update Data Diri</a>
						<a class="nav-item nav-link" id="nav-fitur" data-toggle="tab" href="#nav-fitur-mobil" role="tab" aria-controls="nav-fitur-mobil" aria-selected="false">Update Foto</a>
					</div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-umum" role="tabpanel" aria-labelledby="nav-home-tab">
						<div class="row mt-3">
							<div class="col-md-12 block-9 mb-md-5">
								<form action="<?= base_url('profil') ?>" class="bg-light p-4 contact-form" method="POST">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<small for="nama">Nama : </small>
												<input type="text" class="form-control" placeholder="Nama" value="<?= $user['nama']; ?>" name="nama">
												<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<small for="username">Username : </small>
												<input type="text" class="form-control" placeholder="Nama" value="<?= $user['username']; ?>" name="username">
												<input type="hidden" name="username_old" value="<?php echo $user['username'] ?>">
												<?= form_error('username', '<small class="text-danger">', '</small>') ?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<small for="email">Email : </small>
												<input type="text" class="form-control" placeholder="email" value="<?= $this->session->userdata('email'); ?>" name="email">
												<input type="hidden" name="email_old" value="<?php echo $user['email'] ?>">
												<?= form_error('email', '<small class="text-danger">', '</small>') ?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<small for="alama">Alamat : </small>
												<input type="text" class="form-control" placeholder="alamat" value="<?php echo $user['alamat'] ?>" name="alamat">
												<?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<small for="no_telepon">No. Telp : </small>
												<input type="text" class="form-control" placeholder="No. Telp" value="<?php echo $user['no_telepon'] ?>" name="no_telepon">
												<?= form_error('no_telepon', '<small class="text-danger">', '</small>') ?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<small for="no_ktp">No. KTP : </small>
												<input type="text" class="form-control" placeholder="Nomor KTP" value="<?php echo $user['no_ktp'] ?>" name="no_ktp">
												<input type="hidden" name="no_ktp_old" value="<?php echo $user['no_ktp'] ?>">
												<?= form_error('no_ktp', '<small class="text-danger">', '</small>') ?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<small for="password">Password : </small>
												<input type="password" name="password" id="password" class="form-control" value="<?= set_value('') ?>" placeholder="Password">
												<span class="eye" onclick="tampilPassword()">
													<div id="tpassword" style="display: none;">
														<i class="icon-eye mt-2"></i><span style="font-size: 12px;">
															Sembunyikan Password</span>
													</div>
													<div id="tpassword1">
														<i class="icon-eye-slash mt-2"></i><span style="font-size: 12px;"> Tampilkan Password</span>
													</div>
												</span>
												<?= form_error('password', '<div class="text-small text-danger">', '</div>') ?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<small for="cpassword">Konfirmasi Password : </small>
												<input type="password" name="cpassword" id="cpassword" class="form-control" value="<?= set_value('') ?>" placeholder="Konfirmasi Password">
												<span class="eye" onclick="tampilCPassword()">
													<div id="tcpassword" style="display: none;">
														<i class="icon-eye mt-2"></i><span style="font-size: 12px;">
															Sembunyikan Password</span>
													</div>
													<div id="tcpassword1">
														<i class="icon-eye-slash mt-2"></i><span style="font-size: 12px;"> Tampilkan Password</span>
													</div>
												</span>
												<?= form_error('cpassword', '<div class="text-small text-danger">', '</div>') ?>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<small for="gender">Gender : </small>
												<select name="gender" id="gender" class="form-control">
													<?php if ($user['gender'] == "L") : ?>
														<option value="L" selected>Laki-laki</option>
														<option value="P">Perempuan</option>
													<?php else : ?>
														<option value="L">Laki-laki</option>
														<option value="P" selected>Perempuan</option>
													<?php endif ?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group mt-5">
										<input type="submit" value="Update Data" class="btn btn-primary py-3 px-5">
									</div>
									<div class="form-group mt-3">
										<small class="text-dark">* Beberapa data mungkin tidak berubah setelah anda melakukan update, silahkan logout terlebih dahulu.</small>
									</div>
								</form>
							</div>
						</div>
					</div>

					<div class="tab-pane fade show" id="nav-fitur-mobil" role="tabpanel" aria-labelledby="nav-home-tab">
						<div class="row mt-3">
							<div class="col-md-12 block-9 mb-md-5">
								<form action="<?= base_url('customer/update_foto') ?>" class="bg-light p-4 contact-form" method="POST" enctype="multipart/form-data">
									<input type="hidden" name="foto_ktp_old" value="<?php echo $user['foto_ktp'] ?>">
									<input type="hidden" name="avatar_old" value="<?php echo $user['avatar'] ?>">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<small for="foto_ktp">Foto KTP : </small> <br>
												<img src="<?= base_url('assets/upload/user/ktp/') . $user['foto_ktp'] ?>" alt="foto-ktp" class="img-thumbnail w-25">
												<div class="custom-file mt-3">
													<input type="file" id="ktp" name="foto_ktp" class="custom-file-input form-control-lg" autofocus onchange="previewPhoto1()">
													<label class="custom-file-label cfl1" for="photo">Pilih Gambar
														KTP</label>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<small for="avatar">Foto Profil :</small> <br>
												<img src="<?= base_url('assets/upload/user/avatar/' . $user['avatar']) ?>" class="img-thumbnail w-25">
												<div class="custom-file mt-3">
													<input type="file" id="avatar" name="avatar" class="custom-file-input form-control-lg" autofocus onchange="previewPhoto()">
													<label class="custom-file-label cfl" for="photo">Pilih Foto
														Profil</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group mt-5">
										<input type="submit" value="Update Data" class="btn btn-primary py-3 px-5">
									</div>
									<div class="form-group mt-3">
										<small class="text-dark">* Beberapa data mungkin tidak berubah setelah anda melakukan update, silahkan logout terlebih dahulu.</small>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	// upload foto profile
	function previewPhoto() {
		const photo = document.querySelector('#avatar');
		const photoLabel = document.querySelector('.cfl');
		const imgPreview = document.querySelector('.ip');

		photoLabel.textContent = photo.files[0].name;

		const filePhoto = new FileReader();
		filePhoto.readAsDataURL(photo.files[0]);

		filePhoto.onload = function(e) {
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

		filePhoto.onload = function(e) {
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