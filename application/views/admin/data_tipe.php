<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Tipe Mobil</h1>
    </div>

    <a href="<?= base_url('admin/data_tipe/addTipe'); ?>" class="btn btn-primary mb-3">Tambah Data</a>

    <?php if ($this->session->flashdata('success') != null) : ?>
      <div class="row">
        <div class="col-md-12 mx-0" id="flash" data-flash="<?= $this->session->flashdata('success'); ?>">
          <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert1">
            <?php echo $this->session->flashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    <?php endif ?>

    <?php if ($this->session->flashdata('failed') != null) : ?>
      <div class="row">
        <div class="col-md-12 mx-0" id="flash" data-flash="<?= $this->session->flashdata('failed'); ?>">
          <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert1">
            <?php echo $this->session->flashdata('failed') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    <?php endif ?>

    <table class="table table-stripped table-bordered table-hover">
      <thead>
        <tr>
          <th width="20px;">No</th>
          <th>Nama Tipe</th>
          <th>Kode Tipe</th>
          <th width="180px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($tipe as $tp) : ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $tp['nama_tipe'] ?></td>
            <td><?= $tp['kode_tipe'] ?></td>
            <td>
              <a href="<?= base_url('admin/data_tipe/update_tipe/') . $tp['id_tipe'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
              <a href="<?= base_url('admin/data_tipe/delete_tipe/') . $tp['id_tipe'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </section>
</div>