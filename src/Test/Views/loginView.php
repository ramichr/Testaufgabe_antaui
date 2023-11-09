<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
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

  .login-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .login-container h2 {
    text-align: center;
    color: #333;
  }

  .form-group {
    margin-bottom: 15px;
  }

  .form-group label {
    display: block;
    margin-bottom: 5px;
  }

  .form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
  }

  .form-group input[type="submit"] {
    background-color: #5cb85c;
    color: white;
    cursor: pointer;
    border: none;
  }

  .form-group input[type="submit"]:hover {
    background-color: #4cae4c;
  }
  </style>
  <script>
  function validateForm() {
    var email = document.forms["loginForm"]["username"].value;
    var password = document.forms["loginForm"]["password"].value;
    if (email === "" || password === "") {
      alert("Bitte füllen Sie beide Felder aus.");
      return false;
    }
    return true;
  }
  </script>
</head>

<body>
  <div class="login-container">
    <h2>Login</h2>
    <form name="loginForm" action="index.php" method="POST" onsubmit="return validateForm()">
      <div class="form-group">
        <label for="username">E-Mail:</label>
        <input type="email" name="username" id="username" required placeholder="user@host.domain">
      </div>
      <div class="form-group">
        <label for="password">Passwort:</label>
        <input type="password" name="password" id="password" required placeholder="Ihr Passwort">
      </div>
      <div class="form-group">
        <input type="submit" value="Einloggen">
      </div>
    </form>
  </div>
</body>

</html>