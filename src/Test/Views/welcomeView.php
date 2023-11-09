<?php

if (!isset($_SESSION['user'])) {
  header('Location: loginView.php');
  exit();
}

$username = $_SESSION['user'];
$lastLogin = $_SESSION['last_login'];
$currentLogin = date('Y-m-d H:i:s');


$lastLoginTime = new DateTime($lastLogin);
$currentLoginTime = new DateTime($currentLogin);
$timeDifference = $lastLoginTime->diff($currentLoginTime);



?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <title>Begrüßung</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f0f0f0;
    }

    .welcome-message {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h1 {
      color: #333;
    }

    p {
      color: #666;
    }

    .logout-button {
      padding: 10px 20px;
      background-color: #3498db;
      color: white;
      text-decoration: none;
      border-radius: 5px;
    }

    .logout-button:hover {
      background-color: #2980b9;
    }

    .user-actions {
      margin-top: 20px;
    }

    .action {
      background-color: #fff;
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body>
  <div class="welcome-message">
    <h1>Willkommen, <?php echo htmlspecialchars($username); ?>!</h1>
    <p>Zeit seit dem letzten Login:
      <?php echo $timeDifference->format('%a Tage, %h Stunden, %i Minuten und %s Sekunden'); ?></p>
    <a href="logout.php" class="logout-button">Ausloggen</a>
  </div>
</body>

</html>