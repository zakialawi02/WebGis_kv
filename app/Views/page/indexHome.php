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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

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
    <section id="home">
        <div class="container-fluid hero-header bg-light py-5" id="hero">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="hero-content">
                        <h1>Selamat Datang di WebGIS Kafe Surabaya</h1>
                        <p>Jelajahi Kafe-kafe Terbaik, Mulai dari yang Klasik Hingga yang Trendi.</p>
                        <a href="#discovery" class="btn btn-primary p-2">Mulai Jelajahi</a>
                    </div>
                    <!-- <div class="col-lg-6 animated fadeIn">
                    <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="img/hero.png" alt="">
                </div> -->
                </div>
            </div>
        </div>
    </section>

    <!-- Hdeader End -->

    <!-- Discovery -->
    <section id="discovery">
        <div class="container-fluid bg-light discovery fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="pt-3 pb-2">
                    <h2>Kafe Discover</h2>
                </div>

                <div class="cards-list">
                    <?php foreach ($randomFour as $rand) : ?>
                        <div class="card <?= $rand->id_kafe; ?> cardDiscover">
                            <div class="card_image"> <img src="/img/kafe/<?= is_array($rand->nama_file_foto) ? $rand->nama_file_foto[0] : $rand->nama_file_foto; ?>" /> </div>
                            <div class="card_title title-white">
                                <a href="/kafe/<?= $rand->id_kafe; ?>/detail">
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
                            <h2>Persebaran Kafe</h2>
                            <p>Dapatkan Gambaran Menarik Tentang Beragam Lokasi Kafe di Kota Ini dan Potensi yang ada.</p>
                            <p>Melalui Peta Interaktif, Anda Dapat Melihat Sekilas Di Mana Kafe-kafe Menarik Berada.</p>
                            <button type="button" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe-asia-australia" viewBox="0 0 16 16">
                                    <path d="m10.495 6.92 1.278-.619a.483.483 0 0 0 .126-.782c-.252-.244-.682-.139-.932.107-.23.226-.513.373-.816.53l-.102.054c-.338.178-.264.626.1.736a.476.476 0 0 0 .346-.027ZM7.741 9.808V9.78a.413.413 0 1 1 .783.183l-.22.443a.602.602 0 0 1-.12.167l-.193.185a.36.36 0 1 1-.5-.516l.112-.108a.453.453 0 0 0 .138-.326ZM5.672 12.5l.482.233A.386.386 0 1 0 6.32 12h-.416a.702.702 0 0 1-.419-.139l-.277-.206a.302.302 0 1 0-.298.52l.761.325Z"></path>
                                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM1.612 10.867l.756-1.288a1 1 0 0 1 1.545-.225l1.074 1.005a.986.986 0 0 0 1.36-.011l.038-.037a.882.882 0 0 0 .26-.755c-.075-.548.37-1.033.92-1.099.728-.086 1.587-.324 1.728-.957.086-.386-.114-.83-.361-1.2-.207-.312 0-.8.374-.8.123 0 .24-.055.318-.15l.393-.474c.196-.237.491-.368.797-.403.554-.064 1.407-.277 1.583-.973.098-.391-.192-.634-.484-.88-.254-.212-.51-.426-.515-.741a6.998 6.998 0 0 1 3.425 7.692 1.015 1.015 0 0 0-.087-.063l-.316-.204a1 1 0 0 0-.977-.06l-.169.082a1 1 0 0 1-.741.051l-1.021-.329A1 1 0 0 0 11.205 9h-.165a1 1 0 0 0-.945.674l-.172.499a1 1 0 0 1-.404.514l-.802.518a1 1 0 0 0-.458.84v.455a1 1 0 0 0 1 1h.257a1 1 0 0 1 .542.16l.762.49a.998.998 0 0 0 .283.126 7.001 7.001 0 0 1-9.49-3.409Z"></path>
                                </svg>
                                Mulai Petualangan !!
                            </button>
                        </div>
                        <div class="col-md-8">
                            <div class="map" id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about" id="about" style="min-height: 20vh;">
        <div class="container p-5">
            <h2>About</h2>
            <div class="row g-2 p-md-3 m-1">
                <div class="col-md-7">
                    <h3>Hello</h3>
                    <p>Kami memahami bahwa Surabaya adalah kota yang kaya akan keanekaragaman kafe dengan suasana yang unik dan cita rasa yang menggoda. Dengan misi untuk memudahkan pengunjung dalam menemukan pengalaman kafe yang tak terlupakan, kami menghadirkan peta WebGIS interaktif yang memudahkan Anda dalam menjelajahi berbagai kafe yang tersebar di seluruh Surabaya.</p>
                    <p>Kami juga memberikan kesempatan kepada pengguna untuk berpartisipasi dengan menambahkan informasi tentang kafe-kafe yang belum terdaftar, sehingga dapat membantu komunitas kafe di Surabaya berkembang dan tumbuh.</p>
                </div>
                <div class="col col-md-5">
                    <h3>Heloo</h3>
                    <div class="col-lg-6 animated fadeIn">
                        <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="img/hero.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Map End -->

    <!-- FOOTER -->
    <?= $this->include('_Layout/_template/_umum/footer'); ?>



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src="assets/js/main.js"></script>


    <!-- Leafleat js Component -->
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
    <script src="https://unpkg.com/geojson-vt@3.2.0/geojson-vt.js"></script>
    <script src="/leaflet/leaflet-geojson-vt.js"></script>
    <script src="/leaflet/leaflet.ajax.min.js"></script>
    <script src="/leaflet/leaflet.ajax.js"></script>
    <script src="/leaflet/leaflet.featuregroup.subgroup.js"></script>
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
                attributionControl: false,
                gestureHandling: true,
            })
        <?php endforeach ?>

        // controller
        var baseLayers = {
            "Map": peta1,
            "Satellite": peta2,
            "OSM": peta3,
        };



        // set marker place
        var locKafe = L.icon({
            iconUrl: '<?= base_url(); ?>/leaflet/icon/restaurant_breakfast.png',
            iconSize: [30, 30],
            iconAnchor: [18.5, 30], // point of the icon which will correspond to marker's location
            popupAnchor: [0, -28] // point from which the popup should open relative to the iconAnchor
        });
        <?php foreach ($tampilKafe as $K) : ?>
            var marker = L.marker([<?= $K->latitude; ?>, <?= $K->longitude; ?>], {
                icon: locKafe
            }).addTo(map).bindPopup("<b><?= $K->nama_kafe; ?></b></br><?= $K->alamat_kafe; ?>");
        <?php endforeach ?>
    </script>
</body>

</html>