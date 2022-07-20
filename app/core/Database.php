<?php

class Database
{
    private PDO $PDO;

    public function __construct()
    {
        $databaseCredentials = [
            'database' => 'test',
            'username' => 'root',
            'password' => 'root',
            'servername' => 'localhost'
        ];
//        $databaseCredentials = require_once BASE_DIR."/app/config/database.php";
        $database = $databaseCredentials["database"];
        $servername = $databaseCredentials["servername"];
        $username = $databaseCredentials["username"];
        $password = $databaseCredentials["password"];

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

    public function getProperties(AbstractProduct $product, $tableName): array
    {
        $properties = [];
        $tableColumns = $this->getTableColumns($tableName);
        foreach ($product->getData() as $key => $value) {
            if (in_array($key, $tableColumns)) {
                $properties[':' . $key] = $value;
            }
        }

        return $properties;
    }
}
