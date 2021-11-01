<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Transaksi Selesai</h1>
    </div>

    <?php foreach ($transaksi as $tr) : ?>
      <form action="<?= base_url('admin/transaksi/transaksi_selesai_aksi'); ?>" method="post">
        <input type="hidden" name="id_rental" value="<?= $tr->id_rental; ?>">
        <input type="hidden" name="id_mobil" value="<?= $tr->id_mobil; ?>">
        <input type="hidden" name="tgl_kembali" value="<?= $tr->tgl_kembali; ?>">
        <input type="hidden" name="denda" value="<?= $tr->denda; ?>">
        <div class="form-group">
          <label for="">Tanggal Pengembalian</label>
          <input type="date" name="tgl_pengembalian" class="form-control" value="<?= $tr->tgl_pengembalian; ?>">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
      </form>
    <?php endforeach; ?>
  </section>
</div>