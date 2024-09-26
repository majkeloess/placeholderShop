<?php

namespace App\Repository;
use App\Model\Product;


class ProductRepository
{
  public function fetchAll()
  {
    return [
      new Product(1, "Placeholder tee", "img/tee.png", 89, "Placeholder is a temporary character, word, or string of characters that stands in for the actual data that will eventually be used in that spot."),
      new Product(2, "Constructor hoodie", "img/hoodie.png", 129, "Constructor is a special method within a class that is automatically called when an object of that class is created. Its primary purpose is to initialize the object's attributes to appropriate values, ensuring the object is in a valid state before any other methods are used."),
      new Product(3, "Serverless zip", "img/zip.png", 129, "Serverless computing is a cloud computing execution model in which the cloud provider allocates machine resources on demand, taking care of the servers on behalf of their customers. It is a misnomer in the sense that servers are still used by cloud service providers to execute code for developers."),
      new Product(4, "Lorem sleveless", "img/sleveless.png", 69, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."),
    ];
  }

  public function fetchById($id)
  {
    $ret = null;
    foreach ($this->fetchAll() as $item) {
      if ($item->getId() == $id) {
        $ret = $item;
      }
    }
    return $ret;
  }
}