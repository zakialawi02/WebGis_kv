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
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">


</head>

<body>

    <!-- HEADER -->
    <?= $this->include('_Layout/_template/_umum/header'); ?>



    <!-- ISI CONTENT -->
    <section class="contact" id="contact">

        <div class="title-contact">
            <h1 class="heading-title">CONTACT ME</h1>

            <div class="contact-center">
                <div class="left">
                    <center>
                        <h2>Get in Touch</h2>
                    </center>
                    <p>
                        Fill out the form to get in touch with me. <br> You don't like using forms? contact me by email
                        or scan the
                        following qrcode.
                    </p>

                    <img src="/img/qrcontact.jpeg" alt="" class="qrcontact">
                    <div class="p-2"></div>
                    <div>
                        <span class="icon"><i class="bi bi-geo-alt"></i></span>
                        <span class="content">
                            <h3>Address</h3>
                            <span>Indonesia</span>
                        </span>
                    </div>

                    <div>
                        <span class="icon"><i class="bi bi-envelope"></i></span>
                        <span class="content">
                            <h3>Email</h3>
                            <span>hallo@zakialawi.my.id</span>
                        </span>
                    </div>

                </div>

                <div class="right">
                    <center>
                        <h2>Message me</h2>
                    </center>

                    <!-- versi 2 -->
                    <div autocomplete="off" class="form" id="myForm" name="myform">
                        <?= csrf_field(); ?>
                        <div>
                            <input type="text" placeholder="Your Name" name="name" id="name" required />
                            <input type="email" placeholder="Your Email" name="email" id="email" required />
                        </div>
                        <input type="text" placeholder="Subject" name="judul" id="judul" required />
                        <textarea cols="10" rows="10" placeholder="Your Message" name="message" id="message" required></textarea>

                        <div id="terkirim"></div>
                        <input class="btn-contact" type="submit" onclick="sendMai()" role="button" value="Submit" name="sendMail">
                    </div>

                </div>
            </div>
        </div>

    </section>




    <!-- END ISI CONTENT -->



    <!-- FOOTER -->
    <?= $this->include('_Layout/_template/_umum/footer'); ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
    </script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

    <script type="text/javascript">
        (function() {
            emailjs.init("AP-Zbwta6_TwadTCB");
        })();
    </script>
    <script>
        function sendMai() {
            var templateParams = {
                name: document.getElementById("name").value,
                email: document.getElementById("email").value,
                judul: document.getElementById("judul").value,
                message: document.getElementById("message").value,
            };
            console.log(templateParams);
            emailjs.send('service_7xgeic2', 'template_20331zc', templateParams)
                .then(function(response) {
                    console.log('SUCCESS!', response.status, response.text);
                    document.getElementById("terkirim").innerHTML = "Berhasil dikirim!";
                    document.getElementById("terkirim").style.display = "block";
                    setTimeout(function() {
                        document.getElementById("terkirim").style.display = "none";
                    }, 5000);
                    document.getElementById("name").value = "";
                    document.getElementById("email").value = "";
                    document.getElementById("judul").value = "";
                    document.getElementById("message").value = "";
                }, function(error) {
                    console.log('FAILED...', error);
                    document.getElementById("terkirim").innerHTML = "Gagal dikirim!";
                    document.getElementById("terkirim").style.display = "block";
                    setTimeout(function() {
                        document.getElementById("terkirim").style.display = "none";
                    }, 5000);
                });
        }
    </script>
</body>

</html>