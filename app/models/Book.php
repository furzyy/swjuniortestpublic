<?php

class Book extends AbstractProduct
{
    public function getWeight(): float
    {
        return $this->getData('weight');
    }

    public function setWeight(float $weight): void
    {
        $this->setData('weight', $weight);
    }

    public function getProductId(): int
    {
        return $this->getData('productId');
    }
}