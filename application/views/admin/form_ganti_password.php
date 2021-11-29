<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Form Ubah Password</h1>
		</div>
		<div class="card">
			<form action="<?= base_url('admin/password') ?>" method="post">
				<div class="card-body">
					<?php if ($this->session->flashdata('success') != null) : ?>
					<div class="row">
						<div class="col-md-12 mx-0" id="flash"
							data-flash="<?= $this->session->flashdata('success'); ?>">
							<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert1">
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
							<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert1">
								<?php echo $this->session->flashdata('failed') ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</div>
					</div>
					<?php endif ?>

					<div class="form-group">
						<label for="">Password baru</label>
						<input type="password" name="password" id="password" class="form-control">
						<span class="eye" onclick="tampilPassword()">
							<div id="tpassword" style="display: none;">
								<i class="fas fa-eye mt-2"></i><span style="font-size: 12px;"> Sembunyikan
									Password</span>
							</div>
							<div id="tpassword1">
								<i class="fas fa-eye-slash mt-2"></i><span style="font-size: 12px;"> Tampilkan
									Password</span>
							</div>
						</span>
						<?= form_error('password', '<div class="text-small text-danger">', '</div>') ?>

					</div>
					<div class="form-group">
						<label for="">Ulangi Password</label>
						<input type="password" name="cpassword" id="cpassword" class="form-control">
						<span class="eye" onclick="tampilCPassword()">
							<div id="tcpassword" style="display: none;">
								<i class="fas fa-eye mt-2"></i><span style="font-size: 12px;"> Sembunyikan
									Password</span>
							</div>
							<div id="tcpassword1">
								<i class="fas fa-eye-slash mt-2"></i><span style="font-size: 12px;"> Tampilkan
									Password</span>
							</div>
						</span>
						<?= form_error('cpassword', '<div class="text-small text-danger">', '</div>') ?>
					</div>
				</div>

				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Update</button>
					<button type="reset" class="btn btn-warning">Reset</button>
				</div>
			</form>
		</div>
	</section>
</div>
