<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- leaflet Component -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
    <link href="/leaflet/L.Control.MousePosition.css" rel="stylesheet">
    <link rel="stylesheet" href="//unpkg.com/leaflet-gesture-handling/dist/leaflet-gesture-handling.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />

    <style>
        #map {
            height: 80vh;
        }
    </style>

</head>

<body>

    <!-- HEADER -->
    <?= $this->include('_Layout/_template/_umum/header'); ?>



    <!-- ISI CONTENT -->
    <div class="pt-3"></div>
    <section class="sebaran">
        <div class="row p-4">
            <div class="col-md-3 p-2 sebaran-kafe">
                <div class="pt-2"></div>
                <h3 class="p-2 text-center" style="font-size: 1.2rem;">Informasi</h3>

                <input type="checkbox"> Batas Wilayah</br>
                <input type="checkbox"> Coffe Shop</br>

            </div>
            <div class="col-md-9 p-2 sebaran-kafe">
                <h2 class="text-center p-2" style="font-size: 1.8rem;">Peta Persebaran Kafe</h2>
                <button id="btnAddCircle" class="btn btn-dark p-2">Tambah Lingkaran</button>
                <input type="number" id="radiusInput" value="1000">
                <div class="map" id="map"></div>
            </div>
        </div>
    </section>




    <!-- END ISI CONTENT -->



    <!-- FOOTER -->
    <?= $this->include('_Layout/_template/_umum/footer'); ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>



    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

    <!-- Leafleat js Component -->
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
    <script src="https://unpkg.com/geojson-vt@3.2.0/geojson-vt.js"></script>
    <script src="/leaflet/leaflet-geojson-vt.js"></script>
    <script src="/leaflet/leaflet.ajax.min.js"></script>
    <script src="/leaflet/leaflet.ajax.js"></script>
    <script src="/leaflet/L.Control.MousePosition.js"></script>
    <script src="//unpkg.com/leaflet-gesture-handling"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>


    <!-- Leafleat Setting js-->
    <!-- initialize the map on the "map" div with a given center and zoom -->
    <script>
        // Base map
        var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiNjg2MzUzMyIsImEiOiJjbDh4NDExZW0wMXZsM3ZwODR1eDB0ajY0In0.6jHWxwN6YfLftuCFHaa1zw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            maxZoom: 22,
            maxNativeZoom: 19
        });

        var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiNjg2MzUzMyIsImEiOiJjbDh4NDExZW0wMXZsM3ZwODR1eDB0ajY0In0.6jHWxwN6YfLftuCFHaa1zw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/satellite-v9',
            maxZoom: 22,
            maxNativeZoom: 19
        });

        var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            maxZoom: 22,
            maxNativeZoom: 19
        });

        var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiNjg2MzUzMyIsImEiOiJjbDh4NDExZW0wMXZsM3ZwODR1eDB0ajY0In0.6jHWxwN6YfLftuCFHaa1zw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/dark-v10',
            maxZoom: 22,
            maxNativeZoom: 19
        });

        // set frame view
        <?php foreach ($tampilData as $D) : ?>
            var map = L.map('map', {
                center: [<?= $D->coordinat_wilayah; ?>],
                zoom: <?= $D->zoom_view; ?>,
                layers: [peta1],
                minZoom: 3,
                maxZoom: 22,
                maxNativeZoom: 19,
                gestureHandling: true,
            })
        <?php endforeach ?>

        // controller
        var baseLayers = {
            "Map": peta1,
            "Satellite": peta2,
            "OSM": peta3,
        };

        L.control.layers(baseLayers).addTo(map);
        L.control.locate({
            flyTo: true,
        }).addTo(map);
        L.control.mousePosition().addTo(map);
        L.control.scale().addTo(map);


        // set marker place
        var locMe = L.icon({
            iconUrl: '<?= base_url(); ?>/leaflet/images/locMe.png',
            iconSize: [40, 40],
            iconAnchor: [20, 40], // point of the icon which will correspond to marker's location
            popupAnchor: [0, -36] // point from which the popup should open relative to the iconAnchor
        });
        var locKafe = L.icon({
            iconUrl: '<?= base_url(); ?>/leaflet/icon/restaurant_breakfast.png',
            iconSize: [30, 30],
            iconAnchor: [18.5, 30], // point of the icon which will correspond to marker's location
            popupAnchor: [0, -28] // point from which the popup should open relative to the iconAnchor
        });

        <?php foreach ($tampilKafe as $K) : ?>
            L.marker([<?= $K->coordinate; ?>], {
                icon: locKafe
            }).addTo(map).bindPopup("<b><?= $K->nama_kafe; ?></b></br><?= $K->alamat_kafe; ?>");
        <?php endforeach ?>

        // Titik koordinat pusat yang akan digunakan sebagai acuan dalam filter
        var centerLat = -7.2753924;
        var centerLng = 112.7271528;

        // Jarak radius dalam kilometer
        var radius = 10;

        // Buat objek circle dengan radius yang ditentukan
        var circle = L.circle([centerLat, centerLng], {
            radius: radius * 1000 // konversi dari km ke m
        }).addTo(map);

        // Filter data titik koordinat yang berada dalam lingkaran
        var filteredPoints = points.filter(function(point) {
            return circle.getBounds().contains([point.lat, point.lng]);
        });
    </script>
    <script>
        $(document).ready(function() {
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
            }
            var marker;
            var circle;

            function showPosition(position) {
                // console.log(position)
                console.log('Route Sekarang', position.coords.latitude, position.coords.longitude, position.coords.accuracy)
                let lat = position.coords.latitude
                let long = position.coords.longitude
                let accuracy = position.coords.accuracy
                if (marker) {
                    map.removeLayer(marker)
                }
                // if (circle) {
                //     map.removeLayer(circle)
                // }

                marker = L.marker([lat, long], {
                    icon: locMe
                })
                // circle = L.circle([lat, long], {
                //     radius: accuracy,
                //     fillOpacity: 0.1,
                // })
                var featureGroup = L.featureGroup([marker]).addTo(map);
            }
            getLocation();

            $("#btnAddCircle").click(function() {
                // ambil nilai radius dari input
                var radius = $("#radiusInput").val();
                // dapatkan lokasi pengguna
                navigator.geolocation.getCurrentPosition(function(position) {
                    // ambil koordinat pengguna
                    var lat = position.coords.latitude;
                    var long = position.coords.longitude;

                    // tambahkan lingkaran dengan radius yang dimasukkan ke peta
                    if (circle) {
                        map.removeLayer(circle)
                    }
                    circle = L.circle([lat, long], {
                        radius: radius,
                        color: '#217d74',
                        fillColor: '#217d74',
                        fillOpacity: 0.2,
                    }).addTo(map);

                    // Loop through the rows of the result set
                    while ($row = $result => getRow()) {
                        // Extract the latitude and longitude from the database
                        $kafe_lat = $row['coordinate']['lat'];
                        $kafe_lng = $row['coordinate']['lng'];
                        $nama_kafe = $row['nama_kafe'];
                        $alamat_kafe = $row['alamat_kafe'];
                    }

                });
            });
        });
    </script>


</body>

</html>