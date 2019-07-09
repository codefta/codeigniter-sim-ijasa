<?php $this->load->view('admin/templates/header') ?>

<!-- Sidebar -->
<?php $this->load->view('admin/templates/sidebar') ?>
<!-- End of Sidebar -->

<!-- Navbar -->
<?php $this->load->view('admin/templates/navbar') ?>
<!-- End Navbar -->

    <div class="row">

    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            
            <h6 class="m-0 font-weight-bold text-primary">Laporan Kebutuhan Kebutuhan Terpenuhi</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            
            <div class="row justify-content-center" id="alertChart">
                <div class="col-md-3">
                    <div class="alert alert-danger text-center">Data Tidak tersedia</div>
                </div>
            </div>
            <div class="chart-pie pt-4 pb-2">
                <canvas id="kebutuhan_terpenuhi"></canvas>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col-md-11">
                    <div class="mx-auto">
                        <form action="<?= base_url('admin/statistik/kebutuhan_terpenuhi') ?>" method="get">
                            <div class="form-group form-inline" >
                                <label class="mr-3">Lihat Berdasarkan</label>
                                <select name="id_bencana" id="" class="form-control mr-3">
                                    <option value="">Pilih Info Bencana</option>
                                    <?php foreach($infobencana as $item) : ?>
                                    <option value="<?= $item['id'] ?>" <?php if($item['id'] == $id_bencana) echo 'selected' ?>><?= $item['nama'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <button type="submit" class="btn btn-primary my-auto">Lihat</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        </div>
    </div>

    </div>


<!-- Footer -->
<?php $this->load->view('admin/templates/footer') ?>

<!-- Logout Modal-->
<?php $this->load->view('admin/templates/logout') ?>
<!--   Core JS Files   -->
<?php $this->load->view('admin/templates/js') ?>

<!-- Add-On JS -->
<script src="<?= base_url('assets/admin/')?>vendor/chart.js/Chart.min.js"></script>
<!-- <script src="<?= base_url('assets/admin/')?>js/statistik/chart-pie-donatur.js"></script -->
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var kebutuhan = [];
var label_kebutuhan = [];
var donasi = [];
<?php foreach($kebutuhan as $key => $value) : ?>
  label_kebutuhan.push("<?= $key ?>");
  kebutuhan.push(<?= $value ?>);
  donasi.push(<?= $donasi[$key] ?>);
<?php endforeach ?>

console.log(label_kebutuhan);

console.log(kebutuhan);
console.log(donasi);

$("#alertChart").hide();
$(function() {
    if(donasi == '' && kebutuhan == '') {
        $("#alertChart").show();
    }
})

// Bar Chart Example
var ctx = document.getElementById("kebutuhan_terpenuhi");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: label_kebutuhan,
    datasets: [
    {
      label: "Kebutuhan",
      backgroundColor: "#18ac77",
      hoverBackgroundColor: "green",
      data: kebutuhan,
    },
    {
        label: "Donasi diterima",
        backgroundColor: "#5373df",
        hoverBackgroundColor: "blue",
        data: donasi,
    },
    ],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 0,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        barPercentage: 1,
        gridLines: {
          display: false,
          drawBorder: false
        },
        // ticks: {
        //   maxTicksLimit: 6
        // },
        // maxBarThickness: 50,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 1000,
          maxTicksLimit: 5,
          callback: function(value, index, values) {
            return value;
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: true
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ':' + tooltipItem.yLabel + ' kg/liter';
        }
      }
    },
  }
});
</script>


<!-- End of Page-->
<?php $this->load->view('admin/templates/ender') ?>