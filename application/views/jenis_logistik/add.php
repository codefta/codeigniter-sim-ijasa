<?php $this->load->view('templates/header') ?>
  
  <!-- Sidebar -->
  <?php $this->load->view('templates/sidebar') ?>
  
    <!-- Navbar -->
    <?php $this->load->view('templates/navbar') ?>

        <div class="row">
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Tambah Logistik</h5>
              </div>
              <div class="card-body">
                <form action="<?= base_url('jenis_logistik/save') ?>" method="post">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Nama Logistik</label>
                        <input type="text" name="nama_logistik" class="form-control" placeholder="Nama Logistik" value="<?= set_value('nama_logistik') ?>">
                        <small class="text-danger"><?= form_error('nama_logistik') ?></small>
                      </div>
                    </div>
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Jenis Logistik</label>
                        <select name="jenis_logistik" class="form-control">
                            <option value="">Pilih jenis logistik</option>
                            <option value="Pangan" <?php if(set_value('jenis_logistik') == 'Pangan') echo 'selected' ?>>Pangan</option>
                            <option value="Sandang" <?php if(set_value('jenis_logistik') == 'Sandang') echo 'selected' ?>>Sandang</option>
                            <option value="Papan" <?php if(set_value('jenis_logistik') == 'Papan') echo 'selected' ?>>Papan</option>
                        </select>
                      <small class="text-danger"><?= form_error('jenis_logistik') ?></small>
                      </div>
                    </div>
                    <div class="col-md-12 pr-3">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" id="" cols="30" rows="10" class="form-control" placeholder="Silakan isi keterangan"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 pr-3">
                        <div class="text-right">
                            <a href="<?= base_url('jenis_logistik') ?>" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
         <!-- Footer -->
    <?php $this->load->view('templates/footer') ?>
    <!--   Core JS Files   -->
    <?php $this->load->view('templates/js') ?>


    <!-- Additional JS -->
    
<?php $this->load->view('templates/ender') ?>
