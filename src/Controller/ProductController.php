<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ProductController extends AbstractController
{
  #[Route("/product/{id<\d+>}")]
  public function product($id)
  {
    return $this->render("/product/product.html.twig", ["id" => $id, "placeholder" => "{{placeholder}}"]);
  }
}