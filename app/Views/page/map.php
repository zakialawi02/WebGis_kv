<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title><?= $title; ?></title>
    <!-- Favicon -->
    <link href="/img/favicon.png" rel="icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css " rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="/css/map.css" rel="stylesheet">

    <!-- leaflet Component -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
    <link href="/leaflet/L.Control.MousePosition.css" rel="stylesheet">
    <link rel="stylesheet" href="//unpkg.com/leaflet-gesture-handling/dist/leaflet-gesture-handling.min.css" type="text/css">
    <link rel="stylesheet" href="/leaflet/leaflet-sidepanel.css" />
    <link rel="stylesheet" href="/leaflet/iconLayers.css" />
    <link rel="stylesheet" href="/leaflet/leaflet.contextmenu.css" />
    <link rel="stylesheet" href="/leaflet/Leaflet.NavBar.css" />

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- ISI CONTENT -->
    <!-- spinner -->
    <div id="loading-spinner" class="spinner-container d-flex justify-content-center align-items-center position-fixed top-0 start-0 w-100 h-100 d-none">
        <div class="spinner-border text-light" role="status"></div>
    </div>

    <!-- Modal dialog login-->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="loginModalLabel">Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <form action="<?= url_to('login') ?>" method="post" name="login">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                            <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.login') ?>
                            </div>
                            <div class="invalid-feedback" id="loginError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="password"><?= lang('Auth.password') ?></label>
                            <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" aria-describedby="emailHelp">
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                            <div class="invalid-feedback" id="passwordError"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label">
                                <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                <?= lang('Auth.rememberMe') ?>
                            </label>
                        </div>
                        <div class="form-group">
                            <p class="text-center">Don't have account? <a href="<?= url_to('register') ?>" id="signup">Sign up here</a></p>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <button type="submit" id="login-submit" class=" btn btn-block mybtn btn-primary tx-tfm"><?= lang('Auth.loginAction') ?></button>
                                <button id="spinnerss" class="btn btn-primary" type="button" disabled>
                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Login... </button>
                            </div>
                            <div class="col">
                                <p class="text-center">
                                    <a href="<?= url_to('forgot') ?>" class="google btn mybtn"><?= lang('Auth.forgotYourPassword') ?>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Data -->
    <div class="modalAdds" id="modalAdd">
        <div class="modalAdd-content">
            <div class="modal-header">
                <h3>Add</h3>
                <button class="close-button" id="close-button">&times;</button>
            </div>
            <hr>
            <div class="modalAdd-body">
                <div class="card-body">
                    <form class="row g-3" action="/admin/addKafe" method="post" enctype="multipart/form-data" name="addKafe" id="addKafe">
                        <?= csrf_field(); ?>

                        <?php if (in_groups('User')) : ?>
                            <input type="hidden" class="form-control" for="stat_appv" id="stat_appv" name="stat_appv" value="0">
                        <?php else : ?>
                            <input type="hidden" class="form-control" for="stat_appv" id="stat_appv" name="stat_appv" value="1">
                        <?php endif ?>

                        <div class="form-group">
                            <label for="nama_kafe" class="form-label" id="floatingInput">Nama Kafe</label>
                            <input type="text" class="form-control" id="nama_kafe floatingInput" aria-describedby="textlHelp" name="nama_kafe" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat_kafe" class="form-label">Alamat Kafe</label>
                            <input type="text" class="form-control" id="alamat_kafe" aria-describedby="textlHelp" name="alamat_kafe" required>
                        </div>

                        <div class="row g-2">
                            <label for="koordinat" class="">Koordinat</label>
                            <div class="form-group col-md-5">
                                <label for="latitude" class="">Latitude</label>
                                <input type="text" class="form-control" id="latitude" aria-describedby="textlHelp" name="latitude" placeholder="-7.0385384" pattern="^([-+]?)([0-9]{1,2}(?:\.[0-9]+)?|[0-9]{3}(?:\.[0-9]+)?)(?:°)?$" title="Tuliskan Sesuai Format" required>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="longitude" class="">Longitude</label>
                                <input type="text" class="form-control" id="longitude" aria-describedby="textlHelp" name="longitude" placeholder="112.8998345" pattern="^[-+]?([1-9]|[1-9]\d|1[0-7]\d|180)(\.\d+)?$" title="Tuliskan Sesuai Format" required>
                            </div>
                            <div class="col-md gps">
                                <button type="button" role="button" onclick="mygps()" id="myLoc" class="btn btn-primary bi bi-geo-alt" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Gunakan lokasi saya sekarang (GPS)"></button>
                            </div>
                            <div id="FileHelp" class="form-text"><span style="font-weight: bold;">NOTE:</span> Ketikan Koordinat Latitude dan Longitude atau klik lokasi pada peta atau gunakan lokasi anda sekarang (gps)</div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 mb-2">Wilayah Administrasi</label>
                            <select class="form-select" id="wilayahA" name="wilayah" style="width: 100%;" value="" required>

                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="instagram_kafe" class="form-label">Instagram</label>
                            <div class="input-group form-group mt-1">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" class="form-control" id="instagram_kafe" name="instagram_kafe" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jam-oprasional" class="form-label">Sarana/Prasarana</label>
                            <div class="row g-2">
                                <div class="form-check col-md-3">
                                    <input class="form-check-input" type="checkbox" value="reservedR" id="reservedR">
                                    <label class="form-check-label" for="reservedR">
                                        Meeting Room/Reserved Room
                                    </label>
                                </div>
                                <div class="form-check col-md-2">
                                    <input class="form-check-input" type="checkbox" name="fasilitas[]" value="wifi" id="wifi">
                                    <label class="form-check-label" for="wifi">
                                        Wifi
                                    </label>
                                </div>

                                <div class="form-check col-md-2">
                                    <input class="form-check-input" type="checkbox" name="fasilitas[]" value="indoorR" id="indoor">
                                    <label class="form-check-label" for="indoorR">
                                        Indoor Area
                                    </label>
                                </div>
                                <div class="form-check col-md-2">
                                    <input class="form-check-input" type="checkbox" name="fasilitas[]" value="outdoorR" id="outdoor">
                                    <label class="form-check-label" for="outdoorR">
                                        Outdoor Area
                                    </label>
                                </div>
                                <div class="form-check col-md-2">
                                    <input class="form-check-input" type="checkbox" name="fasilitas[]" value="toilet" id="toilet">
                                    <label class="form-check-label" for="toilet">
                                        Toilet
                                    </label>
                                </div>
                                <div class="form-check col-md-2">
                                    <input class="form-check-input" type="checkbox" name="fasilitas[]" value="mushollah" id="mushollah">
                                    <label class="form-check-label" for="mushollah">
                                        Mushollah
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <label for="harga_menu" class="">Kisaran Harga Menu</label>
                            <div class="form-group col-md-6">
                                <input type="text" name="harga_awal" id="harga_awal" class="form-control harga_awal" placeholder="Harga Terendah" onkeypress="return onlyNumber(event)" maxlength="10">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="harga_akhir" id="harga_akhir" class="form-control harga_akhir" placeholder="Harga Tertinggi" onkeypress="return onlyNumber(event)" maxlength="10">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="jam-oprasional" class="form-label">Waktu Oprasional</label>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5 id="dayTitle">Senin</h5>
                                    <label class="toggle toggle-alternative">
                                        <input type="checkbox" id="checkboxBJ" class="checkbox" name="day[]" onclick="senin()" checked />
                                        <span class="toggle-text"></span>
                                        <span class="toggle-handle"></span>
                                    </label>
                                </div>
                                <div class="row col" id="jamSenin">
                                    <div class="col">
                                        <label for="open-time">Jam Buka:</label>
                                        <input type="time" class="form-control" id="openSenin" name="open-time[]" checked>
                                    </div>
                                    <div class="col">
                                        <label for="close-time">Jam Tutup:</label>
                                        <input type="time" class="form-control" id="closeSenin" name="close-time[]">
                                    </div>
                                    <a class="btn btn-primary mt-2" onclick="setTimeToMonday()" role=" button">Terapkan Ke Semua Hari</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5 id="dayTitle">Selasa</h5>
                                    <label class="toggle toggle-alternative">
                                        <input type="checkbox" id="checkboxBJ" class="checkbox" name="day[]" onclick="Selasa()" checked />
                                        <span class="toggle-text"></span>
                                        <span class="toggle-handle"></span>
                                    </label>
                                </div>
                                <div class="row col" id="jamSelasa">
                                    <div class="col">
                                        <label for="open-time">Jam Buka:</label>
                                        <input type="time" class="form-control" id="openSelasa" name="open-time[]" checked>
                                    </div>
                                    <div class="col">
                                        <label for="close-time">Jam Tutup:</label>
                                        <input type="time" class="form-control" id="closeSelasa" name="close-time[]">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5 id="dayTitle">Rabu</h5>
                                    <label class="toggle toggle-alternative">
                                        <input type="checkbox" id="checkboxBJ" class="checkbox" name="day[]" onclick="Rabu()" checked />
                                        <span class="toggle-text"></span>
                                        <span class="toggle-handle"></span>
                                    </label>
                                </div>
                                <div class="row col" id="jamRabu">
                                    <div class="col">
                                        <label for="open-time">Jam Buka:</label>
                                        <input type="time" class="form-control" id="openRabu" name="open-time[]" checked>
                                    </div>
                                    <div class="col">
                                        <label for="close-time">Jam Tutup:</label>
                                        <input type="time" class="form-control" id="closeRabu" name="close-time[]">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5 id="dayTitle">Kamis</h5>
                                    <label class="toggle toggle-alternative">
                                        <input type="checkbox" id="checkboxBJ" class="checkbox" name="day[]" onclick="Kamis()" checked />
                                        <span class="toggle-text"></span>
                                        <span class="toggle-handle"></span>
                                    </label>
                                </div>
                                <div class="row col" id="jamKamis">
                                    <div class="col">
                                        <label for="open-time">Jam Buka:</label>
                                        <input type="time" class="form-control" id="openKamis" name="open-time[]" checked>
                                    </div>
                                    <div class="col">
                                        <label for="close-time">Jam Tutup:</label>
                                        <input type="time" class="form-control" id="closeKamis" name="close-time[]">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5 id="dayTitle">Jum'at</h5>
                                    <label class="toggle toggle-alternative">
                                        <input type="checkbox" id="checkboxBJ" class="checkbox" name="day[]" onclick="Jumat()" checked />
                                        <span class="toggle-text"></span>
                                        <span class="toggle-handle"></span>
                                    </label>
                                </div>
                                <div class="row col" id="jamJumat">
                                    <div class="col">
                                        <label for="open-time">Jam Buka:</label>
                                        <input type="time" class="form-control" id="openJumat" name="open-time[]" checked>
                                    </div>
                                    <div class="col">
                                        <label for="close-time">Jam Tutup:</label>
                                        <input type="time" class="form-control" id="closeJumat" name="close-time[]">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5 id="dayTitle">Sabtu</h5>
                                    <label class="toggle toggle-alternative">
                                        <input type="checkbox" id="checkboxBJ" class="checkbox" name="day[]" onclick="Sabtu()" />
                                        <span class="toggle-text"></span>
                                        <span class="toggle-handle"></span>
                                    </label>
                                </div>
                                <div class="row col" id="jamSabtu" style="display:none;">
                                    <div class="col">
                                        <label for="open-time">Jam Buka:</label>
                                        <input type="time" class="form-control" id="openSabtu" name="open-time[]">
                                    </div>
                                    <div class="col">
                                        <label for="close-time">Jam Tutup:</label>
                                        <input type="time" class="form-control" id="closeSabtu" name="close-time[]">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5 id="dayTitle">Minggu</h5>
                                    <label class="toggle toggle-alternative">
                                        <input type="checkbox" id="checkboxBJ" class="checkbox" name="day[]" onclick="Minggu()" />
                                        <span class="toggle-text"></span>
                                        <span class="toggle-handle"></span>
                                    </label>
                                </div>
                                <div class="row col" id="jamMinggu" style="display:none;">
                                    <div class="col">
                                        <label for="open-time">Jam Buka:</label>
                                        <input type="time" class="form-control" id="openMinggu" name="open-time[]">
                                    </div>
                                    <div class="col">
                                        <label for="close-time">Jam Tutup:</label>
                                        <input type="time" class="form-control" id="closeMinggu" name="close-time[]">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Foto Kafe</label>
                            <input class="form-control" type="file" name="foto_kafe[]" id="foto_kafe" accept="image/*" multiple>
                            <div id="FileHelp" class="form-text">.jpg/.png</div>
                            <div id="imgPreview"></div>
                        </div>

                        <button type="submit" onclick="submitWaktu()" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <div class="p-2"></div>
            </div>
        </div>
    </div>

    <div id="button-section-group" class="">
        <div id="button-section" class="float-end m-1">
            <button id="modal-button" class="btn btn-primary">Add Data</button>
            <?php if (logged_in()) : ?>
                <a class="btn btn-primary" href="/dashboard" role="button">Dashboard</a>
                <button type="button" id="logout-btn" class="btn btn-primary">Log Out</button>
                <button id="spinners" class="btn btn-primary" type="button" disabled>
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Logout... </button>
            <?php else : ?>
                <button type="button" id="login-btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
            <?php endif ?>
        </div>
        <div class="search-container float-end">
            <form action="#" method="get">
                <div class="input-group">
                    <input type="text" id="cariMark" class="form-control input-cari" placeholder="Cari...">
                    <span class="input-group-btn">
                        <button type="button" role="button" class="btn btn-primary btn-cari"><i class="bi bi-search"></i></button>
                    </span>
                </div>
            </form>
        </div>



    </div>



    <div class="map" id="map">

        <!-- side Panel -->
        <div id="panelID" class="sidepanel" aria-label="side panel" aria-hidden="false">
            <div class="sidepanel-inner-wrapper">
                <nav class="sidepanel-tabs-wrapper" aria-label="sidepanel tab navigation">
                    <ul class="sidepanel-tabs">
                        <li class="sidepanel-tab">
                            <a href="#" class="sidebar-tab-link" role="tab" data-tab-link="tab-1"><i class="bi bi-layers-fill"></i></a>
                            <a href="#" class="sidebar-tab-link" role="tab" data-tab-link="tab-2"><i class="bi bi-gear-fill"></i></a>
                        </li>

                    </ul>
                </nav>
                <div class="sidepanel-content-wrapper">
                    <div class="sidepanel-content">
                        <div class="sidepanel-tab-content" data-tab-content="tab-1">
                            <h4>Layer</h4>
                            <hr>

                            <div class="card">
                                <div class="card-body">
                                    <div id="lumap"></div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div id="lumapi"></div>
                                </div>
                            </div>
                        </div>

                        <div class="sidepanel-tab-content" data-tab-content="tab-2">
                            <h4>About</h4>
                            <hr>
                            <p style="font-size: 1rem;">Selamat datang di WebGIS Inventarisasi Kafe Surabaya! Kami adalah platform yang didedikasikan untuk menyediakan informasi lengkap tentang persebaran kafe di Surabaya. Kami menggunakan teknologi Geographical Information System (GIS) untuk menghadirkan peta interaktif yang mempermudah Anda dalam menjelajahi dan menemukan kafe-kafe menarik di Kota Surabaya. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidepanel-toggle-container">
                <button class="sidepanel-toggle-button" type="button" aria-label="toggle side panel"></button>
            </div>
        </div>

    </div>


    <!-- END ISI CONTENT -->

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Template Javascript -->
    <!-- <script src="/assets/js/main.js"></script> -->

    <?php if (in_groups('Admin' && 'SuperAdmin')) : ?>
        <?php if (session()->getFlashdata('success')) : ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '<?= session()->getFlashdata('success'); ?>',
                    timer: 5000,
                    html: 'Data berhasil ditambahkan,  ' +
                        '<a href="/dashboard">lihat dashboard</a> ',
                });
            </script>
        <?php else : ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '<?= session()->getFlashdata('success'); ?>',
                    timer: 5000,
                    html: 'Menunggu verifikasi, lihat status data anda ' +
                        '<a href="/dashboard">disini</a> ' +
                        ' atau masuk ke dashboard',
                });
            </script>
        <?php endif; ?>
    <?php endif ?>


    <?php if (session()->getFlashdata('error')) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= session()->getFlashdata('error'); ?>',
                timer: 1500,
            });
        </script>
    <?php endif; ?>

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <!-- modalAdd -->
    <script>
        const modalButton = document.getElementById("modal-button");
        const modal = document.getElementById("modalAdd");
        const closeButton = document.getElementById("close-button");

        modalButton.addEventListener("click", function() {
            <?php if (logged_in()) : ?>
                modal.style.display = "block";
            <?php else : ?>
                $("#loading-spinner").removeClass("d-none");
                setTimeout(function() {
                    $("#loading-spinner").addClass("d-none");
                    Swal.fire({
                        title: 'Anda harus login terlebih dahulu',
                        customClass: {
                            container: 'my-swal',
                        },
                    })
                    var logModal = new bootstrap.Modal($('#loginModal'));
                    logModal.show();
                }, 500);
            <?php endif ?>
        });

        closeButton.addEventListener("click", function() {
            modal.style.display = "none";
        });

        window.addEventListener("click", function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });
    </script>
    <!-- login/logout -->
    <script>
        $(document).ready(function() {
            $('form[name="login"]').submit(function(event) {
                event.preventDefault(); // prevent default form submit behavior
                $('#loginError').text('');
                $('#passwordError').text('');
                var login = $('input[name="login"]').val().trim();
                var password = $('input[name="password"]').val().trim();
                console.log(login, password);
                if (login == '') {
                    $("#loginError").text('Masukkan email/username');
                    if (password == '' || password.length < 4) {
                        $("#passwordError").text('Masukkan password');
                    }
                    return;
                }
                if (password == '' || password.length < 4) {
                    $("#passwordError").text('Masukkan password');
                    return;
                }
                var form = $(this);
                var url = form.attr('action');
                var method = form.attr('method');
                var data = form.serialize();
                $('#login-submit').hide();
                $('#spinnerss').show();
                // AJAX request
                $.ajax({
                    url: url,
                    type: method,
                    data: data,
                    success: function(response) {
                        location.reload();
                        // Swal.fire({
                        //     title: "Login Berhasil!",
                        //     icon: "success",
                        //     showConfirmButton: false,
                        //     timer: 1000
                        // }).then(() => {
                        //     $('.modal').hide();
                        //     $('.modal-backdrop').hide();
                        //     $('#button-section-group').load(location.href + ' #button-section');
                        //     location.reload();
                        // });
                    },
                });
            });

            $('#logout-btn').click(function(e) {
                e.preventDefault();
                $('#logout-btn').hide();
                $('#spinners').show();
                // tunggu 500ms sebelum menjalankan AJAX
                $.ajax({
                    url: "/logout",
                    type: "GET",
                }).done(function() {
                    // $('#spinners').hide();
                    // $('#button-section-group').load(location.href + ' #button-section');
                    // Swal.fire({
                    //     icon: 'success',
                    //     title: 'Berhasil Logout.',
                    //     showConfirmButton: false,
                    //     timer: 1000
                    // }).then(() => {
                    location.reload();
                    // });
                });
            });
        });
    </script>
    <!-- select2 administrasi -->
    <script>
        $(document).ready(function() {
            $('#wilayahA').select2({
                ajax: {
                    url: "<?= base_url('admin/getDataAjaxRemote') ?>",
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
                        $('#imgPreview').append('<div><img src="' + e.target.result + '" class="img-kafe"></div>');
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
        function onlyNumber(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
    </script>
    <!-- set oprasional hour -->
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

    <!-- Leafleat js Component -->
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
    <script src="https://unpkg.com/geojson-vt@3.2.0/geojson-vt.js"></script>
    <script src="/leaflet/leaflet-geojson-vt.js"></script>
    <script src="/leaflet/leaflet.ajax.min.js"></script>
    <script src="/leaflet/leaflet.ajax.js"></script>
    <script src="/leaflet/L.Control.MousePosition.js"></script>
    <script src="//unpkg.com/leaflet-gesture-handling"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-tilelayer-geojson/1.0.2/TileLayer.GeoJSON.min.js"></script>
    <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.3.1/leaflet-omnivore.min.js"></script>
    <script src="/leaflet/leaflet-sidepanel.min.js"></script>
    <script src="/leaflet/Leaflet.Control.Custom.js"></script>
    <script src="/leaflet/iconLayers.js"></script>
    <script src="/leaflet/leaflet.contextmenu.js"></script>
    <script src="/leaflet/catiline.js"></script>
    <script src="/leaflet/leaflet.shpfile.js"></script>
    <script src="/leaflet/shp.js"></script>
    <script src="/leaflet/leaflet-hash.js"></script>
    <script src="/leaflet/Leaflet.NavBar.js"></script>
    <script src="/leaflet/Leaflet.NavBar.js"></script>
    <script src='https://unpkg.com/@turf/turf@6/turf.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.9.0/proj4.js"></script>
    <script src="/leaflet/proj4leaflet.js"></script>
    <script src="/leaflet/L.LatLng.UTM.js"></script>

    <!-- Leafleat Setting js-->
    <!-- initialize the map on the "map" div with a given center and zoom -->
    <script>
        // Base map
        var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiNjg2MzUzMyIsImEiOiJjbDh4NDExZW0wMXZsM3ZwODR1eDB0ajY0In0.6jHWxwN6YfLftuCFHaa1zw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        });

        var peta2 = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
            attribution: '&copy; <a href="https://www.google.com/maps">Google Maps</a> contributors',
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

        proj4.defs('EPSG:32749')


        // set frame view
        <?php foreach ($tampilData as $D) : ?>
            const map = L.map('map', {
                center: [<?= $D->coordinat_wilayah; ?>],
                zoom: <?= $D->zoom_view; ?>,
                layers: [peta1],
                zoomControl: false,
                gestureHandling: false,
                attributionControl: false,
                contextmenu: true,
                contextmenuWidth: 200,
                contextmenuItems: [{
                    text: 'Copy coordinates',
                    icon: '/leaflet/icon/copy.png',
                    callback: function(e) {
                        copyCoordinates(e);
                    }
                }, {
                    text: 'Add marker here',
                    icon: '/leaflet/icon/addm.png',
                    callback: function(e) {
                        addMarker(e);
                    }
                }, {
                    text: 'Center map here',
                    callback: function(e) {
                        centerMap(e);
                    }
                }, ]
            })
        <?php endforeach ?>

        function centerMap(e) {
            map.panTo(e.latlng);
        }

        function showCoordinates(e) {
            alert(e.latlng);
        }

        function copyCoordinates(e) {
            var latlng = e.latlng;
            var lat = latlng.lat.toFixed(6);
            var lng = latlng.lng.toFixed(6);
            var coordinates = lat + ',' + lng;
            navigator.clipboard.writeText(coordinates);
            alert('Koordinat ' + coordinates + ' berhasil disalin ke clipboard');
        }

        var addKafe;

        function processPoint(detectMe) {
            var isInsidePolygon = false;
            geoshp.eachLayer(function(layer) {
                var polygon = layer.toGeoJSON();
                if (turf.booleanPointInPolygon(detectMe, polygon)) {
                    isInsidePolygon = true;
                    var properties = polygon.properties;
                    var kode = properties.kode_1;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('/admin/getkode'); ?>",
                        data: {
                            kode: kode
                        },
                        dataType: "json",
                        success: function(response) {
                            var detectIdWilayah = response.id;
                            var detectTextWilayah = response.text;
                            var id = detectIdWilayah;
                            var text = detectTextWilayah;
                            var option = new Option(detectTextWilayah, detectIdWilayah);
                            $('#wilayahA').empty().append(option).val(detectIdWilayah);
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                }
            });
            if (!isInsidePolygon) {
                $('#wilayahA').empty();
                console.log('Marker is not inside any polygon.');
            }
        }

        <?php if (logged_in()) : ?>

            function addMarker(e) {
                if (addKafe) map.removeLayer(addKafe);
                addKafe = L.marker(e.latlng, {
                    icon: inKafe
                }).addTo(map);
                $("#loading-spinner").removeClass("d-none");
                lat = e.latlng.lat;
                lng = e.latlng.lng;
                koordinat = lat + ", " + lng;

                var detectMe = turf.point([lng, lat]); // Create a Turf.js point object
                processPoint(detectMe);
                $('#latitude').val(lat);
                $('#longitude').val(lng);
                setTimeout(function() {
                    $("#loading-spinner").addClass("d-none");
                    modal.style.display = "block";
                }, 800);
            }
        <?php else : ?>

            function addMarker(e) {
                $("#loading-spinner").removeClass("d-none");
                setTimeout(function() {
                    $("#loading-spinner").addClass("d-none");
                    Swal.fire('Anda harus login terlebih dahulu')
                    var logModal = new bootstrap.Modal($('#loginModal'));
                    logModal.show();
                }, 500);
            }
        <?php endif ?>

        // set marker place from input
        $("#latitude, #longitude").on('keyup', function() {
            var lat = document.getElementById("latitude").value;
            var lng = document.getElementById("longitude").value;
            var detectMe = turf.point([lng, lat]); // Create a Turf.js point object
            processPoint(detectMe);
            if (addKafe) map.removeLayer(addKafe);
            addKafe = L.marker([lat, lng], {
                icon: inKafe
            }).addTo(map);
        });

        function mygps() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolokasi tidak didukung oleh peramban ini.");
            }
        }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            var detectMe = turf.point([longitude, latitude]);
            if (addKafe) map.removeLayer(addKafe);
            addKafe = L.marker([latitude, longitude], {
                icon: inKafe
            }).addTo(map);
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);
            processPoint(detectMe);
            map.flyTo([latitude, longitude], 13)
        }

        // controller
        var zoomControl = L.control.zoom({
            position: 'bottomright'
        }).addTo(map);
        var baseLayers = new L.Control.IconLayers(
            [{
                    title: 'Default', // use any string
                    layer: peta1, // any ILayer
                    icon: '/leaflet/icon/here_normaldaygrey.png' // 80x80 icon
                },
                {
                    title: 'Satellite',
                    layer: peta2,
                    icon: '/leaflet/icon/here_satelliteday.png'
                },
                {
                    title: 'OSM',
                    layer: peta3,
                    icon: '/leaflet/icon/openstreetmap_mapnik.png'
                },
            ], {
                position: 'bottomright',
                maxLayersInRow: 3
            }
        );
        // Anggap kita memiliki sebuah marker dengan koordinat latitude dan longitude
        var latlng = L.latLng(-7.197977, 112.723657);

        // Ubah koordinat latitude dan longitude menjadi koordinat UTM
        var utmCoord = latlng.utm();

        // Akses properti-properti koordinat UTM
        console.log(utmCoord);
        console.log('Zona UTM: ' + utmCoord.zone);
        console.log('Hemisfer Selatan: ' + utmCoord.southHemi);
        console.log('Easting: ' + utmCoord.x);
        console.log('Northing: ' + utmCoord.y);
        baseLayers.addTo(map);
        L.control.mousePosition({
            showUTM: true,
        }).addTo(map);

        L.control.scale().addTo(map);
        L.control.navbar().addTo(map);

        var hash = new L.Hash(map);

        // Tambahkan control accordion pada peta
        var legendControl = L.control({
            position: 'bottomleft'
        });
        legendControl.onAdd = function(map) {
            var div = L.DomUtil.create('div', 'legend-panel');
            div.innerHTML = `<div class="accordion" id="legendAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Legenda
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#legendAccordion">
                        <div class="accordion-body">
                            <div class="legend-item1000">
                            </div>
                            <div class="legend-item0">
                            </div>
                            <div class="legend-item1">
                            </div>
                            <div class="legend-item2">
                            </div>
                            <div class="legend-item3">
                            </div>
                            <div class="legend-item4">
                            </div>
                            <div class="legend-item5">
                            </div>
                            <div class="legend-item6">
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
            return div;
        };
        legendControl.addTo(map);

        // SidePanel
        const panelRight = L.control.sidepanel('panelID', {
            panelPosition: 'left',
            tabsPosition: 'left',
            pushControls: true,
            darkMode: false,
            startTab: 'tab-1'
        }).addTo(map);

        // set marker place
        const locKafe = L.icon({
            iconUrl: '<?= base_url(); ?>/leaflet/icon/restaurant_breakfast.png',
            iconSize: [27, 27],
            iconAnchor: [10, 25], // point of the icon which will correspond to marker's location
            popupAnchor: [0, -22] // point from which the popup should open relative to the iconAnchor
        });
        const inKafe = L.icon({
            iconUrl: '<?= base_url(); ?>/leaflet/icon/restaurant_breakfast_y.png',
            iconSize: [27, 27],
            iconAnchor: [10, 25], // point of the icon which will correspond to marker's location
            popupAnchor: [0, -22] // point from which the popup should open relative to the iconAnchor
        });

        // geojson popup
        function popUp(f, l) {
            var popOut = "";
            if (f.properties) {
                const id_kafe = f.properties.id_kafe;
                const nama_foto = f.properties.nama_foto[0];
                const foto_list = nama_foto.split(","); // memecah string dengan koma sebagai delimiter menjadi array
                const foto_html = foto_list.map(foto => "<img class='imgMark' src='/img/kafe/" + foto.trim() + "'>"); // membuat HTML tag img untuk setiap nama file foto pada array
                popOut += foto_html[0];
                popOut += "<table>";
                popOut += "<tr><td><b>Nama Kafe</b></td><th>:</th><td>" + f.properties.nama_kafe + "</td></tr>";
                popOut += "<tr><td><b>Alamat</b></td><th>:</th><td>" + f.properties.alamat_kafe + "</td></tr>";
                popOut += "<tr><td><b>Wilayah Administrasi</b></td><th>:</th><td>" + f.properties.nama_kelurahan + ", Kec." + f.properties.nama_kecamatan + ", " + f.properties.nama_kabupaten + "</td></tr>";
                if (f.properties.instagram_kafe.length == 0) {
                    popOut += "<tr><td><b>Instagram</b></td><th>:</th><td> - </td></tr>";
                } else {
                    popOut += "<tr><td><b>Instagram</b></td><th>:</th><td>" + "@" + f.properties.instagram_kafe + "</td></tr>";
                }
                popOut += "<tr><td><b>Jam Oprasional</b></td><th>:</th><td>";
                const jsonString = f.properties.jam_oprasional;
                var jamOperasional = JSON.parse(jsonString[0]);
                popOut += "<table>"
                var daysOfWeek = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                for (var i = 0; i < daysOfWeek.length; i++) {
                    var hariIndex = i;
                    var hari = daysOfWeek[hariIndex];
                    var jamOperasionalText = "<tbody></tbody><tr></th><th>" + hari + "</th><td>:</td><td>";

                    if (jamOperasional[hariIndex].open_time === null || jamOperasional[hariIndex].close_time === null) {
                        jamOperasionalText += "Tutup";
                    } else {
                        var openTime = jamOperasional[hariIndex].open_time.substring(0, 5);
                        var closeTime = jamOperasional[hariIndex].close_time.substring(0, 5);
                        jamOperasionalText += openTime + " - " + closeTime;
                    }

                    popOut += jamOperasionalText + "</td>";
                }
                popOut += "</td>";
                popOut += "</table>";
                popOut += "</table>";
                popOut += "<a id='tombol-viewmap' href='/kafe/" + id_kafe + "/detail' style='color:black;'>view</a>";
                l.bindPopup(popOut);
            }
        }
        // Mendapatkan GeoJSON melalui AJAX
        $.ajax({
            url: '<?= base_url(); ?>/api/aprv',
            dataType: 'json',
            success: function(data) {
                // Membuat layer marker dari GeoJSON
                var markersLayer = L.geoJSON(data, {
                    onEachFeature: popUp,
                    pointToLayer: function(feature, latlng) {
                        return L.marker(latlng, {
                            icon: locKafe,
                        });
                    }
                });

                // Membuat layer control
                var cafes = L.layerGroup([markersLayer]).addTo(map);
                var layerControlContainer = document.getElementById('lumap');
                var checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.name = 'layerCheckbox';
                checkbox.value = cafes;
                checkbox.checked = map.hasLayer(cafes);
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        map.addLayer(cafes);
                    } else {
                        map.removeLayer(cafes);
                    }
                });
                var labelDiv = document.createElement('div');
                labelDiv.classList.add('checkbox-label'); // Menambahkan kelas CSS 'checkbox-label' ke elemen div
                var legendDiv = document.createElement('div');
                legendDiv.classList.add('legend-icon');
                var iconImg = document.createElement('img');
                iconImg.src = '<?= base_url(); ?>/leaflet/icon/restaurant_breakfast.png';
                legendDiv.appendChild(iconImg);
                var label = document.createElement('label');
                label.appendChild(document.createTextNode("Kafe"));
                labelDiv.appendChild(legendDiv);
                labelDiv.appendChild(label);
                labelDiv.appendChild(checkbox);
                layerControlContainer.appendChild(labelDiv);

                function checkLayerVisibility() {
                    if (map.hasLayer(cafes)) {
                        var legendItem = $('.legend-item1000');
                        legendItem.html('<div class="legend-img"><img src="<?= base_url(); ?>/leaflet/icon/restaurant_breakfast.png"></div>' +
                            '<div class="legend-label">Kafe</div>');
                    } else {
                        var legendItem = $('.legend-item1000');
                        legendItem.empty();
                    }
                }
                checkLayerVisibility()
                // Event listener untuk cek layer visibility saat klik layer control
                cafes.on('add remove', checkLayerVisibility);


                function cariKafe() {
                    var searchText = $('#cariMark').val().toLowerCase();
                    // Menghapus marker sebelumnya
                    markersLayer.clearLayers();
                    // Mencari fitur GeoJSON yang cocok dengan pencarian
                    var matchedFeatures = data.features.filter(function(feature) {
                        // Sesuaikan dengan properti yang ingin Anda cari
                        var propValue = feature.properties.nama_kafe.toLowerCase();
                        return propValue.indexOf(searchText) !== -1;
                    });
                    // Menambahkan marker dari fitur yang cocok
                    markersLayer.addData(matchedFeatures);
                }
                // Fungsi pencarian
                $('#cariMark').on('input', function() {
                    var inputText = $(this).val().trim();
                    var buttonSearch = $('.btn-cari');
                    var iconSearch = $('.btn-cari i');
                    if (inputText !== '') {
                        iconSearch.removeClass('bi-search');
                        iconSearch.addClass('bi-x');
                    } else {
                        iconSearch.removeClass('bi-x');
                        iconSearch.addClass('bi-search');
                    }
                    cariKafe();
                });
                $('.btn-cari').on('click', function() {
                    var inputText = $('#cariMark');
                    inputText.val('');
                    cariKafe();
                });
            }
        });


        // shapefile
        const dataFromDatabase = <?= json_encode($tampilGeojson); ?>;
        var geoLayers = [];

        var wfunc = function(base, cb) {
            importScripts('/leaflet/shp.js');
            shp(base).then(cb);
        };

        var worker = cw({
            data: wfunc
        }, 2);

        dataFromDatabase.forEach(function(data, index) {
            var url = '/geojson/' + data.features;
            var geoLayer = L.geoJson(null, {
                style: function(feature) {
                    return {
                        fillColor: data.color || 'red',
                        fillOpacity: 0.2,
                        color: 'black',
                        weight: 1
                    };
                },
                onEachFeature: function(feature, layer) {
                    var properties = feature.properties;
                    var popupContent = "";
                    for (var key in properties) {
                        if (properties.hasOwnProperty(key)) {
                            popupContent += key + ": " + properties[key] + "<br>";
                        }
                    }
                    layer.bindPopup(popupContent);
                }
            });

            geoLayers.push(geoLayer);

            fetch(url)
                .then(response => response.arrayBuffer())
                .then(buffer => {
                    worker.data(buffer).then(function(geojsonData) {
                            geoLayer.addData(geojsonData);
                            // map.addLayer(geoLayer);
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                })
                .catch(function(error) {
                    console.log(error);
                });
        });

        // Menambahkan kontrol layer
        var overlayMaps = {};
        var layerControlContainer = document.getElementById('lumapi');

        dataFromDatabase.forEach(function(data, index) {
            var checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.name = 'layerCheckbox';
            checkbox.value = data.nama_features;
            checkbox.checked = map.hasLayer(geoLayers[index]);
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    map.addLayer(geoLayers[index]);
                } else {
                    map.removeLayer(geoLayers[index]);
                }
            });

            var hexColor = data.warna;
            var alpha = 0.3;
            var rgbaColor = hexToRgba(hexColor, alpha);

            function hexToRgba(hex, alpha) {
                var r = parseInt(hex.slice(1, 3), 16);
                var g = parseInt(hex.slice(3, 5), 16);
                var b = parseInt(hex.slice(5, 7), 16);
                return "rgba(" + r + ", " + g + ", " + b + ", " + alpha + ")";
            }

            function checkLayers() {
                dataFromDatabase.forEach(function(data, index) {
                    if (map.hasLayer(geoLayers[index])) {
                        var hexColor = data.warna;
                        var alpha = 0.3;
                        var rgbaColor = hexToRgba(hexColor, alpha);
                        var legendItem = $('.legend-item' + index);
                        legendItem.html('<div class="legend-color" style="background-color: ' + rgbaColor + '; border: 1px solid #000000;"></div>' +
                            '<div class="legend-label">' + data.nama_features + '</div>');
                        console.log(data.nama_features);
                    } else {
                        var legendItem = $('.legend-item' + index);
                        legendItem.empty();
                    }
                });
            }

            dataFromDatabase.forEach(function(data, index) {
                checkLayers();
                geoLayers[index].on('add remove', checkLayers);
            });

            var labelDiv = document.createElement('div');
            labelDiv.classList.add('checkbox-label'); // Menambahkan kelas CSS 'checkbox-label' ke elemen div
            var legendDiv = document.createElement('div');
            legendDiv.classList.add('legend-color');
            legendDiv.style.backgroundColor = rgbaColor;
            legendDiv.style.border = '1px solid #000000';
            var label = document.createElement('label');
            label.appendChild(document.createTextNode(data.nama_features));
            labelDiv.appendChild(legendDiv);
            labelDiv.appendChild(label);
            labelDiv.appendChild(checkbox);
            layerControlContainer.appendChild(labelDiv);
            overlayMaps[data.nama_features] = geoLayers[index];
        });







        // shapefile untuk batas admin detectme()
        var geoshp = L.geoJson({
            features: []
        }, );

        var wfunc = function(base, cb) {
            importScripts('/leaflet/shp.js');
            shp(base).then(cb);
        }
        var worker = cw({
            data: wfunc
        }, 2);
        worker.data(cw.makeUrl('/geojson/batas_kelurahan_2021_sby_357820220801090416.zip')).then(function(data) {
            geoshp.addData(data);
        }, function(a) {
            console.log(a)
        });



        const screenWidth = screen.availWidth
        if (screenWidth < 455) {
            var controlElement = baseLayers.getContainer();
            controlElement.style.position = 'fixed';
            controlElement.style.bottom = '0.2rem';
            controlElement.style.right = '0.2rem';
            var zoomTombol = zoomControl.getContainer();
            zoomTombol.style.display = 'none';
        } else {
            var controlElement = baseLayers.getContainer();
            controlElement.style.position = 'fixed';
            controlElement.style.bottom = '0.8rem';
            controlElement.style.right = '3rem';
            var zoomTombol = zoomControl.getContainer();
            zoomTombol.style.position = 'absolute';
            zoomTombol.style.bottom = '0.2rem';
            zoomTombol.style.right = '0.2rem';
        }
    </script>

</body>

</html>