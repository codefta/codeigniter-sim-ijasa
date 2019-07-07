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
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Donasi</h6>
                </div>
                <div class="col-md-6 ">
                    <div class="float-right">
                        <a href="<?= base_url('admin/statistik/donasi') ?>" class="btn btn-secondary">Menurut Status</a>
                        <a href="<?= base_url('admin/statistik/donasi/jenis_donasi') ?>" class="btn btn-primary">Menurut Jenis Donasi</a>
                    </div>
                </div>
                <div class="col-md-5">
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">

            <div class="row justify-content-center" id="alertChart">
                <div class="col-md-3">
                    <div class="alert alert-danger text-center">Data Tidak tersedia</div>
                </div>
            </div>
            
            <div class="chart-pie pt-4 pb-2">
                <canvas id="donasi"></canvas>
            </div>

            <div class="row mt-3 justify-content-center">
                <div class="col-md-8">
                    <div class="mx-auto">
                        <form action="<?= base_url('admin/statistik/donasi/jenis_donasi') ?>" method="get">
                            <div class="form-group form-inline" >
                                <label class="mr-3">Lihat Berdasarkan</label>
                                <select name="status" id="" class="form-control mr-3">
                                    <option value="">Pilih Status</option>
                                    <?php if(!isset($_GET['status'])) $_GET['status'] = NULL ?>
                                    <option value="diterima" <?php if($status == 'diterima' || $_GET['status'] == 'diterima') echo 'selected' ?>>Diterima</option>
                                    <option value="blm_diterima" <?php if($status == 'blm_diterima' || $_GET['status'] == 'blm_diterima') echo 'selected' ?>>Belum diterima</option>
                                </select>
                                <select name="tahun" id="" class="form-control mr-3">
                                    <option value="">Pilih Tahun</option>
                                    <?php if(!isset($_GET['tahun'])) $_GET['tahun'] = 0 ?>
                                    <option value="2017"  <?php if(($tahun == '2017') || ($_GET['tahun'] == '2017')) echo 'selected' ?>>2017</option>
                                    <option value="2018"  <?php if(($tahun == '2018') || ($_GET['tahun'] == '2018')) echo 'selected' ?>>2018</option>
                                    <option value="2019"  <?php if(($tahun == '2019') || ($_GET['tahun'] == '2019')) echo 'selected' ?>>2019</option>
                                </select>
                                <select name="bulan" id="" class="form-control mr-3">
                                    <option value="">Pilih Bulan</option>
                                    <?php if(!isset($_GET['bulan'])) $_GET['bulan'] = 0 ?>
                                    <option value="01" <?php if(($_GET['bulan'] == '01') || ($bulan == '01')) echo 'selected' ?>>Januari</option>
                                    <option value="02" <?php if($_GET['bulan'] == '02' || ($bulan == '02')) echo 'selected' ?>>Februari</option>
                                    <option value="03" <?php if($_GET['bulan'] == '03' || ($bulan == '03')) echo 'selected' ?>>Maret</option>
                                    <option value="04" <?php if($_GET['bulan'] == '04' || ($bulan == '04')) echo 'selected' ?>>April</option>
                                    <option value="05" <?php if($_GET['bulan'] == '05' || ($bulan == '05')) echo 'selected' ?>>Mei</option>
                                    <option value="06" <?php if($_GET['bulan'] == '06' || ($bulan == '06')) echo 'selected' ?>>Juni</option>
                                    <option value="07" <?php if($_GET['bulan'] == '07' || ($bulan == '07')) echo 'selected' ?>>Juli</option>
                                    <option value="08" <?php if($_GET['bulan'] == '08' || ($bulan == '08')) echo 'selected' ?>>Agustus</option>
                                    <option value="09" <?php if($_GET['bulan'] == '09' || ($bulan == '09')) echo 'selected' ?>>September</option>
                                    <option value="10" <?php if($_GET['bulan'] == '10' || ($bulan == '10')) echo 'selected' ?>>Oktober</option>
                                    <option value="11" <?php if($_GET['bulan'] == '11' || ($bulan == '11')) echo 'selected' ?>>November</option>
                                    <option value="12" <?php if($_GET['bulan'] == '12' || ($bulan == '12')) echo 'selected' ?>>Desember</option>
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

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow border-0 p-3">
                <div class="card-body">
                <h4>Keterangan</h4>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Jenis Logistik</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($donasi as $key => $value) : ?>
                            <tr>
                                <td><?= ucwords($key)?></td>
                                <td><?php if(empty($value)) { echo '0';} else echo $value ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
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
<!-- <script src="<?= base_url('assets/admin/')?>js/statistik/chart-pie-donasi.js"></script -->
<script>
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var pangan = <?= $donasi['pangan'] ?>;
var papan = <?= $donasi['papan'] ?>;
var sandang = <?= $donasi['sandang'] ?>;
var jumlah = pangan + papan + sandang;
// console.log(donasi);

$("#alertChart").hide();
$(function() {
    if(pangan == '' && papan == '' && sandang == '') {
        $("#alertChart").show();
    }
})

// Pie Chart Example
var ctx = document.getElementById("donasi");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Pangan", "Papan", "Sandang"],
    datasets: [{
      data: [pangan , papan, sandang],
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
                return label + ':' + val + ' (' + (100 * val / jumlah ).toFixed(2) + '%)';
        
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


<!-- End of Page-->
<?php $this->load->view('admin/templates/ender') ?>