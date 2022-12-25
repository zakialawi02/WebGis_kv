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
    <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- HEADER -->
    <?= $this->include('_Layout/_template/_umum/header'); ?>



    <!-- ISI CONTENT -->


    <section id="" class="">
        <div class="container">


            <form class="row g-3" action="/view/dump" method="POST">
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




                <button type="submit" onclick="submitWaktu()" class="btn btn-primary">Submit</button>
            </form>


        </div>
    </section>


    <!-- END ISI CONTENT -->



    <!-- FOOTER -->
    <?= $this->include('_Layout/_template/_umum/footer'); ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

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



</body>

</html>