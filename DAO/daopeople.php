<?php

class DaoPeople {
  
  public function __construct(public PDO $pdo)
  {
    
  }

  public function insert(People $people): People
  {
    $prepare = $this->pdo->prepare('INSERT INTO peoples(name) VALUES(:name);');
    $prepare->bindValue('name', $people->getName());
    $prepare->execute();
    $people->setId($this->pdo->lastInsertId());
    return $people;
  }

  public function update(People $people):bool
  {
    $prepare = $this->pdo->prepare('UPDATE peoples SET name=:name WHERE id=:id');
    $prepare->bindValue('name', $people->getName());
    $prepare->bindValue('id', $people->getId());
    $prepare->execute();
    return $prepare->rowCount() > 0;
  }

  public function all(): array
  { 
    $prepare = $this->pdo->prepare('SELECT id, name FROM peoples ORDER BY id');
    $prepare->execute();
    return $prepare->fetchAll(PDO::FETCH_CLASS, People::class);
  }

  public function get(int $id): People
  {
    $prepare = $this->pdo->prepare('SELECT id, name FROM peoples WHERE id=:id ORDER BY id');
    $prepare->bindValue('id', $id);
    $prepare->setFetchMode(PDO::FETCH_CLASS, People::class);
    $prepare->execute();
    return $prepare->fetch();    
  }

  public function delete(int $id): bool
  {
    $prepare = $this->pdo->prepare('DELETE FROM peoples WHERE id=:id');
    $prepare->bindValue('id', $id);
    $prepare->execute();
    return $prepare->rowCount() > 0;
  }

}

