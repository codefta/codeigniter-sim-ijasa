
  <!-- Header -->
  <?php $this->load->view('user/templates/header') ?>

  <!-- Navigation -->
  <?php $this->load->view('user/templates/navbar-other') ?>

  <!-- Header section -->
  <section class=" mt-5 projects-section pt-5" style="background-color: #f5f6fa">
  <div class="container">
      <div class="row">
          <div class="col-md-12 text-right">
              <a href="<?= base_url('profil') ?>" class="btn btn-primary">Ubah Profil</a>
              <a href="<?= base_url('profil/password') ?>" class="btn btn-primary active">Ganti Password</a>
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
                <form action="<?= base_url('profil/password/save') ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?= $user['id'] ?>">
                  <input type="hidden" name="old_photo" value="<?= $user['foto'] ?>">
                  <div class="form-group">
                    <label>Password Baru</label>
                    <input name="password_baru" type="password" class="form-control" placeholder="Masukan password baru" value="<?= set_value('password_baru') ?>">
                    <small class="text-danger"><?= form_error('password_baru') ?></small>
                  </div>
                  <div class="form-group">
                    <label>Ulangi Password Baru</label>
                    <input name="password_baru2" type="password" class="form-control" placeholder="Masukan ulang password baru" value="<?= set_value('password_baru2') ?>">
                    <small class="text-danger"><?= form_error('password_baru2') ?></small>
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