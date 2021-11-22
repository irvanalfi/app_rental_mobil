<script>
  // tampil password 
  $(document).ready(function() {
    $('tpassword').click(function() {
      if ($(this).is(':checked ')) {
        $('#password').attr('type', 'text');
      } else {
        $('#password').attr('type', 'password');
      }
    })
  })
</script>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Add User</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item text-capitalize"><?= $this->uri->segment(1) ?></div>
        <div class="breadcrumb-item text-capitalize"><?= $this->uri->segment(2) ?></div>
        <?php if ($this->uri->segment(3) != '') : ?>
          <div class="breadcrumb-item text-capitalize"><?= $this->uri->segment(3) ?></div>
        <?php endif; ?>
      </div>
    </div>

    <a href="<?= base_url('admin/data_user'); ?>" class="btn btn-primary mb-3"><i class="fa fa-undo"></i> Kembali</a>
    <div class="card">

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

      <span class="mt-4 ml-4">* Isikan Nama, Alamat, No. KTP, dan Jenis Kelamin Sesuai dengan KTP</span>
      <div class="card-body">
        <form action="<?= base_url('admin/data_user/addUser') ?>" enctype="multipart/form-data" method="post">
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">Nama *</label>
                <input type="text" name="nama" class="form-control" value="<?= set_value('nama') ?>">
                <?= form_error('nama', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">Username *</label>
                <input type="text" name="username" class="form-control" value="<?= set_value('username') ?>">
                <?= form_error('username', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">Alamat *</label>
                <input type="text" name="alamat" class="form-control" value="<?= set_value('alamat') ?>">
                <?= form_error('alamat', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">Email *</label>
                <input type="text" name="email" class="form-control" value="<?= set_value('email') ?>">
                <?= form_error('email', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">No. Telepon *</label>
                <input type="text" name="no_telepon" class="form-control" value="<?= set_value('no_telepon') ?>">
                <?= form_error('no_telepon', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">No. KTP *</label>
                <input type="text" name="no_ktp" class="form-control" value="<?= set_value('no_ktp') ?>">
                <?= form_error('no_ktp', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">Password *</label>
                <input type="password" name="password" id="password" class="form-control" value="<?= set_value('') ?>">
                <span class="eye" onclick="tampilPassword()">
                  <i class="fas fa-eye mt-2" id="tpassword"> Sembunyikan Password</i>
                  <i class="fas fa-eye-slash mt-2" id="tpassword1"> Tampilkan Password</i>
                </span>
                <?= form_error('password', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">Confirm Password *</label>
                <input type="password" name="cpassword" id="cpassword" class="form-control" value="<?= set_value('') ?>">
                <span class="eye" onclick="tampilCPassword()">
                  <i class="fas fa-eye mt-2" id="tcpassword"> Sembunyikan Password</i>
                  <i class="fas fa-eye-slash mt-2" id="tcpassword1"> Tampilkan Password</i>
                </span>
                <?= form_error('cpassword', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">Gender *</label>
                <select class="form-control" name="gender">
                  <option value="L" class="selected">Laki-laki</option>
                  <option value="P" class="">Perempuan</option>
                </select>
                <?= form_error('gender', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">Level *</label>
                <select class="form-control" name="role">
                  <option value="2" class="selected">Customer</option>
                  <option value="1" class="">Admin</option>
                </select>
                <?= form_error('role', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">KTP *</label>
                <img src="<?= base_url('assets/upload/user/ktp/') ?>default.jpg" alt="" class="img-thumbnail img-preview ip1 form-control" style="height: 100px; width: 170px; padding: 0px 0px !important">
                <div class="custom-file mt-3">
                  <input type="file" id="ktp" name="foto_ktp" class="custom-file-input form-control-lg" autofocus onchange="previewPhoto1()">
                  <?= form_error('foto_ktp', '<div class="text-small text-danger">', '</div>') ?>
                  <label class="custom-file-label cfl1" for="photo">Pilih Gambar KTP</label>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">Foto Profil</label>
                <img src="<?= base_url('assets/upload/user/avatar/') ?>default.png" alt="" class="img-thumbnail img-preview ip form-control" style="height: 100px; width: 110px; padding: 0px 0px !important">
                <div class="custom-file mt-3">
                  <input type="file" id="avatar" name="avatar" class="custom-file-input form-control-lg" autofocus onchange="previewPhoto()">
                  <?= form_error('avatar', '<div class="text-small text-danger">', '</div>') ?>
                  <label class="custom-file-label cfl" for="photo">Pilih Foto Profil</label>
                </div>
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-warning">Reset</button>

        </form>
      </div>
    </div>

  </section>
</div>