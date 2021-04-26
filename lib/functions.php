<?php



if (empty($_SESSION['csrf'])) {
    if (function_exists('random_bytes')) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
}



/**
 * Escapes HTML for output
 */

function escape($html)
{
    return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

function test_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function get_products()
{
    require "../data/config.php";
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $sql = 'SELECT * FROM products';

        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll();

        return $products;
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

function get_customer($account_email)
{
    require "../data/config.php";
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $sql = 'SELECT * FROM customers WHERE email = :acc_email';

        $acc_email = $account_email;
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':acc_email', $acc_email, PDO::PARAM_STR);
        $stmt->execute();
        $customer = $stmt->fetchAll();

        return $customer;
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

function get_orders($order_email)
{
    require "../data/config.php";
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $sql = 'SELECT orders.*, products.product_name, products.product_fullDesc 
        FROM orders JOIN products WHERE orders.product_id = products.product_id 
        AND orders.order_email = :order_email';

        $orders = $order_email;
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':order_email', $orders, PDO::PARAM_STR);
        $stmt->execute();
        $customer = $stmt->fetchAll();

        return $customer;
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

function delete_account()
{
    require "../data/config.php";
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $userId = $_SESSION['id'];
        $sql = 'DELETE FROM customers WHERE customer_id = :userId';


        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
