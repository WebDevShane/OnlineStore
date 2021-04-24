<?php
$title = "Gameware Account";
require_once "../includes/header.php";
require "../lib/functions.php";
$account_details = get_customer($_SESSION['Email']);
$all_orders = get_orders($_SESSION['Email']);
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
                <hr class="featurette-divider">
                <form method="post">
                    <input class="btn btn-outline-primary" type="submit" value="Click Here" name="submit1" onclick="location.href='#scroll';">
                </form>
            </div>
        </div>

        <div id="scroll" class="table-responsive">
            <?php if (isset($_POST['submit1'])) {
                if ($all_orders > 0) { ?>

                    <table class="table table-dark table-striped table-sm">
                        <caption>Order Details</caption>
                        <thead>
                            <tr>
                                <th scope="col">Order #</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Desc</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Price</th>
                                <th scope="col">Shipping Address</th>
                                <th scope="col">Shipping Address</th>
                                <th scope="col">Order DTG</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_orders as $row) : ?>
                                <tr>
                                    <td><?php echo escape($row["order_id"]); ?></td>
                                    <td><?php echo escape($row["product_name"]); ?></td>
                                    <td><?php echo escape($row["product_fullDesc"]); ?></td>
                                    <td><?php echo escape($row["order_qty"]); ?></td>
                                    <td><?php echo escape($row["order_amount"]); ?></td>
                                    <td><?php echo escape($row["order_ship_address"]); ?></td>
                                    <td><?php echo escape($row["order_ship_address2"]); ?></td>
                                    <td><?php echo escape($row["order_date"]); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <blockquote>No orders found for <?php echo escape($_SESSION['Username']); ?>.</blockquote>

            <?php }
            } ?>
        </div>


    </div>

</main>
<?php require_once "../includes/footer.php"; ?>