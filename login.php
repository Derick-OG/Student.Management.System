<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stums";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $sql = "SELECT * FROM users WHERE user_name='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  if ($row['user_type'] == 'user') {
    $_SESSION['username'] = $username;
    header("Location: student.php");
  } else if ($row['user_type'] == 'admin') {
    $_SESSION['username'] = $username;
    header("Location: index.php");
  } else {
    echo "Username or Password incorrect";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>

  <form action="login.php" method="POST">
    <div class="form-container">
      <h1>Please Enter Your Login Credentials:</h1>
      <label for="username">Username:</label><br>
      <input class="input-field" type="text" id="username" name="username" required>
      <br><br>
      <label for="password">Password:</label><br>
      <input class="input-field" type="password" id="password" name="password" required>
      <br><br>
      <input class="login" type="submit" value="Login">

    </div>
  </form>
</body>

</html>