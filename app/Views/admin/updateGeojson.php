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

                    <div class="card mb-4">
                        <div class="card-body">

                            <h4 class="card-title">Edit Data</h4>

                            <form class="row g-3" action="/admin/update_Geojson" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <input type="hidden" class="form-control" for="id" id="id" name="id" value="<?= $updateGeojson->id; ?>">
                                <input type="hidden" class="form-control" for="jsonLama" id="jsonLama" name="jsonLama" value="<?= $updateGeojson->geojson; ?>">

                                <div class="mb-3">
                                    <label for="kodeG" class="form-label">Kode</label>
                                    <input type="text" class="form-control" id="kodeG" aria-describedby="textlHelp" name="kodeG" value="<?= $updateGeojson->kode_wilayah; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="Nkec" class="form-label">Nama Wilayah</label>
                                    <input type="text" class="form-control" id="Nkec" aria-describedby="textlHelp" name="Nkec" value="<?= $updateGeojson->nama_wilayah; ?>">
                                </div>
                                <div class="col-md-10">
                                    <label for="formFile" class="form-label">Upload File GeoJSON</label>
                                    <input class="form-control" type="file" name="Fjson" id="Fjson" accept=".geojson, .json">
                                    <div id="FileHelp" class="form-text">.GeoJSON</div>
                                </div>
                                <div class="col-md-2">
                                    <label for="exampleColorInput" class="form-label">Color</label>
                                    <input type="color" class="form-control form-control-color" name="Kwarna" id="Kwarna" value="<?= $updateGeojson->warna; ?>" title="Choose your color">
                                </div>


                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>

                        </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/816b3ace5c.js" crossorigin="anonymous"></script>
    <script src="/js/datatables-simple-demo.js"></script>
    <script src="/js/scripts.js"></script>
</body>

</html>