<?php
require_once __DIR__ . '/../src/autoload.php';


use Test\Database\Database;
use Test\Model\UserModel;
use Test\Model\LoggerModel;
use Test\Controller\LoginController;

session_start();

$str_driver = 'csv';
$str_host = str_replace('\\', '/', realpath(__DIR__ . '/../data'));
$str_dsn = sprintf('%s://%s', $str_driver, $str_host);
$database = Database::factory($str_dsn);

$userModel = new UserModel($database);
$loggerModel = new LoggerModel($database);
$loginController = new LoginController($userModel, $loggerModel);

if ($_SERVER['REQUEST_METHOD'] === 'GET' && !isset($_SESSION['user'])) {
  include '../src/Test/Views/loginView.php';
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $loginSuccess = $loginController->login($_POST['username'], $_POST['password']);
  if ($loginSuccess) {
    $_SESSION['user'] = $_POST['username'];
    include '../src/Test/Views/welcomeView.php';
  } else {
    echo "Login failed.";
  }
} elseif (isset($_SESSION['user'])) {
  include '../src/Test/Views/welcomeView.php';
}
