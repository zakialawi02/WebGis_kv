<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="/">WEBGIS</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#team">Team</a></li>
                <li class="dropdown"><a href="#"><span>Cari</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Data Persebaran</a></li>
                        <li><a href="#">Terdekat</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>


                <?php if (logged_in()) : ?>
                    <li><a class="dropdown getstarted scrollto" href="/MyProfile">Dashboard</a></li>
                    <li><a class="dropdown getstarted scrollto" href="<?= base_url('logout'); ?>">Log Out<i class="bi bi-box-arrow-right"></i></a></li>
                <?php else : ?>
                    <li><a class="getstarted scrollto" href="/Login">Login</a></li>
                <?php endif ?>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->