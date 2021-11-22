<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <?= $this->renderSection('title') ?>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/templateadmin/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/templateadmin/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>/templateadmin/node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url() ?>/templateadmin/node_modules/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="<?= base_url() ?>/templateadmin/node_modules/codemirror/theme/duotone-dark.css">
    <link rel="stylesheet" href="<?= base_url() ?>/templateadmin/node_modules/selectric/public/selectric.css">
    <link rel="stylesheet" href="<?= base_url() ?>/templateadmin/node_modules/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/templateadmin/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/templateadmin/assets/css/components.css">
</head>

<body>
    <?php $request = \Config\Services::request(); ?>
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
                    <li class="dropdown">
                        <a href="<?= site_url('home/admin'); ?>" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url() ?>/image/user/<?= session('avatar') ?>" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block"><?= ucwords(session('name')); ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= site_url('user/profile/' . session('user_id')); ?>" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= site_url('auth/logout'); ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a class="navbar-brand" href="<?= site_url('home/admin'); ?>">
                            <img src="<?= base_url() ?>/logokecil.png" alt="Logo">
                        </a>
                        <span>admin</span>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?= site_url('home/admin'); ?>">VR</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="nav-item dropdown ">
                            <a href="<?= site_url('home/admin'); ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        </li>
                        <li class="menu-header">Viral</li>
                        <li class="nav-item dropdown">
                            <a href="<?= site_url('home/admin'); ?>" class="nav-link has-dropdown"><i class="fas fa-tasks"></i> <span>Task</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?= site_url('home/admin'); ?>"><i class="fas fa-arrow-down"></i> <span>Masuk</span></a></li>
                                <li><a class="nav-link" href="<?= site_url('home/admin'); ?>"><i class="fas fa-hourglass-half"></i> <span>Sedang</span></a></li>
                                <li><a class="nav-link" href="<?= site_url('home/admin'); ?>"><i class="fas fa-clipboard-check"></i> <span>Selesai</span></a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown <?= $request->uri->getSegment(1) == 'settings' ? 'active' : ''; ?>">
                            <a href=" #" class="nav-link has-dropdown"><i class="fas fa-cogs"></i> <span>Web Setting</span></a>
                            <ul class="dropdown-menu">
                                <li class="<?= $request->uri->getSegment(2) == 'web' ||
                                                $request->uri->getSegment(2) == 'webedit' ||
                                                $request->uri->getSegment(2) == 'webadd' ? 'active' : ''; ?>">
                                    <a class=" nav-link" href="<?= site_url('settings/web'); ?>"><i class="fas fa-desktop"></i> <span>Web Profile</span></a>
                                </li>
                                <li class="<?= $request->uri->getSegment(2) == 'blog' ||
                                                $request->uri->getSegment(2) == 'blogedit' ||
                                                $request->uri->getSegment(2) == 'blogadd' ? 'active' : ''; ?>">
                                    <a class="nav-link" href="<?= site_url('settings/blog'); ?>"><i class="fas fa-globe"></i> <span>Blog</span></a>
                                </li>
                                <li class="<?= $request->uri->getSegment(2) == 'review' ||
                                                $request->uri->getSegment(2) == 'reviewedit' ||
                                                $request->uri->getSegment(2) == 'reviewadd' ? 'active' : ''; ?>">
                                    <a class=" nav-link" href="<?= site_url('settings/review'); ?>"><i class="fas fa-binoculars"></i> <span>Review</span></a>
                                </li>
                                <li class="<?= $request->uri->getSegment(2) == 'portofolio' ||
                                                $request->uri->getSegment(2) == 'portofolioedit' ||
                                                $request->uri->getSegment(2) == 'portofolioadd' ? 'active' : ''; ?>">
                                    <a class="nav-link" href="<?= site_url('settings/portofolio'); ?>"><i class="fas fa-tasks"></i> <span>Portofolio</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-header">Pages</li>
                        <li class="nav-item dropdown <?= $request->uri->getSegment(1) == 'user' ? 'active' : ''; ?>">
                            <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
                            <ul class="dropdown-menu">
                                <li class="<?= $request->uri->getSegment(2) == 'dataadd' ? 'active' : ''; ?>"><a href="<?= site_url('user/dataadd'); ?>">Tambah Data User</a></li>
                                <li class="<?= $request->uri->getSegment(2) == 'datauser' ? 'active' : ''; ?>"><a href="<?= site_url('user/datauser'); ?>">Data User</a></li>
                                <li class="<?= $request->uri->getSegment(2) == 'dataadmin' ? 'active' : ''; ?>"><a href="<?= site_url('user/dataadmin'); ?>">Data Admin</a></li>
                                <li class="<?= $request->uri->getSegment(2) == 'dataregister' ? 'active' : ''; ?>"><a class=" beep beep-sidebar" href="<?= site_url('user/dataregister'); ?>">Perizinan</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="<?= site_url('auth/logout'); ?>" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <?= $this->renderSection('content') ?>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2021 <div class="bullet"></div> Design By <a href="<?= site_url('home/admin'); ?>">M. Irvan Alfi Hidayat</a>
                </div>
                <div class="footer-right">
                    v1.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>/templateadmin/node_modules/jquery/dist/jquery.min.js"></script>
    <!-- <script src="<?= base_url() ?>/templateadmin/node_modules/popper.js/dist/popper.min.js"></script> -->
    <script src="<?= base_url() ?>/templateadmin/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/templateadmin/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>/templateadmin/node_modules/moment/min/moment.min.js"></script>
    <script src="<?= base_url() ?>/templateadmin/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>/templateadmin/node_modules/summernote/dist/summernote-bs4.js"></script>
    <script src="<?= base_url() ?>/templateadmin/node_modules/codemirror/lib/codemirror.js"></script>
    <script src="<?= base_url() ?>/templateadmin/node_modules/codemirror/mode/javascript/javascript.js"></script>
    <script src="<?= base_url() ?>/templateadmin/node_modules/selectric/public/jquery.selectric.min.js"></script>
    <script src="<?= base_url() ?>/templateadmin/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Template JS File -->
    <script src="<?= base_url() ?>/templateadmin/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/templateadmin/assets/js/custom.js"></script>
    <script>
        // upload gambar
        function previewPhoto() {
            const photo = document.querySelector('#photo');
            const photoLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            photoLabel.textContent = photo.files[0].name;

            const filePhoto = new FileReader();
            filePhoto.readAsDataURL(photo.files[0]);

            filePhoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
        // reset alert 
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>
</body>

</html>