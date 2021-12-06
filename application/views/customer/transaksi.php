<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url() ?>assets/assets_customer/images/banner.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
			<div class="col-md-9 ftco-animate">
				<p class="breadcrumbs"><span><?= $this->uri->segment(1); ?> <i class="ion-ios-arrow-forward"></i><span><?= $this->uri->segment(2); ?></span></p>
				<h1 class="mb-3 bread">Transaksi Anda</h1>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section contact-section">

	<div class="container">
		<?php if ($this->session->flashdata('success') != null) : ?>
			<div class="row">
				<div class="col-md-12 mx-0" id="flash" data-flash="<?= $this->session->flashdata('success'); ?>">
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

		<div class="row d-flex mb-5 contact-info">
			<div class="col-md-12">
				<table class="table">
					<thead class="thead-primary">
						<tr class="text-center">
							<th class="bg-warning" colspan="2">Data Mobil</th>
							<th class="bg-dark heading">Data Rental</th>
							<th class="bg-black heading">Actions</th>
						</tr>
					</thead>
					<?php $no = 1; ?>
					<?php foreach ($transaksi as $tr) : ?>
						<tbody>
							<tr class="">
								<?php
								$tanggal_rental       = strtotime($tr['tgl_rental']);
								$tanggal_kembali      = strtotime($tr['tgl_kembali']);
								$tanggal_hari_ini	  = strtotime(date('Y/m/d'));

								$selisih              = abs($tanggal_rental - $tanggal_kembali) / (60 * 60 * 24) + 1;
								$total_harga_supir    = $tr['total_harga_supir'];
								?>
								<td class="car-image">
									<div class="img" style="background-image: url(<?= base_url() ?>assets/upload/car/<?= $tr['gambar'] ?>);">
									</div>
								</td>
								<td class="product-name">
									<h3><b><u> <?= $tr['merek']; ?> Tahun <?= $tr['tahun']; ?></u></b></h3>
									<span>Plat Nomer &nbsp; &nbsp; &nbsp; : &nbsp; <b><?= $tr['no_plat']; ?></b></span><br>
									<span>Tipe &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp;
										<?= $tr['nama_tipe']; ?></span><br>
									<span>Transmisi &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; <?= $tr['transmisi']; ?></span><br>
									<span>Harga Rental &nbsp; : &nbsp; <?= indo_currency($tr['harga']); ?> / Hari</span><br>
									<span>Harga Supir &nbsp; &nbsp; : &nbsp; <?= indo_currency($tr['hrg_supir']) ?> /
										Hari</span>
								</td>
								<td class="product-name pl-3" style="background-color: ghostwhite;">
									<span class="subheading">Penyewa &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
										&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <?= $tr['nama']; ?></span><br>
									<span class="subheading">Nomer KTP &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
										&nbsp;
										&nbsp; &nbsp; &nbsp; &nbsp; : <?= $tr['no_ktp']; ?></span><br>
									<span class="subheading">Tanggal Rental &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
										&nbsp; : <?= indo_date($tr['tgl_rental']); ?></span><br>
									<span class="subheading">Tanggal Kembali &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :
										<?= indo_date($tr['tgl_kembali']); ?></span><br>
									<span class="subheading">Status Pengembalian &nbsp; &nbsp; :
										<?= $tr['status_pengembalian'] ?></span><br>
									<span class="subheading">Alamat Penjemputan &nbsp; &nbsp; :</span><br>
									<span class="subheading" style="font-size: 14px !important;"><i><b><?= $tr['alamat_penjemputan'] ?></b></i></span><br>
								</td>
								<td class="product-name" style="background-color: ghostwhite;">
									<div style="text-align: center; align-content: center;">

										<?php if ($tr['status_rental'] == 'Selesai') : ?>
											<h3>
												<a href="<?= base_url('transaksi/review/' . $tr['id_transaksi']) ?>" class="btn btn-sm btn-primary">
													<span class="icon-star"></span> <span>Berikan Review</span>
												</a>
											</h3>
										<?php endif ?>

										<h3>
											<a href="<?= base_url('transaksi/pembayaran/' . $tr['id_transaksi']) ?>" class="btn btn-sm btn-warning">
												<span class="icon-money"></span> <span>Cek Pembayaran</span>
											</a>
										</h3>

										<?php if ($tr['status_rental'] == "Belum Selesai") : ?>
											<h3>
												<?php if ($tr['status_pembayaran'] == '1') : ?>
													<?php if ($tanggal_hari_ini < $tanggal_rental) : ?>
														<!-- ketika status pembayaran telah dibayar dan di cancel kurang dari tanggal rental maka uang dikembalikan seluruhnya -->
														<a href="<?= base_url('customer/transaksi_full_refund/' . $tr['id_transaksi']) ?>" class="btn btn-sm btn-danger">
															<span class="icon-trash"></span> <span>Batal Rental</span>
														</a>
													<?php else : ?>
														<!-- ketika status pembayaran telah dibayar dan di cancel lebih dari tanggal rental maka, tombol cancel disable dan status rental selesai. -->
														<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
															<span class="icon-trash"> </span> <span>Batal Rental</span>
														</button>
													<?php endif ?>

												<?php elseif ($tr['status_pembayaran'] == '0') : ?>
													<a href="<?= base_url('customer/delete_transaksi/' . $tr['id_transaksi']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin membatalkan transaksi?')">
														<span class="icon-trash"></span> <span>Batal Rental</span>
													</a>
												<?php endif; ?>
											</h3>
										<?php endif ?>
									</div>
								</td>
							</tr><!-- END TR-->
						</tbody>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Informasi Batal Transaksi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Maaf, proses rental sudah berjalan, jika ingin melakukan proses cancel silahkan menghubungi Admin!
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
			</div>
		</div>
	</div>
</div>