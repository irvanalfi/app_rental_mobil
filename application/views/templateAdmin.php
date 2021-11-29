<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>HRC</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/codemirror/theme/duotone-dark.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/selectric/public/selectric.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/assets/css/components.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Contact Masuk
                            </div>
                            <div class="dropdown-list-content dropdown-list-message">
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="<?= base_url('assets/assets_admin/assets/img/avatar/') ?>avatar-1.png" class="rounded-circle">
                                        <div class="is-online"></div>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Kusnaedi</b>
                                        <p>Hello, Bro!</p>
                                        <div class="time">10 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="<?= base_url('assets/assets_admin/assets/img/avatar/') ?>avatar-2.png" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Dedik Sugiharto</b>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="<?= site_url('admin/data_contact'); ?>">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <!-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-icon bg-primary text-white">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Template update is available now!
                                        <div class="time text-primary">2 Min Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                                        <div class="time">10 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-success text-white">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-danger text-white">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Low disk space. Let's clean it!
                                        <div class="time">17 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Welcome to Stisla template!
                                        <div class="time">Yesterday</div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li> -->
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user" aria-expanded="false">
                            <img alt="image" src="<?= base_url('assets/upload/user/avatar/') . $this->session->userdata('avatar'); ?>" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block"><?= $this->session->userdata('nama') ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= base_url('admin/password') ?>" class="dropdown-item has-icon">
                                <i class="fas fa-lock"></i> Ganti Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('Auth/logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <div class="sidebar-brand">
                            <a href="<?= base_url('admin/dashboard'); ?>">Halim Rental Car</a>
                        </div>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?= base_url('admin/dashboard'); ?>">HRC</a>
                    </div>
                    <ul class="sidebar-menu mt-5">
                        <li class="menu-header">Dashboard</li>
                        <li class="nav-item dropdown <?= $this->uri->segment(2) == '' || $this->uri->segment(2) == 'dashboard' || $this->uri->segment(2) == 'tipe' ? 'active' : ''; ?>">
                            <a href="<?= site_url('admin/dashboard'); ?>" class="nav-link <?= $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        </li>
                        <li class="menu-header">Mobil</li>
                        <li class="nav-item dropdown <?= $this->uri->segment(2) == 'mobil' || $this->uri->segment(2) == 'review' || $this->uri->segment(2) == 'tipe' ? 'active' : ''; ?>">
                            <a href=" #" class="nav-link has-dropdown"><i class="fas fa-car"></i> <span>Mobil</span></a>
                            <ul class="dropdown-menu">
                                <li class="<?= $this->uri->segment(2) == 'mobil' ? 'active' : ''; ?>">
                                    <a class=" nav-link" href="<?= site_url('admin/mobil'); ?>"><i class="fas fa-car"></i> <span>Data Mobil</span></a>
                                </li>
                                <li class="<?= $this->uri->segment(2) == 'tipe' ? 'active' : ''; ?>">
                                    <a class=" nav-link" href="<?= site_url('admin/tipe'); ?>"><i class="fas fa-grip-horizontal"></i> <span>Data Tipe Mobil</span></a>
                                </li>
                                <li class="<?= $this->uri->segment(2) == 'review' ? 'active' : ''; ?>">
                                    <a class=" nav-link" href="<?= site_url('admin/review'); ?>"><i class="fas fa-star"></i> <span>Data Review</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-header">Contact</li>
                        <li class="<?= $this->uri->segment(2) == 'contact' ? 'active' : ''; ?>">
                            <a class=" nav-link" href="<?= site_url('admin/contact'); ?>"><i class="fas fa-headset"></i> <span>Data Contact</span></a>
                        </li>
                        <li class="menu-header">Transaksi</li>
                        <li class="nav-item dropdown <?= $this->uri->segment(2) == 'transaksi' || $this->uri->segment(2) == 'laporan' ? 'active' : ''; ?>">
                            <a href=" #" class="nav-link has-dropdown"><i class="fas fa-random"></i> <span>Transaksi</span></a>
                            <ul class="dropdown-menu">
                                <li class="<?= $this->uri->segment(2) == 'transaksi' ? 'active' : ''; ?>">
                                    <a class=" nav-link" href="<?= site_url('admin/transaksi'); ?>"><i class="fas fa-random"></i> <span>Data Transaksi</span></a>
                                </li>
                                <li class="<?= $this->uri->segment(2) == 'laporan' ? 'active' : ''; ?>">
                                    <a class=" nav-link" href="<?= site_url('admin/laporan'); ?>"><i class="fas fa-clipboard-list"></i> <span>Data Laporan</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-header">User</li>
                        <li class="<?= $this->uri->segment(2) == 'user' ? 'active' : ''; ?>">
                            <a class=" nav-link" href="<?= site_url('admin/user'); ?>"><i class="fas fa-users"></i> <span>Data User</span></a>
                        </li>
                    </ul>
                </aside>
            </div>

            <?php echo $contents ?>

            <footer class="main-footer">
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
                    v1.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/jquery/dist/jquery.min.js"></script>
    <!-- <script src="<?= base_url() ?>assets/assets_admin/node_modules/popper.js/dist/popper.min.js"></script> -->
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/moment/min/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/summernote/dist/summernote-bs4.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/codemirror/lib/codemirror.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/codemirror/mode/javascript/javascript.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/selectric/public/jquery.selectric.min.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>


    <!-- Template JS File -->
    <script src="<?= base_url() ?>assets/assets_admin/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url() ?>assets/assets_admin/assets/js/page/modules-datatables.js"></script>

    <!-- Page Specific JS File -->
    <script>
        // tampil detail pesan 
        $(document).ready(function() {
            $(document).on('click', '#dtl_psn', function() {
                var subject = $(this).data('subject');
                var pesan = $(this).data('pesan');
                $('#subject1').text(subject);
                $('#pesan1').text(pesan);
            })
        })

        // tampil detail review 
        $(document).ready(function() {
            $(document).on('click', '#dtl_rvw', function() {
                var bintang = $(this).data('star');
                var review = $(this).data('review');
                $('#bintang').text(bintang);
                $('#review').text(review);
            })
        })

        // auto close alert
        $("#alert1").fadeTo(2000, 500).slideUp(500, function() {
            $("#alert1").slideUp(500);
        });

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

        function previewPhoto2() {
            const photo = document.querySelector('#gambar');
            const photoLabel = document.querySelector('.cfl1');

            photoLabel.textContent = photo.files[0].name;
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