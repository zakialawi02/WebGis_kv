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

    <!-- Template Main CSS File -->
    <link href="/css/StyleAdmin.css" rel="stylesheet">


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

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <!-- kafe Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card kaffe-card">

                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Kafe <span>| Total</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cup-hot"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?= $countAllKafe; ?></h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End kafe Card -->

                        <!-- Incrase Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card pending-card">
                                <div class="card-body">
                                    <h5 class="card-title">Pending <span>| Total</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-hourglass-top"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?= $countAllPending; ?></h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Incrase Card -->

                        <!-- user Card -->
                        <div class="col-xxl-4 col-xl-12">

                            <div class="card info-card users-card">

                                <div class="card-body">
                                    <h5 class="card-title">Users <span>| Total</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?= $countAllUser; ?></h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End user Card -->


                        <!-- Daftar Kafe -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    <h5 class="card-title">Daftar Kafe</h5>

                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="min-width:10em">Nama Kafe</th>
                                                <th scope="col" style="min-width:10em">Alamat</th>
                                                <th scope="col">Koordinat</th>
                                                <th scope="col">Tanggal Masuk</th>
                                                <th scope="col">User By</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($tampilKafe as $kafe) : ?>
                                                <tr>
                                                    <td><?= $kafe->nama_kafe; ?></td>
                                                    <td><?= $kafe->alamat_kafe; ?></td>
                                                    <td><a href="#" class="text-primary"><?= $kafe->latitude; ?>, <?= $kafe->longitude; ?></a></td>
                                                    <td><?= date('d M Y', strtotime($kafe->created_at)); ?></td>
                                                    <td><span class="badge bg-primary"><?= $kafe->username; ?></span></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>

                                    <a type="button" class="btn btn-primary" href="/admin/data/kafe">View More</a>
                                </div>

                            </div>
                        </div><!-- End Daftar Kafe -->

                    </div>

                </div><!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">

                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Pie Chart <span>| Kafe</span></h5>

                            <center>
                                <div>
                                    <div id="chart"></div>
                                </div>
                            </center>

                        </div>

                    </div><!-- End chart Activity -->

                    <!-- New users -->
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">New Users <span>| Last 30 days</span></h5>

                            <div class="activity">

                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Username</th>
                                            <th scope="col">Join at</th>
                                            <th scope="col">Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($userMonth as $newUs) : ?>
                                            <tr>
                                                <td><?= $newUs->username; ?></td>
                                                <td> <?= date('d M Y', strtotime($newUs->created_at)); ?></td>
                                                <td><span class="badge bg-<?= ($newUs->name == 'Admin' or $newUs->name == 'SuperAdmin') ? 'info' : 'secondary'; ?>"> <?= $newUs->name; ?> </span></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>

                        <a type="button" class="btn btn-primary" href="/user/list">View More</a>

                    </div><!-- End user Activity -->

                </div><!-- End Right side columns -->

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
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        $(document).ready(function() {
            var options = {
                series: [44, 55, 13, 43, 22],
                chart: {
                    width: 300,
                    type: 'pie',

                },
                legend: {
                    position: 'bottom'
                },
                labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 300
                        },

                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        });
    </script>

</body>

</html>