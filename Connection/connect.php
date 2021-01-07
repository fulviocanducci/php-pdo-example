<?php

class Connect extends PDO {
  public function __construct()
  {
    $dsn = 'mysql:host=localhost;dbname=testdb';
    $username = 'root';
    $password = 'senha';
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ); 
    parent::__construct($dsn, $username, $password, $options);
  }
}