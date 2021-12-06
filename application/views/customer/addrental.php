<section class="ftco-section ftco-no-pt bg-primary">
	<div class="container">
	</div>
</section>
<section class="ftco-section ftco-no-pt">
	<div class="container">
		<div class="row">
			<div class="col-md-12 pills">
				<div class="row justify-content-center">
					<div class="col-md-12 heading-section text-center ftco-animate mb-3">
						<h3 class="">Ukir Keindahan Perjalananmu Sekarang !</h3>
						<div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>
					</div>
				</div>
				<div class="bd-example bd-example-tabs">
					<div class="d-flex justify-content-center">
						<ul class="nav nav-pills " id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Rental</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Detail Mobil</a>
							</li>
						</ul>
					</div>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
							<?php if ($this->session->flashdata('failed') != null) : ?>
								<div class="row">
									<div class="col-md-12 mx-0" id="flash" data-flash="<?= $this->session->flashdata('failed'); ?>">
										<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert1">
											<strong>Transaksi Gagal</strong> <?php echo $this->session->flashdata('failed') ?>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									</div>
								</div>
							<?php endif ?>
							<div class="row">
								<div class="col-12">
									<form action="<?= base_url('Customer/addRental/') . $detail['id_mobil'] ?>" class="request-form ftco-animate bg-primary" method="post">
										<input type="hidden" name="id_mobil" value="<?= $detail['id_mobil']; ?>">
										<div class="form-group">
											<label for="" class="label">Lokasi Penjemputan</label>
											<input type="text" name="alamat_penjemputan" class="form-control" value="<?= $user['alamat']; ?>">
											<span style="font-size: 12px !important;" class="help-block"><?= form_error('alamat_penjemputan'); ?></span>
										</div>
										<div class="d-flex">
											<div class="form-group mr-2">
												<label for="" class="label">Waktu Penjemputan</label>
												<input type="text" name="waktu_penjemputan" class="form-control" id="time_pick" placeholder="Jam" value="<?= set_value('waktu_penjemputan'); ?>">
												<span style="font-size: 12px !important;" class="help-block"><?= form_error('waktu_penjemputan'); ?></span>
											</div>
											<div class="form-group mx-2">
												<label for="" class="label">Tanggal Rental</label>
												<input type="text" name="tgl_rental" class="form-control" id="book_pick_date" placeholder="Tanggal" value="<?= set_value('tgl_rental'); ?>" readonly>
												<span style="font-size: 12px !important;" class="help-block"><?= form_error('tgl_rental'); ?></span>
											</div>
											<div class="form-group ml-2">
												<label for="" class="label">Tanggal Pengembalian</label>
												<input type="text" name="tgl_kembali" class="form-control" id="book_off_date" placeholder="Tanggal" value="<?= set_value('tgl_kembali'); ?>" readonly>
												<span style="font-size: 12px !important;" class="help-block"><?= form_error('tgl_kembali'); ?></span>
											</div>
										</div>
										<div class="d-flex">
											<div class="form-group mr-2">
												<label for="" class="label">Rental / Hari</label>
												<input type="text" name="hrg_hari" class="form-control" value="<?= $detail['harga']; ?>" readonly>
											</div>
											<div class="form-group mx-2">
												<label for="" class="label">Denda / Hari</label>
												<input type="text" name="dnd_hari" class="form-control" value="<?= $detail['denda']; ?>" readonly>
											</div>
											<!-- pengkondisian lepas kunci atau tidak -->
											<?php if ($detail['supir'] == 0) : ?>
												<div class="form-group mx-2">
													<label for="" class="label">Supir / Hari</label>
													<input type="text" name="hrg_supir" class="form-control" value="<?= $detail['hrg_supir']; ?>" readonly>
												</div>
											<?php else : ?>
												<div class="form-group mx-2">
													<label for="" class="label">Supir / Hari</label>
													<select class="form-control" name="hrg_supir">
														<option value="<?= $detail['hrg_supir'] ?>" class="bg-primary selected">
															<?= indo_currency($detail['hrg_supir']); ?></option>
														<option value="0" class="bg-primary">Tanpa supir</option>
													</select>
												</div>
											<?php endif ?>
										</div>
										<div class="form-group">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" name="setuju" class="custom-control-input" id="centang2">
												<label class="custom-control-label text-light" for="centang2">Saya setuju dengan <a class="text-dark" href="<?= site_url('auth/termcondition'); ?>">syarat dan ketentuan HRC</a></label>
											</div>
										</div>
										<div class="form-group mt-5">
											<input type="submit" id="btn-rntl" value="Rental Sekarang" class="btn btn-secondary py-3" style="border-radius: 50px !important;" onclick="return confirm('Yakin data anda sudah benar?')" disabled>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab" style="padding-top: 0em !important;">
							<section class="ftco-section ftco-car-details" style="padding: 0rem !important;">
								<div class="container">
									<div class="row justify-content-center">
										<div class="col-md-7">
											<div class="car-details py-3">
												<div class="img rounded" style="background-image: url(<?= base_url() ?>assets/upload/car/<?= $detail['gambar'] ?>);">
												</div>
											</div>
										</div>
										<div class="col-md-5">
											<div class="text text-center py-5">
												<h3><?= $detail['merek']; ?></h3>
												<span class="subheading">Warna <?= $detail['warna']; ?> Tahun
													<?= $detail['tahun']; ?></span>
												<div class="row">
													<div class="col-md-4 col-sm-6 d-flex align-self-stretch ftco-animate">
														<div class="media block-6 services">
															<div class="media-body py-md-4">
																<div class="d-flex mb-3 align-items-center">
																	<div class="icon d-flex align-items-center justify-content-center">
																		<span class="flaticon-dashboard"></span>
																	</div>
																	<div class="text">
																		<h3 class="heading mb-0 pl-3">
																			KM
																			<span>-+<?= $detail['km']; ?>k</span>
																		</h3>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-4 col-sm-6 d-flex align-self-stretch ftco-animate">
														<div class="media block-6 services">
															<div class="media-body py-md-4">
																<div class="d-flex mb-3 align-items-center">
																	<div class="icon d-flex align-items-center justify-content-center">
																		<span class="flaticon-pistons"></span>
																	</div>
																	<div class="text">
																		<h3 class="heading mb-0 pl-3">
																			Transmisi
																			<span><?= $detail['transmisi']; ?></span>
																		</h3>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-4 col-sm-6 d-flex align-self-stretch ftco-animate">
														<div class="media block-6 services">
															<div class="media-body py-md-4">
																<div class="d-flex mb-3 align-items-center">
																	<div class="icon d-flex align-items-center justify-content-center">
																		<span class="flaticon-car-seat"></span>
																	</div>
																	<div class="text">
																		<h3 class="heading mb-0 pl-3">
																			Kursi
																			<span><?= $detail['jmlh_kursi']; ?></span>
																		</h3>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-4 col-sm-6 d-flex align-self-stretch ftco-animate">
														<div class="media block-6 services">
															<div class="media-body py-md-4">
																<div class="d-flex mb-3 align-items-center">
																	<div class="icon d-flex align-items-center justify-content-center">
																		<span class="flaticon-backpack"></span>
																	</div>
																	<div class="text">
																		<h3 class="heading mb-0 pl-3">
																			Bagasi
																			<span><?= $detail['bagasi']; ?></span>
																		</h3>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-4 col-sm-6 d-flex align-self-stretch ftco-animate">
														<div class="media block-6 services">
															<div class="media-body py-md-4">
																<div class="d-flex mb-3 align-items-center">
																	<div class="icon d-flex align-items-center justify-content-center">
																		<span class="flaticon-diesel"></span>
																	</div>
																	<div class="text">
																		<h3 class="heading mb-0 pl-3">
																			BBM
																			<span><?= $detail['bbm']; ?></span>
																		</h3>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 pills">
											<div class="bd-example bd-example-tabs">
												<div class="d-flex justify-content-center">
													<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

														<li class="nav-item">
															<a class="nav-link" id="pills-description-tab" data-toggle="pill" href="#pills-description1" role="tab" aria-controls="pills-description1" aria-expanded="true">Features</a>
														</li>
														<li class="nav-item">
															<a class="nav-link active" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer1" role="tab" aria-controls="pills-manufacturer1" aria-expanded="true">Description</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review1" role="tab" aria-controls="pills-review1" aria-expanded="true">Review</a>
														</li>
													</ul>
												</div>

												<div class="tab-content" id="pills-tabContent">
													<div class="tab-pane fade" id="pills-description1" role="tabpanel" aria-labelledby="pills-description-tab">
														<div class="row">
															<div class="col-md-4">
																<ul class="features">
																	<li class="<?= $detail['ac'] == '1' ? 'check' : 'remove'; ?>">
																		<span class="ion-ios-<?= $detail['ac'] == '1' ? 'checkmark' : 'close'; ?>"></span>Airconditions
																	</li>
																	<li class="<?= $detail['seat_belt'] == '1' ? 'check' : 'remove'; ?>">
																		<span class="ion-ios-<?= $detail['seat_belt'] == '1' ? 'checkmark' : 'close'; ?>"></span>Seat
																		Belt
																	</li>
																	<li class="<?= $detail['air'] == '1' ? 'check' : 'remove'; ?>">
																		<span class="ion-ios-<?= $detail['air'] == '1' ? 'checkmark' : 'close'; ?>"></span>Air
																	</li>
																	<li class="<?= $detail['p3k'] == '1' ? 'check' : 'remove'; ?>">
																		<span class="ion-ios-<?= $detail['p3k'] == '1' ? 'checkmark' : 'close'; ?>"></span>P3K
																	</li>
																</ul>
															</div>
															<div class="col-md-4">
																<ul class="features">
																	<li class="<?= $detail['audio_input'] == '1' ? 'check' : 'remove'; ?>">
																		<span class="ion-ios-<?= $detail['audio_input'] == '1' ? 'checkmark' : 'close'; ?>"></span>Audio
																		input
																	</li>
																	<li class="<?= $detail['bluetooth'] == '1' ? 'check' : 'remove'; ?>">
																		<span class="ion-ios-<?= $detail['bluetooth'] == '1' ? 'checkmark' : 'close'; ?>"></span>Bluetooth
																	</li>
																	<li class="<?= $detail['mp3_player'] == '1' ? 'check' : 'remove'; ?>">
																		<span class="ion-ios-<?= $detail['mp3_player'] == '1' ? 'checkmark' : 'close'; ?>"></span>Music
																	</li>
																	<li class="<?= $detail['vidio'] == '1' ? 'check' : 'remove'; ?>">
																		<span class="ion-ios-<?= $detail['vidio'] == '1' ? 'checkmark' : 'close'; ?>"></span>Vidio
																	</li>
																</ul>
															</div>
															<div class="col-md-4">
																<ul class="features">
																	<li class="<?= $detail['central_lock'] == '1' ? 'check' : 'remove'; ?>">
																		<span class="ion-ios-<?= $detail['central_lock'] == '1' ? 'checkmark' : 'close'; ?>"></span>Remote
																		central locking
																	</li>
																	<li class="<?= $detail['ban_serep'] == '1' ? 'check' : 'remove'; ?>">
																		<span class="ion-ios-<?= $detail['ban_serep'] == '1' ? 'checkmark' : 'close'; ?>"></span>Roda
																		Cadangan
																	</li>
																	<li class="<?= $detail['car_kit'] == '1' ? 'check' : 'remove'; ?>">
																		<span class="ion-ios-<?= $detail['car_kit'] == '1' ? 'checkmark' : 'close'; ?>"></span>Peralatan
																		Mobil
																	</li>
																	<li class="<?= $detail['supir'] == '1' ? 'check' : 'remove'; ?>">
																		<span class="ion-ios-<?= $detail['supir'] == '1' ? 'checkmark' : 'close'; ?>"></span><b>Lepas
																			Kunci</b>
																	</li>
																</ul>
															</div>
														</div>
													</div>

													<div class="tab-pane fade  show active" id="pills-manufacturer1" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
														<p>Plat Nomer &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
															&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;
															<?= $detail['no_plat'] ?></p>
														<p>Harga Mobil Perhari &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;
															<?= indo_currency($detail['harga']) ?></p>
														<p>Denda Mobil perhari &nbsp; &nbsp; &nbsp; : &nbsp;
															<?= indo_currency($detail['denda']) ?> </p>
														<p>Harga Supir perhari &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;
															<?= indo_currency($detail['hrg_supir']) ?> </p>
														<hr>
														<p style="text-align: justify !important;">
															<?= $detail['detail'] ?></p>
													</div>

													<div class="tab-pane fade" id="pills-review1" role="tabpanel" aria-labelledby="pills-review-tab">
														<div class="row">
															<div class="col-md-12">
																<h3 class="head"><?php echo $jumlahReview ?> Reviews</h3>
																<?php if ($jumlahReview != 0) : ?>
																	<?php foreach ($review as $r) : ?>
																		<div class="review d-flex">
																			<div class="user-img" style="background-image: url(<?= base_url() ?>assets/upload/user/avatar/<?php echo $r['avatar'] ?>)"></div>
																			<div class="desc">
																				<h4>
																					<span class="text-left"><?php echo $r['nama'] ?></span>
																					<span class="text-right"><?php echo  date('d F Y, H:i', strtotime($r['review_created'])) ?></span>
																				</h4>
																				<p class="star">
																					<span>
																						<?php $star = 0 ?>
																						<?php while ($star < $r['star']) : ?>
																							<i class="ion-ios-star"></i>
																							<?php $star++ ?>
																						<?php endwhile ?>
																					</span>
																				</p>
																				<p><?php echo $r['review'] ?></p>
																			</div>
																		</div>
																	<?php endforeach ?>
																<?php else : ?>
																	<div class="review d-flex justify-content-center">
																		<p>Masih belum ada review</p>
																	</div>
																<?php endif ?>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php
$tgl_disabled = array();
$tgl_hari_ini = date('j-n-Y');

foreach ($transaksi as $t) {
	$tgl_rental = date('d-n-Y', strtotime($t['tgl_rental']));
	$tgl_check_sebelum_rental = date('j-n-Y', strtotime('-1 days', strtotime($t['tgl_rental'])));
	$tgl_kembali = date('d-n-Y', strtotime('+1 days', strtotime($t['tgl_kembali'])));

	while ($tgl_rental <= $tgl_kembali) {
		$day_first_digit = substr($tgl_rental, 0, 1);
		if ($day_first_digit == 0) {
			array_push($tgl_disabled, '"' . substr_replace($tgl_rental, '', 0, 1) . '"');
		} else {
			array_push($tgl_disabled, '"' . $tgl_rental . '"');
		}
		$tgl_rental = date('d-n-Y', strtotime('+1 days', strtotime($tgl_rental)));
	}

	array_push($tgl_disabled, '"' . $tgl_check_sebelum_rental . '"');
}

array_push($tgl_disabled, '"' . $tgl_hari_ini . '"');
$tgl_disabled_string = implode(', ', $tgl_disabled);

?>

<script src="<?= base_url() ?>assets/assets_customer/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/assets_customer/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
	$(function($data) {
		var tgl = [<?php echo $tgl_disabled_string ?>];
		$('#book_pick_date,#book_off_date').datepicker({
			startDate: new Date(),
			format: 'yyyy/mm/d',
			beforeShowDay: function(date) {
				dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
				if (tgl.indexOf(dmy) != -1) {
					return false;
				} else {
					return true;
				}
			}
		});
		$('#book_pick_date,#book_off_date').datepicker("setDate", new Date());
	});
</script>