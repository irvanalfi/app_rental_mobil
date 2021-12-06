<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Konfirmasi Pembayaran</h1>
    </div>
    <a href="<?= base_url('admin/transaksi'); ?>" class="btn btn-primary mb-3"><i class="fa fa-undo"></i> Kembali</a>
    <div class="card">
      <div class="card-header">
        * Cek terlebih dengan mendownload bukti pembayaran dan mencocokan dengan uang yang sudah ditransfer pada rekening bank perusahaan.<br>
        * Jika uang sudah masuk ke rekening perusahaan silahkan konfirmasi pembayaran kemudian simpan.
      </div>
      <center class="card-body">
        <form action="<?= base_url('admin/transaksi/cekPembayaran/' . $transaksi['id_transaksi']); ?>" method="post">
          <?php if ($transaksi['bukti_pembayaran'] == null) : ?>
            <p>Belum mengirimkan bukti pembayaran</p>
            <a class="btn btn-sm btn-success disabled" href="<?= base_url('admin/transaksi/downloadPembayaran/' . $transaksi['bukti_pembayaran']) ?>"><i class="fas fa-download"></i> Download Bukti Pembayaran</a>
          <?php else : ?>
            <img src="<?= base_url('assets/upload/struk/' . $transaksi['bukti_pembayaran']) ?>" alt="" class="img-thumbnail img-preview ip1 form-control mb-2" style="height: 180px; width: 260px; ">
            <a class="btn btn-sm btn-success" href="<?= base_url('admin/transaksi/downloadPembayaran/' . $transaksi['bukti_pembayaran']) ?>"><i class="fas fa-download"></i> Download Bukti Pembayaran</a>
          <?php endif ?>
          <div class="custom-control custom-switch ml-3">
            <select name="status_pembayaran" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
              <option value="0" <?= $transaksi['status_pembayaran'] == 0 ? 'selected' : '' ?>>Belum Dikonfirmasi</option>
              <option value="1" <?= $transaksi['status_pembayaran'] == 1 ? 'selected' : '' ?>>Sudah Dikonfirmasi</option>
            </select>
          </div>
          <div class="d-flex justify-content-center mt-3">
            <p>Telah dikonfirmasi oleh : <?= $transaksi['confirm_by'] == NULL ? 'Belum dikonfirmasi' : $transaksi['confirm_by'] ?></p>
          </div>
          <button type="submit" class="btn btn-sm btn-primary px-5">Simpan</button>
        </form>
      </center>
    </div>
  </section>
</div>