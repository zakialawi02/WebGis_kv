<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- leaflet Component -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
    <link href="/leaflet/L.Control.MousePosition.css" rel="stylesheet">
    <link rel="stylesheet" href="//unpkg.com/leaflet-gesture-handling/dist/leaflet-gesture-handling.min.css" type="text/css">

    <style>
        #map {
            height: 70vh;
            border-radius: 20px;
        }
    </style>

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- NAVBAR HEADER -->
    <?= $this->include('_Layout/_template/_umum/header'); ?>

    <!-- ISI CONTENT -->
    <!-- ======= Hero Section ======= -->
    <div class="container-fluid hero-header bg-light py-5" id="hero">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="hero-content">
                    <h1>WebGIS Kafe</h1>
                    <p>Temukan kafe terdekat dan jelajahi menu-menu yang tersedia dengan WebGIS Kafe</p>
                    <a href="#discovery" class="btn btn-primary p-2">Mulai Jelajahi</a>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="img/hero-1.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Hdeader End -->

    <!-- Discovery -->
    <section id="discovery">
        <div class="container-fluid bg-light discovery fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="pt-5 pb-2">
                    <h2>Discovery</h2>
                </div>

                <div class="cards-list">
                    <?php foreach ($randomFour as $rand) : ?>
                        <div class="card <?= $rand->id_kafe; ?>">
                            <div class="card_image"> <img src="https://i.redd.it/b3esnz5ra34y.jpg" /> </div>
                            <div class="card_title title-white">
                                <a href="#">
                                    <p><?= $rand->nama_kafe; ?></p>
                                </a>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Discovery End -->

    <!-- Map -->
    <section id="discovery">
        <div class="container-fluid bg-light discovery fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="container card-map" style="width: 100%;">
                    <div class="row">
                        <div class="p-5 col-md-4">
                            <h2>Heading</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at dignissim velit. Praesent dictum auctor neque non suscipit. Duis lobortis arcu eu sapien condimentum, a placerat leo elementum. Suspendisse potenti. Ut sollicitudin leo metus sit amet metus.</p>
                        </div>
                        <div class="col-md-8">
                            <div class="map" id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Map End -->

    <!-- FOOTER -->
    <?= $this->include('_Layout/_template/_umum/footer'); ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/wow/wow.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="assets/js/main.js"></script>


    <!-- Leafleat js Component -->
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
    <script src="https://unpkg.com/geojson-vt@3.2.0/geojson-vt.js"></script>
    <script src="/leaflet/leaflet-geojson-vt.js"></script>
    <script src="/leaflet/leaflet.ajax.min.js"></script>
    <script src="/leaflet/leaflet.ajax.js"></script>
    <script src="/leaflet/L.Control.MousePosition.js"></script>
    <script src="//unpkg.com/leaflet-gesture-handling"></script>
    <script src="https://unpkg.com/leaflet.featuregroup.subgroup@1.0.2/dist/leaflet.featuregroup.subgroup.js"></script>

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
            zoomOffset: -1
        });

        var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiNjg2MzUzMyIsImEiOiJjbDh4NDExZW0wMXZsM3ZwODR1eDB0ajY0In0.6jHWxwN6YfLftuCFHaa1zw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/satellite-v9'
        });

        var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });

        var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiNjg2MzUzMyIsImEiOiJjbDh4NDExZW0wMXZsM3ZwODR1eDB0ajY0In0.6jHWxwN6YfLftuCFHaa1zw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/dark-v10'
        });

        // set frame view
        <?php foreach ($tampilData as $D) : ?>
            var map = L.map('map', {
                center: [<?= $D->coordinat_wilayah; ?>],
                zoom: <?= $D->zoom_view; ?>,
                layers: [peta1],
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
        L.control.mousePosition().addTo(map);
        L.control.scale().addTo(map);


        // set marker place
        var locKafe = L.icon({
            iconUrl: '<?= base_url(); ?>/leaflet/icon/restaurant_breakfast.png',
            iconSize: [30, 30],
            iconAnchor: [18.5, 30], // point of the icon which will correspond to marker's location
            popupAnchor: [0, -28] // point from which the popup should open relative to the iconAnchor
        });

        <?php foreach ($tampilKafe as $K) : ?>
            L.marker([<?= $K->latitude; ?>, <?= $K->longitude; ?>], {
                icon: locKafe
            }).addTo(map).bindPopup("<b><?= $K->nama_kafe; ?></b></br><?= $K->alamat_kafe; ?>");
        <?php endforeach ?>
    </script>
</body>

</html>