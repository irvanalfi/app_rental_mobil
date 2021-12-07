<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
  <!--  All snippets are MIT license http://bootdey.com/license -->
  <title>Invoice HRC</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>

  <style type="text/css">
    body {
      margin-top: 20px;
      background: #eee;
    }

    .invoice {
      background: #fff;
      padding: 20px
    }

    .invoice-company {
      font-size: 20px
    }

    .invoice-header {
      margin: 0 -20px;
      background: #f0f3f4;
      padding: 20px
    }

    .invoice-date,
    .invoice-from,
    .invoice-to {
      display: table-cell;
      width: 1%
    }

    .invoice-from,
    .invoice-to {
      padding-right: 20px
    }

    .invoice-date .date,
    .invoice-from strong,
    .invoice-to strong {
      font-size: 16px;
      font-weight: 600
    }

    .invoice-date {
      text-align: right;
      padding-left: 20px
    }

    .invoice-price {
      background: #f0f3f4;
      display: table;
      width: 100%
    }

    .invoice-price .invoice-price-left,
    .invoice-price .invoice-price-right {
      display: table-cell;
      padding: 20px;
      font-size: 20px;
      font-weight: 600;
      width: 75%;
      position: relative;
      vertical-align: middle
    }

    .invoice-price .invoice-price-left .sub-price {
      display: table-cell;
      vertical-align: middle;
      padding: 0 20px
    }

    .invoice-price small {
      font-size: 12px;
      font-weight: 400;
      display: block
    }

    .invoice-price .invoice-price-row {
      display: table;
      float: left
    }

    .invoice-price .invoice-price-right {
      width: 25%;
      background: #2d353c;
      color: #fff;
      font-size: 28px;
      text-align: right;
      vertical-align: bottom;
      font-weight: 300
    }

    .invoice-price .invoice-price-right small {
      display: block;
      opacity: .6;
      position: absolute;
      top: 10px;
      left: 10px;
      font-size: 12px
    }

    .invoice-footer {
      border-top: 1px solid #ddd;
      padding-top: 10px;
      font-size: 10px
    }

    .invoice-note {
      color: #999;
      margin-top: 80px;
      font-size: 85%
    }

    .invoice-ribbon {
      width: 85px;
      height: 88px;
      overflow: hidden;
      position: absolute;
      top: -1px;
      right: 14px;
    }

    .ribbon-inner {
      text-align: center;
      -webkit-transform: rotate(45deg);
      -moz-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      -o-transform: rotate(45deg);
      position: relative;
      padding: 7px 0;
      left: -5px;
      top: 11px;
      width: 120px;
      background-color: #66c591;
      font-size: 15px;
      color: #fff;
    }

    .ribbon-inner:before,
    .ribbon-inner:after {
      content: "";
      position: absolute;
    }

    .ribbon-inner:before {
      left: 0;
    }

    .ribbon-inner:after {
      right: 0;
    }

    .invoice>div:not(.invoice-footer) {
      margin-bottom: 20px
    }
  </style>
</head>

<body>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <div class="container">
    <div class="col-md-12">
      <div class="invoice">
        <?php if ($transaksi['status_pembayaran'] == 1) : ?>
          <div class="invoice-ribbon">
            <div class="ribbon-inner">PAID</div>
          </div>
        <?php endif; ?>
        <!-- begin invoice-company -->
        <div class="invoice-company text-inverse f-w-600">
          <img src="<?= base_url('assets/upload/hrc.png') ?>" alt="Logo HRC" style="height: 50px;">
        </div>
        <!-- end invoice-company -->
        <!-- begin invoice-header -->
        <div class="invoice-header">
          <div class="invoice-to">
            <address class="m-t-5 m-b-5">Nama : <br><b><?= $transaksi['nama'] ?></b><br>
              Alamat : <br><b><?= $transaksi['alamat'] ?></b><br>
              KTP &nbsp; &nbsp; &nbsp;: <br><b><?= $transaksi['no_ktp'] ?></b><br>
              Phone &nbsp;: <br><b><?= $transaksi['no_telepon'] ?></b><br>
              Email &nbsp; &nbsp;: <br><b><?= $transaksi['email'] ?></b><br>
            </address>
          </div>
          <div class="invoice-to">
            <address class="m-t-5 m-b-5">
              <strong class="text-inverse">Alamat Penjemputan : </strong><br>
              <b><?= $transaksi['alamat_penjemputan'] ?></b><br>
              Waktu Penjemputan : <br><b><?= $transaksi['waktu_penjemputan'] ?></b><br>
              Tgl. Rental : <br><b><?= indo_date($transaksi['tgl_rental']) ?></b><br>
              Tgl. Kembali : <br><b><?= indo_date($transaksi['tgl_kembali']) ?></b><br>
            </address>
          </div>
          <div class="invoice-date">
            <div class="date text-inverse m-t-5">ID Transaksi : <?= $transaksi['id_transaksi'] ?></div>
            <div class="invoice-detail">
              Tgl. Transaksi : <b><?= indo_date($transaksi['transaksi_created']) ?></b><br>
              Status Pembayaran :<br><b><?= $transaksi['status_pembayaran'] == 0 ? '<b style="color: red">Belum Lunas</b>' : '<b>Lunas</b>'; ?></b></span><br>
              Status Pengembalian :<br><b><?= $transaksi['status_pengembalian'] ?></b><br>
              Tgl. Pengembalian : <br><b><?= $transaksi['tgl_pengembalian'] == NULL ? '-' : indo_date($transaksi['tgl_pengembalian']) ?></b><br>
              Status Rental :<br><b><?= $transaksi['status_rental'] ?></b>
            </div>
          </div>
        </div>
        <!-- end invoice-header -->

        <?php
        $tanggal_rental       = strtotime($transaksi['tgl_rental']);
        $tanggal_kembali      = strtotime($transaksi['tgl_kembali']);
        $selisih              = abs($tanggal_rental - $tanggal_kembali) / (60 * 60 * 24) + 1;
        $total_harga_mobil    = $transaksi['total_harga'];
        ?>

        <!-- begin invoice-content -->
        <div class="invoice-content">
          <!-- begin table-responsive -->
          <div class="table-responsive">
            <table class="table table-invoice">
              <thead>
                <tr>
                  <th>Detail Transaksi</th>
                  <th class="text-center" width="10%">Harga / Hari</th>
                  <th class="text-center" width="10%">Total Hari</th>
                  <th class="text-right" width="20%">Total Harga</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <span class="text-inverse"><b><?= $transaksi['merek'] ?> Tahun <?= $transaksi['tahun'] ?>(<?= $transaksi['nama_tipe'] ?>)</b></span><br>
                    <div class="ml-3 mt-2">
                      <small>Plat Nomer &nbsp; : <?= $transaksi['no_plat'] ?></small><br>
                      <small>Tansmisi &nbsp; &nbsp; &nbsp; &nbsp;: <?= $transaksi['transmisi'] ?></small><br>
                      <small>BBM &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <?= $transaksi['bbm'] ?></small><br>
                      <small>Warna &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : <?= $transaksi['warna'] ?></small><br>
                      <small>Jumlah Kursi : <?= $transaksi['jmlh_kursi'] ?></small>
                    </div>
                  </td>
                  <td class="text-center"><?= indo_currency($transaksi['harga']) ?></td>
                  <td class="text-center"><?= $selisih ?></td>
                  <td class="text-right"><?= indo_currency($transaksi['total_harga']) ?></td>
                </tr>
                <tr>
                  <td>
                    <span class="text-inverse"><b>Harga supir</b></span><br>
                    <small>Biaya menggunakan jasa supir</small>
                  </td>
                  <td class="text-center"><?= indo_currency($transaksi['hrg_supir']) ?></td>
                  <td class="text-center"><?= $selisih ?></td>
                  <td class="text-right"><?= indo_currency($transaksi['total_harga_supir']) ?></td>
                </tr>
                <tr>
                  <td>
                    <span class="text-inverse"><b>Denda</b></span><br>
                    <small>Biaya jika telat mengembalikan mobil melebihi tanggal kembali</small>
                  </td>
                  <td class="text-center"><?= indo_currency($transaksi['denda']) ?></td>
                  <td class="text-center"></span></td>
                  <td class="text-right"><?= indo_currency($transaksi['total_denda']) ?></span></td>
                </tr>
                <tr>
                  <td>
                    <span class="text-inverse"><b>Pajak Penghasilan</b></span><br>
                    <small>Pajak yang dikenakan untuk setiap transaksi adalah 2% dari total harga rental mobil</small>
                  </td>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
                  <td class="text-right"><?= indo_currency($transaksi['pajak']) ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- end table-responsive -->
          <!-- begin invoice-price -->
          <div class="invoice-price">
            <div class="invoice-price-left">
              <div class="invoice-price-row">
                <div class="sub-price">
                  <small>SUBTOTAL</small>
                  <span class="text-inverse"><?= indo_currency($transaksi['total_harga'] + $transaksi['total_harga_supir'] + $transaksi['total_denda']) ?></span>
                </div>
                <div class="sub-price">
                  <i class="fa fa-plus text-muted"></i>
                </div>
                <div class="sub-price">
                  <small>PPh(2%)</small>
                  <span class="text-inverse"><?= indo_currency($transaksi['pajak']) ?></span>
                </div>
              </div>
            </div>
            <div class="invoice-price-right">
              <small>TOTAL AKHIR</small> <span class="f-w-600"><?= indo_currency($transaksi['total_akhir']) ?></span>
            </div>
          </div>
          <!-- end invoice-price -->
        </div>
        <!-- end invoice-content -->
        <!-- begin invoice-note -->
        <div class="invoice-note">
          * Pastikan melunasi pembayaran sebelum tanggal rental<br>
          * Transaksi akan gagal ketika pembayaran belum dilakukan hingga taggal rental<br>
          * Apabila mengbatalkan transaksi yang sudah dibayar setelah sebelum atau h+1 maka segera hubungi admin
        </div>
        <!-- end invoice-note -->
        <!-- begin invoice-footer -->
        <div class="invoice-footer">
          <p class="text-center m-b-5 f-w-600">
            TERIMAKASIH ATAS KEPERCAYAAN ANDA
          </p>
          <p class="text-center">
            <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> halimrentalcar.com </span>
            <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone"></i> +62 82244922833 </span>
            <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> halim@gmail.com </span>
          </p>
        </div>
        <!-- end invoice-footer -->
      </div>
    </div>
  </div>

  <script type="text/javascript">

  </script>
</body>

</html>


<script>
  window.print();
</script>