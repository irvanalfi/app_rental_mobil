<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>HRC Register</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/selectric/public/selectric.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
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
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>HRC Register</h4>
                            </div>

                            <div class="card-body">
                                <form action="<?= base_url('auth/register') ?>" enctype="multipart/form-data" method="post">
                                    <div class="row mb-3">
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
                                                <input type="password" name="cpassword" id="cpassword" class="form-control" value="<?= set_value('') ?>">
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
                                        <div class="col-lg-12">
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
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="setuju" class="custom-control-input" id="centang">
                                                    <label class="custom-control-label" for="centang">Saya setuju dengan <a href="<?= site_url('auth/termcondition'); ?>">syarat dan ketentuan HRC</a></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary" id="btn-rgs" disabled>Register</button>
                                        <button type="reset" class="btn btn-warning ml-2">Reset</button>
                                    </div>
                                </form>
                            </div>
                            <div class="text-muted text-center mt-2 mb-5 centered">
                                Sudah punya akun? <a href="<?= site_url('auth/login'); ?>"> Login</a>
                            </div>
                        </div>
                        <div class="simple-footer">
                            <p>
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                <i class="icon-heart color-danger" aria-hidden="true"></i> By <a href="" target="_blank">Do'a Ibu</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/jquery/dist/jquery.min.js"></script>
    <!-- <script src="<?= base_url() ?>assets/assets_admin/node_modules/popper.js/dist/popper.min.js"></script> -->
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/moment/min/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/assets/js/stisla.js"></script>


    <!-- JS Libraies -->
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/assets/js/jquery.selectric.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url() ?>assets/assets_admin/assets/js/page/auth-register.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url() ?>assets/assets_admin/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/assets/js/custom.js"></script>
    <script>
        // enabel submit button
        $(document).ready(function() {
            $('#centang').click(function() {
                if ($(this).is(':checked')) {
                    $('#btn-rgs').removeAttr('disabled');
                } else {
                    $('#btn-rgs').attr('disabled', 'disabled');
                }
            })
        })

        // upload foto profile
        function previewPhoto() {
            const photo = document.querySelector('#avatar');
            const photoLabel = document.querySelector('.cfl');
            const imgPreview = document.querySelector('.ip');

            photoLabel.textContent = photo.files[0].name;

            const filePhoto = new FileReader();
            filePhoto.readAsDataURL(photo.files[0]);

            filePhoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        // upload gambar ktp
        function previewPhoto1() {
            const photo = document.querySelector('#ktp');
            const photoLabel = document.querySelector('.cfl1');
            const imgPreview = document.querySelector('.ip1');

            photoLabel.textContent = photo.files[0].name;

            const filePhoto = new FileReader();
            filePhoto.readAsDataURL(photo.files[0]);

            filePhoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        // tampil password 
        function tampilPassword() {
            var x = document.getElementById("password");
            var y = document.getElementById("tpassword");
            var z = document.getElementById("tpassword1");

            if (x.type === 'password') {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            } else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }
        }

        // tampil password confirm 
        function tampilCPassword() {
            var x = document.getElementById("cpassword");
            var y = document.getElementById("tcpassword");
            var z = document.getElementById("tcpassword1");

            if (x.type === 'password') {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            } else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }
        }
    </script>
</body>

</html>