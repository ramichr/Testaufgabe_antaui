<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fehler</title>
  <style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f7f7f7;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }

  .error-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
  }

  .error-container h1 {
    color: #e74c3c;
  }

  .error-container p {
    color: #333;
  }

  .error-container a {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #3498db;
    color: white;
    text-decoration: none;
    border-radius: 5px;
  }

  .error-container a:hover {
    background-color: #2980b9;
  }
  </style>
</head>

<body>
  <div class="error-container">
    <h1>Fehler</h1>
    <p><?php echo htmlspecialchars($errorMessage); ?></p>
    <a href="index.php">Zurück zum Login</a>
  </div>
</body>

</html>