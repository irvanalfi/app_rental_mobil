<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Syarat dan Ketentuan HRC</title>
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
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Syarat dan Ketentuan HRC</h4>
                            </div>

                            <div class="card-body">
                                <p>Note :</p>
                                <ol>
                                    <li>Alamat otomatis tertulis alamat pengguna akun, tetapi bisa dirubah
                                        sesuai lokasi penjemputan yang diinginkan oleh penyewa.</li>
                                    <li>Jika ingin mengambil sendiri mobil di tempat rental, maka alamat
                                        bisa diisikan <b>Kantor Rental HRC</b>.</li>
                                    <li>Untuk Mobil yang <b>tidak</b> memiliki fitur lepas kunci, maka wajib
                                        memakai jasa supir.</li>
                                    <li>Untuk Mobil yang memiliki fitur lepas kunci, maka bisa memilih
                                        menggunakan jasa supir atau tidak.</li>
                                    <li>Apabila telat mengembalikan mobil maka akan didenda sejumlah (harga
                                        denda perhari * total hari telat mengembalikan).</li>
                                </ol>
                            </div>
                            <div class="text-muted text-center mt-2 mb-5 centered">
                                <button class="btn btn-sm btn-success" onclick="goBack()"><i class="fa fa-undo"></i> Kembali</button>
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
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/assets/js/jquery.selectric.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url() ?>assets/assets_admin/assets/js/page/auth-register.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url() ?>assets/assets_admin/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/assets/js/custom.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>