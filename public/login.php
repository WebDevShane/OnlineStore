<?php
$title = "Login to Gameware account";
require_once "../includes/header.php";
require "../lib/functions.php";
?>

<?php require_once "../includes/navbar.php"; ?>
<main>
    <div class="container-sm text-center mt-5 mb-5">
        <hr class="featurette-divider">
        <form method="post">
            <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
            <div class="row row-cols-1 justify-content-center">
                <div class="col-9">
                    <img class="mb-4" src="../images/logo.png" alt="" width="50" height="50">
                    <h1 class="h3 mb-3 fw-normal text-white">Please sign in</h1>
                </div>
                <div class="col-9 form-floating">
                    <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="col-9 pt-2 form-floating">
                    <input type="password" class="form-control" name="pass" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="col checkbox pt-2 mb-3 text-white">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <div class="col-4">
                    <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign in</button>
                    <p class="mt-5 mb-3 text-muted"><?php echo '©' . date('Y') ?></p>
                    <?php
                    if (isset($_POST['submit'])) {
                        if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

                        try {
                            require "../data/config.php";

                            $connection = new PDO($dsn, $username, $password, $options);

                            $sql = "SELECT firstname 
                                  FROM customers
                                  WHERE email = :email AND pass = :pass";

                            $email  = $_POST['email'];
                            $pass   = $_POST['pass'];
                            $statement = $connection->prepare($sql);
                            $statement->bindParam(':email', $email, PDO::PARAM_STR);
                            $statement->bindParam(':pass', $pass, PDO::PARAM_STR);
                            $statement->execute();

                            $result = $statement->fetch(PDO::FETCH_ASSOC);

                            if ($result > 0) {
                                $arr = array_values($result);
                                $_SESSION['Username'] = $arr[0];
                                $_SESSION['Email'] = $email;
                                header("location:index.php");
                                exit;
                            } else {
                                echo '<button type="button" class="btn btn-outline-danger">Incorrect Email or Password</button>';
                            }
                        } catch (PDOException $error) {
                            echo $sql . "<br>" . $error->getMessage();
                        }
                    }
                    ?>
                </div>
            </div>
        </form>
        <hr class="featurette-divider">
    </div>

</main>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>