
  <!-- Header -->
  <?php $this->load->view('user/templates/header') ?>

  <!-- Navigation -->
  <?php $this->load->view('user/templates/navbar-home') ?>

  <!-- Header section -->
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">IJASA</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5">Yuk, bantu kawan kita yang sedang terkena bencana dengan mengirimkan logistik untuknya!</h2>
        <a href="#infobencana" class="btn btn-primary js-scroll-trigger">Bantu</a>
      </div>
    </div>
  </header>

  <!-- Projects Section -->
  <section id="infobencana" class="projects-section pt-5" style="background-color: #f5f6fa">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <h3>Daftar Bencana</h3>
            </div>
            <div class="col-md-6">
              <div class="float-right">
                <form class="form-inline">
                  <input class="form-control mr-3 p-2" id="cari" type="search" placeholder="Search" aria-label="Search">
                  <!-- <button class="btn btn-outline-success p-2" type="submit">Search</button> -->
                </form>
              </div>
            </div>
          </div>
          <hr>
        </div>
      </div>

      <div class="row row-wrap">
        <?php foreach($infobencana as $item) : ?>
        <div class="col-md-4 mb-3 konten row-item">
          <div class="card shadow border-0">
            <img class="" style="height: 20vw" src="<?= base_url().'uploads/infobencana/'.$item['foto'] ?>" alt="">
            <div class="card-body" >
              <h5><?= "<b>".substr($item['nama'], 0, 50).'...</b>' ?></h5>
              <p><?= substr($item['deskripsi'], 0, 100)  ?></p>
              <div class="float-right">
                <!-- <a href="" class="btn btn-success p-2">Donasi</a> -->
                <a href="<?= site_url('infobencana/detail/').$item['id'] ?>" class="btn btn-info p-2">Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach ?>
      </div>

      <div class="row btn-more">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
            <button class="btn btn-info more">Lebih Banyak</button>
        </div>
        <div class="col-md-4"></div>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <?php $this->load->view('user/templates/footer') ?>
  <!-- JS -->
  <?php $this->load->view('user/templates/js') ?>
  <!-- JS - Add-On -->

  <!-- Add with Jquery -->
  <script>
    $(document).ready(function(){
      $(".btn-more").hide();
      
      if($(".row-item").length >= 3){
        $(".btn-more").show();
      }

      $(".row-wrap .row-item").hide();

      $('.row-wrap').children('.row-item:lt(3)').show();

      $('.more').click(function(){
          $('.row-wrap').children('.row-item:hidden:lt(3)').show();
      });
    });
  </script>

  <!-- Search with jquery -->
  <script>
    $(document).ready(function(){

      $("#cari").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".konten").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

    });
  </script>
  <!-- Ender -->
  <?php $this->load->view('user/templates/ender') ?>