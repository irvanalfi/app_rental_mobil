<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-car"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Data Mobil</h4>
            </div>
            <div class="card-body">
              <?= $mobil; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-users"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Customers</h4>
            </div>
            <div class="card-body">
              <?= $customer; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Laporan</h4>
            </div>
            <div class="card-body">
              <?= $laporan; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-random"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Transaksi</h4>
            </div>
            <div class="card-body">
              <?= $jml_transaksi; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4>Grafik Pendapatan Bulanan</h4>
          </div>
          <div class="card-body">
            <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
              <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
              </div>
              <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
              </div>
            </div>
            <canvas id="myChart" height="424" width="700" style="display: block; width: 700px; height: 424px;" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4>Review Mobil</h4>
          </div>
          <div class="card-body">
            <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
              <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
              </div>
              <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
              </div>
            </div>
            <canvas id="myChartt" height="220" style="display: block; width: 544px; height: 424px;" width="362" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
      </div>
    </div>

    <br>

  </section>
</div>
<script src="<?= base_url() ?>assets/assets_admin/node_modules/chart.js/dist/Chart.min.js"></script>
<script>
  var ctx = document.getElementById("myChartt").getContext('2d');
  var myChartt = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [
        <?php
        if (count($review_jelek) > 0) {
          foreach ($review_jelek as $rj) {
            echo '"' . $rj['no_plat'] . '", ';
          }
        }
        ?>
      ],
      datasets: [{
          label: 'Baik',
          data: [
            <?php
            $baik = array();
            if (count($review_baik) > 0) {
              foreach ($review_baik as $rb) {
                if ($rb['baik'] == null) {
                  array_push($baik, '0' . ', ');
                } else {
                  array_push($baik, $rb['baik'] . ', ');
                }
              }

              foreach ($baik as $b) {
                echo $b;
              }
            }
            ?>
          ],
          borderWidth: 2,
          backgroundColor: 'rgba(63,82,227,.8)',
          borderWidth: 0,
          borderColor: 'transparent',
          pointBorderWidth: 0,
          pointRadius: 3.5,
          pointBackgroundColor: 'transparent',
          pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
        },
        {
          label: 'Jelek',
          data: [
            <?php
            $jelek = array();
            if (count($review_jelek) > 0) {
              foreach ($review_jelek as $rj) {
                if ($rj['jelek'] == null) {
                  array_push($jelek, '0' . ', ');
                } else {
                  array_push($jelek,  $rj['jelek'] . ', ');
                }
              }

              foreach ($jelek as $j) {
                echo $j;
              }
            }
            ?>
          ],
          borderWidth: 2,
          backgroundColor: 'rgba(254,86,83,.7)',
          borderWidth: 0,
          borderColor: 'transparent',
          pointBorderWidth: 0,
          pointRadius: 3.5,
          pointBackgroundColor: 'transparent',
          pointHoverBackgroundColor: 'rgba(254,86,83,.8)',
        }
      ]
    },
    options: {
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          gridLines: {
            // display: false,
            drawBorder: false,
            color: '#f2f2f2',
          },
          ticks: {
            beginAtZero: true,
            stepSize: 1,
          },
          scaleLabel: {
            display: true,
            labelString: 'Jumlah'
          }
        }],
        xAxes: [{
          gridLines: {
            display: false,
            tickMarkLength: 15,
          },
          scaleLabel: {
            display: true,
            labelString: 'Plat Nomor'
          }
        }]
      },
    }
  });
</script>


<script type="text/javascript">
  "use strict";

  var statistics_chart = document.getElementById("myChart").getContext('2d');

  var myChart = new Chart(statistics_chart, {
    type: 'line',
    data: {
      labels: [
        <?php
        if (count($transaksi) > 0) {
          foreach ($transaksi as $tr) {
            echo '"' . date('F', mktime(0, 0, 0, $tr['bulan'], 10)) . '", ';
          }
        }
        ?>
      ],
      datasets: [{
        label: 'Total Penghasilan Bulan ini',
        data: [
          <?php
          if (count($transaksi) > 0) {
            foreach ($transaksi as $tr) {
              echo $tr['total'] . ", ";
            }
          }
          ?>
        ],
        borderWidth: 5,
        borderColor: '#6777ef',
        backgroundColor: 'transparent',
        pointBackgroundColor: '#fff',
        pointBorderColor: '#6777ef',
        pointRadius: 4
      }]
    },
    options: {
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          gridLines: {
            display: false,
            drawBorder: false,
          },
          ticks: {
            stepSize: 10000000,
            callback: function(value, index, values) {
              var total = 'Rp.' + value;
              total = total.substring(0, 5) + ' jt';
              return total;
            }
          },
          scaleLabel: {
            display: true,
            labelString: 'Total'
          }
        }],
        xAxes: [{
          gridLines: {
            color: '#fbfbfb',
            lineWidth: 2
          },
          scaleLabel: {
            display: true,
            labelString: 'Bulan'
          }
        }]
      },
    }
  });
</script>