
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
                <h4 class="card-title">Jenis Logistik</h4>
              </div>
              <div class="card-body">
                <div class="float-right">
                  <a href="<?= base_url('jenis_logistik/add') ?>" class="btn btn-success"><i class="nc-icon nc-simple-add mr-3 text-left"></i> Tambah</a>
                </div>
                <div class="table-responsive" style="overflow-y:hidden">
                  <table class="table">
                    <thead class="text-success">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jenis</th>
                      <th>Keterangan</th>
                      <th colspan="2">Aksi</th>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach($logistik as $data) : ?>
                        <tr>
                          <th scope="row"><?= $i++ ?></th>
                          <td><?= $data['nama'] ?></td>
                          <td><?= $data['jenis'] ?></td>
                          <td><?= $data['keterangan'] ?></td>
                          <td><a href="<?= base_url('jenis_logistik/edit/').$data['id'] ?>"><i class="nc-icon nc-settings-gear-65 text-warning"></i></a></td>
                          <td><a href="<?= base_url('jenis_logistik/remove/').$data['id'] ?>"><i class="nc-icon nc-basket text-danger"></i></a></td>
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
