<?php
//import koneksi ke database
?>
<html>

<head>
  <title>Export Tansaksi <?= date('l, d-m-Y  h:i:s a'); ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
  <div class="container bg-light rounded py-4 px-2 mt-5">
    <div class="data-tables datatable-dark">
      <div class="d-flex justify-content-center">
        <h3>Laporan Transaksi Rental Mobil</h3>
      </div>
      <div class="d-flex justify-content-center mb-4">
        <span>Dari tanggal : <?= $tanggal['dari'] ?> Sampai tanggal : <?= $tanggal['sampai'] ?></span>
      </div>
      <table id="example" class="display nowrap" style="width:100%; font-size: 10px!important;">
        <thead class="text-light" style="background-color: darkgreen">
          <tr>
            <th>No</th>
            <th>Nama<br>Customer</th>
            <th>Merek<br>Mobil</th>
            <th>Total<br>Hari<br>Rental</th>
            <th>Harga<br>Mobil</th>
            <th>Harga<br>Supir</th>
            <th>Total<br>Pajak</th>
            <th>Total<br>Denda</th>
            <th>Total<br>Akhir</th>
            <th>Status<br>Pengembalian</th>
            <th>Status<br>Rental</th>
            <th>Tanggal<br>Transaksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($laporan as $tr) : ?>
            <?php
            $tanggal_rental       = strtotime($tr['tgl_rental']);
            $tanggal_kembali      = strtotime($tr['tgl_kembali']);
            $selisih              = abs($tanggal_rental - $tanggal_kembali) / (60 * 60 * 24) + 1;
            ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $tr['nama']; ?></td>
              <td><?= $tr['merek']; ?></td>
              <td><?= $selisih ?> Hari</td>
              <td><?= indo_currency($tr['harga']) ?>/hari <br>Total <?= indo_currency($tr['total_harga']) ?></td>
              <td><?= indo_currency($tr['hrg_supir']) ?>/hari <br>Total <?= indo_currency($tr['total_harga_supir']) ?></td>
              <td><?= indo_currency($tr['pajak']) ?></td>
              <td><?= indo_currency($tr['total_denda']) ?></td>
              <td><?= indo_currency($tr['total_akhir']) ?></td>
              <td><?= $tr['status_pengembalian'] ?> <br><?= $tr['tgl_pengembalian'] == null ? '-' : indo_date($tr['tgl_pengembalian']) ?></td>
              <td><?= $tr['status_rental'] ?></td>
              <td><?= indo_date($tr['transaksi_created']) ?></td>
            </tr>

          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'pdf',
            orientation: 'landscape',
            pageSize: 'LEGAL',
            download: 'open'
          },
          'csv', 'excel'
        ]
      });
    });
  </script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



</body>

</html>