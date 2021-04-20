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

function get_customer()
{
    require "../data/config.php";
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $sql = 'SELECT * FROM customers';

        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $customer = $stmt->fetchAll();

        return $customer;
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
