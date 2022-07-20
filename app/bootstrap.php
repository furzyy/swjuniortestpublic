<?php

const BASE_DIR = __DIR__ . '/..';

require_once BASE_DIR."/app/core/Database.php";
require_once BASE_DIR."/app/core/Template.php";
$db = new Database();
$template = new Template();
require_once BASE_DIR."/app/core/Validation.php";
require_once BASE_DIR."/app/core/Model.php";
require_once BASE_DIR."/app/core/AbstractRepository.php";
require_once BASE_DIR."/app/models/AbstractProduct.php";
require_once BASE_DIR."/app/models/Dvd.php";
require_once BASE_DIR."/app/models/Furniture.php";
require_once BASE_DIR."/app/models/Book.php";
require_once BASE_DIR."/app/models/ProductRepository.php";
require_once BASE_DIR."/app/routes.php";
