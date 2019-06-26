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
            
            <h6 class="m-0 font-weight-bold text-primary">Laporan Bencana</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            
            <div class="row justify-content-center" id="alertChart">
                <!-- <div class="col-md-3">
                    <div class="alert alert-danger text-center">Data Tidak tersedia</div>
                </div> -->
            </div>
            <!-- <div class="chart-pie pt-4 pb-2"> -->
                <!-- <canvas id="map"></canvas> -->
                <div id="map"></div>

            <!-- </div> -->
            <!-- <div class="mt-4 text-center small">
            <span class="mr-2">
                <i class="fas fa-circle text-primary"></i> Donatur Sudah Berdonasi
            </span>
            <span class="mr-2">
                <i class="fas fa-circle text-success"></i> Donatur Belum Berdonasi
            </span>
            </div> -->
            <div class="row mt-3 justify-content-center">
                <div class="col-md-6">
                    <div class="mx-auto">
                        <form action="<?= base_url('admin/statistik/infobencana/') ?>" method="get">
                            <div class="form-group form-inline" >
                                <label class="mr-3">Lihat Berdasarkan</label>
                                <select name="tahun" id="" class="form-control mr-3">
                                    <option value="">Pilih Tahun</option>
                                    <?php if(!isset($_GET['tahun'])) $_GET['tahun'] = 0 ?>
                                    <option value="2017"  <?php if($tahun == '2017') echo 'selected' ?> <?php if($_GET['tahun'] == '2017') echo 'selected' ?>>2017</option>
                                    <option value="2018"  <?php if($tahun == '2018') echo 'selected' ?> <?php if($_GET['tahun'] == '2018') echo 'selected' ?>>2018</option>
                                    <option value="2019"  <?php if($tahun == '2019') echo 'selected' ?> <?php if($_GET['tahun'] == '2019') echo 'selected' ?>>2019</option>
                                </select>
                                <select name="bulan" id="" class="form-control mr-3">
                                    <option value="">Pilih Bulan</option>
                                    <?php if(!isset($_GET['bulan'])) $_GET['bulan'] = 0 ?>
                                    <option value="01" <?php if($_GET['bulan'] == '01') echo 'selected' ?>>Januari</option>
                                    <option value="02" <?php if($_GET['bulan'] == '02') echo 'selected' ?>>Februari</option>
                                    <option value="03" <?php if($_GET['bulan'] == '03') echo 'selected' ?>>Maret</option>
                                    <option value="04" <?php if($_GET['bulan'] == '04') echo 'selected' ?>>April</option>
                                    <option value="05" <?php if($_GET['bulan'] == '05') echo 'selected' ?>>Mei</option>
                                    <option value="06" <?php if($_GET['bulan'] == '06') echo 'selected' ?>>Juni</option>
                                    <option value="07" <?php if($_GET['bulan'] == '07') echo 'selected' ?>>Juli</option>
                                    <option value="08" <?php if($_GET['bulan'] == '08') echo 'selected' ?>>Agustus</option>
                                    <option value="09" <?php if($_GET['bulan'] == '09') echo 'selected' ?>>September</option>
                                    <option value="10" <?php if($_GET['bulan'] == '10') echo 'selected' ?>>Oktober</option>
                                    <option value="11" <?php if($_GET['bulan'] == '11') echo 'selected' ?>>November</option>
                                    <option value="12" <?php if($_GET['bulan'] == '12') echo 'selected' ?>>Desember</option>
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
                                <th>Nama Provinsi</th>
                                <th>Jumlah Bencana</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($bencana as $key => $value) : ?>
                            <tr>
                                <td><?= ucwords($key) ?></td>
                                <td><?= $value ?></td>
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
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>

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