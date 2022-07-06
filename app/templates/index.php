<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/reset.css">
    <link rel="stylesheet" href="assets/productlist.css">
    <title>Product List</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>

<div class="main-content-list">
    <div>
        <div class="product-list-header">
            <header>
                <h2 class="product-list-title">Product List</h2>
                <div class="product-list-header-buttons">
                    <button id="add-product-btn"><a href="add_product">ADD</a></button>
                    <button id="delete-product-btn" onclick="new Product().delete()">MASS DelETE</button>
                </div>
            </header>
        </div>

        <div class="product-list-content">
            <?php foreach ($dvdCollection as $item) : ?>
                <div id="<?= $item->getProductId() ?>" class="product-box">
                    <input value="<?= $item->getProductId() ?>" type="checkbox" class="delete-checkbox">
                    <div class="product-box-content">
                        <div><?= $item->getSku() ?></div>
                        <div><?= $item->getName() ?></div>
                        <div><?= $item->getPrice() ?> $</div>
                        <div>Size: <?= $item->getSize() ?> MB</div>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php foreach ($bookCollection as $item) : ?>
            <div id="<?= $item->getProductId() ?>" class="product-box">
                <input value="<?= $item->getProductId() ?>" type="checkbox" class="delete-checkbox">
                <div class="product-box-content">
                    <div><?= $item->getSku() ?></div>
                    <div><?= $item->getName() ?></div>
                    <div><?= $item->getPrice() ?> $</div>
                    <div>Weight: <?= $item->getWeight() ?>KG</div>
                </div>
            </div>
            <?php endforeach; ?>

            <?php foreach ($furnitureCollection as $item) : ?>
                <div id="<?= $item->getProductId() ?>" class="product-box">
                    <input value="<?= $item->getProductId() ?>" type="checkbox" class="delete-checkbox">
                    <div class="product-box-content">
                        <div><?= $item->getSku() ?></div>
                        <div><?= $item->getName() ?></div>
                        <div><?= $item->getPrice() ?> $</div>
                        <div> Dimension: <?= $item->getHeight() ?> x <?= $item->getWidth() ?> x <?= $item->getLength() ?> </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
</div>

<footer class="product-list_footer">
    <p>Scandiweb Test Assignment</p>
</footer>
</body>
</html>
<script src="assets/js/product.js"></script>
