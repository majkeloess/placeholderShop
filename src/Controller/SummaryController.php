<?php



namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


class SummaryController extends AbstractController
{
  #[Route("/summary", "summary")]
  public function summary(Request $request, SessionInterface $session)
  {
    $fullname = $request->request->get("fullname");
    $email = $request->request->get("email");
    $phone = $request->request->get("phone");
    $country = $request->request->get("country");
    $city = $request->request->get("city");
    $address = $request->request->get("address");
    $postal = $request->request->get("postal");

    $cart = $session->get("cart");
    $data = $session->get("data");
    $price = $session->get("price");

    $data = ["fullname" => $fullname, "email" => $email, "phone" => $phone, "country" => $country, "city" => $city, "address" => $address, "postal" => $postal];

    $session->set("data", $data);

    if ($data["fullname"] && $cart && $price) {
      return $this->render("/summary/summary.html.twig", ["data" => $data, "price" => (int) $price + 16, "cart" => $cart]);
    } else {
      return $this->redirectToRoute("home");
    }

  }

}