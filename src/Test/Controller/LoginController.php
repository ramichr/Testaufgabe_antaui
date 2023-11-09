<?php

namespace Test\Controller;

class LoginController
{
  private $userModel;
  private $loggerModel;

  public function __construct($userModel, $loggerModel)
  {
    $this->userModel = $userModel;
    $this->loggerModel = $loggerModel;
  }

  public function login($username, $password)
  {
    $user = $this->userModel->getUserByUsername($username);

    if (!$user) {
      $this->loggerModel->logAction($username, 'User does not exist');
      $errorMessage = "Benutzer existiert nicht.";
      include '../src/Test/Views/errorView.php';
      exit;
    }

    if ($user[0]['blocked']) {
      $this->loggerModel->logAction($username, 'Blocked user attempted to login');
      $errorMessage = "Benutzer wurde gesperrt wegen zu vieler Fehlversuche beim Login.";
      include '../src/Test/Views/errorView.php';
      exit;
    }

    if ($user[0]['password'] != $password) {
      $this->loggerModel->logAction($username, 'Failed login attempt');

      $user[0]['failed'] += 1;
      if ($user[0]['failed'] >= 3) {
        $user[0]['blocked'] = 1;
        $errorMessage = "Benutzer wurde gesperrt wegen zu vieler Fehlversuche beim Login.";
      } else {
        $attempts = 3 - $user[0]['failed'];
        $errorMessage = "Falsches Passwort. Sie haben noch " . $attempts . " weitere Versuche.";
      }

      $this->userModel->updateUserLoginData($user[0]['id'], $user[0]['lastlogin'], $user[0]['failed'], $user[0]['blocked']);
      include '../src/Test/Views/errorView.php';
      exit;
    }

    $this->loggerModel->logAction($username, 'Successful login');
    $_SESSION['user_id'] = $user[0]['id'];
    $_SESSION['username'] = $user[0]['username'];
    $_SESSION['last_login'] = $user[0]['lastlogin'];

    $this->userModel->updateUserLoginData($user[0]['id'], date('Y-m-d H:i:s'), 0, 0);
    return true;
  }
}
