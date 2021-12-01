<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url() ?>assets/assets_customer/images/banner.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
			<div class="col-md-9 ftco-animate">
				<p class="breadcrumbs"><span><?= $this->uri->segment(1); ?> <i class="ion-ios-arrow-forward"></i>
						<span><?= $this->uri->segment(2); ?></span></p>
				<h1 class="mb-3 bread">Pembayaran Anda</h1>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section contact-section" style="padding: 2em 0 !important;">
	<div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>
	<div class="container">
		<?php
		$tanggal_rental       = strtotime($bayar['tgl_rental']);
		$tanggal_kembali      = strtotime($bayar['tgl_kembali']);
		$selisih              = abs($tanggal_rental - $tanggal_kembali) / (60 * 60 * 24) + 1;
		$total_harga_supir    = $bayar['total_harga_supir'];
		?>
		<div class="row">
			<div class="col-md-8">
				<div class=" card">
					<h5 class="card-header bg-dark text-light text-center">Informasi Rental</h5>

					<div class="card-body">
						<img class="card-img-top" src="<?= base_url() ?>assets/upload/car/<?= $bayar['gambar'] ?>" alt="Card image cap">
						<h5 class="card-title text-center mt-2"><b><?= $bayar['merek']; ?> Tahun <?= $bayar['tahun']; ?></b>
						</h5>
						<ul class="list-group list-group-flush">
							<div class="row">
								<div class="col" style="font-size: 14px;">
									<li class="list-group-item text-dark">Data Mobil</li>
									<li class="list-group-item text-dark">
										Plat Nomer &nbsp; &nbsp; &nbsp; : &nbsp; <b><?= $bayar['no_plat']; ?></b><br>
										Tipe &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp;
										<?= $bayar['nama_tipe']; ?><br>
										Transmisi &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; <?= $bayar['transmisi']; ?><br>
										Harga Rental &nbsp; : &nbsp; <?= indo_currency($bayar['harga']); ?> / Hari<br>
										Harga Supir &nbsp; &nbsp; : &nbsp; <?= indo_currency($bayar['hrg_supir']) ?> /
										Hari
									</li>
								</div>
								<div class="col">
									<li class="list-group-item text-dark">Data Rental</li>
									<li class="list-group-item text-dark">
										Total Hari Rental &nbsp; &nbsp; &nbsp; &nbsp;: <?= $selisih ?> Hari<br>
										Total Rental &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :
										<?= indo_currency($bayar['total_harga']); ?><br>
										Total Supir &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :
										<?= indo_currency($bayar['total_harga_supir']); ?><br>
										PPh &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:
										<?= indo_currency($bayar['pajak']); ?><br>
										Total Akhir &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:
										<?= indo_currency($bayar['total_akhir']); ?><br>
										Status Pembayaran &nbsp;:
										<?= $bayar['status_pembayaran'] == 0 ? 'Belum Lunas' : 'Lunas'; ?> <br>
										<?php if ($bayar['status_rental'] == "Batal") : ?>
											<hr>
											Data Cancel <br>
											<hr>
											Tanggal Cancel &nbsp; &nbsp; &nbsp; &nbsp;: <?= indo_date($bayar['tgl_cancel']) ?> <br>
											Total Refund &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;: <?= indo_currency($bayar['total_refund']) ?>
										<?php endif ?>
									</li>
								</div>
							</div>
							<br>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card text-center">
					<h5 class="card-header bg-dark text-light">Informasi Pembayaran</h5>
					<div class="card-body">
						<p class="card-title" style="font-size: 16px !important; font-weight: inherit;">Silahkan lakukan
							pembayar dengan transfer ke salah satu bank dibawah :</p>
						<ul class="list-group list-group-flush">
							<li class="list-group-item text-dark">MANDIRI : 983745823748 <br>AN M. IRVAN ALFI HIDAYA
							</li>
							<li class="list-group-item text-dark">BRI : 234898341867 <br>AN OKTAVIANO ANDI S</li>
							<li class="list-group-item text-dark">BRI : 897354322158 <br>AN SADEWA MUKTI W</li>
							<br>
						</ul>

						<div class="btn-group-vertical">
							<?php if ($bayar['bukti_pembayaran'] == '') : ?>
								<?php if ($bayar['status_rental'] == "Gagal") : ?>
									<button class="btn my-1 btn-danger"><span class="icon-times"></span> Transaksi Gagal</button>
									<a href="<?= base_url('customer/delete_transaksi/' . $bayar['id_transaksi']) ?>" class="btn btn-danger"><span class="icon-trash"></span> Hapus Transaksi</a>

								<?php else : ?>
									<a href="#" class="btn my-1 btn-warning"><span class="icon-clock-o"></span> <span id="demo"></span></a>
									<a href="#" class="btn my-1 btn-primary" data-toggle="modal" data-target="#exampleModal"><span class="icon-upload"></span> Upload Bukti Transfer</a>
								<?php endif ?>

							<?php elseif ($bayar['status_pembayaran'] == 0) : ?>
								<button class="btn my-1 btn-warning"><span class="icon-clock-o"></span> Menunggu Konfirmasi</button>

							<?php elseif ($bayar['status_pembayaran'] == 1) : ?>
								<?php if ($bayar['status_rental'] == "Batal") : ?>
									<button type="button" class="btn my-1 btn-primary" data-toggle="modal" data-target="#buktiRefund">
										<span class="icon-image"> </span> <span>Bukti Refund</span>
									</button>
								<?php endif ?>
								<button class="btn my-1 btn-success"><span class="icon-check"></span> Pembayaran Berhasil</button>
							<?php endif; ?>

							<a href="<?= base_url('customer/cetakStruk/' . $bayar['id_transaksi']) ?>" class="btn my-1 btn-success" target="_blank"><span class="icon-print"></span> Cetak Struk<span id="demo"></span></a>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Modal untuk upload pembayarn -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('customer/prosesPembayaran') ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Upload bukti transfer</label>
						<input type="hidden" name="id_transaksi" value="<?= $bayar['id_transaksi'] ?>">
						<input type="file" name="bukti_pembayaran" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-sm btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div style="height: 180px;"></div>

<div class="modal fade bd-example-modal-lg" id="buktiRefund" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Informasi Bukti Refund</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- image bukti refund by id transaksi -->
				<?php if ($bayar['bukti_refund'] == '') : ?>
					<p>Biaya refung sedang diproses. Silahkan menunggu.</p>
				<?php else : ?>
					<img src="<?php echo base_url('assets/upload/refund/') . $bayar['bukti_refund'] ?>" alt="bukti transfer" class="img-thumbnail"><br>
					<p>Silahkan cek saldo Anda.</p>
				<?php endif ?>
			</div>
			<div class="modal-footer">
				<a href="<?= base_url('customer/download_bukti_refund/') . $bayar['id_transaksi'] ?>" type="button" class="btn btn-success <?= $bayar['bukti_refund'] == '' ? 'disabled' : '' ?>">Download</a>
			</div>
		</div>
	</div>
</div>

<?php
$tgl_rental = $bayar['tgl_rental'];
$id_transaksi = $bayar['id_transaksi'];
?>


<!-- apabila customer belum mengirimkan bukti transfer maka timer akan berjalan -->
<?php if ($bayar['bukti_pembayaran'] == null && $bayar['status_rental'] != "Gagal") : ?>

	<script>
		// Mengatur waktu akhir perhitungan mundur
		var countDownDate = new Date("<?php echo $tgl_rental ?>").getTime();

		// Memperbarui hitungan mundur setiap 1 detik
		var x = setInterval(function() {

			// Untuk mendapatkan tanggal dan waktu hari ini
			var now = new Date().getTime();

			// Temukan jarak antara sekarang dan tanggal hitung mundur
			var distance = countDownDate - now;

			// Perhitungan waktu untuk hari, jam, menit dan detik
			var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);

			// Keluarkan hasil dalam elemen dengan id = "demo"
			document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
				minutes + "m " + seconds + "s ";

			// Jika hitungan mundur selesai, tulis beberapa teks 
			if (distance < 0) {
				clearInterval(x);
				console.log(days + "d " + hours + "h " + minutes + "m " + seconds + "s ");
				window.location = '<?php echo site_url('customer/countdown_selesai/' . $id_transaksi) ?>';
			}
		}, 1000);
	</script>

<?php endif ?>