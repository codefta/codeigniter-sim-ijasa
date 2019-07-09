
<?php $this->load->view('admin/templates/header') ?>

<!-- Sidebar -->
<?php $this->load->view('admin/templates/sidebar') ?>
<!-- End of Sidebar -->

<!-- Navbar -->
<?php $this->load->view('admin/templates/navbar') ?>
<!-- End Navbar -->

        <?php if($this->session->flashdata('prioritas_notif')) : ?>
          <div class="mb-3">
            <?= $this->session->flashdata('prioritas_notif') ?>
          </div>
        <?php endif ?>

         <!-- DataTales Example -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="font-weight-bold text-primary">Hasil Perhitungan Prioritas Barang Donasi</h6>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th>No</th>
                            <th>Info Bencana</th>
                            <th>Jenis Logistik</th>
                            <th>Hasil</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($hasil_prioritas as $item) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $item['nama_bencana'] ?></td>
                                <td><?= $item['jenis_logistik'] ?></td>
                                <td><?= $item['hasil'] ?><?= $item['hasil'] > 50 ? "( Tinggi )" : "( Rendah )" ?></td>
                                <td><?= $item['visible'] == 1 ? "<span class='badge badge-success'>Ditampilkan</span>" : "<span class='badge badge-danger'>Tidak ditampilkan</span>" ?></td>
                                <td>
                                    <div class="row">
                                        <?php if($item['visible'] == 0) : ?>
                                        <div class="col-md-6 mr-1"><a href="<?= base_url('admin/spk/prioritas/tampilkan_prioritas/'.$item['id']) ?>" class="badge badge-success mr-3 mb-3">Tampilkan</a></div>
                                        <?php else : ?>
                                        <div class="col-md-6 mr-1"><a href="<?= base_url('admin/spk/prioritas/sembunyikan_prioritas/'.$item['id']) ?>" class="badge badge-success mr-3 mb-3">Sembunyikan</a></div>
                                        <?php endif ?>
                                        <div class="col-md-6 ml-1"><a href="<?= base_url('admin/spk/prioritas/hapus_prioritas/'.$item['id']) ?>" class="badge badge-danger">Hapus</a></div>
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
