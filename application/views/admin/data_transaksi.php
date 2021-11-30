<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data User</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item text-capitalize"><?= $this->uri->segment(1) ?></div>
        <div class="breadcrumb-item text-capitalize"><?= $this->uri->segment(2) ?></div>
        <?php if ($this->uri->segment(3) != '') : ?>
          <div class="breadcrumb-item text-capitalize"><?= $this->uri->segment(3) ?></div>
        <?php endif; ?>
      </div>
    </div>
    <a href="<?= base_url('admin/user/adduser'); ?>" class="btn btn-primary mb-3">Tambah Data</a>

    <?php if ($this->session->flashdata('success') != null) : ?>
      <div class="row">
        <div class="col-md-12 mx-0" id="flash" data-flash="<?= $this->session->flashdata('success'); ?>">
          <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert1">
            <?php echo $this->session->flashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    <?php endif ?>

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
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1" style="font-size: 10px !important;">
                <thead>
                  <tr>
                    <th width="20px">No.</th>
                    <th>Customer</th>
                    <th>Mobil</th>
                    <th>No. Plat</th>
                    <th>Tgl. Rental</th>
                    <th>Tgl. Kembali</th>
                    <th>Tgl. Transaksi</th>
                    <th>Total Harga Mobil</th>
                    <th>Total Harga Supir</th>
                    <th>Total Denda</th>
                    <th>Total Pajak</th>
                    <th>Total Akhir</th>
                    <th>Cek Pembayaran</th>
                    <th>Detail</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($transaksi as $tr) : ?>
                    <tr>
                      <td><?= $no++; ?>.</td>
                      <td><?= $tr['nama']; ?></td>
                      <td><?= $tr['merek']; ?> (<?= $tr['nama_tipe']; ?>)</td>
                      <td><?= $tr['no_plat']; ?></td>
                      <td><?= indo_date($tr['tgl_rental']) ?></td>
                      <td><?= indo_date($tr['tgl_kembali']) ?></td>
                      <td><?= $tr['transaksi_created'] ?></td>
                      <td><?= indo_currency($tr['total_harga']) ?></td>
                      <td><?= indo_currency($tr['total_harga_supir']) ?></td>
                      <td><?= indo_currency($tr['total_denda']) ?></td>
                      <td><?= indo_currency($tr['pajak']) ?></td>
                      <td><?= indo_currency($tr['total_akhir']) ?></td>
                      <td><a href="<?= base_url('admin/Transaksi/cekPembayaran/') . $tr['id_transaksi'] ?>" class="btn btn-sm btn-primary" title="Update Status">Cek
                      </td>
                      <td>
                        <?php
                        $tanggal_rental       = strtotime($tr['tgl_rental']);
                        $tanggal_kembali      = strtotime($tr['tgl_kembali']);
                        $selisih              = abs($tanggal_rental - $tanggal_kembali) / (60 * 60 * 24) + 1;
                        ?>
                        <a href="#" class="btn btn-sm btn-success" id="dtl_trs" data-toggle="modal" data-target="#transaksi-detail" data-avatar="<?= $tr['avatar'] ?>" data-id="<?= $tr['id_transaksi'] ?>" data-nama="<?= $tr['nama'] ?>" data-alamat="<?= $tr['alamat'] ?>" data-noKTP="<?= $tr['no_ktp'] ?>" data-email="<?= $tr['email'] ?>" data-noTelepon="<?= $tr['no_telepon'] ?>" data-merek="<?= $tr['merek'] ?>" data-namaTipe="<?= $tr['nama_tipe'] ?>" data-warna="<?= $tr['warna'] ?>" data-tahun="<?= $tr['tahun'] ?>" data-transmisi="<?= $tr['transmisi'] ?>" data-bbm="<?= $tr['bbm'] ?>" data-jmlhKursi="<?= $tr['jmlh_kursi'] ?>" data-noPlat="<?= $tr['no_plat'] ?>" data-tglRental="<?= indo_date($tr['tgl_rental']) ?>" data-selisih="<?= $selisih ?>" data-tglKembali="<?= indo_date($tr['tgl_kembali']) ?>" data-tglTransaksi="<?= indo_date($tr['transaksi_created']) ?>" data-tglPengembalian="<?= $tr['tgl_pengembalian'] == NULL ? '-' : indo_date($tr['tgl_pengembalian']) ?>" data-alamatPenjemputan="<?= $tr['alamat_penjemputan'] ?>" data-waktuPenjemputan="<?= $tr['waktu_penjemputan'] ?>" data-hargaMobil="<?= indo_currency($tr['harga']) ?>" data-hrgSupir="<?= indo_currency($tr['hrg_supir']) ?>" data-denda="<?= indo_currency($tr['denda']) ?>" data-totalHarga="<?= indo_currency($tr['total_harga']) ?>" data-totalHargaSupir="<?= $tr['total_harga_supir'] > 0 ? indo_currency($tr['total_harga_supir']) : 'Lepas Kunci' ?>" data-totalDenda="<?= indo_currency($tr['total_denda']) ?>" data-pajak="<?= indo_currency($tr['pajak']) ?>" data-totalAkhir="<?= indo_currency($tr['total_akhir']) ?>" data-subtotal="<?= indo_currency($tr['total_harga'] + $tr['total_harga_supir']) ?>" data-statusRental="<?= $tr['status_rental'] ?>" data-statusPengembalian="<?= $tr['status_pengembalian'] ?>" data-statusPembayaran="<?= $tr['status_pembayaran'] == 0 ? 'Belum Lunas' : 'Lunas'; ?>" title="Lihat Review">
                          <i class="fa fa-eye"></i>
                        </a>
                      </td>
                      <td class="align-middle">
                        <a href="<?= base_url('admin/user/updateUser/') . $tr['id_user'] ?>" class="btn btn-sm btn-primary" title="Update Data"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('admin/user/delete_user/') . $tr['id_user'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')" title="Hapus Data"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<!-- Modal untuk detail transaksi -->
<div class="modal fade bd-example-modal-lg" id="transaksi-detail">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <style>
          .invoice-header {
            margin: 0 -20px;
            background: #f0f3f4;
            padding: 20px;
            margin-bottom: 10px;
          }

          .invoice-date,
          .invoice-to {
            display: table-cell;
            width: 1%
          }

          .invoice-to {
            padding-right: 20px
          }

          .invoice-date .date,
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
        </style>

        <!-- begin invoice-header -->
        <div class="invoice-header">
          <div class="invoice-to">
            <address class="m-t-5 m-b-5">
              <strong class="text-inverse">Nama : <span id="nama"></span></strong><br>
              Alamat : <span id="alamat"></span><br>
              KTP &nbsp; &nbsp; &nbsp;: <span id="noKTP"></span><br>
              Phone &nbsp;: <span id="noTelepon"></span><br>
              Email &nbsp; &nbsp;: <span id="email"></span><br>
            </address>
          </div>
          <div class="invoice-to">
            <address class="m-t-5 m-b-5">
              <strong class="text-inverse">Alamat Penjemputan : </strong><br>
              <span id="alamatPenjemputan"></span><br>
              Waktu Penjemputan : <span id="waktuPenjemputan"></span><br>
              Tgl. Rental : <span id="tglRental"></span><br>
              Tgl. Kembali : <span id="tglKembali"></span><br>
            </address>
          </div>
          <div class="invoice-date">
            <div class="date text-inverse m-t-5">ID Transaksi : <span id="id"></span></div>
            <div class="invoice-detail">
              Tgl. Transaksi : <span id="tglTransaksi"></span><br>
              Status Pembayaran :<br><span id="statusPembayaran" style="font-weight: bold;"></span><br>
              Status Pengembalian :<br><span id="statusPengembalian" style="font-weight: bold;"></span><br>
              Tgl. Pengembalian : <br><span id="tglPengembalian" style="font-weight: bold;"></span>
            </div>
          </div>
        </div>
        <!-- end invoice-header -->

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
                    <span class="text-inverse"><b><span id="merek"></span> <span id="tahun"></span> (<span id="namaTipe"></span>)</b></span><br>
                    <div class="ml-3 mt-2">
                      <small>Plat Nomer &nbsp; : <span id="noPlat"></span></small><br>
                      <small>Tansmisi &nbsp; &nbsp; &nbsp; &nbsp;: <span id="transmisi"></span></small><br>
                      <small>BBM &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <span id="bbm"></span></small><br>
                      <small>Warna &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : <span id="warna"></span></small><br>
                      <small>Jumlah Kursi : <span id="jmlhKursi"></span></small>
                    </div>
                  </td>
                  <td class="text-center">
                    <span id="hargaMobil"></span>
                  </td>
                  <td class="text-center">
                    <span id="hari"></span>
                  </td>
                  <td class="text-right">
                    <span id="totalHarga"></span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <span class="text-inverse"><b>Harga supir</b></span><br>
                    <small>Biaya menggunakan jasa supir</small>
                  </td>
                  <td class="text-center">
                    <span id="hrgSupir"></span>
                  </td>
                  <td class="text-center">
                    <span id="hari2"></span>
                  </td>
                  <td class="text-right">
                    <span id="totalHargaSupir"></span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <span class="text-inverse"><b>Pajak Penghasilan</b></span><br>
                    <small>Pajak yang dikenakan untuk setiap transaksi adalah 2% dari total harga rental mobil</small>
                  </td>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
                  <td class="text-right">
                    <span id="pajak"></span>
                  </td>
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
                  <span class="text-inverse">
                    <span id="subtotal"></span>
                  </span>
                </div>
                <div class="sub-price">
                  <i class="fa fa-plus text-muted"></i>
                </div>
                <div class="sub-price">
                  <small>PPh(2%)</small>
                  <span class="text-inverse">
                    <span id="pajakP"></span>
                  </span>
                </div>
              </div>
            </div>
            <div class="invoice-price-right">
              <small>TOTAL AKHIR</small> <span class="f-w-600">
                <span id="totalAkhir"></span>
              </span>
            </div>
          </div>
          <!-- end invoice-price -->
        </div>
        <!-- end invoice-content -->
      </div>
    </div>
  </div>
</div>