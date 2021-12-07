<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Pilih Mobil</h1>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped" id="table-1">
								<thead>
									<tr>
										<th width="20px">
											No.
										</th>
										<th>Gambar</th>
										<th>Merek</th>
										<th>Tipe</th>
										<th>Tahun</th>
										<th>No.Plat</th>
										<th>Status</th>
										<th width="100px">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach ($mobil as $mb) : ?>
									<tr>
										<td><?= $no++; ?></td>
										<td><img width="70px;"
												src="<?= base_url('assets/upload/car/') . $mb['gambar']; ?>" alt="">
										</td>
										<td><?= $mb['merek']; ?></td>
										<td><?= $mb['nama_tipe']; ?></td>
										<td><?= $mb['tahun']; ?></td>
										<td><?= $mb['no_plat']; ?></td>
										<td>
											<?php if ($mb['status'] == 1) : ?>
											<div class="badge badge-success">Tersedia</div>
											<?php else : ?>
											<div class="badge badge-danger">Tidak tersedia</div>
											<?php endif?>
										</td>

										<td class="d-flex justify-content-end">
											<a href="<?= base_url('admin/mobil/detail_mobil/') . $mb['id_mobil']; ?>"
												class="btn btn-sm btn-success " title="Lihat Mobil"><i
													class="fas fa-eye"></i></a>
										</td>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer">
						<a href="<?php echo base_url('admin/transaksi/customer/')?>" type="submit"
							class="btn btn-secondary">Kembali</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
