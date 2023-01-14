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

    <style>
        #map {
            height: 70vh;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <?= $this->include('_Layout/_template/_umum/header'); ?>



    <!-- ISI CONTENT -->
    <section id="details-kafe" class="p-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg p-2">
                    <div class="product-imgs">
                        <div class="img-display">
                            <div class="img-showcase">
                                <?php $foto_kafe = explode(', ', $tampilKafe->nama_foto); ?>
                                <?php foreach ($foto_kafe as $foto) : ?>
                                    <img src="<?= base_url('/img/kafe/' . $foto); ?>" class="grid-item">
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="img-select">
                            <?php $foto_kafe = explode(', ', $tampilKafe->nama_foto); ?>
                            <?php $i = 1; ?>
                            <?php foreach ($foto_kafe as $foto) : ?>
                                <div class="img-item">
                                    <a href="#" data-id="<?= $i; ?>">
                                        <img src="<?= base_url('/img/kafe/' . $foto); ?>" class="grid-item">
                                    </a>
                                </div>
                                <?php $i++; ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg p-2">
                    <table class="table">
                        <thead class="thead-left">
                            <tr>
                                <th style="font-weight: 400; border-bottom-width: 1px; border-bottom-color: #dee2e6;">Nama Kafe</th>
                                <th style="border-bottom-width: 1px; border-bottom-color: #dee2e6;">:</th>
                                <th style="font-weight: 400; border-bottom-width: 1px; border-bottom-color: #dee2e6;"><?= $tampilKafe->nama_kafe; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Alamat</td>
                                <th>:</th>
                                <td><?= $tampilKafe->alamat_kafe; ?></td>
                            </tr>
                            <tr>
                                <td>Koordinat</td>
                                <th>:</th>
                                <td><?= $tampilKafe->latitude; ?>, <?= $tampilKafe->longitude; ?></td>
                            </tr>
                            <tr>
                                <td>Wilayah Administrasi</td>
                                <th>:</th>
                                <td><?= $tampilKafe->nama_kelurahan ?>, Kec. <?= $tampilKafe->nama_kecamatan ?>, <?= $tampilKafe->nama_kabupaten ?></td>
                            </tr>
                            <tr>
                                <td>Instagram</td>
                                <th>:</th>
                                <td><a href="https://www.instagram.com/<?= $tampilKafe->instagram_kafe ?>" target="_blank" rel="noopener noreferrer" class="d-inline-flex align-items-center">
                                        <span>@<?= $tampilKafe->instagram_kafe ?> <i class="ri-external-link-line"></i></span></a></td>
                            </tr>
                            <tr>
                                <td>Jam Oprasional</td>
                                <th>:</th>
                                <td><?php foreach ($tampilKafe->business_hours as $day => $times) : ?>
                                        <?= $open_close = ''; ?>
                                        <?php foreach ($times as $time) : ?>
                                            <?php $open = $time['open']; ?>
                                            <?php $close = $time['close']; ?>
                                            <?php if (!empty($open) && !empty($close)) : ?>
                                                <?php $open = date('h:i', strtotime($open)); ?>
                                                <?php $close = date('h:i', strtotime($close)); ?>
                                                <?php $open_close .= "$open-$close, "; ?>
                                            <?php else : ?>
                                                <?php $open_close .= "Tutup"; ?>
                                            <?php endif ?>
                                            <?php $open_close = rtrim($open_close, ", "); ?>
                                            <?php $result[$day] = $open_close; ?>
                                            <div class="mb-2 row">
                                                <div class="col-lg-3 col-4 label "><?= $day; ?></div>
                                                <div class="col-lg-9 col-8"><?= $open_close; ?></div>
                                            </div>
                                        <?php endforeach ?>
                                    <?php endforeach ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Kontak</td>
                                <th>:</th>
                                <td> ?? </td>
                            </tr>
                            <?php if (in_groups('SuperAdmin') || in_groups('Admin')) :; ?>
                                <tr>
                                    <td>Updated at</td>
                                    <th>:</th>
                                    <td><?= date('d M Y H:i:s', strtotime($tampilKafe->updated_at)); ?></td>
                                </tr>
                                <tr>
                                    <td>User by</td>
                                    <th>:</th>
                                    <td><?= $tampilKafe->user; ?></td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>


    <section id="">
        <div class="map" id="map"></div>
    </section>

    <!-- END ISI CONTENT -->



    <!-- FOOTER -->
    <?= $this->include('_Layout/_template/_umum/footer'); ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>
    <script>
        const imgs = document.querySelectorAll('.img-select a');
        const imgBtns = [...imgs];
        let imgId = 1;

        imgBtns.forEach((imgItem) => {
            imgItem.addEventListener('click', (event) => {
                event.preventDefault();
                imgId = imgItem.dataset.id;
                slideImage();
            });
        });

        function slideImage() {
            const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

            document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
        }

        window.addEventListener('resize', slideImage);
    </script>

    <!-- Leafleat js Component -->
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
    <script src="https://unpkg.com/geojson-vt@3.2.0/geojson-vt.js"></script>
    <script src="/leaflet/leaflet-geojson-vt.js"></script>
    <script src="/leaflet/leaflet.ajax.min.js"></script>
    <script src="/leaflet/leaflet.ajax.js"></script>
    <script src="/leaflet/L.Control.MousePosition.js"></script>
    <script src="//unpkg.com/leaflet-gesture-handling"></script>

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
        var map = L.map('map', {
            center: [<?= $tampilKafe->latitude; ?>, <?= $tampilKafe->longitude; ?>],
            zoom: 18,
            layers: [peta1],
            gestureHandling: true,
        })

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
            iconSize: [40, 40],
            iconAnchor: [20, 40], // point of the icon which will correspond to marker's location
            popupAnchor: [0, -38] // point from which the popup should open relative to the iconAnchor
        });

        L.marker([<?= $tampilKafe->latitude; ?>, <?= $tampilKafe->longitude; ?>], {
            icon: locKafe
        }).addTo(map).bindPopup("<b><?= $tampilKafe->nama_kafe; ?></b></br><?= $tampilKafe->alamat_kafe; ?>").openPopup();
    </script>

</body>

</html>