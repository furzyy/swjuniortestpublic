<?php

class Database
{
    private PDO $PDO;

    public function __construct()
    {
        $database = 'test';
        $username = 'root';
        $password = 'root';
        $servername = '127.0.0.1';
        $dsn = "mysql:dbname=$database;host=$servername:3306";

        $this->PDO = new PDO($dsn, $username, $password);
        $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    public function getPDO(): PDO
    {
        return $this->PDO;
    }

    public function prepare($sql)
    {
        $pdo = $this->getPDO();
        return $pdo->prepare($sql);
    }

    public function getTableColumns($tableName)
    {
        $query = $this->prepare("DESCRIBE $tableName");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getProperties($tableName): array
    {
        $properties = [];
        $tableColumns = $this->getTableColumns($tableName);
        foreach (get_object_vars($this) as $key => $value) {
            if (in_array($key, $tableColumns)) {
                $properties[':' . $key] = $value;
            }
        }

        return $properties;
    }

    public function readList($tableName): array
    {
        $sql = "SELECT * FROM $tableName JOIN product p ON ($tableName.product_id = p.product_id)";
        $statement = $this->prepare($sql);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        $collection = [];
        $className = ucfirst($tableName);
        foreach ($data as $value) {
            $productObject = null;
            switch ($className) {
                case 'Dvd':
                    $productObject = new $className();
                    $productObject->productId = $value['product_id'];
                    $productObject->setSize($value['size']);
                    break;
                case 'Furniture':
                    $productObject = new $className();
                    $productObject->productId = $value['product_id'];
                    $productObject->setHeight($value['height']);
                    $productObject->setWidth($value['width']);
                    $productObject->setLength($value['length']);
                    break;
                case 'Book':
                    $productObject = new $className();
                    $productObject->productId = $value['product_id'];
                    $productObject->setWeight($value['weight']);
            }

            if ($productObject) {
                $productObject->setSku($value['sku']);
                $productObject->setName($value['name']);
                $productObject->setPrice($value['price']);
                $collection[] = $productObject;
            }
        }

        return $collection;
    }

    public function massDelete($productIds)
    {
    }
}
