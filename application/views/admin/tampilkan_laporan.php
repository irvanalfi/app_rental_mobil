<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Laporan Hasil Filter Transaksi</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item text-capitalize"><?= $this->uri->segment(1) ?></div>
        <div class="breadcrumb-item text-capitalize"><?= $this->uri->segment(2) ?></div>
        <?php if ($this->uri->segment(3) != '') : ?>
          <div class="breadcrumb-item text-capitalize"><?= $this->uri->segment(3) ?></div>
        <?php endif; ?>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">

            <div class="row">
              <div class="col-6 d-flex justify-content-start">
                <a href="<?= base_url('admin/laporan/'); ?>" class="btn btn-primary mb-3"><i class="fa fa-undo"></i> Kembali</a>
              </div>
              <div class="col-6 d-flex justify-content-end">
                <form action="<?= base_url('admin/laporan/print_laporan') ?>" method="post" target="_blank">
                  <input type="hidden" name="dari" value="<?= $tanggal['dari'] ?>">
                  <input type="hidden" name="sampai" value="<?= $tanggal['sampai'] ?>">
                  <button type="submit" class="btn btn-success"><i class="fas fa-file-export"></i> Export</button>
                </form>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped" id="table-1" style="font-size: 10px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama<br>Customer</th>
                    <th>Merek<br>Mobil</th>
                    <th>Total<br>Hari<br>Rental</th>
                    <th>Harga<br>Mobil</th>
                    <th>Harga<br>Supir</th>
                    <th>Total<br>Pajak</th>
                    <th>Total<br>Denda</th>
                    <th>Total<br>Akhir</th>
                    <th>Status<br>Pengembalian</th>
                    <th>Status<br>Rental</th>
                    <th>Tanggal<br>Transaksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($laporan as $tr) : ?>
                    <?php
                    $tanggal_rental       = strtotime($tr['tgl_rental']);
                    $tanggal_kembali      = strtotime($tr['tgl_kembali']);
                    $selisih              = abs($tanggal_rental - $tanggal_kembali) / (60 * 60 * 24) + 1;
                    ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $tr['nama']; ?></td>
                      <td><?= $tr['merek']; ?></td>
                      <td><?= $selisih ?> Hari</td>
                      <td><?= indo_currency($tr['harga']) ?>/hari <br>Total <?= indo_currency($tr['total_harga']) ?></td>
                      <td><?= indo_currency($tr['hrg_supir']) ?>/hari <br>Total <?= indo_currency($tr['total_harga_supir']) ?></td>
                      <td><?= indo_currency($tr['pajak']) ?></td>
                      <td><?= indo_currency($tr['total_denda']) ?></td>
                      <td><?= indo_currency($tr['total_akhir']) ?></td>
                      <td><?= $tr['status_pengembalian'] ?> <br><?= $tr['tgl_pengembalian'] == null ? '-' : indo_date($tr['tgl_pengembalian']) ?></td>
                      <td><?= $tr['status_rental'] ?></td>
                      <td><?= indo_date($tr['transaksi_created']) ?></td>
                    </tr>

                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>



  </section>
</div>