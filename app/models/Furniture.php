<?php

class Furniture extends BaseProduct
{
    public float $height;
    public float $width;
    public float $length;
    public int $productId;

    public function getHeight(): float
    {
        return $this->height;
    }

    public function setHeight(float $height): void
    {
        $this->height = $height;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function setWidth(float $width): void
    {
        $this->width = $width;
    }

    public function getLength(): float
    {
        return $this->length;
    }

    public function setLength(float $length): void
    {
        $this->length = $length;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }
}