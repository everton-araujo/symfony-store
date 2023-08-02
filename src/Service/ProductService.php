<?php

namespace App\Service;

use App\Entity\Product;
use App\Repository\ProductRepository;

class ProductService
{
    public function __construct(
        private ProductRepository $productRepository
    ) {
    }

    public function getAll(): array
    {
        return $this->productRepository->findAll();
    }

    public function getProduct(int $productId): Product
    {
        return $this->productRepository->find($productId);
    }

    public function save(Product $product): void
    {
        $this->productRepository->save($product, true);
    }

    public function delete(Product $product): void
    {
        $this->productRepository->remove($product, true);
    }
}
