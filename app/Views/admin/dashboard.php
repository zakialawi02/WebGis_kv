<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title><?= $title; ?></title>
    <!-- Favicons -->
    <link href="/img/favicon.png" rel="icon">

    <!-- vendor css -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Template Main CSS File -->
    <link href="/css/StyleAdmin.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
    <!-- NAV HAEADER -->
    <?= $this->include('_Layout\_template\_admin\header'); ?>
    <div id="layoutSidenav">
        <!-- SIDEBAR -->
        <?= $this->include('_Layout\_template\_admin\sidebar'); ?>

        <div id="layoutSidenav_content">

            <!-- MAIN CONTENT -->
            <main>
                <div class="container-fluid px-4">

                    <div class="pagetitle">
                        <h1><?= $title; ?></h1>
                    </div>




                    <div class="dashboard">
                        <div class="row">

                            <!-- Left side columns -->
                            <div class="col-lg-8">
                                <div class="row">

                                    <!-- kafe Card -->
                                    <div class="col-xxl-4 col-md-6 mb-3">
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

                                                <table id="tabels" class="table table-striped table-bordered display">
                                                    <thead>
                                                        <tr>
                                                            <th style="min-width:10em">Nama Kafe</th>
                                                            <th style="min-width:10em">Alamat</th>
                                                            <th>Koordinat</th>
                                                            <th>Tanggal Masuk</th>
                                                            <th>User By</th>
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

                                <div class="card mb-3">

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

                                    <div class="card-body mb-3">
                                        <h5 class="card-title">New Users <span>| Last 30 days</span></h5>

                                        <div class="activity">

                                            <table class="table table-striped">
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
                                            <center>
                                                <p><?= ($userMonth == null) ? 'No Data' : null; ?> </p>
                                            </center>

                                        </div>
                                        <a type="button" class="btn btn-primary" href="/user/list">View More</a>

                                    </div>

                                </div>


                            </div><!-- End user Activity -->

                        </div><!-- End Right side columns -->

                    </div>

                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/816b3ace5c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="/js/chart-area-demo.js"></script>
    <script src="/js/chart-bar-demo.js"></script>
    <script src="/js/datatables-simple-demo.js"></script>
    <script src="/js/scripts.js"></script>

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