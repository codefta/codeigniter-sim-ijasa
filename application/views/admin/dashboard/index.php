<?php $this->load->view('admin/templates/header') ?>

<!-- Sidebar -->
<?php $this->load->view('admin/templates/sidebar') ?>
<!-- End of Sidebar -->

<!-- Navbar -->
<?php $this->load->view('admin/templates/navbar') ?>
<!-- End Navbar -->

          <!-- Content Row -->

          <!-- Content Row -->

          <div class="row">

            <!-- Donasi -->
            <div class="col-md-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Donasi Bulan Ini</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  
                  <div class="row justify-content-center" id="alertChart">
                      <div class="col-md-6">
                          <div class="alert alert-danger text-center">Data Tidak tersedia</div>
                      </div>
                  </div>

                  <div class="chart-pie pt-4 pb-2">
                      <canvas id="donasi"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <!-- Donatur -->
            <div class="col-md-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Donatur Bulan Ini</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="row justify-content-center" id="alertChart2">
                      <div class="col-md-6">
                          <div class="alert alert-danger text-center">Data Tidak tersedia</div>
                      </div>
                  </div>
                  <div class="chart-pie pt-4 pb-2">
                      <canvas id="donatur"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <!-- Kebutuhan -->
            <div class="col-md-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Kebutuhan Logistik Bulan Ini</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="row justify-content-center" id="alertChart3">
                      <div class="col-md-6">
                          <div class="alert alert-danger text-center">Data Tidak tersedia</div>
                      </div>
                  </div>
                  <div class="chart-pie pt-4 pb-2">
                      <canvas id="kebutuhan"></canvas>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-md-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Jumlah Bencana Bulan Ini</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div id="map"></div>  
                </div>
              </div>
            </div>
            <!-- InfoBencana -->


          </div>



  
<!-- Footer -->
<?php $this->load->view('admin/templates/footer') ?>

<!-- Logout Modal-->
<?php $this->load->view('admin/templates/logout') ?>
<!--   Core JS Files   -->
<?php $this->load->view('admin/templates/js') ?>

<!-- Add-On JS -->

<!-- Chart JS -->
<script src="<?= base_url('assets/admin/')?>vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/admin/')?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/admin/')?>js/demo/chart-pie-demo.js"></script>
<!-- HighMaps -->
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>

<!-- Laporan donasi -->

<script>
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var donasi = <?= $donasi['semua_donasi'] ?>;
var donasi_diterima = <?= $donasi['donasi_diterima'] ?>;
var donasi_belum_diterima = <?= $donasi['donasi_belum_diterima'] ?>;
// console.log(donasi);

$("#alertChart").hide();
$(function() {
    if(donasi_diterima == '' && donasi_belum_diterima == '') {
        $("#alertChart").show();
    }
})

// Pie Chart Example
var ctx = document.getElementById("donasi");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Donasi diterima", "Donasi belum diterima"],
    datasets: [{
      data: [donasi_diterima , donasi_belum_diterima],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      enabled : true,
        callbacks: {
            label: function(tooltipItem, data) {
                let label = data.labels[tooltipItem.index];
                let val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                return label + ':' + val + ' (' + (100 * val / donasi ).toFixed(2) + '%)';
        
            }
        }
    },
    legend: {
      display: true,
      position: 'bottom',
      margin: '100'
    },
    responsive: true,
    cutoutPercentage: 80,
  },
});
</script>

<!-- Donatur -->

<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var donatur = <?= $donatur_angka['semua_donatur'] ?>;
var donatur_berdonasi = <?= $donatur_angka['donatur_berdonasi'] ?>;
var donatur_belum_berdonasi = <?= $donatur_angka['donatur_belum_berdonasi'] ?>;

$("#alertChart2").hide();
$(function() {
    if(donatur_berdonasi == '' && donatur_belum_berdonasi == '') {
        $("#alertChart2").show();
    }
})

// Pie Chart Example
var ctx = document.getElementById("donatur");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Donatur berdonasi", "Donatur belum berdonasi"],
    datasets: [{
      data: [donatur_berdonasi , donatur_belum_berdonasi],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      enabled : true,
        callbacks: {
            label: function(tooltipItem, data) {
                let label = data.labels[tooltipItem.index];
                let val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                return label + ':' + val + ' (' + (100 * val / donatur ).toFixed(2) + '%)';
        
            }
        }
    },
    legend: {
      display: true,
      position: 'bottom',
      margin: '100'
    },
    responsive: true,
    cutoutPercentage: 80,
  },
});

</script>


<!-- Kebutuhan -->
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var sandang = <?= (int)$kebutuhan['sandang'] ?>;
var pangan = <?= (int)$kebutuhan['pangan'] ?>;
var papan = <?= (int)$kebutuhan['papan'] ?>;
var semua = sandang + papan +pangan;

$("#alertChart3").hide();
$(function() {
    if(sandang == '' && papan == '' && pangan == '') {
        $("#alertChart3").show();
    }
})

// Pie Chart Example
var ctx = document.getElementById("kebutuhan");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sandang", "Papan", "Pangan"],
    datasets: [{
      data: [sandang , papan, pangan],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      enabled : true,
        callbacks: {
            label: function(tooltipItem, data) {
                let label = data.labels[tooltipItem.index];
                let val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                return label + ':' + val + ' (' + (100 * val / semua ).toFixed(2) + '%)';
        
            }
        }
    },
    legend: {
      display: true,
      position: 'bottom',
      margin: '100'
    },
    responsive: true,
    cutoutPercentage: 80,
  },
});

</script>

<!-- Info Bencana -->
<script>
var data = [
    ['id-3700', 0],
    // Aceh
    ['id-ac', <?php if(!isset($bencana['aceh'])) echo 0; else echo $bencana['aceh'] ?>],
    // Kalimantan Timur
    ['id-ki', <?php if(!isset($bencana['kalimantan timur'])) echo 0; else echo $bencana['kalimantan timur'] ?>],
    // Jawa Tengah
    ['id-jt', <?php if(!isset($bencana['jawa tengah'])) echo 0; else echo $bencana['jawa tengah'] ?>],
    // Bengkulu
    ['id-be', <?php if(!isset($bencana['bengkulu'])) echo 0; else echo $bencana['bengkulu'] ?>],
    // Banten
    ['id-bt', <?php if(!isset($bencana['banten'])) echo 0; else echo $bencana['banten'] ?>],
    // Kalimantan Barat
    ['id-kb', <?php if(!isset($bencana['kalimantan barat'])) echo 0; else echo $bencana['kalimantan barat'] ?>],
    // Bangka Belitung
    ['id-bb', <?php if(!isset($bencana['kepulauan bangka belitung'])) echo 0; else echo $bencana['kepulauan bangka belitung'] ?>],
    // Bali
    ['id-ba', <?php if(!isset($bencana['bali'])) echo 0; else echo $bencana['bali'] ?>],
    // Jawa Timur
    ['id-ji', <?php if(!isset($bencana['jawa timur'])) echo 0; else echo $bencana['jawa timur'] ?>],
    // Kalimantan Selatan
    ['id-ks', <?php if(!isset($bencana['kalimantan selatan'])) echo 0; else echo $bencana['kalimantan selatan'] ?>],
    // Nusa Tenggara Timur
    ['id-nt', <?php if(!isset($bencana['nusa tenggara timur'])) echo 0; else echo $bencana['nusa tenggara timur'] ?>],
    // Sulawesi Selatan
    ['id-se', <?php if(!isset($bencana['sulawesi selatan'])) echo 0; else echo $bencana['sulawesi selatan'] ?>],
    // Kepulauan Riau
    ['id-kr', <?php if(!isset($bencana['kepulauan riau'])) echo 0; else echo $bencana['kepulauan riau'] ?>],
    // Papua Barat
    ['id-ib', <?php if(!isset($bencana['papua barat'])) echo 0; else echo $bencana['papua barat'] ?>],
    // Sumatera Utara
    ['id-su', <?php if(!isset($bencana['sumatra utara'])) echo 0; else echo $bencana['sumatra utara'] ?>],
    // Riau
    ['id-ri', <?php if(!isset($bencana['riau'])) echo 0; else echo $bencana['riau'] ?>],
    // Sulawesi Utara
    ['id-sw', <?php if(!isset($bencana['sulawesi utara'])) echo 0; else echo $bencana['sulawesi utara'] ?>],
    // Maluku Utara
    ['id-la', <?php if(!isset($bencana['maluku utara'])) echo 0; else echo $bencana['maluku utara'] ?>],
    // Sumatera Barat
    ['id-sb', <?php if(!isset($bencana['sumatra barat'])) echo 0; else echo $bencana['sumatra barat'] ?>],
    // Maluku
    ['id-ma', <?php if(!isset($bencana['maluku'])) echo 0; else echo $bencana['maluku'] ?>],
    // Nusa Tenggara Barat
    ['id-nb', <?php if(!isset($bencana['nusa tenggara barat'])) echo 0; else echo $bencana['nusa tenggara barat'] ?>],
    // Sulawesi Tenggara
    ['id-sg', <?php if(!isset($bencana['sulawesi tenggara'])) echo 0; else echo $bencana['sulawesi tenggara'] ?>],
    // Sulawesi Tengah
    ['id-st', <?php if(!isset($bencana['sulawesi tengah'])) echo 0; else echo $bencana['sulawesi tengah'] ?>],
    // Papua
    ['id-pa', <?php if(!isset($bencana['papua'])) echo 0; else echo $bencana['papua'] ?>],
    // Jawa Barat
    ['id-jr', <?php if(!isset($bencana['jawa barat'])) echo 0; else echo $bencana['jawa barat'] ?>],
    // Lampung
    ['id-1024', <?php if(!isset($bencana['lampung'])) echo 0; else echo $bencana['lampung'] ?>],
    // Jakarta
    ['id-jk', <?php if(!isset($bencana['dki jakarta'])) echo 0; else echo $bencana['dki jakarta'] ?>],
    // Gorontalo
    ['id-go', <?php if(!isset($bencana['gorontalo'])) echo 0; else echo $bencana['gorontalo'] ?>],
    // Yogyakarta
    ['id-yo', <?php if(!isset($bencana['di yogyakarta'])) echo 0; else echo $bencana['di yogyakarta'] ?>],
    // Kalimantan Tengah
    ['id-kt', <?php if(!isset($bencana['kalimantan tengah'])) echo 0; else echo $bencana['kalimantan tengah'] ?>],
    // Sumatera Selatan
    ['id-sl', <?php if(!isset($bencana['sumatera selatan'])) echo 0; else echo $bencana['sumatera selatan'] ?>],
    // Sulawesi Barat
    ['id-sr', <?php if(!isset($bencana['sulawesi barat'])) echo 0; else echo $bencana['maluku'] ?>],
    // Jambi
    ['id-ja', <?php if(!isset($bencana['jambi'])) echo 0; else echo $bencana['jambi'] ?>]
];

// Create the chart
Highcharts.mapChart('map', {
    chart: {
        map: 'countries/id/id-all'
    },

    title: {
        text: 'Data Banyaknya Bencana'
    },

    subtitle: {
        text: 'Sumber map: <a href="http://code.highcharts.com/mapdata/countries/id/id-all.js">Indonesia</a>'
    },

    mapNavigation: {
        enabled: true,
        buttonOptions: {
            verticalAlign: 'bottom'
        }
    },

    colorAxis: {
        min: 0
    },

    series: [{
        data: data,
        name: 'Jumlah Bencana',
        states: {
            hover: {
                color: '#BADA55'
            }
        },
        dataLabels: {
            enabled: true,
            format: '{point.name}'
        }
    }]
});

</script>

<!-- End of Page-->
<?php $this->load->view('admin/templates/ender') ?>