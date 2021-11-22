<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Update Tipe Mobil</h1>
    </div>

    <form action="<?= base_url('admin/data_tipe/update_tipe/' . $tipe['id_tipe']) ?>" method="post">
      <input type="hidden" name="id_tipe" value="<?= $tipe['id_tipe']; ?>">
      <div class="form-group">
        <label for="">Nama Tipe</label>
        <input type="hidden" name="old_nama_tipe" class="form-control" value="<?= $tipe['nama_tipe']; ?>">
        <input type="text" name="nama_tipe" class="form-control" value="<?= $tipe['nama_tipe']; ?>">
        <span class=" text-danger"><?= form_error('nama_tipe'); ?></span>
      </div>
      <div class="form-group">
        <label for="">Kode Tipe</label>
        <input type="hidden" name="old_kode_tipe" class="form-control" value="<?= $tipe['kode_tipe']; ?>">
        <input type="text" name="kode_tipe" class="form-control" value="<?= $tipe['kode_tipe']; ?>">
        <span class=" text-danger"><?= form_error('kode_tipe'); ?></span>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-warning">Reset</button>

    </form>

  </section>
</div>