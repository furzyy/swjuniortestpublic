<?php

class Dvd extends BaseProduct
{
    public int $size;
    public int $productId;

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }
}