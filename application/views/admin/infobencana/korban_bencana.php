
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
                  <h6 class="font-weight-bold text-primary">Jumlah Korban Bencana</h6>
                </div>
                <div class="col-md-6">
                  <div class="float-right">
                  <a href="<?= base_url('admin/infobencana') ?>" class="btn btn-danger"><i class="fas fa-long-arrow-alt-left"></i> Kembali</a>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="card-body">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>Korban</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Anak - anak</td>
                            <td><?= $infobencana['anak'] ?></td>
                        </tr>
                        <tr>
                            <td>Laki - laki</td>
                            <td><?= $infobencana['laki'] ?></td>
                        </tr>
                        <tr>
                            <td>Perempuan</td>
                            <td><?= $infobencana['perempuan'] ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Korban</td>
                            <td><?= $infobencana['perempuan'] + $infobencana['laki'] +  $infobencana['anak'] ?></td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
          </div>

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
