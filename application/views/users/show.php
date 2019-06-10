
<?php $this->load->view('templates/header') ?>
  
  <!-- Sidebar -->
  <?php $this->load->view('templates/sidebar') ?>
  
    <!-- Navbar -->
    <?php $this->load->view('templates/navbar') ?>
        <div class="row">
          <div class="col-md-4">
            <div class="card text-center">
              <div class="card-body mt-5">
                <div class="author">
                  <!-- <a href="#"> -->
                    <img class="avatar border-gray w-50 h-50" src="<?= base_url('uploads/foto_profil/'). $user['foto'] ?>" alt="User">
                    <h5 class="title text-success"><?= $user['nama'] ?></h5>
                  <!-- </a> -->
                  <p class="description ">
                    <?= $user['username'] ?>
                  </p>
                </div>
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">                   
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <a href="<?= base_url('users') ?>" class="btn btn-danger float-right btn-round">Kembali</a>
                <h5 class="card-title">Ubah Profil</h5>
              </div>
              <div class="card-body">
                <form action="<?= base_url('users/save') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <input type="hidden" name="old_photo" value="<?= $user['foto'] ?>">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Nama</label>
                        <input name="nama" type="text" class="form-control" value="<?= $user['nama'] ?>">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Nomor Hp</label>
                        <input name="no_hp" type="number" class="form-control" placeholder="Last Name" value="<?= $user['no_hp'] ?>">
                      </div>
                      
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" placeholder="Email" value="<?= $user['email'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Jenis kelamin</label>
                        <select name="jenis_kelamin" class="form-control" id="">
                          <option>Pilih jenis kelamin</option>
                          <option value="Laki-laki" <?php if($user['jenis_kelamin'] == 'Laki-laki') echo 'selected' ?>>Laki-laki</option>
                          <option value="Perempuan" <?php if($user['jenis_kelamin'] == 'Perempuan') echo 'selected' ?>>Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Nomor Hp</label>
                        <input name="no_hp" type="number" class="form-control" placeholder="Last Name" value="<?= $user['no_hp'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control" placeholder="Username" value="<?= $user['username'] ?>">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control" id="">
                          <option>Pilih jenis kelamin</option>
                          <option value="Admin" <?php if($user['role'] == 'Admin') echo 'selected' ?>>Admin</option>
                          <option value="Petugas" <?php if($user['role'] == 'Petugas') echo 'selected' ?>>Petugas</option>
                          <option value="User" <?php if($user['role'] == 'User') echo 'selected' ?>>User</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control textarea"><?= $user['alamat'] ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-12">
                      <label for="">Ganti Foto Bencana</label>
                    </div>
                    <div class="col-md-12">
                      <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Pilih foto</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-success btn-round">Ubah</button>
                    </div>
                  </div>
                </form>
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