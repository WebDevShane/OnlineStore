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
