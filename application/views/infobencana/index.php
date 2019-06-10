
<?php $this->load->view('templates/header') ?>
  
  <!-- Sidebar -->
  <?php $this->load->view('templates/sidebar') ?>
  
    <!-- Navbar -->
    <?php $this->load->view('templates/navbar') ?>

        <?php if($this->session->flashdata('notif_logistik')) : ?>
          <div class="notif"></div>
        <?php endif ?>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Info Bencana</h4>
              </div>
              <div class="card-body">
                <div class="float-right">
                  <a href="<?= base_url('infobencana/add') ?>" class="btn btn-success"><i class="nc-icon nc-simple-add mr-3 text-left"></i> Tambah</a>
                </div>
                <div class="table-responsive" style="overflow-y:hidden">
                  <table class="table">
                    <thead class="text-success">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Lokasi</th>
                      <th>Deskripsi</th>
                      <th>Kebutuhan Bencana</th>
                      <th>Foto</th>
                      <th colspan="2">Aksi</th>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach($infobencana as $data) : ?>
                        <tr>
                          <th scope="row"><?= $i++ ?></th>
                          <td><?= $data['nama_bencana'] ?></td>
                          <td><?= ucwords(strtolower($data['provinsi'].', '.$data['kota'].', '.$data['kecamatan'].', '.$data['desa'])); ?></td>
                          <td><?= $data['deskripsi'] ?></td>
                          <td>
                          <?php 
                          $jenis_logistik = explode(',', $data['logistik']);
                          $jumlah_logistik = explode(',', $data['jumlah_logistik']);
                          foreach($jenis_logistik as $key => $jenis_logistik) {
                            echo $jenis_logistik.': '.$jumlah_logistik[$key].'<br>';
                          }
                          ?>
                          </td>
                          <td><img src="<?= base_url("uploads/infobencana/").$data['foto'] ?>" style="width:80px; height:80px"></td>
                          <td><a href="<?= base_url('infobencana/edit/').$data['idbencana'] ?>"><i class="nc-icon nc-settings-gear-65 text-warning"></i></a></td>
                          <td><a href="<?= base_url('infobencana/destroy/').$data['idbencana'] ?>"><i class="nc-icon nc-basket text-danger"></i></a></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
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
    <script>
    $(".notif").(function() {
      $.notify({
        message: <?= $this->session->flashdata('notif_logistik') ?>,
        type: 'danger'
      });
    });
    </script>
<?php $this->load->view('templates/ender') ?>
