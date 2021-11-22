<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>HRC</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('node_modules/'); ?>datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('node_modules/'); ?>datatables.net-select-bs4/css/select.bootstrap4.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/assets_stisla/'); ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/assets_stisla/'); ?>css/components.css">
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
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Messages
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-message">
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle">
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
                                        <img alt="image" src="assets/img/avatar/avatar-2.png" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Dedik Sugiharto</b>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="assets/img/avatar/avatar-3.png" class="rounded-circle">
                                        <div class="is-online"></div>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Agung Ardiansyah</b>
                                        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="assets/img/avatar/avatar-4.png" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Ardian Rahardiansyah</b>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                                        <div class="time">16 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Alfa Zulkarnain</b>
                                        <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                        <div class="time">Yesterday</div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
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
                    </li>
                    <li class="dropdown"><a href="#" class="nav-link nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url('assets/upload/'); ?>user/avatar/person_1.jpg" class="rounded-circle mr-1">
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
                        <br>
                        <li class="<?= $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('admin/dashboard'); ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
                        <li class="dropdown <?= $this->uri->segment(2) == 'data_mobil' ||  $this->uri->segment(2) == 'data_review' ||  $this->uri->segment(2) == 'data_tipe' ? 'active' : ''; ?>">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-car"></i><span>Mobil</span></a>
                            <ul class="dropdown-menu">
                                <li class="<?= $this->uri->segment(2) == 'data_mobil' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('admin/data_mobil'); ?>"><i class="fas fa-car"></i> <span>Data Mobil</span></a></li>
                                <li class="<?= $this->uri->segment(2) == 'data_review' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('admin/data_review'); ?>"><i class="fas fa-star"></i> <span>Data Review</span></a></li>
                                <li class="<?= $this->uri->segment(2) == 'data_tipe' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('admin/data_tipe'); ?>"><i class="fas fa-grip-horizontal"></i> <span>Data Tipe</span></a></li>
                            </ul>
                        </li>
                        <li class="<?= $this->uri->segment(2) == 'data_user' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('admin/data_user'); ?>"><i class="fas fa-users"></i> <span>Data User</span></a></li>
                        <li class="<?= $this->uri->segment(2) == 'data_contact' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('admin/data_contact'); ?>"><i class="fas fa-headset"></i> <span>Data Contact</span></a></li>
                        <li class="<?= $this->uri->segment(2) == 'transaksi' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('admin/transaksi'); ?>"><i class="fas fa-random"></i> <span>Transaksi</span></a></li>
                        <li class="<?= $this->uri->segment(2) == 'laporan' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('admin/laporan'); ?>"><i class="fas fa-clipboard-list"></i> <span>Laporan</span></a></li>
                        <li><a class="nav-link" href="<?= base_url('auth/logout'); ?>"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
                        <li class="<?= $this->uri->segment(2) == 'ganti_password' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('auth/ganti_password'); ?>"><i class="fas fa-lock"></i> <span>Ganti Password</span></a></li>
                    </ul>

                </aside>
            </div>

            <!-- Start Content  -->
            <?php echo $contents ?>
            <!-- End Content  -->

            <footer class="main-footer bg-whitesmoke">
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
    <script src="<?= base_url('assets/assets_stisla/'); ?>js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url('node_modules/'); ?>datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('node_modules/'); ?>datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('node_modules/'); ?>datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>


    <!-- Template JS File -->
    <script src="<?= base_url('assets/assets_stisla/'); ?>js/scripts.js"></script>
    <script src="<?= base_url('assets/assets_stisla/'); ?>js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url('assets/assets_stisla/'); ?>js/page/modules-datatables.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url('assets/assets_stisla/'); ?>js/page/index-0.js"></script>
    <script>
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
    </script>

    <script>
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