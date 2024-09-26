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
    $price = $session->get("price");


    return $this->render("/cart/cart.html.twig", ["cart" => $cart, "price" => $price]);
  }

  #[Route("/cart/add", "cart_add")]
  public function add(Request $request, SessionInterface $session, ProductRepository $product)
  {
    $id = $request->request->get("product_id");
    $size = $request->request->get("size");



    $cart = $session->get('cart');
    $price = $session->get('price');
    $quantity = $session->get('quantity');

    $prod = $product->fetchById($id);

    if ($price) {
      $price += $prod->getPrice();
    } else {
      $price = $prod->getPrice();
    }

    if ($quantity) {
      $quantity++;
    } else {
      $quantity = 1;
    }


    if (isset($cart["$id$size"])) {
      $cart["$id$size"]["quantity"]++;
    } else {
      $cart["$id$size"] = [
        "id" => $id,
        "id_cart" => "$id$size",
        "name" => $prod->getName(),
        "size" => $size,
        "price" => $prod->getPrice(),
        "image" => $prod->getImage(),
        "quantity" => 1
      ];
    }
    $session->set('cart', $cart);
    $session->set('price', $price);
    $session->set('quantity', $quantity);

    return $this->redirectToRoute("cart");
  }

  #[Route("cart/remove", "cart_remove")]
  public function remove(SessionInterface $session, Request $request)
  {

    $id = $request->request->get("product_id");

    $cart = $session->get('cart');
    $price = $session->get('price');
    $quantity = $session->get('quantity');

    $price -= $cart[$id]["price"];
    $quantity -= $cart[$id]["quantity"];
    unset($cart[$id]);

    $session->set('cart', $cart);
    $session->set('price', $price);
    $session->set('quantity', $quantity);

    return $this->redirectToRoute("cart");
  }

  #[Route("cart/remove_all", "cart_remove_all")]
  public function removeAll(SessionInterface $session)
  {
    $session->set("cart", []);
    $session->set('price', 0);
    $session->set('quantity', 0);

    return $this->redirectToRoute("cart");
  }


}