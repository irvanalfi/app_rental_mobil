<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Mobil</h1>
    </div>

    <a href="<?= base_url('admin/data_mobil/tambah_mobil'); ?>" class="btn btn-primary mb-3">Tambah Data</a>
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

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th width="20px">
                      No.
                    </th>
                    <th>Gambar</th>
                    <th>Merek</th>
                    <th>Tipe</th>
                    <th>Tahun</th>
                    <th>No.Plat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($mobil as $mb) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><img width="70px;" src="<?= base_url('assets/upload/car/') . $mb['gambar']; ?>" alt=""></td>
                      <td><?= $mb['merek']; ?></td>
                      <td><?= $mb['nama_tipe']; ?></td>
                      <td><?= $mb['tahun']; ?></td>
                      <td><?= $mb['no_plat']; ?></td>
                      <td>
                        <?php if ($mb['status'] == 0) { ?>
                          <span class="badge badge-danger">Tidak Tersedia</span>
                        <?php } else { ?>
                          <span class="badge badge-primary">Tersedia</span>
                        <?php } ?>
                      </td>
                      <td class="align-middle">
                        <!-- <a href="<?= base_url('admin/data_tipe/update_tipe/') . $tp['id_tipe'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('admin/data_tipe/delete_tipe/') . $tp['id_tipe'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a> -['
                        <!-- <a href="<?= base_url('admin/data_mobil/detail_mobil/') . $mb['id_mobil']; ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                        <a onclick="return confirm('Yakin hapus?')" href="<?= base_url('admin/data_mobil/delete_mobil/') . $mb['id_mobil']; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        <a href="<?= base_url('admin/data_mobil/update_mobil/') . $mb['id_mobil']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a> -->
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>