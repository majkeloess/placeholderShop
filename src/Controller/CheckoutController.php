<?php


namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


class CheckoutController extends AbstractController
{
  #[Route("/checkout", "checkout"),]
  public function checkout(SessionInterface $session)
  {
    $cart = $session->get("cart");
    $price = $session->get("price");


    if ($cart) {
      return $this->render("/checkout/checkout.html.twig", ["cart" => $cart, "price" => $price, "ship" => "16"]);
    } else {
      return $this->redirectToRoute("home");
    }


  }

}