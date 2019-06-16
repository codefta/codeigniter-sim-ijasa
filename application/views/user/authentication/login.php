
  <!-- Header -->
  <?php $this->load->view('user/templates/header') ?>

  <!-- Navigation -->
  <?php $this->load->view('user/templates/navbar-other') ?>

  <!-- Header section -->

  <!-- Projects Section -->
  <section id="infobencana" class="projects-section pt-5 mt-5" style="background-color: #f5f6fa">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm border-0">
                <div class="card-body p-5">
                    <h4 class="text-success"><b>Login</b></h4>
                    <hr>
                    <form action="<?= base_url('login/in') ?>" method="post">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" id="" class="form-control" value="<?php echo set_value("username"); ?>">
                            <?php echo '<span class="text-danger" >'.form_error('username').'</span>'; ?>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control" value="<?php echo set_value("password"); ?>">
                            <?php echo '<span class="text-danger" >'.form_error('password').'</span>'; ?>
                        </div>
                        <div class="text-right">
                            <a href="<?= base_url('register') ?>" class="btn btn-info p-3">Register</a>
                            <button type="submit" class="btn btn-success p-3">Login</button>
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