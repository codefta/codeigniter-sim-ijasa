
  <!-- Header -->
  <?php $this->load->view('user/templates/header') ?>

  <!-- Navigation -->
  <?php $this->load->view('user/templates/navbar-other') ?>

  <!-- Projects Section -->
  <section id="infobencana" class=" mt-5 projects-section pt-5" style="background-color: #f5f6fa">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <h3>Detail Donasi Anda</h3>
            <div class="card shadow border-0 mt-3">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tanggal Donasi</th>
                                <th>Tujuan Donasi</th>
                                <th>Jenis Logistik</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach($donasi_logistik as $data) : ?>
                            <tr>
                                <td><?= $data['tgl_donasi'] ?></td>
                                <td><?= $data['infobencana'] ?></td>
                                <td><?= $data['infobencana'] ?></td>
                                <td><?php if($data['status'] == 1) echo '<span class="text-success">sudah diterima</span>'; else echo '<span class="text-warning">Belum diterima</span>' ?></td>
                              </tr>
                          <?php endforeach ?>
                        </tbody>
                    </table>
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