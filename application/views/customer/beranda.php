<div class="hero-wrap ftco-degree-bg" style="background-image: url('<?= base_url() ?>assets/assets_customer/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
            <div class="col-lg-6 ftco-animate">
                <div class="text w-100 mb-md-5 pb-md-5">
                    <h1 class="mb-4">Halim Rental Car</h1>
                    <p style="font-size: 18px;">Solusi cepat &amp; mudah untuk rental mobil di Banyuwangi <br> Kenyamanan dan kepuasan anda adalah prioritas kami</p>
                </div>
            </div>
            <div class="col-lg-6 ftco-animate">
                <div class="text w-100 text-center mb-md-5 pb-md-5">
                    <a class="btn icon-wrap d-flex align-items-center mt-4 justify-content-center video-play-btn">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="ion-ios-play"></span>
                        </div>
                        <div class="heading-title ml-5">
                            <span>Tutorial alur penyewaan mobil</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="video-popup">
    <div class="video-popup-inner">
        <i class="fas fa-times video-popup-close"></i>
        <div class="iframe-box">
            <iframe id="player-1" src="https://www.youtube.com/embed/F2maty30WZ0" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>

<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">Armada</span>
                <h2 class="mb-2">Pilihan Mobil Idaman</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-car owl-carousel">
                    <?php foreach ($mobil as $mb) : ?>
                        <div class="item">
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
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Layanan</span>
                <h2 class="mb-3">Kami Juga Melayani</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Acara Keluarga</h3>
                        <p>Mengantarkan anda dalam rangka acara keluarga seperti pernikahan di dalam atau di luar kota, reuni keluarga dan lain-lain</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Antar Jemput Dalam atau Antar Kota</h3>
                        <p>Antar jemput baik dalam kota (Banyuwangi) ataupun antar kota</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="ion-md-airplane"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Antar Jemput Bandara</h3>
                        <p>Antar jemput dari bandara ke tempat tujuan atau dari tempat tujuan ke bandara dengan waktu yang sudah di diskusikan</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Tour Keliling Kota</h3>
                        <p>Tour Keliling Kota Banyuwangi dengan tujuan yang sudah di tentukan seperti mengunjungi tempat wisata atau mengunjungi keluarga</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="ion-md-business"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Perjalanan Bisnis atau Dinas</h3>
                        <p>Perjalanan dengan tujuan berbisnis atau tujuan dinas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section ftco-about">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?= base_url() ?>assets/assets_customer/images/about.jpg);">
            </div>
            <div class="col-md-6 wrap-about ftco-animate">
                <div class="heading-section heading-section-white pl-md-5">
                    <span class="subheading">Tentang Kami</span>
                    <h2 class="mb-4">Selamat Datang di Halim Rental Car</h2>
                    <p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima quia cupiditate non, nobis totam corporis, velit a fuga soluta reiciendis rem culpa, quaerat quidem perferendis voluptate. Expedita distinctio explicabo nulla!</p>
                    <p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis quisquam velit sunt excepturi in exercitationem dolore minima! Magni quis consequuntur non sunt rerum esse harum. Adipisci porro illum ut ipsum?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas explicabo veritatis, consequatur cum odio non cumque quam beatae quisquam ipsa nihil dolore nemo itaque consectetur eum quaerat suscipit labore velit.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Testimonial</span>
                <h2 class="mb-3">Happy Customers</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(<?= base_url() ?>assets/assets_customer/images/person_1.jpg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Wenak mobile ditumpak i ki kursine iso mentul2, setire iso diputer2 barngunu pedal gas e nek di idek ki iso mlaku mobile.</p>
                                <p class="name">Oktaviano Andy</p>
                                <span class="position">Bapack2 Ketche</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(<?= base_url() ?>assets/assets_customer/images/person_2.jpg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Rim e keset iso mandeg langsung mak set. dadi nek sak wayah wayah enek pitik lewat ki aku iso ngatasi gak sampek keplindes.</p>
                                <p class="name">Sadewa Mukti</p>
                                <span class="position">Bakul xiomay</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(<?= base_url() ?>assets/assets_customer/images/person_3.jpg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">kapok aku rental mobil ndek wong lio selain HRC. sumpah ketagihan ngerental ndek HRC supir e ramah sampek cerito utang barang.</p>
                                <p class="name">Mas isyak touring</p>
                                <span class="position">Ketua Hurlay Club</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(<?= base_url() ?>assets/assets_customer/images/person_1.jpg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Kapan kapan aku rental nggen e sampean neh cak. sumpah supir e cag ceg cag ceg, kesit, tepat waktu. nek macet iso miber barang.</p>
                                <p class="name">Salamun Gaming</p>
                                <span class="position">Bendahara PUBG indo</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(<?= base_url() ?>assets/assets_customer/images/person_1.jpg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Perjalanan Aman nyaman sejahtera sentosa. berkat HRC cicilan panci saya lunas. tidak lagi di kejar kejar bank tetel. saya bisa fokus hutang di HRC.</p>
                                <p class="name">Siti Kondi Lati</p>
                                <span class="position">Pecinta bank tetel</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-counter ftco-section img bg-light" id="section-counter">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <strong class="number" data-number="10">0</strong>
                        <span>Tahun <br>Pengalaman</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <strong class="number" data-number="20">0</strong>
                        <span>Total <br>Mobil</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <strong class="number" data-number="1200">0</strong>
                        <span>Respon Baik <br>Customers</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text d-flex align-items-center">
                        <strong class="number" data-number="3">0</strong>
                        <span>Total <br>Cabang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>