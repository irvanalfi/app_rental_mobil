<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Pilih Customer</h1>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped" id="table-1">
						<thead>
							<tr>
								<th width="20px">
									No.
								</th>
								<th>Image</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Email</th>
								<th>No. Telepon</th>
								<th>No. KTP</th>
								<th width="50px">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; foreach ($customer as $c) : ?>
							<tr>
								<td><?= $no++; ?>.</td>
								<td><img alt="image"
										src="<?= base_url('assets/upload/user/avatar/' . $c['avatar']); ?>"
										class="rounded-circle mr-1" width="30px" height="30px"></td>
								<td><?= $c['nama']; ?></td>
								<td><?= $c['alamat']; ?></td>
								<td><?= $c['email']; ?></td>
								<td><?= $c['no_telepon']; ?></td>
								<td><?= $c['no_ktp']; ?></td>
								<td class="d-flex justify-content-end mr-2">
									<a href="<?= base_url('admin/transaksi/mobil/') . $c['id_user'] ?>"
										class="btn btn-sm btn-primary" title="Lanjut Pilih Mobil"><i
											class="fas fa-chevron-circle-right"></i></a>
								</td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card-footer">
				<a href="<?php echo base_url('admin/transaksi')?>" type="submit" class="btn btn-secondary">Kembali</a>
			</div>
	</section>
</div>
