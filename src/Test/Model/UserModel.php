<?php

namespace Test\Model;

class UserModel
{
  private $database;

  public function __construct($database)
  {
    $this->database = $database;
  }

  public function getUserByUsername($username)
  {
    $obj_query = $this->database->buildSelect()
      ->cols(['id', 'username', 'password', 'failed', 'blocked', 'lastlogin'])
      ->from('user')
      ->where('username', $username);
    return $this->database->fetchAssoc($obj_query);
  }

  public function updateUserLoginData($id, $lastlogin, $failed, $blocked)
  {
    $obj_query = $this->database->buildUpdate()
      ->set('lastlogin', $lastlogin)
      ->set('failed', $failed)
      ->set('blocked', $blocked)
      ->table('user')
      ->where('id', $id);
    $this->database->execute($obj_query);
  }
}
