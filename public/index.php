<?php
$title = "INDEX";
require_once "../includes/header.php";
?>
<?php require_once "../includes/navbar.php"; ?>
<main>

    <!-- START OF CAROUSEL -->
    <div id="slider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../images/background1.jpg" class="bd-placeholder-img" alt="Two Desktops, Laptop, Computer Accesseries" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                <div class="container">
                    <div class="d-block carousel-caption text-start">
                        <h1>Register Today.</h1>
                        <p>Sign up and activate your account to quickly and easily make purchases.</p>
                        <p><a class="btn btn-md btn-primary" href="register.php">Sign up today</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../images/bg2.jpg" class="bd-placeholder-img" alt="Radeon desktop with side open" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                <div class="container">
                    <div class="d-block carousel-caption">
                        <h1>Another example headline.</h1>
                        <p>Some representative placeholder content for the second slide of the carousel.</p>
                        <p><a class="btn btn-md btn-primary" href="#">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../images/background3.jpg" class="bd-placeholder-img" alt="Monitor and keyboard" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                <div class="container">
                    <div class="d-block carousel-caption text-end">
                        <h1>One more for good measure.</h1>
                        <p>Some representative placeholder content for the third slide of this carousel.</p>
                        <p><a class="btn btn-md btn-primary" href="#">Browse gallery</a></p>
                    </div>
                </div>
            </div>
            ::after
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- END OF CAROUSEL -->

    <div class="container">
        <hr class="featurette-divider">
        <div id="featurette" class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">NVIDIA RTX30 Seires<span class="text-muted"><br>It’ll blow your mind.</span></h2>
                <p class="lead">Pre-Order here to avoid dissappointment</p>
                <a class="btn btn-outline-primary text-nowrap my-sm-2" href="products.php">Click Here</a>
            </div>
            <div class="col-md-5">
                <img src="../images/rtx30.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="100%" height="100%" role="img" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>NVIDIA RTX30</title>
                <rect width="100%" height="100%" fill="#eee"></rect>
            </div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Razer Deathadder Elite <span class="text-muted"><br>Destiny 2 Edition</span></h2>
                <p class="lead">Engineered to give you the unfair advantage in intense gameplay, the Razer DeathAdder Elite comes with all-new Razer™ Mechanical Mouse Switches.</p>
                <a class="btn btn-outline-primary text-nowrap my-sm-2" href="products.php">Click Here</a>
            </div>
            <div class="col-md-5 order-md-1">
                <img src="../images/razer_mouse_d2_edition.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="100%" height="100%" role="img" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Razer</title>
                <rect width="100%" height="100%" fill="#eee"></rect>

            </div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Desktop Towers <span class="text-muted"><br>Build your own</span></h2>
                <p class="lead">Gameware has everything you need to build your own custom gaming rig.</p>
                <a class="btn btn-outline-primary text-nowrap my-sm-2" href="products.php">Click Here</a>
            </div>
            <div class="col-md-5">
                <img src="../images/antec_mid_tower.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="100%" height="100%" role="img" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Antec Mid Tower</title>
                <rect width="100%" height="100%" fill="#eee"></rect>

            </div>
        </div>
    </div>
    <!-- END OF FEATURES -->

    <?php require_once "../includes/footer.php"; ?>

    <!-- https://www.wallpaperflare.com/computer-technology-pc-master-race-pc-gaming-pc-cases-wallpaper-pxdku -->