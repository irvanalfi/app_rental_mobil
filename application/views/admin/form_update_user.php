<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Update User</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item text-capitalize"><?= $this->uri->segment(1) ?></div>
        <div class="breadcrumb-item text-capitalize"><?= $this->uri->segment(2) ?></div>
        <?php if ($this->uri->segment(3) != '') : ?>
          <div class="breadcrumb-item text-capitalize"><?= $this->uri->segment(3) ?></div>
        <?php endif; ?>
      </div>
    </div>

    <a href="<?= base_url('admin/user/updateUser/' . $user['id_user']); ?>" class="btn btn-primary mb-3"><i class="fa fa-undo"></i> Kembali</a>
    <div class="card">

      <?php if ($this->session->flashdata('failed') != null) : ?>
        <div class="row mt-2">
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
        <form action="<?= base_url('admin/user/updateUser/' . $user['id_user']) ?>" enctype="multipart/form-data" method="post">
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">Nama *</label>
                <input type="text" name="nama" class="form-control" value="<?= $user['nama'] ?>">
                <?= form_error('nama', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">Username *</label>
                <input type="text" name="username" class="form-control" value="<?= $user['username'] ?>">
                <input type="hidden" name="oldUsername" value="<?= $user['username'] ?>">
                <?= form_error('username', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">Alamat *</label>
                <input type="text" name="alamat" class="form-control" value="<?= $user['alamat'] ?>">
                <?= form_error('alamat', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">Email *</label>
                <input type="text" name="email" class="form-control" value="<?= $user['email'] ?>">
                <input type="hidden" name="oldEmail" value="<?= $user['email'] ?>">
                <?= form_error('email', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">No. Telepon *</label>
                <input type="text" name="no_telepon" class="form-control" value="<?= $user['no_telepon'] ?>">
                <?= form_error('no_telepon', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">No. KTP *</label>
                <input type="text" name="no_ktp" class="form-control" value="<?= $user['no_ktp'] ?>">
                <input type="hidden" name="oldNoktp" value="<?= $user['no_ktp'] ?>">
                <?= form_error('no_ktp', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">Password *</label>
                <input type="password" name="password" id="password" class="form-control" value="">
                <span class="eye" onclick="tampilPassword()">
                  <div id="tpassword" style="display: none;">
                    <i class="fas fa-eye mt-2"></i><span style="font-size: 12px;"> Sembunyikan Password</span>
                  </div>
                  <div id="tpassword1">
                    <i class="fas fa-eye-slash mt-2"></i><span style="font-size: 12px;"> Tampilkan Password</span>
                  </div>
                </span>
                <?= form_error('password', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">Confirm Password *</label>
                <input type="password" name="cpassword" id="cpassword" class="form-control" value="">
                <span class="eye" onclick="tampilCPassword()">
                  <div id="tcpassword" style="display: none;">
                    <i class="fas fa-eye mt-2"></i><span style="font-size: 12px;"> Sembunyikan Password</span>
                  </div>
                  <div id="tcpassword1">
                    <i class="fas fa-eye-slash mt-2"></i><span style="font-size: 12px;"> Tampilkan Password</span>
                  </div>
                </span>
                <?= form_error('cpassword', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">Gender *</label>
                <select class="form-control" name="gender">
                  <option value="L" <?= $user['gender'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                  <option value="P" <?= $user['gender'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                </select>
                <?= form_error('gender', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">Level *</label>
                <select class="form-control" name="role">
                  <option value="2" <?= $user['role'] == 2 ? 'selected' : '' ?>>Customer</option>
                  <option value="1" <?= $user['role'] == 1 ? 'selected' : '' ?>>Admin</option>
                </select>
                <?= form_error('role', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">KTP *</label>
                <img src="<?= base_url('assets/upload/user/ktp/' . $user['foto_ktp']) ?>" alt="" class="img-thumbnail img-preview ip1 form-control" style="height: 100px; width: 170px; padding: 0px 0px !important">
                <div class="custom-file mt-3">
                  <input type="hidden" name="oldKTP" value="<?= $user['foto_ktp'] ?>">
                  <input type="file" id="ktp" name="foto_ktp" class="custom-file-input form-control-lg" autofocus onchange="previewPhoto1()">
                  <?= form_error('foto_ktp', '<div class="text-small text-danger">', '</div>') ?>
                  <label class="custom-file-label cfl1" for="photo"><?= $user['foto_ktp'] ?></label>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <label for="">Foto Profil</label>
                <img src="<?= base_url('assets/upload/user/avatar/' . $user['avatar']) ?>" alt="" class="img-thumbnail img-preview ip form-control" style="height: 100px; width: 110px; padding: 0px 0px !important">
                <div class="custom-file mt-3">
                  <input type="file" id="avatar" name="avatar" class="custom-file-input form-control-lg" autofocus onchange="previewPhoto()">
                  <input type="hidden" name="oldAvatar" value="<?= $user['avatar'] ?>">
                  <?= form_error('avatar', '<div class="text-small text-danger">', '</div>') ?>
                  <label class="custom-file-label cfl" for="photo"><?= $user['avatar'] ?></label>
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