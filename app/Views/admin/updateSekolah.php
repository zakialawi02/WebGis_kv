<?= $this->extend('_Layout/_template/_admin/templateSekolahData'); ?>


<?= $this->section('content'); ?>

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

                        <form class="row g-3" action="/admin/update_Sekolah" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" class="form-control" for="id" id="id" name="id" value="<?= $tampilKafe->id_kafe; ?>">


                            <div class="mb-3">
                                <label for="nama_kafe" class="form-label">Nama Sekolah</label>
                                <input type="text" class="form-control" id="nama_kafe" aria-describedby="textlHelp" name="nama_kafe" value="<?= $tampilKafe->nama_kafe; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="alamat_kafe" class="form-label">Alamat Sekolah</label>
                                <input type="text" class="form-control" id="alamat_kafe" aria-describedby="textlHelp" name="alamat_kafe" value="<?= $tampilKafe->alamat_kafe; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="coordinate" class="form-label">Koordinat</label>
                                <input type="text" class="form-control" id="coordinate" aria-describedby="textlHelp" name="coordinate" value="<?= $tampilKafe->coordinate; ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Provinsi</label>
                                <select class="form-control select2" id="id_provinsi" name="id_provinsi">
                                    <option value="">--Pilih Provinsi--</option>
                                    <?php foreach ($provinsi as $key => $value) : ?>
                                        <option value="<?= $value['id_provinsi'] ?>"><?= $value['nama_provinsi'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Kabupaten/Kota</label>
                                <select class="form-control select2" id="id_kabupaten" name="id_kabupaten">

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Kecamatan</label>
                                <select class="form-control select2" id="id_kecamatan" name="id_kecamatan">

                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Kelurahan/Desa</label>
                                <select class="form-control select2" id="id_kelurahan" name="id_kelurahan">

                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Foto Sekolah</label>
                                <input class="form-control" type="file" name="foto_kafe" id="foto_kafe" accept="image/*">
                                <div id="FileHelp" class="form-text">.jpg/.png</div>
                            </div>



                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>



            <div class="col-lg-6">
                <div class="card card-title">
                    <div class="card-body">
                        <div class="map" id="map"></div>
                        <p id="L.coordinate">Coordinate</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

</main><!-- End #main -->


<?= $this->endSection(); ?>