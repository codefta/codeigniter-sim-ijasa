<?php $this->load->view('admin/templates/header') ?>

<!-- Sidebar -->
<?php $this->load->view('admin/templates/sidebar') ?>
<!-- End of Sidebar -->

<!-- Navbar -->
<?php $this->load->view('admin/templates/navbar') ?>
<!-- End Navbar -->

        <div class="row">
          <div class="col-md-12">
            <div class="card card-user shadow border-0">
              <div class="card-header">
                <h5 class="card-title">Sunting Info Bencana</h5>
              </div>
              <div class="card-body">
                <form action="<?= base_url('infobencana/store') ?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Info Bencana</label>
                        <input type="text" name="nama_bencana" class="form-control" placeholder="Nama info bencana" value="<?= $infobencana['nama'] ?>">
                        <small class="text-danger"><?= form_error('nama_bencana') ?></small>
                      </div>
                    </div>
                    <div class="col-md-12 pr-3">
                      <label>Lokasi</label>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <select name="provinsi_id" id="provinsi" class="form-control">
                                <option value="">Pilih provinsi</option>
                                <?php foreach($provinsi as $data) : ?>
                                  <option value="<?php echo $data['id']?>" <?php if($data['id'] == $infobencana['provinsi_id']) echo 'selected' ?>> <?php echo $data['name'] ?></option>
                                <?php endforeach;?>
                            </select>
                          <small class="text-danger"><?= form_error('provinsi_id') ?></small>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <select name="kota_id" id="kota" class="form-control">
                                <option value="">Pilih kota/kabupaten</option>
                            </select>
                          <small class="text-danger"><?= form_error('kota_id') ?></small>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <select name="kecamatan_id" id="kecamatan" class="form-control">
                                <option value="">Pilih kecamatan</option>
                            </select>
                          <small class="text-danger"><?= form_error('kecamatan_id') ?></small>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <select name="desa_id" id="desa" class="form-control">
                                <option value="">Pilih desa</option>
                            </select>
                          <small class="text-danger"><?= form_error('desa_id') ?></small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 pr-3">
                      <div class="form-group">
                        <label>Deskripsi Bencana</label>
                        <textarea name="deskripsi_bencana" id="" cols="30" rows="10" class="form-control" placeholder="Silakan isi keterangan"><?= $infobencana['deskripsi'] ?></textarea>
                        <small class="text-danger"><?= form_error('deskripsi_bencana') ?></small>
                      </div>
                    </div>
                    <div class="col-md-12 pr-3 mb-4">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="">Foto Bencana</label>
                          </div>
                          <div class="col-md-12">
                            <div class="custom-file">
                              <input type="file" name="foto_bencana" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile">Pilih foto</label>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-12" id="logistik_wrapper">
                      <label>Kebutuhan Logistik</label>
                      <?php $i = 1; foreach($logistikbencana as $lb) : ?>
                      <div class="row">
                        <div class="col-md-3 pr-3">
                          <div class="form-group">
                            <select name="jenis_logistik[]" id="jenis_logistik" class="form-control">
                              <option value="">Pilih jenis logistik</option>
                              <?php foreach($logistik as $l) : ?>
                                <option value="<?= $l['jenis'] ?>" <?php if($lb['jenis_logistik'] == $l['jenis']) echo 'selected' ?>><?= $l['jenis'] ?></option>
                              <?php endforeach ?>
                            </select>
                            <small class="text-danger"><?= form_error('jenis_logistik[]') ?></small>
                          </div>
                        </div>
                        <div class="col-md-3 pr-3">
                          <div class="form-group">
                            <select name="nama_logistik[]" id="nama_logistik<?= $i++; ?>" class="form-control">
                              <option value="">Pilih nama logistik</option>
                            </select>
                            <input type="hidden" value="<?= $lb['id_logistik'] ?>" id="namaLogistikOld">
                            <small class="text-danger"><?= form_error('nama_logistik[]') ?></small>
                          </div>
                        </div>
                        <div class="col-md-3 pr-3">
                          <div class="form-group">
                            <input type="number" name="jumlah_logistik[]" id="" class="form-control" placeholder="Jumlah" value="<?= $lb['jumlah'] ?>">
                            <small class="text-danger"><?= form_error('jumlah_logistik[]') ?></small>
                          </div>
                        </div>

                      </div>
                      <?php endforeach ?>
                    </div>

                    <div class="col-md-12 pr-3">
                      <div class="row">
                        <div class="col-md-12">
                          <a href="javascript:void(0)" id="addButton" class="badge badge-success">Tambah jenis logistik</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 pr-3">
                        <div class="text-right">
                            <a href="<?= base_url('jenis_logistik') ?>" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- Footer -->
<?php $this->load->view('admin/templates/footer') ?>

<!-- Logout Modal-->
<?php $this->load->view('admin/templates/logout') ?>
<!--   Core JS Files   -->
<?php $this->load->view('admin/templates/js') ?>

    <!-- Additional JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <script>
      $(function() {
        let maxField = 10;
        let addButton = $('#addButton');
        let wrapper = $('#logistik_wrapper');
        var x = 1;

        $(addButton).click(function() {
          if(x < maxField) {
            x++;
            $(wrapper).append(
              `<div class="row">
                <div class="col-md-3 pr-3">
                  <div class="form-group">
                    <select name="jenis_logistik[]" id="jenis_logistik`+ x +`" class="form-control">
                      <option value="">Pilih jenis logistik</option>
                      <?php foreach($logistik as $data) : ?>
                        <option value="<?= $data['jenis'] ?>"><?= $data['jenis'] ?></option>
                      <?php endforeach ?>
                    </select>
                    <small class="text-danger"><?= form_error('jenis_logistik[]') ?></small>
                  </div>
                </div>
                <div class="col-md-3 pr-3">
                  <div class="form-group">
                    <select name="nama_logistik[]" id="nama_logistik`+ x +`" class="form-control">
                      <option value="">Pilih nama logistik</option>
                    </select>
                    <small class="text-danger"><?= form_error('nama_logistik[]') ?></small>
                  </div>
                </div>
                <div class="col-md-3 pr-3">
                  <div class="form-group">
                    <input type="number" name="jumlah_logistik[]" class="form-control" placeholder="Jumlah">
                    <small class="text-danger"><?= form_error('jumlah_logistik[]') ?></small>
                  </div>
                </div>
                <div class="col-md-2">
                  <a href="javascript:void(0)" id="removeButton" class="badge badge-danger">Hapus</a>
                </div>
              </div>`
            );

            $("#jenis_logistik"+x).change(function() {
              $.ajax({
                method: 'POST',
                url: "<?= base_url('api/logistik') ?>",
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

        $(wrapper).on('click', '#removeButton', function(e) {
          e.preventDefault();
          $(this).parent('div').parent('.row').remove();
          x--;
        })

        $("#jenis_logistik").ready(function() {
          $.ajax({
            method: 'POST',
            url: "<?= base_url('api/logistik/update') ?>",
            data: {jenis_logistik: $("#jenis_logistik").val()},
            dataType: 'json',
            success: function(response){
                
                var valueNamaOld = $("#namaLogistikOld").val();

                // console.log(valueNamaOld);
                // console.log(response);

                nama_log = "<option>Pilih nama logistik</option>";
                for(let key in response.nama_logistik) {
                  // console.log(response.nama_logistik[key]);
                  selected = key == valueNamaOld ? "selected" : "";
                  nama_log += "<option value='"+key+"'"+selected+">"+response.nama_logistik[key]+"</option>";
                }
                // console.log(nama_log);
                $('#nama_logistik').html(nama_log).show();
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);
            }
          });
        });
        
        $("#jenis_logistik").change(function() {
          $.ajax({
            method: 'POST',
            url: "<?= base_url('api/logistik') ?>",
            data: {jenis_logistik: $("#jenis_logistik").val()},
            dataType: 'json',
            success: function(response){
                
                var valueNamaOld = $("#namaLogistikOld").val();

                // console.log(valueNamaOld);
                // console.log(response);

                nama_log = "<option>Pilih nama logistik</option>";
                for(let key in response.nama_logistik) {
                  // console.log(response.nama_logistik[key]);
                  selected = key == valueNamaOld ? "selected" : "";
                  nama_log += "<option value='"+key+"'"+selected+">"+response.nama_logistik[key]+"</option>";
                }
                // console.log(nama_log);
                $('#nama_logistik').html(nama_log).show();
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);
            }
          });
        });

      });
    </script>

    <script>
      $(function(){

        $('#provinsi').select2();
        $('#desa').select2();
        $('#kecamatan').select2();
        $('#kota').select2();

        $("#provinsi").change(function(){

            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('api/kota') ?>",
                data: {provinsi: $("#provinsi").val()},
                dataType: "json",
                success: function(response){
                    $('#kota').html(response.kota).show();
                },
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);
                }
            });
        });

        $("#kota").change(function(){
          $.ajax({
              type: 'POST',
              url: "<?php echo base_url('api/kecamatan') ?>",
              data: {kota: $("#kota").val()},
              dataType: "json",
              success: function(response){
                  $('#kecamatan').html(response.kecamatan).show();
              },
              error: function(xhr, ajaxOptions, thrownError){
                  alert(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);
              }
          });
        });

        $("#kecamatan").change(function(){
          $.ajax({
              type: 'POST',
              url: "<?php echo base_url('api/desa') ?>",
              data: {kecamatan: $("#kecamatan").val()},
              dataType: "json",
              success: function(response){
                  $('#desa').html(response.desa).show();
              },
              error: function(xhr, ajaxOptions, thrownError){
                  alert(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);
              }
          });
        });

      });
    </script>
    
<?php $this->load->view('admin/templates/ender') ?>
