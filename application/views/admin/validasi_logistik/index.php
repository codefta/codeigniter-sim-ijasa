

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
            <div class="card-header">
                <h6 class="font-weight-bold text-primary">Data Donasi Logistik</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Donatur</th>
                      <th>Tujuan Donasi</th>
                      <th>Tanggal Donasi</th>
                      <th>Tanggal Verifikasi</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Donatur</th>
                        <th>Tujuan Donasi</th>
                        <th>Tanggal Donasi</th>
                        <th>Tanggal Verifikasi</th>
                        <th>Status</th>
                        <th>Aksi</th>   
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php $i=1; foreach($validasi_logistik as $data) : ?>
                        <tr>
                          <th scope="row"><?= $i++ ?></th>
                          <td><?= $data['nama_user'] ?></td>
                          <td><?= $data['infobencana'] ?></td>
                          <td><?= $data['tgl_donasi'] ?></td>
                          <td><?php if($data['tgl_verifikasi'] == NULL) echo '<span class="badge badge-warning"> Belum diverifikasi</span>'; else echo $data['tgl_verifikasi'] ?></td>
                          <td><?php if($data['status'] == 0) echo '<span class="badge badge-warning">Belum diterima</span>'; else echo '<span class="badge badge-success">Sudah diterima</span>'  ?></td>
                          <td>
                            <div class="row">
                              <div class="col-md-6">
                                <a class="btn btn-success pr-3 pl-3" href="<?= base_url('admin/validasi_logistik/verif/').$data['id'] ?>"><i class="fas fa-check"></i></i></a>
                              </div>
                              <div class="col-md-6">
                                <a  class="btn btn-info pr-3 pl-3" href="<?= base_url('admin/users/destroy/').$data['id'] ?>"><i class="fas fa-info"></i></a>
                              </div>
                            </div>  
                          </td>
                        </tr>
                      <?php endforeach ?>
                  </tbody>
                </table>
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

<!-- Page level plugins -->
<script src="<?= base_url('assets/admin/')?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/admin/')?>js/demo/datatables-demo.js"></script>

<?php $this->load->view('admin/templates/ender') ?>
