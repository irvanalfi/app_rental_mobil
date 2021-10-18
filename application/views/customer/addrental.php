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
                        <h3 class="">Buat Perjalananmu Sekarang</h3>
                    </div>
                </div>
                <div class="bd-example bd-example-tabs">
                    <div class="d-flex justify-content-center">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
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
                            <div class="row">
                                <div class="col-12">
                                    <form action="<?= base_url('customer/rental/tambah_rental_aksi') ?>" class="request-form ftco-animate bg-primary" method="post">
                                        <?php foreach ($customer as $cs) : ?>
                                            <div class="d-flex">
                                                <div class="form-group mr-2">
                                                    <label for="" class="label">Nama</label>
                                                    <input type="text" class="form-control" placeholder="<?= $cs->nama; ?>">
                                                </div>
                                                <div class="form-group mx-2">
                                                    <label for="" class="label">No KTP / SIM / PASPORT</label>
                                                    <input type="text" class="form-control" placeholder="<?= $cs->no_ktp; ?>">
                                                </div>
                                                <div class="form-group ml-2">
                                                    <label for="" class="label">No Telpon</label>
                                                    <input type="number" class="form-control" placeholder="<?= $cs->no_telepon; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="label">Lokasi Penjemputan</label>
                                                <input type="text" class="form-control" placeholder="<?= $cs->alamat; ?>">
                                            </div>
                                            <div class="d-flex">
                                                <div class="form-group mr-2">
                                                    <label for="" class="label">Waktu Penjemputan</label>
                                                    <input type="text" class="form-control" id="time_pick" placeholder="Time">
                                                </div>
                                                <div class="form-group mx-2">
                                                    <label for="" class="label">Tanggal Rental</label>
                                                    <input type="text" class="form-control" id="book_pick_date" placeholder="Date">
                                                </div>
                                                <div class="form-group ml-2">
                                                    <label for="" class="label">Tanggal Pengembalian</label>
                                                    <input type="text" class="form-control" id="book_off_date" placeholder="Date">
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php foreach ($detail as $dt) : ?>
                                            <div class="d-flex">
                                                <div class="form-group mr-2">
                                                    <label for="" class="label">Harga / Hari</label>
                                                    <input type="text" class="form-control" placeholder="<?= $dt->harga; ?>" disabled>
                                                </div>
                                                <div class="form-group mx-2">
                                                    <label for="" class="label">Denda / Hari</label>
                                                    <input type="text" class="form-control" placeholder="<?= $dt->denda; ?>" disabled>
                                                </div>
                                                <div class="form-group mx-2">
                                                    <label for="" class="label">Harga Supir / Hari</label>
                                                    <input type="text" class="form-control" placeholder="<?= $dt->denda; ?>" disabled>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <div class="form-group mt-3">
                                            <input type="submit" value="Rental Sekarang" class="btn btn-secondary py-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php foreach ($detail as $dt) : ?>
                            <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
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
                                                                                <span>-+<?= $dt->km; ?>k</span>
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
                                                                                <span><?= $dt->transmisi; ?></span>
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
                                                                                <span><?= $dt->jmlh_kursi; ?></span>
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
                                                                                <span><?= $dt->bagasi; ?></span>
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
                                                                                <span><?= $dt->bbm; ?></span>
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
                                        <br>
                                        <hr>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <ul class="features">
                                                    <li class="<?= $dt->ac == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $dt->ac == '1' ? 'checkmark' : 'close'; ?>"></span>Airconditions</li>
                                                    <li class="<?= $dt->seat_belt == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $dt->seat_belt == '1' ? 'checkmark' : 'close'; ?>"></span>Seat Belt</li>
                                                    <li class="<?= $dt->air == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $dt->air == '1' ? 'checkmark' : 'close'; ?>"></span>Air</li>
                                                    <li class="<?= $dt->p3k == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $dt->p3k == '1' ? 'checkmark' : 'close'; ?>"></span>P3K</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4">
                                                <ul class="features">
                                                    <li class="<?= $dt->audio_input == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $dt->audio_input == '1' ? 'checkmark' : 'close'; ?>"></span>Audio input</li>
                                                    <li class="<?= $dt->bluethooth == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $dt->bluethooth == '1' ? 'checkmark' : 'close'; ?>"></span>Bluetooth</li>
                                                    <li class="<?= $dt->mp3_player == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $dt->mp3_player == '1' ? 'checkmark' : 'close'; ?>"></span>Music</li>
                                                    <li class="<?= $dt->vidio == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $dt->vidio == '1' ? 'checkmark' : 'close'; ?>"></span>Vidio</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4">
                                                <ul class="features">
                                                    <li class="<?= $dt->central_lock == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $dt->central_lock == '1' ? 'checkmark' : 'close'; ?>"></span>Remote central locking</li>
                                                    <li class="<?= $dt->ban_serep == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $dt->ban_serep == '1' ? 'checkmark' : 'close'; ?>"></span>Roda Cadangan</li>
                                                    <li class="<?= $dt->car_kit == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $dt->car_kit == '1' ? 'checkmark' : 'close'; ?>"></span>Peralatan Mobil</li>
                                                    <li class="<?= $dt->sopir == '1' ? 'check' : 'remove'; ?>"><span class="ion-ios-<?= $dt->sopir == '1' ? 'checkmark' : 'close'; ?>"></span><b>Lepas Kunci</b></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>