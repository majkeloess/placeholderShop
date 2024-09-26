<?php

namespace App\Controller;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{

  #[Route("/cart", "cart")]
  public function cart(SessionInterface $session)
  {
    $cart = $session->get('cart');

    return $this->render("/cart/cart.html.twig", ["placeholder" => "{{placeholder}}", "cart" => $cart]);
  }

  #[Route("/cart/add", "cart_add")]
  public function add(Request $request, SessionInterface $session, ProductRepository $product)
  {
    $id = $request->request->get("product_id");
    $size = $request->request->get("size");

    $cart = $session->get('cart');

    $prod = $product->fetchById($id);

    if (isset($cart["$id$size"])) {
      $cart["$id$size"]["quantity"]++;
    } else {
      $cart["$id$size"] = [
        "id" => $id,
        "name" => $prod->getName(),
        "size" => $size,
        "price" => $prod->getPrice(),
        "image" => $prod->getImage(),
        "quantity" => 1
      ];
    }

    $session->set('cart', $cart);
    return $this->redirectToRoute("cart");
  }

  #[Route("cart/remove", "cart_remove")]
  public function remove(SessionInterface $session, Request $request)
  {

    $id = $request->request->get("product_id");
    $cart = $session->get('cart');
    unset($cart[$id]);
    $session->set('cart', $cart);

    return $this->redirectToRoute("cart");
  }



}