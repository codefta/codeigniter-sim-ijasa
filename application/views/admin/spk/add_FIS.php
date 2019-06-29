
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
                  <h6 class="font-weight-bold text-primary">Fungsi Keanggotaan</h6>
                </div>
                <div class="col-md-6">                  
                </div>
              </div>
            </div>

                    <div class="col-md-12">
                      <label><b>Derajat Keanggotaan</b></label>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Rendah (r)</label>
                            <input type="number"class="form-control" placeholder="r">
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tinggi (t)</label>
                            <input type="number"class="form-control" placeholder="t">
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="col-md-12">
                      <label><b>Prioritas</b></label>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Rendah</label>
                            <input type="text"class="form-control" placeholder="misal:(t-x)/(t-r)">
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tinggi</label>
                            <input type="text"class="form-control" placeholder="misal:(x-r)/(t-r)">
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="col-md-12">
                      <label><b>Aturan Fuzzy</b></label>
                      <div class="row">
                        <div class="col-md-3">
                      <div class="form-group">
                        <label>Anak-anak</label>
                        <select name="" class="form-control" id="">
                          <option>Pilih derajat keanggotaan</option>
                          <option value="Tinggi" >Tinggi</option>
                          <option value="Rendah" >Rendah</option>
                        </select>
                      </div>
                    </div>
                        <div class="col-md-3">
                      <div class="form-group">
                        <label>Perempuan</label>
                        <select name="" class="form-control" id="">
                          <option>Pilih derajat keanggotaan</option>
                          <option value="Tinggi" >Tinggi</option>
                          <option value="Rendah" >Rendah</option>
                        </select>
                      </div>
                    </div>
                        <div class="col-md-3">
                      <div class="form-group">
                        <label>Laki-laki</label>
                        <select name="" class="form-control" id="">
                          <option>Pilih derajat keanggotaan</option>
                          <option value="Tinggi" >Tinggi</option>
                          <option value="Rendah" >Rendah</option>
                        </select>
                      </div>
                    </div>
                        <div class="col-md-3">
                      <div class="form-group">
                        <label>Prioritas</label>
                        <select name="" class="form-control" id="">
                          <option>Pilih prioritas</option>
                          <option value="Tinggi" >Tinggi</option>
                          <option value="Rendah" >Rendah</option>
                        </select>
                      </div>
                    </div>
            <div class="card-body">            
                
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
