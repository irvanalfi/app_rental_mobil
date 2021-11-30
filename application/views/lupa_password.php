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
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                        <div class="card card-primary mt-5">
                            <div class="card-header" style="align-items: center !important;">
                                <h4>Lupa Password Anda?</h4> <br>
                            </div>
                            <div class="card-body">
                                <?php if ($this->session->flashdata('success') != null) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert1">
                                    <?php echo $this->session->flashdata('success') ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif ?>
                                <?php if ($this->session->flashdata('failed') != null) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert1">
                                    <?php echo $this->session->flashdata('failed') ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif ?>
                            
                                <p>Link Rest Password akan dikirimkan ke email Anda yang sudah terdaftar di Sistem kami</p>
                                
                                <form method="POST" action="<?= base_url('password/lupa'); ?>">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="username" type="text" class="form-control" name="email" tabindex="1" autofocus>
                                        <?= form_error('email', '<small class="text-small text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Kirim Link Reset Password
                                        </button>
                                    </div>
                                </form>
                                <div class="text-muted text-center">
                                    Sudah ingat? <a href="<?= site_url('auth/login'); ?>"> Login</a>
                                </div>
                                <div class="text-muted text-center">
                                    Belum punya akun? <a href="<?= site_url('auth/register'); ?>"> Register</a>
                                </div>
                            </div>
                        </div>
                        <div class="simple-footer fixed-bottom">
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

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?= base_url() ?>assets/assets_admin/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/assets/js/custom.js"></script>

    <script>
        // auto close alert
        $("#alert1").fadeTo(2000, 500).slideUp(500, function() {
            $("#alert1").slideUp(1000);
        });
    </script>

</body>

</html>