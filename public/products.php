<?php
$title = "Gameware Products";
require_once "../includes/header.php";
require "../lib/functions.php";

$products = get_products();
?>
<?php require_once "../includes/navbar.php"; ?>
<main>
    <div class="container p-4">
        <hr class="featurette-divider">
        <div class="row">
            <?php foreach ($products as $product) { ?>
                <div class="col-lg-4 my-2 text-center">
                    <h4 class="text-white text-uppercase">
                        <?php echo $product['product_name']; ?>
                    </h4>

                    <img src="<?php echo $product['product_image']; ?>" class="rounded">

                    <blockquote class="pet-details text-white pt-1">
                        <span class="badge bg-primary"><?php echo $product['product_brand']; ?></span>
                        <br><small>Price: €<?php echo $product['product_price']; ?></small>
                        <?php
                        if ($product['product_stock'] >= 1) {
                            echo '<span class="badge bg-success">In Stock</span>';
                        } else {
                            echo '<span class="badge bg-danger">Out of Stock</span>';
                        }
                        ?>
                    </blockquote>

                    <p class="lh-sm py-2">
                        <?php echo $product['product_fullDesc']; ?>
                    </p>
                    <a class="btn btn-outline-primary text-nowrap my-sm-2" href="#">Add to cart</a>
                </div>
            <?php } ?>
        </div>
        <hr class="featurette-divider">
    </div>


</main>

<?php require_once "../includes/footer.php"; ?>