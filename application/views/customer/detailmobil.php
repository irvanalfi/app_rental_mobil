<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url() ?>assets/assets_customer/images/car-3.1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate">
                <p class="breadcrumbs"><span><?= $this->uri->segment(1); ?> <i class="ion-ios-arrow-forward"></i><span><?= $this->uri->segment(2); ?></span></p>
                <h1 class="mb-3 bread">Detail Mobil</h1>
            </div>
        </div>
    </div>
</section>

<?php foreach ($detail as $dt) : ?>
    <section class="ftco-section ftco-car-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="car-details">
                        <div class="img rounded" style="background-image: url(<?= base_url() ?>assets/upload/<?= $dt->gambar ?>);"></div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="text text-center py-3">
                        <?php if ($dt->status == '1') { ?>
                            <h3><?= $dt->merek; ?> (Tersedia)</h3>
                        <?php } else { ?>
                            <h3 style="text-decoration: line-through;"><?= $dt->merek; ?> (Dirental)</h3>
                        <?php } ?>
                        <span class="subheading">Warna <?= $dt->warna; ?> Tahun <?= $dt->tahun; ?></span>
                        <div class="row">
                            <div class="col-md-4 col-sm-6 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services">
                                    <div class="media-body py-md-4">
                                        <div class="d-flex mb-3 align-items-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
                                            <div class="text">
                                                <h3 class="heading mb-0 pl-3">
                                                    KM
                                                    <span>-+40k</span>
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
                                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
                                            <div class="text">
                                                <h3 class="heading mb-0 pl-3">
                                                    Transmisi
                                                    <span>Manual</span>
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
                                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
                                            <div class="text">
                                                <h3 class="heading mb-0 pl-3">
                                                    Kursi
                                                    <span>7 Dewasa</span>
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
                                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
                                            <div class="text">
                                                <h3 class="heading mb-0 pl-3">
                                                    Bagasi
                                                    <span>4 ransel</span>
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
                                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
                                            <div class="text">
                                                <h3 class="heading mb-0 pl-3">
                                                    BBM
                                                    <span>Solar</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if ($dt->status == '1') { ?>
                            <a href="#" class="btn btn-primary py-2 px-5 mr-1">Book now</a>
                        <?php } else { ?>
                            <a href="#" class="btn btn-primary py-2 px-5 mr-1 disabled" style="text-decoration: line-through;">Book now</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pills">
                    <div class="bd-example bd-example-tabs">
                        <div class="d-flex justify-content-center">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="features">
                                            <li class="check"><span class="ion-ios-checkmark"></span>Airconditions</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Child Seat</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>GPS</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Luggage</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Music</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="features">
                                            <li class="check"><span class="ion-ios-checkmark"></span>Seat Belt</li>
                                            <li class="remove"><span class="ion-ios-close"></span>Sleeping Bed</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Water</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Bluetooth</li>
                                            <li class="remove"><span class="ion-ios-close"></span>Onboard computer</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="features">
                                            <li class="check"><span class="ion-ios-checkmark"></span>Audio input</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Long Term Trips</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Car Kit</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Remote central locking</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Climate control</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                                <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                            </div>

                            <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h3 class="head">23 Reviews</h3>
                                        <div class="review d-flex">
                                            <div class="user-img" style="background-image: url(<?= base_url() ?>assets/assets_customer/images/person_1.jpg)"></div>
                                            <div class="desc">
                                                <h4>
                                                    <span class="text-left">Jacob Webb</span>
                                                    <span class="text-right">14 March 2018</span>
                                                </h4>
                                                <p class="star">
                                                    <span>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                    </span>
                                                    <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                                </p>
                                                <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                            </div>
                                        </div>
                                        <div class="review d-flex">
                                            <div class="user-img" style="background-image: url(<?= base_url() ?>assets/assets_customer/images/person_2.jpg)"></div>
                                            <div class="desc">
                                                <h4>
                                                    <span class="text-left">Jacob Webb</span>
                                                    <span class="text-right">14 March 2018</span>
                                                </h4>
                                                <p class="star">
                                                    <span>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                    </span>
                                                    <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                                </p>
                                                <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                            </div>
                                        </div>
                                        <div class="review d-flex">
                                            <div class="user-img" style="background-image: url(<?= base_url() ?>assets/assets_customer/images/person_3.jpg)"></div>
                                            <div class="desc">
                                                <h4>
                                                    <span class="text-left">Jacob Webb</span>
                                                    <span class="text-right">14 March 2018</span>
                                                </h4>
                                                <p class="star">
                                                    <span>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                    </span>
                                                    <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                                </p>
                                                <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="rating-wrap">
                                            <h3 class="head">Give a Review</h3>
                                            <div class="wrap">
                                                <p class="star">
                                                    <span>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        (98%)
                                                    </span>
                                                    <span>20 Reviews</span>
                                                </p>
                                                <p class="star">
                                                    <span>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        (85%)
                                                    </span>
                                                    <span>10 Reviews</span>
                                                </p>
                                                <p class="star">
                                                    <span>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        (70%)
                                                    </span>
                                                    <span>5 Reviews</span>
                                                </p>
                                                <p class="star">
                                                    <span>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        (10%)
                                                    </span>
                                                    <span>0 Reviews</span>
                                                </p>
                                                <p class="star">
                                                    <span>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        (0%)
                                                    </span>
                                                    <span>0 Reviews</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endforeach; ?>
<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">Pilih Mobil Lain</span>
                <h2 class="mb-2">Mobil Terkait</h2>
            </div>
        </div>
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
    </div>
</section>