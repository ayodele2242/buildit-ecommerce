<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Finapp - Mobile Template</title>
    <link rel="stylesheet" href="assets/css/style.css?v=5">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="description" content="Finapp HTML Mobile Template">
    <meta name="keywords" content="bootstrap, mobile template, mobile, html, wallet, banking, finance" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="shortcut icon" href="assets/img/favicon.png">
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="assets/img/logo-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Contact
        </div>
        <div class="right">
            <a href="#" class="headerButton">
                <ion-icon name="call-outline"></ion-icon>
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="p-1">
                        <div class="text-center">
                            <h2 class="text-primary">Get in Touch</h2>
                            <p>Fill the form to contact us</p>
                        </div>
                        <form>
                            <div class="form-group basic animated">
                                <div class="input-wrapper">
                                    <label class="label" for="name2">Your name</label>
                                    <input type="text" class="form-control" id="name2" placeholder="Your name">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <div class="form-group basic animated">
                                <div class="input-wrapper">
                                    <label class="label" for="email2">E-mail</label>
                                    <input type="text" class="form-control" id="email2" placeholder="E-mail">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <div class="form-group basic animated">
                                <div class="input-wrapper">
                                    <label class="label" for="textarea2">Message</label>
                                    <textarea id="textarea2" rows="4" class="form-control"
                                        placeholder="Message"></textarea>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <div class="mt-2">
                                <button type="button" class="btn btn-primary btn-lg btn-block">Send</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="section mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="p-1">
                        <div class="text-center">
                            <h2 class="text-primary">Our Address</h2>
                            <p class="card-text">
                                PO Box 16122 Collins Street West<br>
                                Victoria 8007 Australia
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section mt-2 mb-2">
            <div class="card">
                <div class="card-body">
                    <div class="p-1">
                        <div class="text-center">
                            <h2 class="text-primary mb-2">Social Profiles</h2>

                            <a href="#" class="btn btn-facebook btn-icon mr-05">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>

                            <a href="#" class="btn btn-twitter btn-icon mr-05">
                                <ion-icon name="logo-twitter"></ion-icon>
                            </a>

                            <a href="#" class="btn btn-linkedin btn-icon mr-05">
                                <ion-icon name="logo-linkedin"></ion-icon>
                            </a>

                            <a href="#" class="btn btn-whatsapp btn-icon mr-05">
                                <ion-icon name="logo-whatsapp"></ion-icon>
                            </a>

                            <a href="#" class="btn btn-instagram btn-icon mr-05">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>

                            <a href="#" class="btn btn-twitch btn-icon mr-05">
                                <ion-icon name="logo-twitch"></ion-icon>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- * App Capsule -->


    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="app-index.html" class="item">
            <div class="col">
                <ion-icon name="pie-chart-outline"></ion-icon>
                <strong>Overview</strong>
            </div>
        </a>
        <a href="app-pages.html" class="item">
            <div class="col">
                <ion-icon name="document-text-outline"></ion-icon>
                <strong>Pages</strong>
            </div>
        </a>
        <a href="app-components.html" class="item">
            <div class="col">
                <ion-icon name="apps-outline"></ion-icon>
                <strong>Components</strong>
            </div>
        </a>
        <a href="app-cards.html" class="item">
            <div class="col">
                <ion-icon name="card-outline"></ion-icon>
                <strong>My Cards</strong>
            </div>
        </a>
        <a href="app-settings.html" class="item">
            <div class="col">
                <ion-icon name="settings-outline"></ion-icon>
                <strong>Settings</strong>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->


    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="assets/js/lib/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="assets/js/lib/popper.min.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- Base Js File -->
    <script src="assets/js/base.js?v=5"></script>


</body>

</html>