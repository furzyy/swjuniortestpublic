<?php

abstract class AbstractProduct extends Model
{
    public function getSku(): string
    {
        return $this->getData('sku');
    }

    public function setSku(string $sku): void
    {
        $this->setData('sku', $sku);
    }

    public function getName(): string
    {
        return $this->getData('name');
    }

    public function setName(string $name): void
    {
        $this->setData('name', $name);
    }

    public function getPrice(): float
    {
        return $this->getData('price');
    }

    public function setPrice(float $price): void
    {
        $this->setData('price', $price);
    }

}