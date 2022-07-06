<?php

$page = $_SERVER["REQUEST_URI"] ?? null;
$requestMethod = $_SERVER["REQUEST_METHOD"];


switch ($page) {
    case @"/":
        $dvdCollection = $db->readList('dvd');
        $bookCollection = $db->readList('book');
        $furnitureCollection = $db->readList("furniture");

        require_once __DIR__."/templates/index.php";
        break;

    case @"/add_product":
        if ($requestMethod === "POST") {
            $productType = ucfirst($_POST["type_switcher"]);

            require_once __DIR__."/models/".$productType.".php";

            $productObject = new $productType();
            $productObject->setSku($_POST["sku"]);
            $productObject->setName($_POST["name"]);
            $productObject->setPrice($_POST["price"]);

            switch ($productType) {
                case "Dvd":
                    $productObject->setSize($_POST["size"]);
                    break;
                case "Furniture":
                    $productObject->setHeight($_POST["height"]);
                    $productObject->setWidth($_POST["width"]);
                    $productObject->setLength($_POST["length"]);
                    break;
                case "Book":
                    $productObject->setWeight($_POST["weight"]);
            }
            $productObject->create($productType);
        }
        require_once __DIR__."/templates/add_product.php";
        break;
    case @"/delete_products":
        $productIds = array_map(function ($item) {
            return trim($item, '"');
        }, explode(',', array_key_first($_POST['{"productIds":'])));

        $db->massDelete($productIds);
        echo true;
}
