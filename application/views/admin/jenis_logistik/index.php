
<?php $this->load->view('admin/templates/header') ?>

<!-- Sidebar -->
<?php $this->load->view('admin/templates/sidebar') ?>
<!-- End of Sidebar -->

<!-- Navbar -->
<?php $this->load->view('admin/templates/navbar') ?>
<!-- End Navbar -->

        <?php if($this->session->flashdata('notif_logistik')) : ?>
          <div class="mb-3">
            <?= $this->session->flashdata('notif_logistik') ?>
          </div>
        <?php endif ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="font-weight-bold text-primary">Data Jenis Logistik</h6>
                </div>
                <div class="col-md-6">
                  <div class="float-right">
                    <a href="<?= base_url('admin/jenis_logistik/add') ?>" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jenis</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jenis</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php $i=1; foreach($logistik as $data) : ?>
                        <tr>
                          <th scope="row"><?= $i++ ?></th>
                          <td><?= $data['nama'] ?></td>
                          <td><?= $data['jenis'] ?></td>
                          <td><?= $data['keterangan'] ?></td>
                          <td>
                            <div class="row">
                              <div class="col-md-6">
                                <a href="<?= base_url('admin/jenis_logistik/edit/').$data['id'] ?>"><i class="fas fa-edit text-warning"></i></a>
                              </div>
                              <div class="col-md-6">
                                <a href="<?= base_url('admin/jenis_logistik/remove/').$data['id'] ?>"><i class="fas fa-trash text-danger"></i></td>
                              </div>
                            </div>
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