<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Filter Laporan Transaksi</h1>
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
            <form action="<?= base_url('admin/laporan') ?>" method="post">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Dari Tanggal</label>
                    <input type="date" name="dari" class="form-control">
                    <?= form_error('dari', '<div class="text-small text-danger">', '</div>') ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Sampai Tanggal</label>
                    <input type="date" name="sampai" class="form-control">
                    <?= form_error('sampai', '<div class="text-small text-danger">', '</div>') ?>
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Tampilkan Data</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>