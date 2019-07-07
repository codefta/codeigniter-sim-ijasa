
<?php $this->load->view('admin/templates/header') ?>

<!-- Sidebar -->
<?php $this->load->view('admin/templates/sidebar') ?>
<!-- End of Sidebar -->

<!-- Navbar -->
<?php $this->load->view('admin/templates/navbar') ?>
<!-- End Navbar -->

        <?php if($this->session->flashdata('notif_logistik')) : ?>
          <div class="notif"></div>
        <?php endif ?>

         <!-- DataTales Example -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="font-weight-bold text-primary">Perhitungan Prioritas Barang Donasi</h6>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="">
                <div class="form-group">
                  <label for="">Pilih Nama Bencana</label>
                  <select name="id_bencana" class="form-control">
                    <option value="">Pilih nama bencana</option>
                    <?php foreach($infobencana as $item) : ?>
                      <option value="<?= $item['id'] ?>" <?php if($id_bencana == $item['id']) echo 'selected' ?>><?= $item['nama'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="">Pilih Nama Logistik</label>
                  <select name="id_logistik" class="form-control">
                    <option value="">Pilih nama logistik</option>
                    <?php foreach($jenis_logistik as $item) : ?>
                      <option value="<?= $item['id'] ?>" <?php if($id_logistik == $item['id']) echo 'selected' ?>><?= $item['nama'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="float-right">
                  <button class="btn btn-success" type="submit">Hitung</button>
                </div>
              </form>
            </div>
          </div>

          <?php if(!empty($korban)) : ?>
          <div class="card shadow mb-4">
            <div class="card-header">
              <h6 class="font-weight-bold text-primary">Jumlah Korban dilokasi bencana</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-stripped">
                  <thead>
                    <tr class="text-center">
                      <td><b>Jumlah Anak-anak (BA)</b></td>
                      <td><b>Jumlah Perempuan (BP)</b></td>
                      <td><b>Jumlah Laki-laki (BL)</b></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="text-center">
                      <td><?= $korban_persen['anak']."% (".$korban['anak']." orang)"?> </td>
                      <td><?= $korban_persen['laki']."% (".$korban['laki']." orang)"?> </td>
                      <td><?= $korban_persen['perempuan']."% (".$korban['perempuan']." orang)" ?> </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header">
              <h6 class="font-weight-bold text-primary">Derajat Keanggotaan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr class="text-center">
                      <td><b>(BA) Rendah</b></td>
                      <td><b>(BA) Tinggi</b></td>
                      <td><b>(BP) Rendah</b></td>
                      <td><b>(BP) Tinggi</b></td>
                      <td><b>(BL) Rendah</b></td>
                      <td><b>(BL) Tinggi</b></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="text-center">
                      <td><?= $derajat_rendah['anak'] ?> </td>
                      <td><?= $derajat_tinggi['anak'] ?> </td>
                      <td><?= $derajat_rendah['perempuan']?> </td>
                      <td><?= $derajat_tinggi['perempuan']?> </td>
                      <td><?= $derajat_rendah['laki'] ?> </td>
                      <td><?= $derajat_tinggi['laki'] ?> </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header">
              <h6 class="font-weight-bold text-primary">Fuzzy</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr class="text-center">
                      <td><b>Rule</b></td>
                      <td><b>Nilai</b></td>
                      <td><b>Prioritas</b></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($rule_fuzzy as $key => $value) : ?>
                      <tr class="text-center">
                        <td><?= $key ; ?> </td>
                        <td><?= $value?></td>
                        <td><?= $prioritas[$key] ?> </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header">
              <h6 class="font-weight-bold text-primary">Defuzzy</h6>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                  <div class="col-md-2">Hasil</div>
                  <div class="col-md-2"><?= $defuzzy ?></div>
                </div>
            </div>
          </div>


          <?php endif ?>

<!-- Footer -->
<?php $this->load->view('admin/templates/footer') ?>

<!-- Logout Modal-->
<?php $this->load->view('admin/templates/logout') ?>
<!--   Core JS Files   -->
<?php $this->load->view('admin/templates/js') ?>

<!-- Add-On JS -->

<!-- Page level plugins -->
<script src="<?= base_url('assets/admin/')?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/admin/')?>js/demo/datatables-demo.js"></script>

<?php $this->load->view('admin/templates/ender') ?>
