<?php

class Furniture extends AbstractProduct
{
    public function getHeight(): float
    {
        return $this->getData('height');
    }

    public function setHeight(float $height): void
    {
        $this->setData('height', $height);
    }

    public function getWidth(): float
    {
        return $this->getData('width');
    }

    public function setWidth(float $width): void
    {
        $this->setData('width', $width);
    }

    public function getLength(): float
    {
        return $this->getData('length');
    }

    public function setLength(float $length): void
    {
        $this->setData('length', $length);
    }

    public function getProductId(): int
    {
        return $this->getData('productId');
    }
}