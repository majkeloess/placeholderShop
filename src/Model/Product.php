<?php

namespace App\Model;


class Product
{
  public function __construct(private int $id, private string $name, private string $image, private int $price, private string $description)
  {
  }
  public function getId(): int
  {
    return $this->id;
  }

  public function getName(): string
  {
    return $this->name;

  }
  public function getImage(): string
  {
    return $this->image;
  }

  public function getPrice(): int
  {
    return $this->price;
  }
  public function getDescription(): string
  {
    return $this->description;
  }

}