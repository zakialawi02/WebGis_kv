<?= $this->extend('_Layout/_template/_admin/templateAdmin'); ?>


<?= $this->section('content'); ?>

<!-- MAIN ISI -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Blank Page</h1>
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
                    <p>This is an examle page with no contrnt. You can use it as a starter for your custom pages.</p>


                    <form class="row g-3" action="/admin/dump" method="post" enctype="multipart/form-data">

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="Monday" name="Monday" value="0">
                            <label class="form-check-label" for="Monday">Monday</label>
                        </div>
                        <div class="col-md-2">
                            <label for="exampleFormControlInput1">Time</label>
                            <input type="time" class="form-control" id="exampleFormControlInput1" name="start[]">
                        </div>
                        <div class="col-md-2">
                            <label for="exampleFormControlInput1">Time</label>
                            <input type="time" class="form-control" id="exampleFormControlInput1" name="end[]">
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="Tuesday" name="Tuesday" value="1">
                            <label class="form-check-label" for="Tuesday">Tuesday</label>
                        </div>
                        <div class="col-md-2">
                            <label for="exampleFormControlInput1">Time</label>
                            <input type="time" class="form-control" id="exampleFormControlInput1" name="start[]">
                        </div>
                        <div class="col-md-2">
                            <label for="exampleFormControlInput1">Time</label>
                            <input type="time" class="form-control" id="exampleFormControlInput1" name="end[]">
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="Wednesday" name="Wednesday" value="2">
                            <label class="form-check-label" for="Wednesday">Wednesday</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="Thursday" name="Thursday" value="3">
                            <label class="form-check-label" for="Thursday">Thursday</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="Friday" name="Friday" value="4">
                            <label class="form-check-label" for="Friday">Friday</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="Saturday" name="Saturday" value="5">
                            <label class="form-check-label" for="Saturday">Saturday</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="Sunday" name="Sunday" value="6">
                            <label class="form-check-label" for="Sunday">Sunday</label>
                        </div>



                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                </div>
            </div>




        </div>
    </section>

</main><!-- End #main -->


<?= $this->endSection(); ?>