<?php

namespace App\Controller;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ProductController extends AbstractController
{
  #[Route("/product/{id<\d+>}")]
  public function product($id, ProductRepository $product)
  {
    $prod = $product->fetchById($id);
    return $this->render("/product/product.html.twig", ["product" => $prod]);
  }
}