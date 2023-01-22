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


</head>

<body>
    <!-- HEADER -->
    <?= $this->include('_Layout/_template/_admin/header'); ?>


    <!-- SIDEBAR -->
    <?= $this->include('_Layout/_template/_admin/sidebar'); ?>



    <!-- MAIN ISI -->

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
                <div class="card">

                    <div class="card-body">
                        <h3 class="card-title">Example Card</h3>
                        <?php if (session()->getFlashdata('alert')) : ?>
                            <div class="card-body">
                                <div id="alert" class="alert alert-info alert-dismissible fade show" role="alert">
                                    <?= session()->getFlashdata('alert'); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Tambah</button>

                        <!-- Modal -->
                        <div class="modal fade mt-5" id="exampleModal" tabindex="-1" style="z-index: 2001 ;" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">


                                        <form id="form" name="form" action="/user/tambah" method="post" enctype="multipart/form-data" class="row g-3" autocomplete="off">

                                            <?= csrf_field(); ?>

                                            <div class="form-group">
                                                <label for="username" class="col-form-label">Username</label>
                                                <input type="text" class="form-control " name="username" id="username" pattern="^\S{5,}$" title="Minimum 5 karakter & Tidak Boleh Mengandung Spasi" required>
                                                <div id="usernameError" class="error form-text" style="color: red;"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="full_name" class="col-form-label">Full Name</label>
                                                <input type="text" class="form-control" name="full_name" id="full_name">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email" class="col-form-label">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$" title="Masukkan Email Yang Benar" required>
                                                <div id="emailError" class="error form-text" style="color: red;"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password_hash" class="col-form-label">Password</label>
                                                <input type="password" class="form-control" name="password_hash" id="password_hash" autocomplete="off" pattern="^.{6,}$" title="Minimum 6 karakter" required>
                                                <div id="passwordError" class="error form-text" style="color: red;"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="role" class="col-form-label">Role</label>
                                                <select class="form-control" name="role" id="role" required>
                                                    <option value="">--Pilih Role--</option>
                                                    <?php foreach ($auth_groups as $key => $value) : ?>
                                                        <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" id="tombol" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <table class="table table-striped" id="table1" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Active</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $user->username; ?></td>
                                        <td><?= $user->email; ?></td>
                                        <td><span class="badge bg-<?= ($user->name == 'Admin' or $user->name == 'SuperAdmin') ? 'info' : 'secondary'; ?>"> <?= $user->name; ?> </span></td>
                                        <td><span class="badge bg-<?= ($user->active == '0') ? 'danger' : 'success'; ?>"> <?= ($user->active == '0') ? 'inactive' : 'active'; ?> </span></td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#editUserRole-<?= $user->userid ?>"></button>

                                            <!-- Modal -->
                                            <div class="modal fade mt-5" id="editUserRole-<?= $user->userid ?>" tabindex="-1" style="z-index: 2001 ;" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form action="/user/updateUser" method="post" enctype="multipart/form-data" class="row g-3" autocomplete="off">
                                                                <?= csrf_field(); ?>

                                                                <input type="hidden" class="form-control" for="userid" id="userid" name="userid" value="<?= $user->userid ?>">

                                                                <div class="form-group">
                                                                    <label for="username" class="col-form-label">Username</label>
                                                                    <input type="text" class="form-control " name="username" id="username" value="<?= $user->username ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="full_name" class="col-form-label">Full Name</label>
                                                                    <input type="text" class="form-control " name="full_name" id="full_name" value="<?= $user->full_name ?>">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="email" class="col-form-label">Email</label>
                                                                    <input type="email" class="form-control " name="email" id="email" value="<?= $user->email ?>" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="password_hash" class="col-form-label">Password</label>
                                                                    <input type="password" class="form-control" name="password_hash" id="password_hash" autocomplete="off">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="role" class="col-form-label">Role</label>
                                                                    <select class="form-control " name="role" id="role" required>
                                                                        <option value="">--Pilih Role--</option>
                                                                        <?php foreach ($auth_groups as $key => $value) : ?>
                                                                            <option value="<?= $value['id'] ?>" <?= $value['id'] == $user->group_id ? "selected" : null ?>><?= $value['name'] ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="active" class="col-form-label">Status</label>
                                                                    <select class="form-control " name="active" id="active" required>
                                                                        <option value="">--Status--</option>
                                                                        <?php $active = $user->active; ?>
                                                                        <option value="1" <?php if ($active == 1) echo "selected"; ?>>Active</option>
                                                                        <option value="0" <?php if ($active == 0) echo "selected"; ?>>Inactive</option>
                                                                    </select>
                                                                </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <form action="/user/delete/<?= $user->userid ?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger bi bi-trash" onclick="return confirm('Yakin Hapus Data?')"></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <!-- <?php print_r($users); ?> -->

                    </div>
                </div>




            </div>
        </section>

    </main><!-- End #main -->

    <!-- End #main -->


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
            $("#alert");
            setTimeout(function() {
                $("#alert").fadeOut(800);
            }, 2500);
        });
    </script>
    <script>
        $(document).ready(function() {

        });
    </script>


</body>

</html>