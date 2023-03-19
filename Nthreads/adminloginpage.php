<!DOCTYPE html>
<html>
<head>
    <style>
        body {
  background-color: #f7f7f7;
  font-family: Arial, sans-serif;
  color: #333;
}

h1 {
  text-align: center;
  margin-top: 50px;
  font-size: 32px;
}

form {
  margin: 0 auto;
  width: 300px;
  padding: 30px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

label {
  display: block;
  font-size: 14px;
  font-weight: bold;
  margin-bottom: 10px;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: none;
  border-radius: 5px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
}

input[type="submit"] {
  background-color: #333;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
  background-color: #555;
}

button {
  background-color: #333;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  margin-top: 20px;
}

button:hover {
  background-color: #555;
}
    </style>
    <title>Login</title>
</head>
<body>
    <h1>Admin Login</h1>
    <form method="post" action="admin_login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
    <button onclick="location.href='index.php'">Back to Home</button>
</body>
</html>