<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Upload Bukti Refund</h1>
    </div>
    <a href="<?= base_url('admin/transaksi'); ?>" class="btn btn-primary mb-3"><i class="fa fa-undo"></i> Kembali</a>
    <div class="card">
      <div class="card-header">
        * Pastikan bukti refund yang diupload sudah benar.
      </div>
      <center class="card-body">
        <form action="<?= base_url('admin/transaksi/uploadRefundProses/' . $transaksi['id_transaksi']); ?>" method="post" enctype="multipart/form-data">
          <?php if ($transaksi['bukti_refund'] == null) : ?>
            <p>Belum ada bukti refund dari admin</p>
            <div class="form-group col-md-6">
              <label for="">Bukti Refund</label>
              <img src="<?= base_url('assets/upload/user/ktp/') ?>default.jpg" alt="" class="img-thumbnail img-preview ip1 form-control" style="height: 100px; width: 170px; padding: 0px 0px !important">
              <div class="custom-file mt-3">
                <input type="file" id="ktp" name="bukti_refund" class="custom-file-input form-control-lg" autofocus onchange="previewPhoto1()">
                <?= form_error('foto_ktp', '<div class="text-small text-danger">', '</div>') ?>
                <label class="custom-file-label cfl1" for="photo">Pilih gambar bukti refund</label>
              </div>
            </div>
            <a class="btn btn-sm btn-success disabled" href="<?= base_url('admin/transaksi/downloadBuktiRefund/' . $transaksi['bukti_refund']) ?>"><i class="fas fa-download"></i> Download Bukti Refund</a>
          <?php else : ?>
            <img src="<?= base_url('assets/upload/refund/' . $transaksi['bukti_refund']) ?>" alt="" class="img-thumbnail img-preview ip1 form-control mb-2" style="height: 180px; width: 260px; ">
            <a class="btn btn-sm btn-success" href="<?= base_url('admin/transaksi/downloadBuktiRefund/' . $transaksi['bukti_refund']) ?>"><i class="fas fa-download"></i> Download Bukti Refund</a>
          <?php endif ?>
          <div class="custom-control custom-switch ml-3">
            <select name="status_refund" id="" class="form-control pt-2 pb-2" style="height: 43px !important;" disabled>
              <option value="0" <?= $transaksi['status_refund'] == 'Belum Selesai' ? 'selected' : '' ?>>Belum Dikonfirmasi</option>
              <option value="1" <?= $transaksi['status_refund'] == 'Selesai' ? 'selected' : '' ?>>Sudah Dikonfirmasi</option>
            </select>
          </div>
          <div class="text mt-3">
            <p>Telah dikonfirmasi oleh : <?= $transaksi['bukti_refund'] == NULL ? 'Belum dikonfirmasi' : $user['nama'] ?></p>
          </div>
          <?php if ($transaksi['bukti_refund'] == null) : ?>
            <button type="submit" class="btn btn-sm btn-primary px-5 mb-5" name="submit">Simpan</button>
          <?php endif ?>
        </form>
        </cent>
    </div>
  </section>
</div>