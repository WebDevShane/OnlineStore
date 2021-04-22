<?php session_start();

if (isset($_SESSION['Username'])) {
    $account_name = $_SESSION['Username'];
} else {
    $account_name = "notset";
}
if (isset($_SESSION['Email'])) {
    $account_details = $_SESSION['Email'];
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


    <link rel="stylesheet" href="../css/styles.css" />
    <title>GAMEWARE <?php echo $title ?></title>
</head>

<body>
    <!-- <div class="container"> -->