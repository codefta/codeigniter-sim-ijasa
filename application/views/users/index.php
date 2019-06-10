
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
                <h4 class="card-title">Akun Pengguna</h4>
              </div>
              <div class="card-body">
                <div class="float-right">
                  <a href="<?= base_url('users/add') ?>" class="btn btn-success"><i class="nc-icon nc-simple-add mr-3 text-left"></i> Tambah</a>
                </div>
                <div class="table-responsive" style="overflow-y:hidden">
                  <table id="example" class="display table" style="width:100%">
                    <thead class="text-success">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>Email</th>
                      <th colspan="2">Aksi</th>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach($users as $data) : ?>
                        <tr>
                          <th scope="row"><?= $i++ ?></th>
                          <td><?= $data['nama'] ?></td>
                          <td><?= $data['jenis_kelamin'] ?></td>
                          <td><?= $data['alamat'] ?></td>
                          <td><?= $data['email'] ?></td>
                          <td><a href="<?= base_url('users/show/').$data['id'] ?>"><i class="nc-icon nc-alert-circle-i text-info"></i></a></td>
                          <!-- <td><a href="<?//= base_url('users/edit').$data['id'] ?>"><i class="nc-icon nc-settings text-warning"></i></a></td> -->
                          <td><a href="<?= base_url('users/destroy/').$data['id'] ?>"><i class="nc-icon nc-basket text-danger"></i></a></td>
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

    <!-- <script>
      $(document).ready(function() {
          $('#example').DataTable();
      } );
    </script> -->
<?php $this->load->view('templates/ender') ?>
