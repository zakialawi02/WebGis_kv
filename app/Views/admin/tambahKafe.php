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
    <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="/css/StyleAdmin.css" rel="stylesheet">

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
    <?= $this->include('_Layout/_template/_admin/header'); ?>


    <!-- SIDEBAR -->
    <?= $this->include('_Layout/_template/_admin/sidebar'); ?>



    <!-- MAIN ISI -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1><?= $title; ?></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Blank</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">

                        <div class="card-body">
                            <h3 class="card-title">Tambah Data</h3>

                            <form class="row g-3" action="/admin/tambah_Kafe" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>

                                <?php if (in_groups('User')) : ?>
                                    <input type="hidden" class="form-control" for="stat_appv" id="stat_appv" name="stat_appv" value="0">
                                <?php else : ?>
                                    <input type="hidden" class="form-control" for="stat_appv" id="stat_appv" name="stat_appv" value="1">
                                <?php endif ?>

                                <div class="form-group">
                                    <label for="nama_kafe" class="form-label">Nama Kafe</label>
                                    <input type="text" class="form-control" id="nama_kafe" aria-describedby="textlHelp" name="nama_kafe" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_kafe" class="form-label">Alamat Kafe</label>
                                    <input type="text" class="form-control" id="alamat_kafe" aria-describedby="textlHelp" name="alamat_kafe" required>
                                </div>
                                <div class="form-group">
                                    <label for="coordinate" class="form-label">Koordinat</label>
                                    <input type="text" class="form-control" id="coordinate" aria-describedby="textlHelp" name="coordinate" value="" pattern="^(\-?\d+(\.\d+)?),\s*(\-?\d+(\.\d+)?)$" title="Tuliskan Sesuai Format Contoh" required>
                                    <div id="FileHelp" class="form-text">example: -7.0385384, 112.8998345</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Wilayah Administrasi</label>
                                    <select class="form-control" id="wilayah" name="wilayah" value="" required>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="fasilitas_kafe" class="form-label">Fasilitas</label>
                                    <div>
                                        <input class="form-check-input" type="checkbox" name="fasil[]" value="Reading"> Reading<br>
                                        <input class="form-check-input" type="checkbox" name="fasil[]" value="Writing"> Writing<br>
                                        <input class="form-check-input" type="checkbox" name="fasil[]" value="Coding"> Coding<br>
                                    </div>
                                </div>

                                <label for="instagram_kafe" class="form-label">Instagram</label>
                                <div class="input-group form-group mt-1">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="text" class="form-control" id="instagram_kafe" name="instagram_kafe" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <a class="btn btn-primary" onclick="setTimeToMonday()" role=" button">Link</a>
                                <div class="row mb-3">
                                    <div class="col-2">
                                        <h5 id="dayTitle">Senin</h5>
                                        <label class="toggle toggle-alternative">
                                            <input type="checkbox" id="checkboxB1" class="checkbox" name="day[]" onclick="senin()" checked />
                                            <span class="toggle-text"></span>
                                            <span class="toggle-handle"></span>
                                        </label>
                                    </div>
                                    <div class="row col" id="jamSenin">
                                        <div class="col col-4">
                                            <label for="open-time">Jam Buka:</label>
                                            <input type="time" class="form-control" id="openSenin" name="open-time[]" checked>
                                        </div>
                                        <div class="col col-4">
                                            <label for="close-time">Jam Tutup:</label>
                                            <input type="time" class="form-control" id="closeSenin" name="close-time[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2">
                                        <h5 id="dayTitle">Selasa</h5>
                                        <label class="toggle toggle-alternative">
                                            <input type="checkbox" id="checkboxB" class="checkbox" name="day[]" onclick="Selasa()" checked />
                                            <span class="toggle-text"></span>
                                            <span class="toggle-handle"></span>
                                        </label>
                                    </div>
                                    <div class="row col" id="jamSelasa">
                                        <div class="col col-4">
                                            <label for="open-time">Jam Buka:</label>
                                            <input type="time" class="form-control" id="openSelasa" name="open-time[]" checked>
                                        </div>
                                        <div class="col col-4">
                                            <label for="close-time">Jam Tutup:</label>
                                            <input type="time" class="form-control" id="closeSelasa" name="close-time[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2">
                                        <h5 id="dayTitle">Rabu</h5>
                                        <label class="toggle toggle-alternative">
                                            <input type="checkbox" id="checkboxB" class="checkbox" name="day[]" onclick="Rabu()" checked />
                                            <span class="toggle-text"></span>
                                            <span class="toggle-handle"></span>
                                        </label>
                                    </div>
                                    <div class="row col" id="jamRabu">
                                        <div class="col col-4">
                                            <label for="open-time">Jam Buka:</label>
                                            <input type="time" class="form-control" id="openRabu" name="open-time[]" checked>
                                        </div>
                                        <div class="col col-4">
                                            <label for="close-time">Jam Tutup:</label>
                                            <input type="time" class="form-control" id="closeRabu" name="close-time[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2">
                                        <h5 id="dayTitle">Kamis</h5>
                                        <label class="toggle toggle-alternative">
                                            <input type="checkbox" id="checkboxB" class="checkbox" name="day[]" onclick="Kamis()" checked />
                                            <span class="toggle-text"></span>
                                            <span class="toggle-handle"></span>
                                        </label>
                                    </div>
                                    <div class="row col" id="jamKamis">
                                        <div class="col col-4">
                                            <label for="open-time">Jam Buka:</label>
                                            <input type="time" class="form-control" id="openKamis" name="open-time[]" checked>
                                        </div>
                                        <div class="col col-4">
                                            <label for="close-time">Jam Tutup:</label>
                                            <input type="time" class="form-control" id="closeKamis" name="close-time[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2">
                                        <h5 id="dayTitle">Jum'at</h5>
                                        <label class="toggle toggle-alternative">
                                            <input type="checkbox" id="checkboxB" class="checkbox" name="day[]" onclick="Jumat()" checked />
                                            <span class="toggle-text"></span>
                                            <span class="toggle-handle"></span>
                                        </label>
                                    </div>
                                    <div class="row col" id="jamJumat">
                                        <div class="col col-4">
                                            <label for="open-time">Jam Buka:</label>
                                            <input type="time" class="form-control" id="openJumat" name="open-time[]" checked>
                                        </div>
                                        <div class="col col-4">
                                            <label for="close-time">Jam Tutup:</label>
                                            <input type="time" class="form-control" id="closeJumat" name="close-time[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2">
                                        <h5 id="dayTitle">Sabtu</h5>
                                        <label class="toggle toggle-alternative">
                                            <input type="checkbox" id="checkboxB" class="checkbox" name="day[]" onclick="Sabtu()" />
                                            <span class="toggle-text"></span>
                                            <span class="toggle-handle"></span>
                                        </label>
                                    </div>
                                    <div class="row col" id="jamSabtu" style="display:none;">
                                        <div class="col col-4">
                                            <label for="open-time">Jam Buka:</label>
                                            <input type="time" class="form-control" id="openSabtu" name="open-time[]">
                                        </div>
                                        <div class="col col-4">
                                            <label for="close-time">Jam Tutup:</label>
                                            <input type="time" class="form-control" id="closeSabtu" name="close-time[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2">
                                        <h5 id="dayTitle">Minggu</h5>
                                        <label class="toggle toggle-alternative">
                                            <input type="checkbox" id="checkboxB" class="checkbox" name="day[]" onclick="Minggu()" />
                                            <span class="toggle-text"></span>
                                            <span class="toggle-handle"></span>
                                        </label>
                                    </div>
                                    <div class="row col" id="jamMinggu" style="display:none;">
                                        <div class="col col-4">
                                            <label for="open-time">Jam Buka:</label>
                                            <input type="time" class="form-control" id="openMinggu" name="open-time[]">
                                        </div>
                                        <div class="col col-4">
                                            <label for="close-time">Jam Tutup:</label>
                                            <input type="time" class="form-control" id="closeMinggu" name="close-time[]">
                                        </div>
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload Foto Kafe</label>
                                    <input class="form-control" type="file" name="foto_kafe[]" id="foto_kafe" accept="image/*" multiple required>
                                    <div id="FileHelp" class="form-text">.jpg/.png</div>
                                    <div id="imgPreview"></div>
                                </div>



                                <button type="submit" onclick="submitWaktu()" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>



                <div class="col-lg-6">
                    <div class="card card-title">
                        <div class="card-body">
                            <div class="map" id="map"></div>
                            <span id="koordinat"></span>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

    </main><!-- End #main -->


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <!-- <div class="copyright">
        &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div> -->
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    <!-- Vendor JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/proj4js/1.1.0/proj4js-compressed.min.js"></script>
    <!-- <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script> -->

    <!-- Template Main JS File -->
    <script src="/js/Script.js"></script>

    <script>
        DataTable.datetime('D MMM YYYY');
        $(document).ready(function() {
            $('#table1').DataTable({
                scrollX: true,

            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".alert");
            setTimeout(function() {
                $(".alert").fadeOut(800);
            }, 2500);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#wilayah').select2({
                ajax: {
                    url: "<?= base_url('Admin/getDataAjaxRemote') ?>",
                    dataType: "json",
                    type: "POST",
                    delay: 300,
                    data: function(params) {
                        console.log(params.term);
                        return {
                            search: params.term,
                        }
                    },
                    processResults: function(data, page) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                placeholder: 'Ketik nama desa atau kecamatan',
                minimumInputLength: 3,
            });
        });
    </script>
    <!-- preview input image, multiple image -->
    <script>
        function readURL(input) {
            if (input.files) {
                $('#imgPreview').html(''); // mengosongkan preview
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imgPreview').append('<div><img src="' + e.target.result + '" class="img-kafe"><button type="button" class="btn btn-danger btn-sm remove-preview">Hapus</button></div>');
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        }
        $("#foto_kafe").change(function() {
            readURL(this);
        });
        $('#imgPreview').on('click', '.remove-preview', function() {
            $(this).parent().remove(); // menghapus preview yang dipilih
        });
    </script>
    <script>
        function setTimeToMonday() {
            // ambil nilai dari input time hari Senin
            var openTimeMonday = document.getElementById('openSenin').value;
            var closeTimeMonday = document.getElementById('closeSenin').value;

            // ubah nilai dari input time hari Selasa
            document.getElementById('openSelasa').value = openTimeMonday;
            document.getElementById('closeSelasa').value = closeTimeMonday;
            document.getElementById('openRabu').value = openTimeMonday;
            document.getElementById('closeRabu').value = closeTimeMonday;
            document.getElementById('openKamis').value = openTimeMonday;
            document.getElementById('closeKamis').value = closeTimeMonday;
            document.getElementById('openJumat').value = openTimeMonday;
            document.getElementById('closeJumat').value = closeTimeMonday;
            document.getElementById('openSabtu').value = openTimeMonday;
            document.getElementById('closeSabtu').value = closeTimeMonday;
            document.getElementById('openMinggu').value = openTimeMonday;
            document.getElementById('closeMinggu').value = closeTimeMonday;
        }

        function submitWaktu() {
            var senin = document.getElementById("jamSenin");
            var clear = document.getElementById("openSenin");
            var clears = document.getElementById("closeSenin");
            if (senin.style.display === "none") {
                clear.value = "";
                clears.value = "";
            }
            var selasa = document.getElementById("jamSelasa");
            var clear = document.getElementById("openSelasa");
            var clears = document.getElementById("closeSelasa");
            if (selasa.style.display === "none") {
                clear.value = "";
                clears.value = "";
            }
            var Rabu = document.getElementById("jamRabu");
            var clear = document.getElementById("openRabu");
            var clears = document.getElementById("closeRabu");
            if (Rabu.style.display === "none") {
                clear.value = "";
                clears.value = "";
            }
            var Kamis = document.getElementById("jamKamis");
            var clear = document.getElementById("openKamis");
            var clears = document.getElementById("closeKamis");
            if (Kamis.style.display === "none") {
                clear.value = "";
                clears.value = "";
            }
            var Jumat = document.getElementById("jamJumat");
            var clear = document.getElementById("openJumat");
            var clears = document.getElementById("closeJumat");
            if (Jumat.style.display === "none") {
                clear.value = "";
                clears.value = "";
            }
            var Sabtu = document.getElementById("jamSabtu");
            var clear = document.getElementById("openSabtu");
            var clears = document.getElementById("closeSabtu");
            if (Sabtu.style.display === "none") {
                clear.value = "";
                clears.value = "";
            }
            var Minggu = document.getElementById("jamMinggu");
            var clear = document.getElementById("openMinggu");
            var clears = document.getElementById("closeMinggu");
            if (Minggu.style.display === "none") {
                clear.value = "";
                clears.value = "";
            }
        }

        function senin() {
            var senin = document.getElementById("jamSenin");
            var clear = document.getElementById("openSenin");
            var clears = document.getElementById("closeSenin");
            if (senin.style.display === "none") {
                senin.style.display = "";
                clear.value = "";
                clears.value = "";
            } else {
                senin.style.display = "none";
            }
        }

        function Selasa() {
            var Selasa = document.getElementById("jamSelasa")
            var clear = document.getElementById("openSelasa");;
            var clears = document.getElementById("closeSelasa");;
            if (Selasa.style.display === "none") {
                Selasa.style.display = "";
                clear.value = "";
                clears.value = "";
            } else {
                Selasa.style.display = "none";
            }
        }

        function Rabu() {
            var Rabu = document.getElementById("jamRabu");
            var clear = document.getElementById("openRabu");
            var clears = document.getElementById("closeRabu");
            if (Rabu.style.display === "none") {
                Rabu.style.display = "";
                clear.value = "";
                clears.value = "";
            } else {
                Rabu.style.display = "none";
            }
        }

        function Kamis() {
            var Kamis = document.getElementById("jamKamis");
            var clear = document.getElementById("openKamis");
            var clears = document.getElementById("closeKamis");
            if (Kamis.style.display === "none") {
                Kamis.style.display = "";
                clear.value = "";
                clears.value = "";
            } else {
                Kamis.style.display = "none";
            }
        }

        function Jumat() {
            var Jumat = document.getElementById("jamJumat");
            var clear = document.getElementById("openJumat");
            var clears = document.getElementById("closeJumat");
            if (Jumat.style.display === "none") {
                Jumat.style.display = "";
                clear.value = "";
                clears.value = "";
            } else {
                Jumat.style.display = "none";
            }
        }

        function Sabtu() {
            var Sabtu = document.getElementById("jamSabtu");
            var clear = document.getElementById("openSabtu");
            var clears = document.getElementById("closeSabtu");
            if (Sabtu.style.display === "none") {
                Sabtu.style.display = "";
                clear.value = "";
                clears.value = "";
            } else {
                Sabtu.style.display = "none";
            }
        }

        function Minggu() {
            var Minggu = document.getElementById("jamMinggu");
            var clear = document.getElementById("openMinggu");
            var clears = document.getElementById("closeMinggu");
            if (Minggu.style.display === "none") {
                Minggu.style.display = "";
                clear.value = "";
                clears.value = "";
            } else {
                Minggu.style.display = "none";
            }
        }
    </script>

    <!-- Js Leaflet Setting -->
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
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        });

        var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiNjg2MzUzMyIsImEiOiJjbDh4NDExZW0wMXZsM3ZwODR1eDB0ajY0In0.6jHWxwN6YfLftuCFHaa1zw', {
            id: 'mapbox/satellite-v9'
        });

        var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {});

        var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiNjg2MzUzMyIsImEiOiJjbDh4NDExZW0wMXZsM3ZwODR1eDB0ajY0In0.6jHWxwN6YfLftuCFHaa1zw', {
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

        // Geojson to Leaflet
        <?php foreach ($tampilGeojson as $G) : ?>
            var myStyle<?= $G->id; ?> = {
                "color": "<?= $G->warna; ?>",
                "weight": 5,
                "opacity": 0.5,
            };

            function popUp(f, l) {
                var out = [];
                if (f.properties) {
                    for (key in f.properties) {
                        out.push(key + ": " + f.properties[key]);
                    }
                    // l.bindPopup(out.join("<br />"));
                }
            }

            var jsonTest = new L.GeoJSON.AJAX(["<?= base_url(); ?>/geojson/<?= $G->geojson; ?>", "counties.geojson"], {
                onEachFeature: popUp,
                style: myStyle<?= $G->id; ?>,
            }).addTo(map);
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



        // get coordinat on map to input
        $(document).ready(function() {
            $("#coordinate").on('keyup', function() {
                var coor = document.getElementById("coordinate").value;
                const myArray = coor.split(",", 2);
                console.log(myArray);
                x = myArray[0];
                y = myArray[1];
                koordinat = x + "," + y;
                if (marker) map.removeLayer(marker);
                marker = L.marker([x, y]).addTo(map);
                document.getElementById("koordinat").textContent = koordinat;
                map.panTo(new L.LatLng(x, y));
            });
        });

        // function zoomTo() {
        //     var coor = document.getElementById("coordinate").value;
        //     const myArray = coor.split(",", 2);
        //     console.log(myArray);
        //     x = myArray[0];
        //     y = myArray[1];
        //     koordinat = x + "," + y;
        //     if (marker) map.removeLayer(marker);
        //     marker = L.marker([x, y]).addTo(map);
        //     document.getElementById("koordinat").textContent = koordinat;
        //     map.panTo(new L.LatLng(x, y));
        // };


        var koordinat, marker;
        map.on("click", function(e) {
            if (marker) map.removeLayer(marker);
            lat = e.latlng.lat;
            lng = e.latlng.lng;
            koordinat = lat + ", " + lng;
            // console.log(lat);
            // console.log(lng);
            console.log(koordinat);
            marker = L.marker([lat, lng]).addTo(map);
            document.getElementById("koordinat").textContent = koordinat;
            // document.getElementById("coordinate").textContent = koordinat;
            $('#coordinate').val(koordinat);
        });
    </script>


</body>

</html>