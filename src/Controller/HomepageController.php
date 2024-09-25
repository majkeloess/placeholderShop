<?php


namespace App\Controller;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class HomepageController extends AbstractController
{
  #[Route("/")]
  public function homepage(ProductRepository $product)
  {
    $placeholder = "{{placeholder}}";
    $items = $product->fetchAll();


    return $this->render("homepage/homepage.html.twig", [
      'placeholder' => $placeholder,
      'items' => $items
    ]);
  }
}
