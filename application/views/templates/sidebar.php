<div class="sidebar" data-color="white" data-active-color="success">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <!-- <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="<?= base_url()?>assets/img/logo-small.png">
          </div>
        </a> -->
        <a href="http://www.creative-tim.com" class="simple-text logo-normal text-center text-success">
          <b>SIM IJASA</b>
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper" style="overflow:hidden">
        <ul class="nav">
          <li <?php if($this->uri->segment(1) == '') echo 'class="active"'?>>
            <a href="<?= base_url() ?>">
              <i class="nc-icon nc-tile-56"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li <?php if($this->uri->segment(1) == 'infobencana') echo 'class="active"'?>>
            <a href="<?= base_url('infobencana') ?>">
              <i class="nc-icon nc-alert-circle-i"></i>
              <p>Info Bencana</p>
            </a>
          </li>
          <li <?php if($this->uri->segment(1) == 'infobencana') echo 'class="active"'?>>
            <a href="<?= base_url('infobencana') ?>">
              <i class="nc-icon nc-check-2"></i>
              <p>Validasi Logistik</p>
            </a>
          </li>
          <li <?php if($this->uri->segment(1) == 'jenis_logistik') echo 'class="active"'?>>
            <a href="<?= base_url('jenis_logistik') ?>">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Jenis Logistik</p>
            </a>
          </li>
          <li <?php if($this->uri->segment(1) == 'profil') echo 'class="active"'?>>
            <a href="<?= base_url('profil') ?>">
              <i class="nc-icon nc-badge"></i>
              <p>Profil Akun</p>
            </a>
          </li>
          <li <?php if($this->uri->segment(1) == 'users') echo 'class="active"'?>>
            <a href="<?= base_url('users') ?>">
              <i class="nc-icon nc-single-02"></i>
              <p>Manajemen Akun</p>
            </a>
          </li>
        </ul>
      </div>
    </div>