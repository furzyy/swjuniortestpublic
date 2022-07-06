<?php

class Book extends BaseProduct
{
    public float $weight;
    public int $productId;

    public function getWeight(): float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }
}