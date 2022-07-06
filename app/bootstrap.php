<?php

require_once __DIR__."/../app/core/Database.php";
$db = new Database();
require_once __DIR__ ."/../app/core/Model.php";
require_once __DIR__."/../app/models/AbstractProduct.php";
require_once __DIR__."/../app/models/BaseProduct.php";
require_once __DIR__ . "/../app/models/Dvd.php";
require_once __DIR__. "/../app/models/Furniture.php";
require_once __DIR__. "/../app/models/Book.php";
require_once __DIR__."/routes.php";
