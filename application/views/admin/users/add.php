<?php $this->load->view('admin/templates/header') ?>

<!-- Sidebar -->
<?php $this->load->view('admin/templates/sidebar') ?>
<!-- End of Sidebar -->

<!-- Navbar -->
<?php $this->load->view('admin/templates/navbar') ?>
<!-- End Navbar -->

        <div class="row">
        <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Tambah User</h5>
              </div>
              <div class="card-body">
                <form action="<?= base_url('admin/users/store') ?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo set_value("nama"); ?>" placeholder="Nama lengkap">
                        <?php echo '<span class="text-danger" >'.form_error('nama').'</span>'; ?>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value("email"); ?>">
                        <?php echo '<span class="text-danger" >'.form_error('email').'</span>'; ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Jenis kelamin</label>
                        <select name="jenis_kelamin" class="form-control" id="">
                          <option>Pilih jenis kelamin</option>
                          <option value="Laki-laki" <?php if(set_value("jenis_kelamin") == 'Laki-laki' )  echo 'selected'; ?>>Laki-laki</option>
                          <option value="Perempuan" <?php if(set_value("jenis_kelamin") == 'Perempuan' ) echo 'selected'; ?>>Perempuan</option>
                        </select>
                        <?php echo '<span class="text-danger" >'.form_error('jenis_kelamin').'</span>'; ?>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Nomor Hp</label>
                        <input type="number" name="no_hp" class="form-control" value="<?php echo set_value("no_hp"); ?>" placeholder="Nomor Handphone" >
                        <?php echo '<span class="text-danger" >'.form_error('no_hp').'</span>'; ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo set_value("username"); ?>" placeholder="Username">
                        <?php echo '<span class="text-danger" >'.form_error('username').'</span>'; ?>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1 pr-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control"  value="<?php echo set_value("password"); ?>" placeholder="Password">
                        <?php echo '<span class="text-danger" >'.form_error('password').'</span>'; ?>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control" id="">
                          <option>Pilih role</option>
                          <option value="Admin" <?php if(set_value("role") == 'Admin' )  echo 'selected'; ?>>Admin</option>
                          <option value="Petugas" <?php if(set_value("role") == 'Petugas' )  echo 'selected'; ?>>Petugas</option>
                          <option value="User" <?php if(set_value("role") == 'User' )  echo 'selected'; ?>>User</option>
                        </select>
                        <?php echo '<span class="text-danger" >'.form_error('role').'</span>'; ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" placeholder="Alamat lengkap" class="form-control textarea"><?php echo set_value("alamat"); ?></textarea>
                        <?php echo '<span class="text-danger" >'.form_error('alamat').'</span>'; ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="">Foto Bencana</label>
                    </div>
                    <div class="col-md-12">
                      <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Pilih foto</label>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="update ml-auto mr-3">
                      <a href="<?= base_url('users') ?>" class="btn btn-danger btn-round">Kembali</a>
                      <button type="submit" class="btn btn-success btn-round">Submit</button>
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
    
<?php $this->load->view('admin/templates/ender') ?>
