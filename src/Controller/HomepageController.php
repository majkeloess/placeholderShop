<?php


namespace App\Controller;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class HomepageController extends AbstractController
{
  #[Route("/", "home")]
  public function homepage(ProductRepository $product)
  {
    $items = $product->fetchAll();


    return $this->render("homepage/homepage.html.twig", [
      'items' => $items
    ]);
  }
}
