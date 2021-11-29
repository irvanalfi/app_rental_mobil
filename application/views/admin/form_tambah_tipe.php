<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Form Input Tipe Mobil</h1>
		</div>
		<div class="card">
			<form action="<?= site_url('admin/tipe/addTipe') ?>" method="post">
				<div class="card-body">
					<div class="form-group">
						<label for="">Nama Tipe</label>
						<input type="text" name="nama_tipe" class="form-control" value="<?= set_value('nama_tipe'); ?>">
						<span class=" text-danger"><?= form_error('nama_tipe'); ?></span>
					</div>
					<div class="form-group">
						<label for="">Kode Tipe</label>
						<input type="text" name="kode_tipe" class="form-control" value="<?= set_value('kode_tipe'); ?>">
						<span class="text-danger"><?= form_error('kode_tipe'); ?></span>
					</div>

				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<button type="reset" class="btn btn-warning">Reset</button>
				</div>
			</form>
	</section>
</div>
