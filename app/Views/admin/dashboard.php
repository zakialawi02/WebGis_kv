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
    <?= $this->include('_Layout/_template/_admin/header'); ?>
    <div id="layoutSidenav">
        <!-- SIDEBAR -->
        <?= $this->include('_Layout/_template/_admin/sidebar'); ?>

        <div id="layoutSidenav_content">

            <!-- MAIN CONTENT -->
            <main>
                <div class="container-fluid px-4">

                    <div class="pagetitle">
                        <h1><?= $title; ?></h1>
                    </div>




                    <div class="dashboard">
                        <?php if (in_groups('SuperAdmin') || in_groups('Admin')) :; ?>
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

                                                    <table id="tabels" class="table table-striped table-bordered">
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

                            </div>
                        <?php else : ?>
                            <!-- user -->
                            <div class="row">

                                <div class="col-xl-4 p-3">
                                    <div class="card">
                                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center"> <img src="/img/user/<?= user()->user_image; ?>" alt="Profile" class="rounded-circle">
                                            <h2 class="m-1 mt-2"><?= user()->full_name; ?></h2>

                                            <?php if (in_groups('Admin' && 'SuperAdmin')) : ?>
                                                <a class="badge bg-secondary"><?= user()->username; ?></a>
                                            <?php else : ?>
                                                <a class="badge bg-info"><?= user()->username; ?></a>
                                            <?php endif ?>
                                        </div>
                                        <a href="/myprofile" class="btn btn-outline-primary m-4">Edit My Profile</a>
                                    </div>
                                </div>


                                <div class="col-xl-8 p-3">
                                    <?php $totalPending = count($pendingKafe); ?>
                                    <?php $totalTerima = count($terimaKafe); ?>
                                    <?php $totalTolak = count($tolakKafe); ?>

                                    <div class="card">
                                        <div class="card-body pt-3">
                                            <h3>Data</h3>
                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Pending<span class="badge bg-secondary m-1"><?= $totalPending; ?></span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">Tanggal Masuk</th>
                                                                            <th scope="col">ID</th>
                                                                            <th scope="col">Nama Kafe</th>
                                                                            <th scope="col">Status</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($pendingKafe as $pkafe) : ?>
                                                                            <tr class="">
                                                                                <td scope="row"><?= date('d M Y H:i:s', strtotime($pkafe->created_at)); ?></td>
                                                                                <td><?= $pkafe->id_kafe; ?></td>
                                                                                <td><?= $pkafe->nama_kafe; ?></td>
                                                                                <td><?= $pkafe->stat_appv == 0 ? 'Pending' : ($pkafe->stat_appv == 1 ? 'Terima' : 'Tolak') ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingTwo">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            Diterima<span class="badge bg-success m-1"><?= $totalTerima; ?></span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">Tanggal Masuk</th>
                                                                            <th scope="col">ID</th>
                                                                            <th scope="col">Nama Kafe</th>
                                                                            <th scope="col">Status</th>
                                                                            <th scope="col">Tanggal Update</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($terimaKafe as $tkafe) : ?>
                                                                            <tr class="">
                                                                                <td scope="row"><?= date('d M Y H:i:s', strtotime($tkafe->created_at)); ?></td>
                                                                                <td><?= $tkafe->id_kafe; ?></td>
                                                                                <td><?= $tkafe->nama_kafe; ?></td>
                                                                                <td><?= date('d M Y H:i:s', strtotime($tkafe->date_updated)); ?></td>
                                                                                <td><?= $tkafe->stat_appv == 0 ? 'Pending' : ($tkafe->stat_appv == 1 ? 'Terima' : 'Tolak') ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingThree">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            Ditolak<span class="badge bg-danger m-1"><?= $totalTolak; ?></span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">Tanggal Masuk</th>
                                                                            <th scope="col">ID</th>
                                                                            <th scope="col">Nama Kafe</th>
                                                                            <th scope="col">Status</th>
                                                                            <th scope="col">Tanggal Update</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($tolakKafe as $skafe) : ?>
                                                                            <tr class="">
                                                                                <td scope="row"><?= date('d M Y H:i:s', strtotime($skafe->created_at)); ?></td>
                                                                                <td><?= $skafe->id_kafe; ?></td>
                                                                                <td><?= $skafe->nama_kafe; ?></td>
                                                                                <td><?= date('d M Y H:i:s', strtotime($tkafe->date_updated)); ?></td>
                                                                                <td><?= $skafe->stat_appv == 0 ? 'Pending' : ($skafe->stat_appv == 1 ? 'Terima' : 'Tolak') ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        <?php endif ?>
                    </div>

                </div>
            </main>

            <!-- FOOTER -->
            <?= $this->include('_Layout/_template/_admin/footer'); ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/816b3ace5c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="/js/datatables-simple-demo.js"></script>
    <script src="/js/scripts.js"></script>

    <script>
        $(document).ready(function() {
            $("th").css("pointer-events", "none");
            $(".no-sort").css("pointer-events", "none");
        });
    </script>
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