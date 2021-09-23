<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url() ?>assets/assets_customer/images/bg_1.1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-2">
                <p class="breadcrumbs"><span><?= $this->uri->segment(1); ?> <i class="ion-ios-arrow-forward"></i><span><?= $this->uri->segment(2); ?></span></p>
                <h1 class="mb-3 bread" style="font-size: 30px !important;">Pilih Mobil Anda</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <?php foreach ($mobil as $mb) : ?>
                <div class="col-md-4">
                    <div class="car-wrap rounded ftco-animate">
                        <div class="img rounded d-flex align-items-end" style="background-image: url(<?= base_url() ?>assets/upload/<?= $mb->gambar ?>);">
                        </div>
                        <div class="text">
                            <h2 class="mb-0">
                                <?php if ($mb->status == '1') { ?>
                                    <a href="<?= base_url('mobil/detailmobil/' . $mb->id_mobil) ?>"><?= $mb->merek; ?> (Tersedia)</a>
                                <?php } else { ?>
                                    <a href="#" style="text-decoration: line-through;"><?= $mb->merek; ?> (Dirental)</a>
                                <?php } ?>
                            </h2>
                            <div class="d-flex mb-3">
                                <span class="cat">Tahun <?= $mb->tahun; ?></span>
                                <p class="price ml-auto">Rp. <?= number_format($mb->harga, 0, ',', '.'); ?>,-<span>/day</span></p>
                            </div>
                            <p class="d-flex mb-0 d-block">
                                <?php if ($mb->status == '1') { ?>
                                    <a href="#" class="btn btn-primary py-2 mr-1">Book now</a>
                                <?php } else { ?>
                                    <a href="#" class="btn btn-primary py-2 mr-1 disabled" style="text-decoration: line-through;">Book now</a>
                                <?php } ?>
                                <a href="<?= base_url('mobil/detailmobil/' . $mb->id_mobil) ?>" class="btn btn-warning py-2 ml-1">Details</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>