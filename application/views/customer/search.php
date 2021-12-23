<section class="hero-wrap hero-wrap-2 js-fullheight"
	style="background-image: url('<?= base_url() ?>assets/assets_customer/images/bg_1.1.jpg');"
	data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
			<div class="col-md-9 ftco-animate pb-2">
				<p class="breadcrumbs"><span><?= $this->uri->segment(1); ?> <i
							class="ion-ios-arrow-forward"></i> <span><?= $this->uri->segment(2); ?></span></p>
				<h1 class="mb-3 bread" style="font-size: 30px !important;"> Hasil Pencarian <b><?php echo $keyword?></b>
				</h1>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<form action="<?= base_url('mobil/search')?>" method="GET">
					<div class="input-group input-group-lg">
						<input type="text" class="form-control input-lg mr-2 rounded" name="keyword" id="keyword"
							placeholder="Cari mobil ... ">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary mb-2 rounded px-5" style="height: 52px;">
								<span class="icon-search" aria-hidden="true"></span> </button>
						</span>
					</div>
				</form>
			</div>
		</div>

		<div class="row mt-5">
			<?php if($mobil != null) : ?>
			<?php foreach ($mobil as $mb) : ?>
			<div class="col-md-4">
				<div class="car-wrap rounded ftco-animate">
					<div class="img rounded d-flex align-items-end"
						style="background-image: url(<?= base_url() ?>assets/upload/car/<?= $mb['gambar'] ?>);">
					</div>
					<div class="text">
						<h2 class="mb-0">
							<a href="<?= base_url('mobil/detailmobil/' . $mb['id_mobil']) ?>"><?= $mb['merek']; ?></a>
						</h2>
						<div class="d-flex mb-3">
							<span class="cat">Tahun <?= $mb['tahun']; ?></span>
							<p class="price ml-auto">Rp.
								<?= number_format($mb['harga'], 0, ',', '.'); ?>,-<span>/day</span></p>
						</div>
						<p class="d-flex mb-0 d-block">
							<a href="<?= base_url('mobil/addrental/' . $mb['id_mobil']) ?>"
								class="btn btn-primary py-2 mr-1">Book now</a>
							<a href="<?= base_url('mobil/detailmobil/' . $mb['id_mobil']) ?>"
								class="btn btn-warning py-2 ml-1">Details</a>
						</p>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
			<?php else : ?>
			<div class="col-md-12 text-center mt-5">
				<h3>Pencarian tidak ditemukan</h3>
			</div>
			<?php endif?>
		</div>
	</div>
</section>
