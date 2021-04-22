<?php
$title = "Gameware Account";
require_once "../includes/header.php";
require "../lib/functions.php";
$account_details = get_customer($_SESSION['Email']);
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
                <hr class="featurette-divider">
                <?php foreach ($account_details as $details) { ?>
                    <h4 class="text-white mb-0">First Name</h4>
                    <h5 class="text-muted"><?php echo $details['firstname'] ?></h5>
                    <h4 class="text-white mb-0">Surname</h4>
                    <h5 class="text-muted"><?php echo $details['lastname'] ?></h5>
                    <h4 class="text-white mb-0">Email</h4>
                    <h5 class="text-muted"><?php echo $details['email'] ?></h5>
                    <h4 class="text-white mb-0">Address</h4>
                    <h5 class="text-muted"><?php echo $details['address1'] ?></h5>
                    <h4 class="text-white mb-0">Address 2</h4>
                    <h5 class="text-muted"><?php echo $details['address2'] ?></h5>
                    <h4 class="text-white mb-0">City</h4>
                    <h5 class="text-muted"><?php echo $details['city'] ?></h5>
                    <h4 class="text-white mb-0">Country</h4>
                    <h5 class="text-muted"><?php echo $details['country'] ?></h5>
                    <h4 class="text-white mb-0">Eircode/Post Code</h4>
                    <h5 class="text-muted"><?php echo $details['eircode'] ?></h5>
                <?php } ?>
                <hr class="featurette-divider">
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