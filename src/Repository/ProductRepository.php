<?php

namespace App\Repository;
use App\Model\Product;


class ProductRepository
{
  public function fetchAll()
  {
    return [
      new Product(1, "Logo tee", "img/tee.png", 89, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."),
      new Product(2, "Constructor hoodie", "img/hoodie.png", 129, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."),
      new Product(3, "Spider zip", "img/zip.png", 129, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."),
      new Product(4, "Bird sleveless", "img/sleveless.png", 69, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."),
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