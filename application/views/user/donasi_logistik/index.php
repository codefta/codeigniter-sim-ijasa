
  <!-- Header -->
  <?php $this->load->view('user/templates/header') ?>

  <!-- Navigation -->
  <?php $this->load->view('user/templates/navbar-other') ?>

  <!-- Projects Section -->
  <section id="infobencana" class=" mt-5 projects-section pt-5" style="background-color: #f5f6fa">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card shadow border-0">
                <div class="card-body">
                    <p class="text-center">Anda berdonasi untuk:</p>
                    <h4 class="text-center mb-3"><b><?= $infobencana['nama'] ?></b></h4>
                    <hr>
                    <h5 class="text-center"><b>Kebutuhan Bencana</b></h5>
                      <table class="table table-stripped">
                          <thead>
                              <tr>
                                  <th>Nama Kebutuhan</th>
                                  <th>Jenis Kebutuhan</th>
                                  <th>Jumlah Kebutuhan</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach($logistikbencana as $item) : ?>
                              <tr>
                                  <td><?= $item['nama_logistik'] ?></td>
                                  <td><?= $item['jenis_logistik'] ?></td>
                                  <td><?= $item['jumlah'].' kg/liter' ?></td>
                              </tr>
                              <?php endforeach ?>
                          </tbody>
                      </table>
                </div>
            </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card shadow border-0">
            <div class="card-body">
              <h5><b>Silakan pilih jenis donasi:</b></h5>

              <form action="<?= base_url('donasi/add') ?>" method="post">

              <input type="hidden" name="id_bencana" value="<?= $infobencana['id'] ?>">
              <input type="hidden" name="id_user" value="<?= $this->session->userdata('user_loggedin')['id'] ?>">

              <div class="row">
                  <div class="col-md-12" id="logistik_wrapper">
                    <div class="row">
                      <!-- <div> -->
                        <div class="col-md-4 pr-3">
                          <div class="form-group">
                            <select name="jenis_logistik[]" id="jenis_logistik" class="form-control">
                              <option value="">Pilih jenis logistik</option>
                              <?php foreach($logistik as $data) : ?>
                                <option value="<?= $data['jenis'] ?>"><?= $data['jenis'] ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3 pr-3">
                          <div class="form-group">
                            <select name="nama_logistik[]" id="nama_logistik" class="form-control">
                              <option value="">Pilih nama logistik</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3 pr-3">
                          <div class="form-group">
                            <input type="number" name="jumlah_logistik[]" id="" class="form-control" placeholder="Jumlah">
                          </div>
                        </div>

                    </div>
                  </div>

                  <div class="col-md-12 pr-3">
                    <div class="row">
                      <div class="col-md-12">
                        <a href="javascript:void(0)" id="addButton" class="badge badge-success">Tambah jenis logistik</a>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center mt-3">
        <div class="col-md-8">
          <div class="text-right">
            <a href="<?= base_url('donasi/detail/').$infobencana['id'] ?>" class="btn btn-info p-3">Kembali</a>
            <button type="submit" class="btn btn-success p-3">Berdonasi</button>
          </div>
        </div>
      </div>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <?php $this->load->view('user/templates/footer') ?>
  <!-- JS -->
  <?php $this->load->view('user/templates/js') ?>
  <!-- JS - Add-On -->
  <script>
    $(function () {
      var x = 1;
      let maxField = 10;
      var urlApi = '<?= base_url('api/jenis_logistik_api/nama_logistik') ?>';

      $('#addButton').click(function() {
        if(x < maxField) {
          x++;
          $('#logistik_wrapper').append(
            `<div class="row">
              <!-- <div> -->
                <div class="col-md-4 pr-3">
                  <div class="form-group">
                    <select name="jenis_logistik[]" id="jenis_logistik`+x+`" class="form-control">
                      <option value="">Pilih jenis logistik</option>
                      <?php foreach($logistik as $data) : ?>
                        <option value="<?= $data['jenis'] ?>"><?= $data['jenis'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3 pr-3">
                  <div class="form-group">
                    <select name="nama_logistik[]" id="nama_logistik`+x+`" class="form-control">
                      <option value="">Pilih nama logistik</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3 pr-3">
                  <div class="form-group">
                    <input type="number" name="jumlah_logistik[]" id="" class="form-control" placeholder="Jumlah">
                  </div>
                </div>
                <div class="col-md-2">
                  <a href="javascript:void(0)" id="removeButton" class="badge badge-danger">Hapus</a>
                </div>
            </div>`
          );

          $('#jenis_logistik' + x).change(function() {
            $.ajax({
              method: 'POST',
              url: urlApi,
              data: {jenis_logistik: $("#jenis_logistik"+x).val()},
                dataType: 'json',
                success: function(response){
                    $('#nama_logistik'+x).html(response.nama_logistik).show();
                },
                error: function(xhr, ajaxOptions, thrownError){
                      alert(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);
                    }
            });
          });
        }
      });

      $('#logistik_wrapper').on('click', '#removeButton', function(e) {
        e.preventDefault();
        $(this).parent('div').parent('.row').remove();
        x--;
      });

      $("#jenis_logistik").change(function() {
          $.ajax({
            method: 'POST',
            url: urlApi,
            data: {jenis_logistik: $("#jenis_logistik").val()},
            dataType: 'json',
            success: function(response){
                $('#nama_logistik').html(response.nama_logistik).show();
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);
            }
          });
        });

    });
  </script>


  <!-- Ender -->
  <?php $this->load->view('user/templates/ender') ?>