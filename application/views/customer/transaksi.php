<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url() ?>assets/assets_customer/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate">
                <p class="breadcrumbs"><span><?= $this->uri->segment(1); ?> <i class="ion-ios-arrow-forward"></i><span><?= $this->uri->segment(2); ?></span></p>
                <h1 class="mb-3 bread">Transaksi Anda</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section">
    <div class="container">
        <div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>
        <div class="row border d-flex mb-5 contact-info">
            <table class="table table-striped m-3">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center;">No.</th>
                        <th scope="col">Pemesan</th>
                        <th scope="col">Merek</th>
                        <th scope="col">Plat No</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Pembayaran</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($transaksi as $tr) : ?>
                        <tr>
                            <td style="text-align: center;"><?= $no++ ?></td>
                            <td><?= $tr['nama']; ?></td>
                            <td><?= $tr['merek']; ?></td>
                            <td><?= $tr['no_plat']; ?></td>
                            <td><?= indo_currency($tr['total_akhir']); ?></td>
                            <td>
                                <a href="<?= base_url('customer/pembayaran' . $tr['id_transaksi']) ?>" class="btn btn-sm btn-warning">
                                    <span class="icon-eye"></span> <span>Cek Pembayaran</span>
                                </a>
                            </td>
                            <td>
                                <?php if ($tr['status_pengembalian'] == 'Belum Kembali') : ?>
                                    <a href="<?= base_url('customer/deletTransaksi' . $tr['id_transaksi']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin membatalkan transaksi?')">
                                        <span class="icon-trash"></span> <span>Batal Rental</span>
                                    </a>
                                <?php else : ?>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
                                        Batal Rental
                                    </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informasi Batal Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Maaf, transaksi ini sudah selesai, dan tidak bisa dibatalkan!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>