<?php


namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class HomepageController extends AbstractController
{
  #[Route("/")]
  public function homepage()
  {
    $placeholder = "{{placeholder}}";
    return $this->render("homepage/homepage.html.twig", ['placeholder' => $placeholder]);
  }
}
