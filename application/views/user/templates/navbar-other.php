<nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-shrink shadow-sm" id="otherNav">
    <div class="container">
      <!-- <a class="navbar-brand js-scroll-trigger" href="#page-top">Ijasa - <small>Donasi Logistik Bencana</small></a> -->
      <a class="navbar-brand js-scroll-trigger" href="<?= base_url() ?>">Ijasa - <small>Donasi Logistik Bencana</small></a>
      
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <!-- <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#infobencana">Info Bencana</a>
          </li> -->
            <?php if($this->session->has_userdata("user_loggedin")) : ?>
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown">
                <a class="nav-link " href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline"><?= $this->session->userdata('user_loggedin')['nama'] ?></span>
                  <img class="img-profile rounded-circle" style="width:20px; height:20px" src="<?= base_url().'uploads/foto_profil/'.$this->session->userdata('user_loggedin')['foto'] ?>">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="<?= base_url('profil') ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profil Saya
                  </a>
                  <a class="dropdown-item" href="<?= base_url('donasi/status') ?>">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Status donasi
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?= base_url('logout') ?>">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="nav-link  <?php if($this->uri->segment(1) == 'login') echo 'active' ?>" href="<?= base_url('login') ?>">Login</a>
              </li>
            <?php endif ?>
          <!-- <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#signup">Contact</a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>