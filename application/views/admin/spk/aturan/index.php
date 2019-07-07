
<?php $this->load->view('admin/templates/header') ?>

<!-- Sidebar -->
<?php $this->load->view('admin/templates/sidebar') ?>
<!-- End of Sidebar -->

<!-- Navbar -->
<?php $this->load->view('admin/templates/navbar') ?>
<!-- End Navbar -->

        <?php if($this->session->flashdata('notif_aturan')) : ?>
            <?= $this->session->flashdata('notif_aturan') ?>
        <?php endif ?>

         <!-- DataTales Example -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="font-weight-bold text-primary">Aturan Fuzzy</h6>
                </div>                
              </div>
            </div>
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-12">
                  <div class="float-right">
                    <a href="<?= site_url('admin/spk/prioritas/tambah_aturan') ?>" class="btn btn-success">Tambah Aturan</a>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <th>No</th>
                    <th>Aturan</th>
                    <th>Aksi</th>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach($aturan as $item) : ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td>IF <?= $item['ba'] != NULL ? "<span class='text-danger '><b>(Banyak Anak == ".$item['ba'].")</b></span> " : ''; ?> <?= strtoupper($item['operator']) ?> <?= $item['bp'] != NULL ? "<span class='text-primary'><b>(Banyak Perempuan == ".$item['bp'].")</b></span> " : ''; ?> <?= strtoupper($item['operator']) ?> <?= $item['bl'] != NULL ? "<span class='text-warning'><b>(Banyak Laki-laki == ".$item['bl'].")</b></span> " : ''; ?> THEN <?= "<span class='text-success'><b> Prioritas == ".$item['hasil']."</b></span>" ?></td>
                      <td>
                        <div class="row col-md-6">
                          <a href="<?= base_url('admin/spk/prioritas/sunting_aturan/').$item['id'] ?>" class="badge badge-info">Sunting</a>                      
                        </div>
                        <div class="row col-md-6 mt-3">
                          <a href="<?= base_url('admin/spk/prioritas/hapus_aturan/').$item['id'] ?>" class="badge badge-danger">Hapus</a>                                              
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
