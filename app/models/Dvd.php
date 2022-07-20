<?php

class Dvd extends AbstractProduct
{
    public function getSize(): int
    {
        return $this->getData('size');
    }

    public function setSize(int $size): void
    {
        $this->setData('size', $size);
    }

    public function getProductId(): int
    {
        return $this->getData('productId');
    }
}