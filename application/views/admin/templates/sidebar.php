  <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center mt-3" href="index.html">
          <div class="sidebar-brand-icon  text-center mr-1">
            SIM IJASA
          </div>
          <div class="sidebar-brand-text text-left ml-2"><small class="text-light text-">Sistem Informasi Donasi Logistik Bencana</small></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?php if($this->uri->segment(1) == 'admin' && ($this->uri->segment(2) == '' || $this->uri->segment(2) == 'dashboard')) echo 'active'?>">
          <a class="nav-link" href="<?= base_url("admin") ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <div class="sidebar-heading">
          Sistem Pendukung Keputusan
        </div>

        <li class="nav-item <?php if($this->uri->segment(2) == 'spk' ) echo 'active'?>">
          <a class="nav-link" href="<?= base_url("admin/spk") ?>">
            <i class="fas fa-exclamation-circle"></i>
            <span>Prioritas Kebutuhan</span></a>
        </li>

        <div class="sidebar-heading">
          Sistem Informasi
        </div>

        <li class="nav-item <?php if($this->uri->segment(2) == 'statistik' ) echo 'active' ?>">
          <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-chart-pie"></i>
            <span>Statistik</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <!-- <h6 class="collapse-header">Custom Components:</h6> -->
              <a class="collapse-item <?php if(current_url() == base_url('admin/statistik/donatur') ) echo 'active' ?>" href="<?= base_url('admin/statistik/donatur') ?>">Laporan Donatur</a>
              <a class="collapse-item <?php if($this->uri->segment(3) == 'donasi' ) echo 'active' ?>" href="<?= base_url('admin/statistik/donasi') ?>">Laporan Donasi</a>
              <a class="collapse-item <?php if(current_url() == base_url('admin/statistik/kebutuhan') ) echo 'active' ?>" href="<?= base_url('admin/statistik/kebutuhan') ?>">Laporan Kebutuhan</a>
              <a class="collapse-item <?php if($this->uri->segment(3) == 'infobencana')   echo 'active' ?>" href="<?= base_url('admin/statistik/infobencana') ?>">Laporan Bencana</a>
            </div>
          </div>
        </li>

        <!-- Heading -->
        <div class="sidebar-heading">
          Menu Utama
        </div>

        <li class="nav-item <?php if($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'infobencana' ) echo 'active'?>">
          <a class="nav-link" href="<?= base_url("admin/infobencana") ?>">
            <i class="fas fa-info-circle"></i>
            <span>Info Bencana</span></a>
        </li>

        <li class="nav-item <?php if($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'validasi_logistik' ) echo 'active'?>">
          <a class="nav-link" href="<?= base_url("admin/validasi_logistik") ?>">
            <i class="fas fa-clipboard-check"></i>
            <span>Validasi Logistik</span></a>
        </li>


        <!-- Nav Item - Pages Collapse Menu -->
        <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Components:</h6>
              <a class="collapse-item" href="buttons.html">Buttons</a>
              <a class="collapse-item" href="cards.html">Cards</a>
            </div>
          </div>
        </li> -->

        <li class="nav-item <?php if($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'profil' ) echo 'active'?>">
          <a class="nav-link" href="<?= base_url("admin/profil") ?>">
            <i class="fas fa-user"></i>
            <span>Profil Saya</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Parameter
        </div>
        
        <!-- Jenis Logistik -->
        <li class="nav-item <?php if($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'jenis_logistik' ) echo 'active'?>">
          <a class="nav-link" href="<?= base_url("admin/jenis_logistik") ?>">
            <i class="fas fa-boxes"></i>
            <span>Jenis Logistik</span></a>
        </li>

        <!-- Manajemen Users -->
        <li class="nav-item <?php if($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'users' ) echo 'active'?>">
          <a class="nav-link" href="<?= base_url("admin/users") ?>">
            <i class="fas fa-users"></i>
            <span>Manajemen Akun</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

      </ul>