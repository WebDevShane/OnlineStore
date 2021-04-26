<?php
$title = "Gameware Account";
require_once "../includes/header.php";
require "../lib/functions.php";
require "../data/config.php";
$account_details = get_customer($_SESSION['Email']);
$all_orders = get_orders($_SESSION['Email']);
$error2 = "";

if (isset($_POST['update'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $validate1 = $_POST['email'];
        if (!filter_var($validate, FILTER_VALIDATE_EMAIL)) {
            $error2 = "Invalid email";
        } else {
            $validate1 = $_POST['email'];
        }
        $user_update = [
            'firstname'     => test_data($_POST['firstname']),
            'lastname'      => test_data($_POST['lastname']),
            'email'         => test_data($validate1),
            'address1'      => test_data($_POST['address1']),
            'address2'      => test_data($_POST['address2']),
            'city'          => test_data($_POST['city']),
            'country'       => test_data($_POST['country']),
            'eircode'       => test_data($_POST['eircode']),
            'userId'        => test_data($_SESSION['id'])
        ];

        $sql = 'UPDATE customers 
    SET firstname = :firstname, 
        lastname  = :lastname, 
        email     = :email, 
        address1  = :address1,
        address2  = :address2,
        city      = :city,
        country   = :country,
        eircode   = :eircode 
    WHERE customer_id   = :userId';


        $statement = $connection->prepare($sql);
        $statement->execute($user_update);
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_POST['delete'])) {
    delete_account();
    header("location:logout.php");
}

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
                    Account Details <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit Details</button>
                </h3>
                <form method="post">
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Account details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="firstname" id="firstname" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" id="lastname" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" required>
                                        <span class="text-danger"><?php echo $error2; ?></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address1" class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address1" id="address1" placeholder="Apartment, studio, or floor" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address2" class="form-label">Address 2</label>
                                        <input type="text" class="form-control" name="address2" id="address2" placeholder="1234 Main St..." required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" name="city" id="city" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" class="form-control" name="country" id="country" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="eircode" class="form-label">Zip/Eircode</label>
                                        <input type="text" class="form-control" name="eircode" id="eircode" required>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php if (isset($_POST['update']) && $statement) { ?>
                    > <?php echo '<div class="alert alert-success" role="alert">Account Updated</div>' ?>
                <?php } ?>
                <hr class="featurette-divider">
                <?php foreach ($account_details as $details) { ?>
                    <?php $_SESSION['id'] = escape($details['customer_id']); ?>
                    <h4 class="text-white mb-0">First Name</h4>
                    <h5 class="text-muted"><?php echo escape($details['firstname']); ?></h5>
                    <h4 class="text-white mb-0">Surname</h4>
                    <h5 class="text-muted"><?php echo escape($details['lastname']); ?></h5>
                    <h4 class="text-white mb-0">Email</h4>
                    <h5 class="text-muted"><?php echo escape($details['email']); ?></h5>
                    <h4 class="text-white mb-0">Address</h4>
                    <h5 class="text-muted"><?php echo escape($details['address1']); ?></h5>
                    <h4 class="text-white mb-0">Address 2</h4>
                    <h5 class="text-muted"><?php echo escape($details['address2']); ?></h5>
                    <h4 class="text-white mb-0">City</h4>
                    <h5 class="text-muted"><?php echo escape($details['city']); ?></h5>
                    <h4 class="text-white mb-0">Country</h4>
                    <h5 class="text-muted"><?php echo escape($details['country']); ?></h5>
                    <h4 class="text-white mb-0">Eircode/Post Code</h4>
                    <h5 class="text-muted"><?php echo escape($details['eircode']); ?></h5>
                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal2">Delete Account</button>
                <?php } ?>
                <form method="post">
                    <div class="modal" id="modal2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Account</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-dark">Are you sure you want to delete your account?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    <button type="submit" name="delete" class="btn btn-primary">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
                if ($all_orders >= 1) { ?>

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
                    <blockquote class="text-white">No orders found for <?php echo escape($_SESSION['Username']); ?>.</blockquote>

            <?php }
            } ?>
        </div>


    </div>

</main>
<?php require_once "../includes/footer.php"; ?>