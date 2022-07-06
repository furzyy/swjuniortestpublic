<?php

class Model extends Database
{
    private function createMainProduct($typeId)
    {
        $sql = "INSERT INTO product(sku, name, price, type_id) VALUES (:sku, :name, :price, :type_id)";
        $statement = $this->prepare($sql);
        $statement->execute([
            ':sku' => $this->getSku(),
            ':name' => $this->getName(),
            ':price' => $this->getPrice(),
            ':type_id' => $typeId
        ]);
    }

    private function createChildProduct($tableName)
    {
        $this->createMainProduct($this->getTypeId($tableName));
        $productId = $this->getPDO()->lastInsertId();
        $properties = array_merge($this->getProperties($tableName), [':product_id' => $productId]);
        $columns = implode(', ', array_keys($properties));

        $columns2 = implode(', ', array_map(function ($columName) {
            return substr($columName, 1);
        }, array_keys($properties)));


        $sql = "INSERT INTO $tableName($columns2) VALUES($columns)";
        $statement = $this->prepare($sql);
        $statement->execute($properties);
    }

    public function create()
    {
        $this->createChildProduct(strtolower(get_called_class()));
    }

    public function getTypeId($type)
    {
        $sql = "SELECT type_id FROM product_types WHERE product_name = ?";
        $statement = $this->prepare($sql);
        $statement->execute([$type]);

        return $statement->fetch()["type_id"];
    }
}