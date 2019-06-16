
  <!-- Header -->
  <?php $this->load->view('user/templates/header') ?>

  <!-- Navigation -->
  <?php $this->load->view('user/templates/navbar-other') ?>

  <!-- Header section -->

  <!-- Projects Section -->
  <section id="infobencana" class="projects-section pt-5 mt-5" style="background-color: #f5f6fa">
    <div class="container">
      <div class="row justify-content-left">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-5">
                    <h4 class="text-secondary"><b>Daftar menjadi Donatur</b></h4>
                    <hr>
                    <form action="<?= base_url('register/store') ?>" method="post">
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama" value="<?php echo set_value("nama"); ?>" placeholder="Isikan nama lengkap" class="form-control">
                            <?php echo '<span class="text-danger" >'.form_error('nama').'</span>'; ?>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="lk1" value="Laki-laki" <?php if(set_value("jenis_kelamin") == 'Laki-laki' )  echo 'checked'; ?>>
                                <label class="form-check-label" for="lk1">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="lk2" value="Perempuan" <?php if(set_value("jenis_kelamin") == 'Perempuan' ) echo 'checked'; ?>>
                                <label class="form-check-label" for="lk2" >
                                    Perempuan
                                </label>
                            </div>
                            <?php echo '<span class="text-danger" >'.form_error('jenis_kelamin').'</span>'; ?>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="5" placeholder="Isikan alamat lengkap"><?php echo set_value("alamat"); ?></textarea>
                            <?php echo '<span class="text-danger" >'.form_error('alamat').'</span>'; ?>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control" placeholder="emailkamu@layanan.domain" value="<?php echo set_value("email"); ?>">
                            <?php echo '<span class="text-danger" >'.form_error('email').'</span>'; ?>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Handphone</label>
                            <input type="number" name="no_hp" id="" class="form-control" placeholder="08xxxx" value="<?php echo set_value("no_hp"); ?>">
                        <?php echo '<span class="text-danger" >'.form_error('no_hp').'</span>'; ?>
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" id="" class="form-control" placeholder="Isikan dengan username yang unik" value="<?php echo set_value("username"); ?>">
                            <?php echo '<span class="text-danger" >'.form_error('username').'</span>'; ?>
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control" placeholder="Isikan password minimal 8 karakter" value="<?php echo set_value("password"); ?>">
                            <?php echo '<span class="text-danger" >'.form_error('password').'</span>'; ?>
                        </div>

                        <!-- <div class="form-group">
                            <label for="">Foto Profil</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div> -->
                        <div class="row mt-5">
                            <div class="col-md-6">
                                Anda sudah punya akun? <a href="<?= base_url('login') ?>">Login</a>
                            </div>
                            <div class="col-md-6">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info p-3">Daftar</button>
                                </div>
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

  <!-- Ender -->
  <?php $this->load->view('user/templates/ender') ?>