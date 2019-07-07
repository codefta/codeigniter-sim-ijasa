
<?php $this->load->view('admin/templates/header') ?>

<!-- Sidebar -->
<?php $this->load->view('admin/templates/sidebar') ?>
<!-- End of Sidebar -->

<!-- Navbar -->
<?php $this->load->view('admin/templates/navbar') ?>
<!-- End Navbar -->
         <!-- DataTales Example -->
         <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                        <h6 class="font-weight-bold text-primary">Sunting Aturan</h6>
                        </div>
                    </div>
                    </div>
                    <div class="card-body">            
                        <form action="<?= base_url('admin/spk/prioritas/update_aturan') ?>" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <h6><b>Banyak Anak</b></h6>
                                <div class="form-group">
                                    <select name="ba" id="" class="form-control">
                                        <option value="">Pilih prioritas</option>
                                        <option value="tinggi" <?php if($aturan['ba'] == 'tinggi') echo 'selected' ?>>Tinggi</option>
                                        <option value="rendah" <?php if($aturan['ba'] == 'rendah') echo 'selected' ?>>Rendah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h6><b>Banyak Laki-laki</b></h6>
                                <div class="form-group">
                                    <select name="bl" id="" class="form-control">
                                        <option value="">Pilih prioritas</option>
                                        <option value="tinggi" <?php if($aturan['bl'] == 'tinggi') echo 'selected' ?>>Tinggi</option>
                                        <option value="rendah" <?php if($aturan['bl'] == 'rendah') echo 'selected' ?>>Rendah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h6><b>Banyak Perempuan</b></h6>
                                <div class="form-group">
                                    <select name="bp" id="" class="form-control">
                                        <option value="">Pilih prioritas</option>
                                        <option value="tinggi" <?php if($aturan['bp'] == 'tinggi') echo 'selected' ?>>Tinggi</option>
                                        <option value="rendah" <?php if($aturan['bp'] == 'rendah') echo 'selected' ?>>Rendah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h6><b>Hasil</b></h6>
                                <div class="form-group">
                                    <select name="hasil" id="" class="form-control">
                                        <option value="">Pilih prioritas</option>
                                        <option value="tinggi" <?php if($aturan['hasil'] == 'tinggi') echo 'selected' ?>>Tinggi</option>
                                        <option value="rendah" <?php if($aturan['hasil'] == 'rendah') echo 'selected' ?>>Rendah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h6><b>Operator</b></h6>
                                <div class="form-group">
                                    <select name="operator" id="" class="form-control">
                                        <option value="">Pilih prioritas</option>
                                        <option value="and" <?php if($aturan['operator'] == 'and') echo 'selected' ?>>AND</option>
                                        <option value="or" <?php if($aturan['operator'] == 'or') echo 'selected' ?>>OR</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?= $aturan['id'] ?>">
                            <div class="col-md-12 mt-5">
                                <div class="float-right">
                                    <a href="<?= base_url('admin/spk/prioritas/aturan') ?>" class="btn btn-danger pr-5 pl-5">Batal</a>
                                    <button type="submit" class="btn btn-success pr-5 pl-5">Sunting</button>
                                </div>
                            </div>
                        </div>
                        </form>
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

<!-- Page level plugins -->
<script src="<?= base_url('assets/admin/')?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/admin/')?>js/demo/datatables-demo.js"></script>

<?php $this->load->view('admin/templates/ender') ?>
