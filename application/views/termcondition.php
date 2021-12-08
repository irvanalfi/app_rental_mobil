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
    <style>
        ol.a {
            list-style-type: armenian;
        }

        ol.b {
            list-style-type: cjk-ideographic;
        }

        ol.c {
            list-style-type: decimal;
        }

        ol.d {
            list-style-type: decimal-leading-zero;
        }

        ol.e {
            list-style-type: georgian;
        }

        ol.f {
            list-style-type: hebrew;
        }

        ol.g {
            list-style-type: hiragana;
        }

        ol.h {
            list-style-type: hiragana-iroha;
        }

        ol.i {
            list-style-type: katakana;
        }

        ol.j {
            list-style-type: katakana-iroha;
        }

        ol.k {
            list-style-type: lower-alpha;
        }

        ol.l {
            list-style-type: lower-greek;
        }

        ol.m {
            list-style-type: lower-latin;
        }

        ol.n {
            list-style-type: lower-roman;
        }

        ol.o {
            list-style-type: upper-alpha;
        }

        ol.p {
            list-style-type: upper-latin;
        }

        ol.q {
            list-style-type: upper-roman;
        }

        ol.r {
            list-style-type: none;
        }

        ol.s {
            list-style-type: inherit;
        }
    </style>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Syarat dan Ketentuan HRC</h4>
                            </div>

                            <div class="card-body">
                                <ol class="o">
                                    <li class="font-weight-bold">Pendaftaran
                                        <ol class="font-weight-normal">
                                            <li>Pastikan data yang dimasukkan sudah sesuai dengan kartu identitas <b>(KTP/SIM/PASPOR)</b> anda.</li>
                                            <li>Pastikan foto kartu identitas <b>(KTP/SIM/PASPOR)</b> yang anda upload adalah milik anda pribadi.</li>
                                            <li>Pastikan foto profile yang diupload adalah foto anda pribadi dan terbaru.</li>
                                        </ol>
                                    </li>
                                    <li class="font-weight-bold">Penyewaan
                                        <ol class="font-weight-normal">
                                            <li>Jika ingin mengambil sendiri mobil di tempat rental, maka alamat penjemputan bisa diisikan <b>Kantor Rental HRC</b></li>
                                            <li>Untuk mobil yang lepas kunci anda tetap bisa menggunakan supir dari HRC atau memilih menggunakan supir sendiri.</li>
                                            <li>Pajak PPH yang dikenakan untuk perhari rental adalah harga mobil * 0.02</li>
                                            <div class="d-flex justify-content-center my-3">
                                                <img width="200px;" src="<?= base_url('assets/upload/tanggal.png') ?>" alt="">
                                            </div>
                                            <li>Misalkan hari ini adalah tanggal <b>8</b>, tanggal <b>11</b> warna kuning adalah tanggal anda melakukan proses pemesanan dan tanggal <b>14, 15, 16</b> adalah tanggal rental.</li>
                                            <li>Ketika telat mengembalikan mobil melewati hari pengembalian <b>(Tanggal 16 max jam 24:00)</b> maka akan dikenakan denda sebesar harga mobil yang di rental dikalikan berapa hari telat mengembalikan mobil.</li>
                                            <li>Jika ingin melakukan pembatalan :
                                                <ol class="k">
                                                    <li>Jika ingin melakukan pembatalan misalkan tanggal <b>15, 16</b> maka harus dibatalkan pada tanggal <b>14</b> maksimal jam <b>24:00</b> begitu juga untuk tanggal lainnya.</li>
                                                    <li>Pembatalan sebelum dilakukan pembayaran:
                                                        <ul>
                                                            <li>Transaksi akan otomatis dibatalkan jika tidak segera dibayar hingga tanggal rental<b>(14)</b>.</li>
                                                            <li>Transaksi yang dibatalkan oleh Customer langsung sebelum tanggal <b>(14)</b> makan transaksi akan otomatis dihapus.</li>
                                                        </ul>
                                                    </li>
                                                    <li>Pembatalan setelah dilakukan pembayaran:
                                                        <ul>
                                                            <li>Transaksi yang dibatalkan oleh Customer langsung sebelum hari rental <b>(14)</b> maka uang yang sudah dibayarkan akan direfund semuanya.</li>
                                                            <li>Transaksi tidak bisa dibatalkan ketika sudah masuk tanggal rental <b>(14)</b></li>
                                                            <li>Jika ingin membatalkan rental pada saat tanggal rental <b>(14,15,16)</b> maka dapat dilakukan dengan menghubungi admin secara langsung.</li>
                                                            <li>Jumlah refund yang diberikan apabila dibatalkan pada tanggal rental <b>(14)</b>. Selisih merupakan hari yang tidak dipakai didapatkan dari <b>tanggal Kembali (16) – tanggal cancel</b>, maka perhitungannya adalah : <br>
                                                                <b>(Harga supir perhari * selisih) + (Pajak perhari * 0.5 * selisih) + (Harga mobil perhari * 0.5 * selisih)</b> dan apabila mobil sudah dibawa maka mobil harus dikembalikan maksimal <b>tanggal 14 jam 24:00</b>
                                                            </li>
                                                            <li>Refund akan segera di proses dan bukti refund dapat dilihat pada halaman pembayaran jika admin sudah mentranfer dan mengupload bukti refund.</li>
                                                        </ul>
                                                    </li>
                                                </ol>
                                            </li>
                                        </ol>
                                    </li>
                                    <li class="font-weight-bold">Keamanan
                                        <ol class="font-weight-normal">
                                            <li>Data pribadi yang sudah didaftarkan dan Foto kartu identitas yang sudah diupload akan digunakan sebagai jaminan keamanan bagi pelanggan dan pihak HRC.</li>
                                            <li>Untuk menjaga keamanan akun, satu akun hanya bisa digunakan bertransaksi untuk pemilik akun itu sendiri.</li>
                                            <li>Jika ingin memesankan rental untuk orang lain maka bisa dengan cara mendaftarkan akun baru dengan data pribadi orang tersebut.</li>
                                            <li>Gunakan fitur lupa password jika anda lupa password, dan gunakan email yang aktif dan sesuai dengan akun anda untuk mereset password melaui link yang dikirim ke email tersebut.</li>
                                        </ol>
                                    </li>
                                    <li class="font-weight-bold">Transaksi
                                        <ol class="font-weight-normal">
                                            <li>Pembayaran tidak menggunakan sistem DP tetapi harus dilunasi diawal sebelum tanggal rental.</li>
                                            <li>Pembayaran dilakukan dengan cara :
                                                <ul>
                                                    <li>Mentransfer kesalah satu BANK yang sudah di sediakan dengan nominal sesuai total akhir rental</li>
                                                    <li>Upload bukti transfer yang telah dilakukan</li>
                                                    <li>Tunggu verifikasi dari admin, jika tidak segera di verifikasi maka bisa langsung menghubungi admin melaui fitur contact atau melakukan panggilan telpon pada nomer Contact Person yang sudah disediakan.</li>
                                                    <li>Jika admin sudah memverifikasi pembayaran anda maka proses rental sudah berjalan.</li>
                                                </ul>
                                            </li>
                                        </ol>
                                    </li>
                                </ol>
                            </div>
                            <div class="text-muted text-center mt-2 mb-5 centered">
                                <button class="btn btn-sm btn-success" onclick="goBack()"><i class="fa fa-undo"></i> Kembali</button>
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
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>