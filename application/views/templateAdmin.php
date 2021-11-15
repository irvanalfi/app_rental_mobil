<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>HRC</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/assets_stisla'); ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/assets_stisla'); ?>/assets/css/components.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" class="nav-link nav-link-lg nav-link-user">
                            <div class="d-sm-none d-lg-inline-block">Hi, <strong><?= $this->session->userdata('nama'); ?></strong></div>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?= base_url('admin/dashboard'); ?>">Halim Rental Car</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">HRC</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li><a class="nav-link" href="<?= base_url('admin/dashboard'); ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
                        <li><a class="nav-link" href="<?= base_url('admin/data_mobil'); ?>"><i class="fas fa-car"></i> <span>Data Mobil</span></a></li>
                        <li><a class="nav-link" href="<?= base_url('admin/data_tipe'); ?>"><i class="fas fa-grip-horizontal"></i> <span>Data Tipe</span></a></li>
                        <li><a class="nav-link" href="<?= base_url('admin/data_customer'); ?>"><i class="fas fa-users"></i> <span>Data Customer</span></a></li>
                        <li><a class="nav-link" href="<?= base_url('admin/transaksi'); ?>"><i class="fas fa-random"></i> <span>Transaksi</span></a></li>
                        <li><a class="nav-link" href="<?= base_url('admin/laporan'); ?>"><i class="fas fa-clipboard-list"></i> <span>Laporan</span></a></li>
                        <li><a class="nav-link" href="<?= base_url('auth/logout'); ?>"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
                        <li><a class="nav-link" href="<?= base_url('auth/ganti_password'); ?>"><i class="fas fa-lock"></i> <span>Ganti Password</span></a></li>
                    </ul>

                </aside>
            </div>

            <!-- Start Content  -->
            <?php echo $contents ?>
            <!-- End Content  -->

            <footer class="main-footer fixed-bottom">
                <div class="footer-left">
                    <p>
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        <i class="icon-heart color-danger" aria-hidden="true"></i> By <a href="" target="_blank">Do'a Ibu</a>
                    </p>
                </div>
                <div class="footer-right">
                    1.0.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="../assets/js/stisla.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url('assets/assets_stisla'); ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url('assets/assets_stisla'); ?>/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url('assets/assets_stisla'); ?>/assets/js/page/index-0.js"></script>
    <script type="text/javascript">
        $("#alert1").fadeTo(2000, 500).slideUp(500, function() {
            $("#alert1").slideUp(500);
        });
    </script>
</body>

</html>