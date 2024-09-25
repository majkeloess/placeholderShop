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
    $items = [
      [
        "id" => "1",
        "name" => "Logo tee",
        "image" => "img/tee.png",
        "price" => "89$",
      ],
      [
        "id" => "2",
        "name" => "Constructor hoodie",
        "image" => "img/hoodie.png",
        "price" => "129$",
      ],
      [
        "id" => "3",
        "name" => "spider zip",
        "image" => "img/zip.png",
        "price" => "129$",
      ],
      [
        "id" => "4",
        "name" => "Bird sleveless",
        "image" => "img/sleveless.png",
        "price" => "69$",
      ],
    ];

    return $this->render("homepage/homepage.html.twig", [
      'placeholder' => $placeholder,
      'items' => $items
    ]);
  }
}
