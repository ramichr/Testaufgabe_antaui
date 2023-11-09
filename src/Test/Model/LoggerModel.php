<?php

namespace Test\Model;

class LoggerModel
{
  private $database;

  public function __construct($database)
  {
    $this->database = $database;
  }

  public function logAction($username, $action)
  {
    $obj_query = $this->database->buildInsert()
      ->table('log')
      ->set('username', $username)
      ->set('date', date('Y-m-d H:i:s'))
      ->set('action', $action);
    $this->database->execute($obj_query);
  }
}
