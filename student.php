<?php
session_start();
if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
</head>

<body>
  <div class="sidebar">
    <div class="top">
      <div class="logo">
        <i class="fas fa-user-graduate"></i>
        <span class="logo-text">EHIST</span>
      </div>
      <i class="fas fa-bars" id="btn"></i>
    </div>
    <div class="user">
      <img class="user-img" src="WhatsApp Image 2025-08-05 at 07.16.28_b24c1536.jpg" alt="profile pic">
      <span>
        <p><?php echo $_SESSION['username']; ?></p>
        <p>Student</p>
      </span>
    </div>
    <ul>
      <li>
        <a href="dashboard.php">
          <i class="fas fa-tachometer-alt"></i>
          <span class="nav-item">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>

      <li>
        <a href="enroll.php">
          <i class="fas fa-book"></i>
          <span class="nav-item">Enrolled</span>
        </a>
        <span class="tooltip">Enrolled</span>
      </li>

      <li>
        <a href="courses.php">
          <i class="fas fa-eye"></i>
          <span class="nav-item">Courses</span>
        </a>
        <span class="tooltip"> Courses</span>
      </li>

      <li>
        <a href="logout.php">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Logout</span>
        </a>
        <span class="tooltip">Logout</span>
      </li>
    </ul>
  </div>

  <div class="main-content">
    <h5 style="color:green">Welcome! <span> <?php echo $_SESSION['username']; ?></span></h5>

  </div>
</body>

<script src="./js/style.js"></script>

</html>