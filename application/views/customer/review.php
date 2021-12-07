<section class="hero-wrap hero-wrap-2 js-fullheight"
	style="background-image: url('<?= base_url() ?>assets/assets_customer/images/bg_3.jpg');"
	data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
			<div class="col-md-9 ftco-animate">
				<p class="breadcrumbs"><span><?= $this->uri->segment(1); ?> <i
							class="ion-ios-arrow-forward"></i><span><?= $this->uri->segment(2); ?></span></p>
				<h1 class="mb-3 bread">Review</h1>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section contact-section">
	<div class="container">
		<div class="row d-flex mb-5 contact-info">
			<div class="col-md-12 block-9 mb-md-5">
				<form action="<?= base_url('transaksi/review/') . $transaksi['id_transaksi'] ?>"
					class="bg-light p-5 contact-form" method="post">
					<center>
						<?php if($review != null ) : ?>
							<h5 class="mb-3">Anda sudah memberikan review</h5>
							<p class="mb-5">Hasil review Anda untuk transaksi ini,</p>
						<?php else : ?>
							<h5 class="mb-5">Bagaimana pengalaman Anda menggunakan jasa kami?</h5>
						<?php endif?>

						<?php if ($this->session->flashdata('failed') != null) : ?>
						<div class="row">
							<div class="col-md-12 mx-0" id="flash"
								data-flash="<?= $this->session->flashdata('failed'); ?>">
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<?php echo $this->session->flashdata('failed') ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							</div>
						</div>
						<?php endif ?>
					</center>
					<style>
						@import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
						@import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

						.rating {
							border: none;
							/* margin-right: 49px */
						}

						.myratings {
							font-size: 40px;
							color: green;
						}

						.rating>[id^="star"] {
							display: none
						}

						.rating>label:before {
							margin: 6.5px;
							font-size: 1.3em;
							font-family: FontAwesome;
							display: inline-block;
							content: "\f005"
						}

						.rating>.half:before {
							content: "\f089";
							position: absolute
						}

						.rating>label {
							color: #ddd;
							float: right
						}

						.rating>[id^="star"]:checked~label,
						.rating:not(:checked)>label:hover,
						.rating:not(:checked)>label:hover~label {
							color: #FFD700
						}

						.rating>[id^="star"]:checked+label:hover,
						.rating>[id^="star"]:checked~label:hover,
						.rating>label:hover~[id^="star"]:checked~label,
						.rating>[id^="star"]:checked~label:hover~label {
							color: #FFED85
						}

						.mt-100 {
							margin-top: 100px
						}

						.card {
							position: relative;
							display: flex;
							height: 235px;
							flex-direction: column;
							min-width: 0;
							word-wrap: break-word;
							background-color: #fff;
							background-clip: border-box;
							border: 1px solid #d2d2dc;
							border-radius: 6px;
						}

						.card .card-body {
							padding: 1rem 1rem
						}

						.card-body {
							flex: 1 1 auto;
							padding: 1.25rem
						}

						p {
							font-size: 14px
						}

						h6 {
							margin-top: 3px
						}

					</style>

					<div class="container mt-4">
						<div class="row">
							<div class="col-md-4 mb-4">
								<div class="card">
									<div class="card-body text-center mt-3"><span class="myratings">5</span>
										<h6 class="mt-1">Nilai kami</h6>
										<div class="d-flex justify-content-center">
											<?php if($review != null) : ?>
											<fieldset class="rating">
												<input type="radio" id="star5" name="star" value="5"
													<?= $review['star'] == '5' ? 'checked': '' ?> disabled/>
												<label class="full" for="star5" title="Awesome - 5 stars"></label>
												<input type="radio" id="star4" name="star" value="4"
													<?= $review['star'] == '4' ? 'checked': '' ?> disabled/>
												<label class="full" for="star4" title="Pretty good - 4 stars"></label>
												<input type="radio" id="star3" name="star" value="3"
													<?= $review['star'] == '3' ? 'checked': '' ?> disabled/>
												<label class="full" for="star3" title="Meh - 3 stars"></label>
												<input type="radio" id="star2" name="star" value="2"
													<?= $review['star'] == '2' ? 'checked': '' ?> disabled/>
												<label class="full" for="star2" title="Kinda bad - 2 stars"></label>
												<input type="radio" id="star1" name="star" value="1"
													<?= $review['star'] == '1' ? 'checked': '' ?> disabled/>
												<label class="full" for="star1" title="Sucks big time - 1 star"></label>
											</fieldset>
											<?php else : ?>
											<fieldset class="rating">
												<input type="radio" id="star5" name="star" value="5" checked />
												<label class="full" for="star5" title="Awesome - 5 stars"></label>
												<input type="radio" id="star4" name="star" value="4" />
												<label class="full" for="star4" title="Pretty good - 4 stars"></label>
												<input type="radio" id="star3" name="star" value="3" />
												<label class="full" for="star3" title="Meh - 3 stars"></label>
												<input type="radio" id="star2" name="star" value="2" />
												<label class="full" for="star2" title="Kinda bad - 2 stars"></label>
												<input type="radio" id="star1" name="star" value="1" />
												<label class="full" for="star1" title="Sucks big time - 1 star"></label>
											</fieldset>
											<?php endif?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<?php if($review != null) : ?>
								<div class="form-group">
									<input type="hidden" class="form-control" value="<?= $transaksi['id_mobil'] ?>"
										name="id_mobil">
									<input type="hidden" class="form-control" value="<?= $transaksi['id_transaksi'] ?>"
										name="id_transaksi">
									<textarea name="review" id="" rows="10" class="form-control"
										placeholder="Ceritakan pengalaman Anda" readonly> <?php echo $review['review']?> </textarea>
								</div>
								<?php else : ?>
								<div class="form-group">
									<input type="hidden" class="form-control" value="<?= $transaksi['id_mobil'] ?>"
										name="id_mobil">
									<input type="hidden" class="form-control" value="<?= $transaksi['id_transaksi'] ?>"
										name="id_transaksi">
									<textarea name="review" id="" rows="10" class="form-control"
										placeholder="Ceritakan pengalaman Anda"></textarea>
									<span class="text-danger"><?= form_error('review'); ?></span>
								</div>
								<?php endif?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-3 d-flex justify-content-end">
								<div class="form-group">
									<?php if($review == null) : ?>
									<button type="submit" value="Kirim Review" class="btn btn-primary"
										style="width: 205px; height: 50px;"> Kirim Review </button>
									<?php endif?>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<script src="<?= base_url() ?>assets/assets_customer/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/assets_customer/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {

		$("input[type='radio']").click(function () {
			var sim = $("input[type='radio']:checked").val();
			//alert(sim);
			if (sim < 3) {
				$('.myratings').css('color', 'red');
				$(".myratings").text(sim);
			} else {
				$('.myratings').css('color', 'green');
				$(".myratings").text(sim);
			}
		});
	});

</script>
