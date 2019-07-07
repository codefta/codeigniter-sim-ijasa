  <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center mt-3" href="index.html">
          <div class="sidebar-brand-icon  text-center mr-1">
            SIM IJASA
          </div>
          <div class="sidebar-brand-text text-left ml-2"><small class="text-light text-">Sistem Informasi Donasi Logistik Bencana</small></div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0 mb-3">
        <?php if($this->session->userdata('admin_loggedin')['role'] == 'Admin') : ?>

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
          <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapsePrioritas" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-exclamation-circle"></i>
            <span>Prioritas Kebutuhan</span></a>
          </a>
          <div id="collapsePrioritas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <!-- <h6 class="collapse-header">Custom Components:</h6> -->
              <a class="collapse-item <?php if(current_url() == base_url('admin/spk/prioritas') ) echo 'active' ?>" href="<?= base_url('admin/spk/prioritas') ?>">Penghitungan</a>
              <a class="collapse-item <?php if(current_url() == base_url('admin/spk/prioritas/domain') ) echo 'active' ?>" href="<?= base_url('admin/spk/prioritas/domain') ?>">Domain</a>
              <a class="collapse-item <?php if((current_url() == base_url('admin/spk/prioritas/aturan')) || (current_url() == base_url('admin/spk/prioritas/tambah_aturan'))) echo 'active' ?>" href="<?= base_url('admin/spk/prioritas/aturan') ?>">Aturan</a>
            </div>
          </div>
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
        <?php endif ?>
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

        <li class="nav-item <?php if($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'profil' ) echo 'active'?>">
          <a class="nav-link" href="<?= base_url("admin/profil") ?>">
            <i class="fas fa-user"></i>
            <span>Profil Saya</span></a>
        </li>
        <?php if($this->session->userdata('admin_loggedin')['role'] == 'Admin') : ?>
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

        <?php endif ?>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

      </ul>