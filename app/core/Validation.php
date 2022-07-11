<?php

class Validation
{
    private array $errors;

    private function isEmpty($value): bool {
        return $value === '';
    }

    private function isValidNum($value): bool {
        if (!is_numeric($value) || (float)$value < 0) {
            return false;
        }

        return true;
    }

    private function validateBaseData()
    {
        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $price = $_POST['price'];


        if ($this->isEmpty($sku)) {
            $this->errors[] = 'SKU is missing';
        }

        if ($this->isEmpty($name)) {
            $this->errors[] = 'Name is missing';
        }

        if ($this->isEmpty($price)) {
            $this->errors[] = 'Price is missing';
        }

        if (!$this->isValidNum($price)) {
            $this->errors[] = 'Price must be a valid value';
        }

    }

    private function validateBook()
    {
        $weight = $_POST['weight'];

        if ($this->isEmpty($weight)) {
            $this->errors[] = 'Weight is empty';
        }

        if (!$this->isValidNum($weight)) {
            $this->errors[] = 'Weight must be a valid value';
        }
    }

    private function validateDvd()
    {
        $size = $_POST['size'];

        if ($this->isEmpty($size)) {
            $this->errors[] = 'Size is empty';
        }

        if (!$this->isValidNum($size)) {
            $this->errors[] = 'Size must be a valid value';
        }
    }

    private function validateFurniture()
    {
        $height = $_POST['height'];
        $width = $_POST['width'];
        $length = $_POST['length'];

        if ($this->isEmpty($height)) {
            $this->errors[] = 'Height is empty';
        }

        if ($this->isEmpty($width)) {
            $this->errors[] = 'Width is empty';
        }

        if ($this->isEmpty($length)) {
            $this->errors[] = 'Length is empty';
        }

        if (!$this->isValidNum($height)) {
            $this->errors[] = 'Height must be a valid value';
        }

        if (!$this->isValidNum($width)) {
            $this->errors[] = 'Width must be a valid value';
        }

        if (!$this->isValidNum($length)) {
            $this->errors[] = 'Length must be a valid value';
        }
    }

    public function validateType(): void
    {
        if (!isset($_POST['type_switcher'])) {
            $this->errors[] = 'Please choose a product type';
        }
    }

    public function validatePostData($productType): bool
    {
        $this->validateBaseData();

        $this->validateType();

        switch ($productType) {
            case 'Dvd':
                $this->validateDvd();
                break;
            case 'Furniture':
                $this->validateFurniture();
                break;
            case 'Book':
                $this->validateBook();
        }

        if (isset($this->errors)) {
            return false;
        }

        return true;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
