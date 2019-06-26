<?php $this->load->view('admin/templates/header') ?>

<!-- Sidebar -->
<?php $this->load->view('admin/templates/sidebar') ?>
<!-- End of Sidebar -->

<!-- Navbar -->
<?php $this->load->view('admin/templates/navbar') ?>
<!-- End Navbar -->

        <div class="row">
          <div class="col-md-8">
            <div class="card card-user shadow border-0">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-6">
                          <h5 class="card-title">Detail Validasi Logistik</h5>
                      </div>
                      <div class="col-md-6 text-right">
                        <a href="<?= base_url('admin/validasi_logistik') ?>" class="btn btn-danger">Kembali</a>
                      </div>
                  </div>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><b>Nama Donatur</b></p>
                    </div>
                    <div class="col-md-6">
                        <p><?= $donasi_logistik['nama_user'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><b>Tujuan Donasi</b></p>
                    </div>
                    <div class="col-md-6">
                        <p><?= $donasi_logistik['infobencana'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><b>Tanggal Donasi</b></p>
                    </div>
                    <div class="col-md-6">
                        <p><?= $donasi_logistik['tgl_donasi'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><b>Tanggal Verifikasi</b></p>
                    </div>
                    <div class="col-md-6">
                        <p><?php if($donasi_logistik['tgl_verifikasi'] == NULL) echo '<span class="badge badge-warning"> Belum diverifikasi</span>'; else echo $donasi_logistik['tgl_verifikasi'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><b>Status</b></p>
                    </div>
                    <div class="col-md-6">
                        <p><?php if($donasi_logistik['status'] == 0) echo '<span class="badge badge-warning">Belum diterima</span>'; else echo '<span class="badge badge-success">Sudah diterima</span>'  ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><b>Jenis Logistik</b></p>
                    </div>
                    <div class="col-md-6">
                        <!-- <ul> -->
                            <?php foreach($jenis_logistik as $data) : ?>
                                <li><?= $data['jenis_logistik'] ?> : <?= $data['jumlah'] ?> liter/kg</li>
                            <?php endforeach ?>
                        <!-- </ul> -->
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- </div> -->

<!-- Footer -->
<?php $this->load->view('admin/templates/footer') ?>

<!-- Logout Modal-->
<?php $this->load->view('admin/templates/logout') ?>
<!--   Core JS Files   -->
<?php $this->load->view('admin/templates/js') ?>
    
<?php $this->load->view('admin/templates/ender') ?>
