
<?php $this->load->view('admin/templates/header') ?>

<!-- Sidebar -->
<?php $this->load->view('admin/templates/sidebar') ?>
<!-- End of Sidebar -->

<!-- Navbar -->
<?php $this->load->view('admin/templates/navbar') ?>
<!-- End Navbar -->

        <?php if($this->session->flashdata('notif_domain')) : ?>
            <?= $this->session->flashdata('notif_domain') ?>
        <?php endif ?>

         <!-- DataTales Example -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="font-weight-bold text-primary">Domain Keanggotaan</h6>
                </div>
              </div>
            </div>
            <div class="card-body">            
                <form action="<?= base_url('admin/spk/prioritas/save_domain') ?>" method="post">
                <div class="row">
                    <div class="col-md-6 mt-5">
                        <h6><b>Rendah</b></h6>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $domain['rendah'] ?>" name="rendah">
                        </div>
                    </div>
                    <div class="col-md-6 mt-5">
                        <h6><b>Tinggi</b></h6>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $domain['tinggi'] ?>" name="tinggi">
                        </div>
                    </div>
                    <div class="col-md-6 mt-5">
                        <h6><b>Batas Bawah</b></h6>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $domain['b_bawah'] ?>" name="b_bawah">
                        </div>
                    </div>
                    <div class="col-md-6 mt-5">
                        <h6><b>Batas Atas</b></h6>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $domain['b_atas'] ?>" name="b_atas">
                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <div class="float-right">
                            <button type="submit" class="btn btn-success pr-5 pl-5">Simpan</button>
                        </div>
                    </div>
                </div>
                </form>
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
