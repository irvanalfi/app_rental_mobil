<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url() ?>assets/assets_customer/images/banner.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate">
                <p class="breadcrumbs"><span><?= $this->uri->segment(1); ?> <i class="ion-ios-arrow-forward"></i> <span><?= $this->uri->segment(2); ?></span></p>
                <h1 class="mb-3 bread">Pembayaran Anda</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section" style="padding: 2em 0 !important;">
    <div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>
    <?php foreach ($bayar as $byr) : ?>
        <div class="container">
            <?php
            $tanggal_rental       = strtotime($byr['tgl_rental']);
            $tanggal_kembali      = strtotime($byr['tgl_kembali']);
            $selisih              = abs($tanggal_rental - $tanggal_kembali) / (60 * 60 * 24) + 1;
            $total_harga_supir    = $byr['total_harga_supir'];
            $harga_supir          = $total_harga_supir / $selisih;
            ?>
            <div class="row">
                <div class="col-md-8">
                    <div class=" card">
                        <h5 class="card-header bg-dark text-light text-center">Informasi Rental</h5>

                        <div class="card-body">
                            <img class="card-img-top" src="<?= base_url() ?>assets/upload/<?= $byr['gambar'] ?>" alt="Card image cap">
                            <h5 class="card-title text-center mt-2"><b><?= $byr['merek']; ?> Tahun <?= $byr['tahun']; ?></b></h5>
                            <ul class="list-group list-group-flush">
                                <div class="row">
                                    <div class="col" style="font-size: 14px;">
                                        <li class="list-group-item text-dark">Data Mobil</li>
                                        <li class="list-group-item text-dark">
                                            Plat Nomer &nbsp; &nbsp; &nbsp; : &nbsp; <b><?= $byr['no_plat']; ?></b><br>
                                            Tipe &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; <?= $byr['nama_tipe']; ?><br>
                                            Transmisi &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; <?= $byr['transmisi']; ?><br>
                                            Harga Rental &nbsp; : &nbsp; <?= indo_currency($byr['harga']); ?> / Hari<br>
                                            Harga Supir &nbsp; &nbsp; : &nbsp; <?= indo_currency($byr['hrg_supir']) ?> / Hari
                                        </li>
                                    </div>
                                    <div class="col">
                                        <li class="list-group-item text-dark">Data Rental</li>
                                        <li class="list-group-item text-dark">
                                            Total Hari Rental &nbsp; &nbsp; &nbsp; &nbsp;: <?= $selisih ?> Hari<br>
                                            Total Rental &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <?= indo_currency($byr['total_harga']); ?><br>
                                            Total Supir &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : <?= indo_currency($byr['total_harga_supir']); ?><br>
                                            Total Akhir &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : <?= indo_currency($byr['total_akhir']); ?><br>
                                            Status Pembayaran : <?= $byr['status_pembayaran'] == 0 ? 'Belum Lunas' : 'Lunas'; ?>
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
                            <p class="card-title" style="font-size: 16px !important; font-weight: inherit;">Silahkan lakukan pembayar dengan transfer ke salah satu bank dibawah :</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-dark">MANDIRI : 983745823748 <br>AN M. IRVAN ALFI HIDAYA</li>
                                <li class="list-group-item text-dark">BRI : 234898341867 <br>AN OKTAVIANO ANDI S</li>
                                <li class="list-group-item text-dark">BRI : 897354322158 <br>AN SADEWA MUKTI W</li>
                                <br>
                            </ul>
                            <?php if ($byr['bukti_pembayaran'] == '') : ?>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><span class="icon-upload"></span> Upload Bukti Transfer</a>
                            <?php elseif ($byr['status_pembayaran'] == 0) : ?>
                                <button class="btn btn-warning"><span class="icon-clock-o"></span> Menunggu Konfirmasi</button>
                            <?php elseif ($byr['status_pembayaran'] == 1) : ?>
                                <button class="btn btn-success"><span class="icon-check"></span> Pembayaran Berhasil</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
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
            <form action="<?= base_url('transaksi/prosesPembayaran') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Upload bukti transfer</label>
                        <input type="hidden" name="id_transaksi" value="<?= $byr['id_transaksi'] ?>">
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