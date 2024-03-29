
  <!-- Header -->
  <?php $this->load->view('user/templates/header') ?>

  <!-- Navigation -->
  <?php $this->load->view('user/templates/navbar-other') ?>

  <!-- Header section -->
  <section class=" mt-5 projects-section pt-5" style="background-color: #f5f6fa">
  <div class="container">
      <div class="row">
          <div class="col-md-12 text-right">
              <a href="<?= base_url('profil') ?>" class="btn btn-primary active">Ubah Profil</a>
              <a href="<?= base_url('profil/password') ?>" class="btn btn-primary">Ganti Password</a>
          </div>
      </div>
     <div class="row mt-5">
          <div class="col-md-4">
            <div class="card text-center shadow-sm border-0">
              <div class="card-body mt-5 ">
                <div class="author">
                  <!-- <a href="#"> -->
                    <img class="avatar border-gray w-50 h-30 mb-3" src="<?= base_url('uploads/foto_profil/'). $user['foto'] ?>" alt="User">
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
            <div class="card card-user shadow-sm border-0">
              <div class="card-body">
                <form action="<?= base_url('profil/save') ?>" method="post" enctype="multipart/form-data">
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
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control" placeholder="Username" value="<?= $user['username'] ?>">
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
  </div>
    </section>
  

  <!-- Footer -->
  <?php $this->load->view('user/templates/footer') ?>
  <!-- JS -->
  <?php $this->load->view('user/templates/js') ?>
  <!-- JS - Add-On -->

  <?php $this->load->view('user/templates/ender') ?>