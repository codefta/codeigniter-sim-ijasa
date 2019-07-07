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
                <form action="<?= base_url('admin/infobencana/save') ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id_bencana" value="<?= $infobencana['id'] ?>">
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
                          <div class="col-md-12 mb-3">
                            <img src="<?= base_url().'uploads/infobencana/'.$infobencana['foto'] ?>" alt="" style="height: 250px; width:100%;">
                          </div>
                          <div class="col-md-12">
                            <div class="custom-file">
                              <input type="file" name="foto_bencana" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile">Ganti foto</label>
                            </div>
                            <input type="hidden" name="old_photo" value="<?= $infobencana['foto'] ?>">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                      <label><b>Korban Bencana</b></label>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Laki-laki</label>
                            <input type="number" name="laki" id="" class="form-control" placeholder="Jumlah" value="<?= $korban_bencana['laki'] ?>">
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Perempuan</label>
                            <input type="number" name="perempuan" id="" class="form-control" placeholder="Jumlah" value="<?= $korban_bencana['perempuan'] ?>">
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Anak-anak</label>
                            <input type="number" name="anak" id="" class="form-control" placeholder="Jumlah" value="<?= $korban_bencana['anak'] ?>">
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="col-md-12" id="logistik_wrapper">
                      <label><b>Kebutuhan Bencana</b></label>
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
                            <a href="<?= base_url('admin/infobencana') ?>" class="btn btn-danger">Batal</a>
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
      var x = 1;
      $(function() {
        $.ajax({
          method: 'POST',
          url: "<?= base_url('admin/infobencana/get_jenis_logistik') ?>",
          dataType: 'json',
          success: function(response){
              bencana(response.data);
          }
        });

        function nama_logistik() {

        }

        function bencana(jenis_logistik) {
          $.ajax({
          method: 'POST',
          url: "<?= base_url() ?>admin/infobencana/get_logistik_bencana/<?= $infobencana['id'] ?>",
          dataType: 'json',
          success: function(response) {
            var selected = '';
            var jenis_option = '';
            response.data.forEach(function(item, index){

              jenis_logistik.forEach(function(value, key) {
                if(item.jenis_logistik == value.jenis) {
                  selected = 'selected';
                } else {
                  selected = ' ';
                }
                
                jenis_option += '<option value="'+value.jenis+'" '+selected+'>'+value.jenis+'</option>';
              });

              console.log(jenis_option);
              getNamaLog(item.id_utama, item.id_logistik, item.jenis_logistik, item.nama, item.jumlah, jenis_option, x);
              
            x++;
            });

            addJenisLogistik(x);

            

          }
        });
        }
      }); 

      function removeButton(id) {
        

        $.ajax({
          method: "POST",
          url: "<?= base_url('admin/infobencana/remove_logistik_bencana/') ?>" + id,
          dataType: "json",
          success: function (response) {
            console.log(response.status);
            $("#btnRemove").parent('div').parent('.row').remove();
          }
        });
      }

      function getNamaLog(id_utama, id, jenis, nama, jumlah, jenis_option, x) {
        $.ajax({
          method: 'POST',
          url: "<?= base_url('admin/infobencana/get_nama_logistik/') ?>"+jenis,
          dataType: 'json',
          success: function(response){
            var selected = '';
            var nama_option = '';
            response.data.forEach(function(item, index) {
              if(item.nama == nama ) {
                selected = 'selected';
              }
              nama_option += '<option value='+item.id+' '+selected+'>'+item.nama+'</option>';
            });

            $("#logistik_wrapper").append(
              `<div class="row">
                <div class="col-md-3 pr-3">
                  <div class="form-group">
                    <select name="jenis_logistik[]" id="jenis_logistik`+x+`" class="form-control">
                      `+jenis_option+`
                    </select>
                    <input type="hidden" value="`+id_utama+`" name="id_utama[]">
                    <small class="text-danger"><?= form_error('jenis_logistik[]') ?></small>
                  </div>
                </div>
                <div class="col-md-3 pr-3">
                  <div class="form-group">
                    <select name="nama_logistik[]" id="nama_logistik`+x+`" class="form-control">
                      `+nama_option+`
                    </select>
                    <input type="hidden" value="`+id+`" name="id[]">
                    <small class="text-danger"><?= form_error('nama_logistik[]') ?></small>
                  </div>
                </div>
                <div class="col-md-3 pr-3">
                  <div class="form-group">
                    <input type="number" name="jumlah_logistik[]" class="form-control" placeholder="Jumlah" value="`+jumlah+`">
                    <small class="text-danger"><?= form_error('jumlah_logistik[]') ?></small>
                  </div>
                </div>
                <div class="col-md-2">
                  <button class="badge badge-danger" type="button" onclick="removeButton(`+id_utama+`)" id="btnRemove">Hapus</button>
                </div>
              </div>`
            );
          }
        });
      }

      function addJenisLogistik(x) {
        let maxField = 10;
        let addButton = $('#addButton');
        let wrapper = $('#logistik_wrapper');

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

        $("#jenis_logistik").change(function() {
          $.ajax({
            method: 'POST',
            url: "<?= base_url('api/logistik') ?>",
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
      }
    </script>

    <script>
      $(function(){

        $('#provinsi').select2();
        $('#desa').select2();
        $('#kecamatan').select2();
        $('#kota').select2();

        // kota
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('api/lokasi/daftar_kota_edit') ?>",
            data: {provinsi: $("#provinsi").val()},
            dataType: "json",
            success: function(response){
                // console.log(response.kota);

                let kota_option = "<option value=''>Pilih kota</option>";
                let current_kota = <?= $infobencana['kota_id'] ?>;
                response.kota.forEach(function (item, index){
                  let selected = "";

                  if(item.id == current_kota){
                    selected = 'selected';
                  }
                  kota_option += "<option "+selected+" value='"+item.id+"'>"+item.name+"</option>";
                })
                
                $("#kota").html(kota_option).show();

                get_kec();
                
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);
            }
        });

        // kecamatan
        // console.log($("#kota").val());
        function get_kec() {
          $.ajax({
              type: 'POST',
              url: "<?php echo base_url('api/lokasi/daftar_kecamatan_edit') ?>",
              data: {kota: $("#kota").val()},
              dataType: "json",
              success: function(response){
                  let kec_option = "<option value=''>Pilih kecamatan</option>";

                  let current_kecamatan = <?= $infobencana['kecamatan_id'] ?>;

                  response.kecamatan.forEach(function (item, index){
                    let selected = "";

                    if(item.id == current_kecamatan){
                      selected = 'selected';
                    }

                    kec_option += "<option "+selected+" value='"+item.id+"'>"+item.name+"</option>";
                  })
                  
                  $("#kecamatan").html(kec_option).show();
                  get_desa();
              },
              error: function(xhr, ajaxOptions, thrownError){
                  alert(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);
              }
          });
        }

        function get_desa() {
          $.ajax({
              type: 'POST',
              url: "<?php echo base_url('api/lokasi/daftar_desa_edit') ?>",
              data: {kecamatan: $("#kecamatan").val()},
              dataType: "json",
              success: function(response){
                let desa_option = "<option value=''>Pilih desa</option>";
                let current_desa= <?= $infobencana['desa_id'] ?>;

                response.desa.forEach(function (item, index){
                  let selected = "";

                  if(item.id == current_desa){
                    selected = 'selected';
                  }

                  desa_option += "<option "+selected+" value='"+item.id+"'>"+item.name+"</option>";
                })

                $("#desa").html(desa_option).show();
              },
              error: function(xhr, ajaxOptions, thrownError){
                  alert(xhr.status + "\n" + xhr.responseText + "\n" +thrownError);
              }
          });
        }

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
