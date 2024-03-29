<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login SIM - IJASA</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/admin/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/admin/')?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-info">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center mt-5">

      <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
              <div class="col-lg-10 ">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang di <b>SIM - IJASA<b></h1>
                  </div>
                  <?php if($this->session->flashdata('notif_login')) : ?>
                    <div class="mb-3">
                      <?= $this->session->flashdata('notif_login') ?>
                    </div>
                  <?php endif ?>
                  <form class="user" action="<?= base_url('admin/login') ?>" method="post">
                    <div class="form-group">
                      <input type="text" name="username" placeholder="Masukkan username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp">
                      <small class="text-danger"><?= form_error('username') ?></small>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" placeholder="Masukkan password" class="form-control form-control-user" id="exampleInputPassword">
                      <small class="text-danger"><?= form_error('password') ?></small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


<!-- JS -->
<?php $this->load->view('admin/templates/js') ?>
<!-- End of Page-->
<?php $this->load->view('admin/templates/ender') ?>