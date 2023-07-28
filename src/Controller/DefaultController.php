<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_')]
class DefaultController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index()
    {
        $name = 'Mingau';

        return $this->render('index.html.twig', compact('name'));
    }

    #[Route('product/{product}', name: 'product')]
    public function product($product)
    {
        return $this->render('single.html.twig', compact('product'));
    }
}
