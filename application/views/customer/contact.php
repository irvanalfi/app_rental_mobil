<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url() ?>assets/assets_customer/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate">
                <p class="breadcrumbs"><span><?= $this->uri->segment(1); ?> <i class="ion-ios-arrow-forward"></i><span><?= $this->uri->segment(2); ?></span></p>
                <h1 class="mb-3 bread">Contact Us</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section">
    <div class="container">

        <?php if($this->session->flashdata('success')!= null) : ?>
		<div class="row">
			<div class="col-md-12 mx-0" id="flash" data-flash="<?= $this->session->flashdata('success'); ?>">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?php echo $this->session->flashdata('success')?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
		<?php endif?>
		
		<?php if($this->session->flashdata('failed')!= null) : ?>
		<div class="row">
			<div class="col-md-12 mx-0" id="flash" data-flash="<?= $this->session->flashdata('failed'); ?>">
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?php echo $this->session->flashdata('failed')?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
		<?php endif?>

        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-4">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-map-o"></span>
                            </div>
                            <p><span>Alamat:</span> Pringsejuta, Genteng, Banyuwangi.</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-mobile-phone"></span>
                            </div>
                            <p><span>Telpon:</span> <a href="tel://1234567920">+62 82244922833</a></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-envelope-o"></span>
                            </div>
                            <p><span>Email:</span> <a href="mailto:info@yoursite.com">halim@gmail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 block-9 mb-md-5">
                <form action="<?= base_url('customer/contact')?>" class="bg-light p-5 contact-form" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nama" value="<?= $this->session->userdata('nama');?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" value="<?= $this->session->userdata('email');?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject" name="subject">
                        <span class="text-danger"><?= form_error('subject'); ?></span>
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="7" class="form-control" placeholder="Pesan" name="pesan"></textarea>
                        <span class="text-danger"><?= form_error('pesan'); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Kirim Pesan" class="btn btn-primary py-3 px-5">
                    </div>
                </form>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="gmap col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!4v1632277234717!6m8!1m7!1seHkLEI5FzA7NCvmTOQN1Mw!2m2!1d-8.352526550450294!2d114.171518192037!3f69.40116!4f0!5f0.7820865974627469" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>