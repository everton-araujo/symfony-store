<?php

namespace App\Controller;

use App\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/product', name: 'product_')]
class DefaultController extends AbstractController
{
    public function __construct(
        private readonly ProductService $productService
    ) {
    }

    #[Route('/', name: 'index')]
    public function index()
    {
        $name = 'Mingau';

        // $product = new Product();
        // $product->setName('Teste');
        // $product->setDescription('Descrição');
        // $product->setBody('Info');
        // $product->setSlug('produto');
        // $product->setPrice(123);
        // $product->setCreatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));
        // $product->setUpdatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));

        // $this->productService->save($product);
        $products = $this->productService->getAll();

        return $this->render('index.html.twig', compact('name'));
    }

    #[Route('product/{product}', name: 'product')]
    public function getProduct($productId)
    {
        return $this->render('single.html.twig', compact('product'));
    }

    #[Route('/delete/{productId}', name: 'delete')]
    public function delete(string $productId)
    {
        $product = $this->productService->getProduct($productId);

        $this->productService->delete($product);

        return $this->render('index.html.twig', compact('name'));
    }
}
