<header class="sticky-top">
    <nav class="navbar sticky-top navbar-expand-md navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../public/index.php"><img src="../images/logo1.png" class="d-inline-block align-text-center p-1" alt="Brand Logo">GAMEWARE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../public/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public/products.php">Products</a>
                </li>
                <li class="nav-item">
                    <?php
                    if ($username != "notset") {
                        echo '<a class="nav-link" href="../public/account.php" tabindex="-1">Account</a>';
                    } else {
                        echo '<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Account</a>';
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <?php
                if ($username != "notset") {
                    echo '<a class="btn btn-outline-primary text-nowrap my-sm-2" href="logout.php">Log Out</a>';
                } else {
                    echo '<a class="btn btn-outline-primary text-nowrap my-sm-2" href="login.php">Sign In</a>';
                }
                ?>

            </ul>
        </div>
    </nav>


</header>