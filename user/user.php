<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />
    <script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }
    </style>

    <title>NGOPSKUY</title>
  </head>
  <body>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.css" type="text/css" />
    <!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">NGOPSKUY</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="user.php">Peta<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="info.php">Info Detail</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="card">
      <div class="card-body text-center"> 
        MAPS NGOPSKUY
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </div>    
      <div id='map' style="width: 100%; height: 100%;"></div>
      <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiYXJ5YWFibXkiLCJhIjoiY2s4cGtxZTdpMWhtazNybDN0aHN2YnI2MiJ9._cuXcydWOhFn4q1KvnAuWQ';
        var map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/mapbox/streets-v11?optimize=true', // stylesheet location
        //center: [106.975416, -6.241195], // starting position
        center: [112.600807,-7.953494],
        zoom: 11 // starting zoom
        });

        var nav = new mapboxgl.NavigationControl();
        map.addControl(nav, 'top-left');
        map.addControl(new mapboxgl.GeolocateControl({
          positionOptions: {
            enableHighAccuracy: true
          },
          trackUserLocation: true
        }));
        map.addControl(
          new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
          })
          );

        map.loadImage(
          'marker.png',
          function(error, image) {
            if (error) throw error;
            map.addImage('tanda', image);

            var marker = {
              type: 'FeatureCollection',
              features: [{
                type: 'Feature',
                properties: {
                  Name: '',
                  Max : '',
                  Tersedia : ''
                },
                geometry: {
                  type: 'Point',
                  coordinates: []
                }
              }]
            };


            <?php
            include 'koneksi.php';
            $query = mysqli_query($koneksi, "SELECT * FROM data_location");
            while ($data = mysqli_fetch_array($query)) {

              $name = $data['nama'];
              $max = $data['max_cap'];
              $tersedia = $data['curr_cap'];
              $type = "Point";
              $coorX = $data['lon'];
              $coorY = $data['lat'];
              ?>
              data = {
                type: 'Feature',
                properties: {
                  Name: '<?= $name ?>',
                  Max : '<?= $max ?>',
                  Tersedia : '<?= $tersedia ?>'
                },
                geometry: {
                  type: 'Point',
                  coordinates: [<?= $coorX ?>, <?= $coorY ?>]
                }
              };
              marker.features.push(data)
            <?php } ?>

            map.on('load', function() {
              map.addLayer({
                id: 'marker',
                type: 'symbol',
                source: {
                  type: 'geojson',
                  data: marker
                },
                layout: {
                  'icon-image': 'tanda',
                  'icon-size': 0.15
                // 'icon-allow-overlap': true
                },
                  paint: {}
                });;
            });

          }
          );



        map.on('mousemove', function(e) {

          var features = map.queryRenderedFeatures(e.point, {
            layers: ['marker']
          });
          if (!features.length) {
            popup.remove();
            return;
          }

          var popup = new mapboxgl.Popup();
          var feature = features[0];

          popup.setLngLat(feature.geometry.coordinates)
          .setHTML('<h3>' +
            feature.properties.Name +
            '</h3><p>' +
            'Kapasitas Maksimal: ' + feature.properties.Max+ '<br>' +
            'Pengunjung Saat ini: ' + feature.properties.Tersedia+
            '</p>'
            )
          .addTo(map);

          map.getCanvas().style.cursor = features.length ? 'pointer' : '';

        });
      </script>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>