<?php
$title = "Gameware User Registration";
require_once "../includes/header.php";
require "../data/config.php";
require "../lib/functions.php";
$error1 = "";
$statement = "";
$error2 = "";

if (isset($_POST['submit'])) {
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

    if (
        empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['pass'])
        || empty($_POST['address1']) || empty($_POST['city']) || empty($_POST['country']) || empty($_POST['eircode'])
    ) {
        $error1 = "All fields required";
    } else {
        try {
            $connection = new PDO($dsn, $username, $password, $options);

            $validate = $_POST['email'];
            if (!filter_var($validate, FILTER_VALIDATE_EMAIL)) {
                $error2 = "Invalid email";
            } else {
                $validate = $_POST['email'];
            }
            $new_customer = array(
                "firstname" => test_data($_POST['firstname']),
                "lastname"  => test_data($_POST['lastname']),
                "email"     => test_data($validate),
                "pass"      => test_data($_POST['pass']),
                "address1"  => test_data($_POST['address1']),
                "address2"  => test_data($_POST['address2']),
                "city"      => test_data($_POST['city']),
                "country"   => test_data($_POST['country']),
                "eircode"   => test_data($_POST['eircode'])
            );

            $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "customers",
                implode(", ", array_keys($new_customer)),
                ":" . implode(", :", array_keys($new_customer))
            );

            $statement = $connection->prepare($sql);
            $statement->execute($new_customer);
        } catch (PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
}
?>
<?php require_once "../includes/navbar.php"; ?>
<main>
    <div class="container p-4">
        <?php if (isset($_POST['submit']) && $statement) { ?>
            <?php echo '<div class="alert alert-success" role="alert"> Succesfully Registered</div>' ?>
        <?php } elseif (empty($statement)) { ?>
            <?php echo '<div class="alert text-danger text-start" role="alert">' . $error1 . '</div>' ?>
        <?php } ?>
        <hr class="featurette-divider">
        <form method="post" class="row g-4">
            <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
            <div class="col-md-6">
                <label for="firstname" class="form-label text-white">First Name</label>
                <input type="text" class="form-control" name="firstname" id="firstname" required>
            </div>
            <div class="col-md-6">
                <label for="lastName" class="form-label text-white">Last Name</label>
                <input type="text" class="form-control" name="lastname" id="lastname" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label text-white">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
                <div id="passwordHelpBlock" class="form-text">
                    Please enter a valid Email address.
                </div>
                <span class="text-danger"><?php echo $error2; ?></span>
            </div>
            <div class="col-md-6">
                <label for="pass" class="form-label text-white">Password</label>
                <input type="password" class="form-control" name="pass" id="pass" required>
                <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long,
                    contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>
            </div>
            <div class="col-md-6">
                <label for="address1" class="form-label text-white">Address</label>
                <input type="text" class="form-control" name="address1" id="address1" placeholder="Apartment, studio, or floor" required>
            </div>
            <div class="col-md-6">
                <label for="address2" class="form-label text-white">Address 2</label>
                <input type="text" class="form-control" name="address2" id="address2" placeholder="1234 Main St..." required>
            </div>
            <div class="col-md-6">
                <label for="city" class="form-label text-white">City</label>
                <input type="text" class="form-control" name="city" id="city" required>
            </div>
            <div class="col-md-6">
                <label for="country" class="form-label text-white">Country</label>
                <select id="country" name="country" class="form-select" required>
                    <option selected>Ireland</option>
                    <option>Great Britain</option>
                    <option>USA</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="eircode" class="form-label text-white">Zip/Eircode</label>
                <input type="text" class="form-control" name="eircode" id="eircode" required>
            </div>
            <div class="col-12">
                <button type="submit" name="submit" class="btn btn-outline-primary">Sign Up</button>
            </div>
            <hr class="featurette-divider">
        </form>
    </div>



</main>

<?php require_once "../includes/footer.php"; ?>