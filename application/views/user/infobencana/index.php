
  <!-- Header -->
  <?php $this->load->view('user/templates/header') ?>

  <!-- Navigation -->
  <?php $this->load->view('user/templates/navbar-other') ?>

  <!-- Projects Section -->
  <section id="infobencana" class=" mt-5 projects-section pt-5" style="background-color: #f5f6fa">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="row">
            <div class="col-md-12">
                <h3 class="text-center"><b><?= $infobencana['nama']  ?></b></h3>
            </div>
            </div>
            <hr>
        </div>
        <div class="col-md-7 mb-4">
            <div class="card shadow border-0">
                <div class="card-body">
                    <img class="" style="height: 30vw; width:100%" src="<?= base_url().'uploads/infobencana/'.$infobencana['foto'] ?>" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-5 mb-4">
            <div class="row">
                <div class="col-md-12" style="margin-bottom:20%;">
                    <p style="font-size: 30px"><b>Yuk Bantu teman kita dengan mengirim logistik ke daerah terkena dampak bencana</b></p>
                    <!-- <a href="#kebutuhanbencana" class="btn btn-info p-1">Lihat kebutuhan logistik bencana</a>  -->
                </div>
                <div class="col-md-12 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#kebutuhanBencana" class="btn btn-info p-3 js-scroll-trigger">Lihat kebutuhan</a>
                        </div>
                        <div class="col-md-6">
                            <a href="<?= base_url('donasi/detail/').$infobencana['id'] ?>" class="btn btn-success p-3">Donasi Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    Penggalangan donasi logistik bencana dimulai pada <b><?= $infobencana['created_at'] ?></b>  oleh:
                    <hr>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <i class="fas fa-user-circle p-0" style="font-size: 30px; color:grey"></i> <span style="font-size: 36px ; color:grey" class="align-middle pb-3">BPBD</span>
                        </div>
                        <div class="col-md-3 ml-2 ">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-3">
            
            <div class="card shadow border-0">
                <div class="card-body">
                    <h4><b>Keterangan</b></h4>
                    <p><?= $infobencana['deskripsi'] ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <div class="card shadow border-0">
            
                <div class="card-body">
                    <h4><b>Lokasi</b></h4>
                    <input type="text" id="posisi" value="<?php echo $infobencana['desa'] . ", ". $infobencana['kecamatan'] .", " . $infobencana['kota'] . ", ". $infobencana['provinsi'] ?>" readonly class="form-control">
                    <div id="map" style="width:100%; height:300px; background:grey" ></div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-3" id="kebutuhanBencana">
            <div class="card shadow border-0">
            <div class="card-body">
                <h4><b>Kebutuhan</b></h4>
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

        <!-- <div class="col-md-12">
             <div class="float-left">
            </div>
            <div class="float-right">
                <a href="" class="btn btn-info pb-3 pt-3 pl-5 pr-5">Kembali</a>
                <a href="" class="btn btn-success pb-3 pt-3 pl-5 pr-5">Donasi Sekarang</a>
            </div>
        </div> -->
      </div>

    </div>
  </section>

  <!-- Footer -->
  <?php $this->load->view('user/templates/footer') ?>
  <!-- JS -->
  <?php $this->load->view('user/templates/js') ?>
  <!-- JS - Add-On -->

    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>

<script>
    function geocode(platform) {
    var geocoder = platform.getGeocodingService(),
        geocodingParameters = {
        searchText: document.getElementById('posisi').value,
        jsonattributes : 1
        };
    geocoder.geocode(
        geocodingParameters,
        onSuccess,
        onError
    );
    }
    /**
    * This function will be called once the Geocoder REST API provides a response
    * @param  {Object} result          A JSONP object representing the  location(s) found.
    *
    * see: http://developer.here.com/rest-apis/documentation/geocoder/topics/resource-type-response-geocode.html
    */
    function onSuccess(result) {
    var locations = result.response.view[0].result;
    /*
    * The styling of the geocoding response on the map is entirely under the developer's control.
    * A representitive styling can be found the full JS + HTML code of this example
    * in the functions below:
    */
    addLocationsToMap(locations);
    addLocationsToPanel(locations);
    // ... etc.
    }
    /**
    * This function will be called if a communication error occurs during the JSON-P request
    * @param  {Object} error  The error message received.
    */
    function onError(error) {
    alert('Ooops!');
    }
    /**
    * Boilerplate map initialization code starts below:
    */
    //Step 1: initialize communication with the platform
    var platform = new H.service.Platform({
    app_id: 'zoDHH444a9wiHiHbqjC8',
    app_code: 'oV6qmg31FHGur7Cwm3Hlcg',
    useHTTPS: true
    });
    var pixelRatio = window.devicePixelRatio || 1;
    var defaultLayers = platform.createDefaultLayers({
    tileSize: pixelRatio === 1 ? 256 : 512,
    ppi: pixelRatio === 1 ? undefined : 320
    });
    //Step 2: initialize a map - this map is centered over California
    var map = new H.Map(document.getElementById('map'),
    defaultLayers.normal.map,{
    center: {lat:37.376, lng:-122.034},
    zoom: 15,
    pixelRatio: pixelRatio
    });
    var locationsContainer = document.getElementById('panel');
    //Step 3: make the map interactive
    // MapEvents enables the event system
    // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
    var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
    // Create the default UI components
    var ui = H.ui.UI.createDefault(map, defaultLayers);
    // Hold a reference to any infobubble opened
    var bubble;
    /**
    * Opens/Closes a infobubble
    * @param  {H.geo.Point} position     The location on the map.
    * @param  {String} text              The contents of the infobubble.
    */
    function openBubble(position, text){
    if(!bubble){
        bubble =  new H.ui.InfoBubble(
        position,
        {content: text});
        ui.addBubble(bubble);
    } else {
        bubble.setPosition(position);
        bubble.setContent(text);
        bubble.open();
    }
    }
    /**
    * Creates a series of list items for each location found, and adds it to the panel.
    * @param {Object[]} locations An array of locations as received from the
    *                             H.service.GeocodingService
    */
    function addLocationsToPanel(locations){
    var nodeOL = document.createElement('ul'),
        i;
    nodeOL.style.fontSize = 'small';
    nodeOL.style.marginLeft ='5%';
    nodeOL.style.marginRight ='5%';
    for (i = 0;  i < locations.length; i += 1) {
        var li = document.createElement('li'),
            divLabel = document.createElement('div'),
            address = locations[i].location.address,
            content =  '<strong style="font-size: large;">' + address.label  + '</strong></br>';
            position = {
            lat: locations[i].location.displayPosition.latitude,
            lng: locations[i].location.displayPosition.longitude
            };
        content += '<strong>houseNumber:</strong> ' + address.houseNumber + '<br/>';
        content += '<strong>street:</strong> '  + address.street + '<br/>';
        content += '<strong>district:</strong> '  + address.district + '<br/>';
        content += '<strong>city:</strong> ' + address.city + '<br/>';
        content += '<strong>postalCode:</strong> ' + address.postalCode + '<br/>';
        content += '<strong>county:</strong> ' + address.county + '<br/>';
        content += '<strong>country:</strong> ' + address.country + '<br/>';
        content += '<br/><strong>position:</strong> ' +
            Math.abs(position.lat.toFixed(4)) + ((position.lat > 0) ? 'N' : 'S') +
            ' ' + Math.abs(position.lng.toFixed(4)) + ((position.lng > 0) ? 'E' : 'W');
        divLabel.innerHTML = content;
        li.appendChild(divLabel);
        nodeOL.appendChild(li);
    }
    locationsContainer.appendChild(nodeOL);
    }
    /**
    * Creates a series of H.map.Markers for each location found, and adds it to the map.
    * @param {Object[]} locations An array of locations as received from the
    *                             H.service.GeocodingService
    */
    function addLocationsToMap(locations){
    var group = new  H.map.Group(),
        position,
        i;
    // Add a marker for each location found
    for (i = 0;  i < locations.length; i += 1) {
        position = {
        lat: locations[i].location.displayPosition.latitude,
        lng: locations[i].location.displayPosition.longitude
        };
        marker = new H.map.Marker(position);
        marker.label = locations[i].location.address.label;
        group.addObject(marker);
    }
    group.addEventListener('tap', function (evt) {
        map.setCenter(evt.target.getPosition());
        openBubble(
        evt.target.getPosition(), evt.target.label);
    }, false);
    // Add the locations group to the map
    map.addObject(group);
    map.setCenter(group.getBounds().getCenter());
    }
    // Now use the map as required...
    geocode(platform);
    </script>
  <!-- Ender -->
  <?php $this->load->view('user/templates/ender') ?>