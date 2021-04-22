<?php
$title = "Gameware Account";
require_once "../includes/header.php";
require "../lib/functions.php";
?>
<?php require_once "../includes/navbar.php"; ?>
<main>

    <div class="container p-4">
        <div class="row">
            <div class="col-lg-4">
                <h1 class="text-white text-uppercase">
                    Welcome to your account <span class="text-muted"> <?php echo $_SESSION['Username']; ?></span>
                </h1>
            </div>
        </div>
        <div class="row mt-4 justify-content-between">
            <div class="col-lg-4">
                <h3 class="text-white">
                    Account Details
                </h3>
            </div>
            <div class="col-lg-4">
                <h3 class="text-white">
                    Order Details
                </h3>
            </div>
        </div>

    </div>

</main>
<?php require_once "../includes/footer.php"; ?>