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

<section class="ftco-section ftco-car-details">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="car-details">
                    <div class="img rounded" style="background-image: url(<?= base_url() ?>assets/upload/<?= $detail['gambar'] ?>);"></div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="text text-center py-3">
                    <?php if ($detail['status'] == '1') { ?>
                        <h3><?= $detail['merek']; ?> (Tersedia)</h3>
                    <?php } else { ?>
                        <h3 style="text-decoration: line-through;"><?= $detail['merek']; ?> (Dirental)</h3>
                    <?php } ?>
                    <span class="subheading">Warna <?= $detail['warna']; ?> Tahun <?= $detail['tahun']; ?></span>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services">
                                <div class="media-body py-md-4">
                                    <div class="d-flex mb-3 align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
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
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
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
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
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
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
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
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
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
                    <?php if ($detail['status'] == '1') { ?>
                        <a href="<?= base_url('mobil/addrental/' . $detail['id_mobil']) ?>" class="btn btn-primary py-2 px-5 mr-1">Book now</a>
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
                                <a class="nav-link" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <ul class="features">
                                        <li class="<?= $detail['ac'] == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $detail['ac'] == '1' ? 'checkmark' : 'close'; ?>"></span>Airconditions</li>
                                        <li class="<?= $detail['seat_belt'] == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $detail['seat_belt'] == '1' ? 'checkmark' : 'close'; ?>"></span>Seat Belt</li>
                                        <li class="<?= $detail['air'] == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $detail['air'] == '1' ? 'checkmark' : 'close'; ?>"></span>Air</li>
                                        <li class="<?= $detail['p3k'] == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $detail['p3k'] == '1' ? 'checkmark' : 'close'; ?>"></span>P3K</li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="features">
                                        <li class="<?= $detail['audio_input'] == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $detail['audio_input'] == '1' ? 'checkmark' : 'close'; ?>"></span>Audio input</li>
                                        <li class="<?= $detail['bluetooth'] == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $detail['bluetooth'] == '1' ? 'checkmark' : 'close'; ?>"></span>Bluetooth</li>
                                        <li class="<?= $detail['mp3_player'] == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $detail['mp3_player'] == '1' ? 'checkmark' : 'close'; ?>"></span>Music</li>
                                        <li class="<?= $detail['vidio'] == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $detail['vidio'] == '1' ? 'checkmark' : 'close'; ?>"></span>Vidio</li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="features">
                                        <li class="<?= $detail['central_lock'] == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $detail['central_lock'] == '1' ? 'checkmark' : 'close'; ?>"></span>Remote central locking</li>
                                        <li class="<?= $detail['ban_serep'] == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $detail['ban_serep'] == '1' ? 'checkmark' : 'close'; ?>"></span>Roda Cadangan</li>
                                        <li class="<?= $detail['car_kit'] == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $detail['car_kit'] == '1' ? 'checkmark' : 'close'; ?>"></span>Peralatan Mobil</li>
                                        <li class="<?= $detail['supir'] == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $detail['supir'] == '1' ? 'checkmark' : 'close'; ?>"></span><b>Lepas Kunci</b></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade  show active" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                            <p>Plat Nomer &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; <?= $detail['no_plat'] ?></p>
                            <p>Harga Mobil Perhari &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; <?= indo_currency($detail['harga']) ?></p>
                            <p>Denda Mobil perhari &nbsp; &nbsp; &nbsp; : &nbsp; <?= indo_currency($detail['denda']) ?> </p>
                            <p>Harga Supir perhari &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; <?= indo_currency($detail['hrg_supir']) ?> </p>
                            <hr>
                            <p style="text-align: justify !important;"><?= $detail['detail'] ?></p>
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
                        <div class="img rounded d-flex align-items-end" style="background-image: url(<?= base_url() ?>assets/upload/<?= $mb['gambar'] ?>);">
                        </div>
                        <div class="text">
                            <h2 class="mb-0">
                                <?php if ($mb['status'] == '1') { ?>
                                    <a href="<?= base_url('mobil/detailmobil/' . $mb['id_mobil']) ?>"><?= $mb['merek']; ?> (Tersedia)</a>
                                <?php } else { ?>
                                    <a href="#" style="text-decoration: line-through;"><?= $mb['merek']; ?> (Dirental)</a>
                                <?php } ?>
                            </h2>
                            <div class="d-flex mb-3">
                                <span class="cat">Tahun <?= $mb['tahun']; ?></span>
                                <p class="price ml-auto">Rp. <?= number_format($mb['harga'], 0, ',', '.'); ?>,-<span>/day</span></p>
                            </div>
                            <p class="d-flex mb-0 d-block">
                                <?php if ($mb['status'] == '1') { ?>
                                    <a href="<?= base_url('mobil/addrental/' . $mb['id_mobil']) ?>" class="btn btn-primary py-2 mr-1">Book now</a>
                                <?php } else { ?>
                                    <a href="#" class="btn btn-primary py-2 mr-1 disabled" style="text-decoration: line-through;">Book now</a>
                                <?php } ?>
                                <a href="<?= base_url('mobil/detailmobil/' . $mb['id_mobil']) ?>" class="btn btn-warning py-2 ml-1">Details</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>