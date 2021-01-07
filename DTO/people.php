<?php

class People  {
  private $id;
  private $name;

  public function setId(int $id): People {
    $this->id = $id;
    return $this;
  }

  public function setName(string $name): People {
    $this->name = $name;
    return $this;
  }

  public function getId(): int {
    return $this->id;
  }

  public function getName(): string {
    return $this->name;
  }
}