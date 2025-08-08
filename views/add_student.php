<?php
session_start();
include_once '../dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['user_name'];
  $password = $_POST['password'];
  $usertype = $_POST['user_type'];

  $sql = "INSERT INTO users (user_name, password, user_type) VALUES ('$name', '$email', '$usertype')";

  if ($conn->query($sql) === TRUE) {
    echo "New student added successfully";
  header("Location: ../index.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students</title>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
</head>
</head>
<body>
  <div class="sidebar">
      <div class="top">
        <div class="logo">
          <i class="fa-solid fa-school"></i>
          <span class="logo-text">EHIST</span>
        </div>
          <i class="fa-solid fa-bars" id="btn"></i>
      </div>

      <div class="user">
        <img src="../WhatsApp Image 2025-08-05 at 07.16.28_b24c1536.jpg" class="user-img" alt="profile pic">
        <div>
          <p><?php echo $_SESSION['username']; ?></p>
          <p>Admin</p>

        </div>
      </div>
  
      <ul>
        <li>
          <a href="../index.php">
          <i class="fa-solid fa-chart-line"></i>
            <span class="nav-item">Dashboard</span>
          </a>
          <span
            class="tooltip">Dashboard
          </span>
        </li>
  
        <li>
          <a href="../models/student.php">
            <i class="fa-solid fa-person"></i>
            <span class="nav-item">Students
            </span>
          </a>
          <span class="tooltip">Students
          </span>
        </li>
        <li>
          <a href="../models/course.php">
            <i class="fa-solid fa-layer-group"></i>
            <span class="nav-item">Courses
            </span>
          </a>
          <span class="tooltip">Courses
          </span>
        </li>

        <li>
          <a href="./add_courses.php">
            <i class="fa-solid fa-plus"></i>
            <span class="nav-item">AddCourse</span>
          </a>
          <span class="tooltip">AddCourse</span>
        </li>
  
        <li>
          <a href="../models/enrollment.php">
            <i class="fa-solid fa-chair"></i>
            <span class="nav-item">Enrollment</span>
          </a>
          <span class="tooltip">Enrollment</span>
        </li>
  
        <li>
          <a href="../logout.php">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <span class="nav-item">Logout</span>
          </a>
          <span class="tooltip">Logout</span>
        </li>
      </ul>
  
    </div>
    <div class="main-content">
      <div class="form-container">
        <h1>Enter Student Info
        </h1>
        <form action="add_student.php" method="POST">
          <label for="fullname">Full Name:</label><br>
          <input class="input-field" type="text" id="username" name="user_name" required><br><br>

          <label for="password">Password:</label><br>
          <input class="input-field" type="password" id="password" name="password" required><br><br>

          <label for="name">User Type:</label><br>
          <input class="input-field" type="text" id="usertype" name="user_type" required><br><br>
      
          <button class="addstudent" type="submit" value="Add Student">Add Student</button>
        </form>

      </div>

    </div>
</body>
<script src="../js/style.js"></script>
</html>