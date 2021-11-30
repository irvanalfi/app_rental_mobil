<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data User</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item text-capitalize"><?= $this->uri->segment(1) ?></div>
        <div class="breadcrumb-item text-capitalize"><?= $this->uri->segment(2) ?></div>
        <?php if ($this->uri->segment(3) != '') : ?>
          <div class="breadcrumb-item text-capitalize"><?= $this->uri->segment(3) ?></div>
        <?php endif; ?>
      </div>
    </div>

    <a href="<?= base_url('admin/user/adduser'); ?>" class="btn btn-primary mb-3">Tambah Data</a>

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
                    <th>Image</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No. Telepon</th>
                    <th>No. KTP</th>
                    <th>Level</th>
                    <th width="50px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($user as $us) : ?>
                    <tr>
                      <td><?= $no++; ?>.</td>
                      <td><img alt="image" src="<?= base_url('assets/upload/user/avatar/' . $us['avatar']); ?>" class="rounded-circle mr-1" width="30px" height="30px"></td>
                      <td><?= $us['nama']; ?></td>
                      <td><?= $us['username']; ?></td>
                      <td><?= $us['alamat']; ?></td>
                      <td><?= $us['email']; ?></td>
                      <td><?= $us['no_telepon']; ?></td>
                      <td><?= $us['no_ktp']; ?></td>
                      <td><?= $us['role'] == 1 ? 'Admin' : 'Customer' ?></td>
                      <td class="align-middle">
                        <a href="<?= base_url('admin/user/updateUser/') . $us['id_user'] ?>" class="btn btn-sm btn-primary" title="Update Data"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('admin/user/delete_user/') . $us['id_user'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')" title="Hapus Data"><i class="fas fa-trash"></i></a>
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