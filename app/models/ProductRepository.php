<?php

class ProductRepository extends AbstractRepository
{
    protected function createParentProduct(AbstractProduct $product)
    {
        $product->setData('typeId', $this->getTypeId(strtolower(get_class($product))));

        parent::createParentProduct($product);
    }

    private function createChildProduct(AbstractProduct $product)
    {
        $productId = $this->getPDO()->lastInsertId();
        
        $product->setData('product_id', $productId);
        $product->unsetData('typeId');

        parent::create($product);
    }

    public function create(AbstractProduct $product)
    {
        $this->createParentProduct($product);
        $this->createChildProduct($product);
    }
}
