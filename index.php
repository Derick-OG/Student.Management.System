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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Management System</title>
  <link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
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
        <img src="WhatsApp Image 2025-08-05 at 07.16.28_b24c1536.jpg" class="user-img" alt="profile pic">
        <div>
          <p><?php echo $_SESSION['username']; ?></p>
          <p>Admin</p>

        </div>
      </div>
  
      <ul>
        <li>
          <a href="index.php">
          <i class="fa-solid fa-chart-line"></i>
            <span class="nav-item">Dashboard</span>
          </a>
          <span
            class="tooltip">Dashboard
          </span>
        </li>
  
        <li>
          <a href="./models/student.php">
            <i class="fa-solid fa-person"></i>
            <span class="nav-item">Students
            </span>
          </a>
          <span class="tooltip">Students
          </span>
        </li>
        <li>
          <a href="./models/course.php">
            <i class="fa-solid fa-layer-group"></i>
            <span class="nav-item">Courses
            </span>
          </a>
          <span class="tooltip">Courses
          </span>
        </li>

        <li>
          <a href="./views/add_courses.php">
            <i class="fa-solid fa-plus"></i>
            <span class="nav-item">AddCourse</span>
          </a>
          <span class="tooltip">AddCourse</span>
        </li>
  
        <li>
          <a href="./models/enrollment.php">
            <i class="fa-solid fa-chair"></i>
            <span class="nav-item">Enrollment</span>
          </a>
          <span class="tooltip">Enrollment</span>
        </li>
  
        <li>
          <a href="logout.php">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <span class="nav-item">Logout</span>
          </a>
          <span class="tooltip">Logout</span>
        </li>
      </ul>
  
    </div>
  
    <div class="main-content">
      <h5>Welcome! <span> <?php echo $_SESSION['username']; ?></span>
      </h5>
      <div class="table"
        style="text-align:center;">
        <div class="title">
          <h1>Students Management System
          </h1>
        </div>
    
        <table class="table">
          <button class="add">
            <a href='./views/add_student.php'>Add Student</a>
          </button>
    
          <tr>
            <th>Student Name</th>
            <th>User Type</th>
            <th>Enrolled Courses</th>
            <th>Manage data</th>
          </tr>
          <hr>
    
          <?php
          include_once 'dbconnect.php';

          $sql = "SELECT id, user_name, user_type, enrolled_courses FROM users WHERE user_type='user'";
          $result = mysqli_query($conn, $sql);
    
          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              // Display each student's full information
              $id = htmlspecialchars($row['id']);
              $username = htmlspecialchars($row['user_name']);
              $usertype = htmlspecialchars($row['user_type']);
              $enrolled = htmlspecialchars($row['enrolled_courses']);

              echo "
              <tr>
                  <td>" . $username . "</td>
                  <td>" . $usertype . "</td>
                  <td>" . $enrolled . "</td>
                <td>
                    <button class='update'>
                      <a href='./views/updatestu.php?updateid=" . $id . "'>Update</a>
                    </button>
    
                    <button class='delete'>
                      <a href='./views/deletestu.php?deleteid=" . $id . "'>Delete</a>
                    </button>
                </td>
            </tr>";
            }
          } else {
            echo "<tr><td colspan='2'>No students found</td></tr>";
          }
    
          ?>
      </div>
      </table>
    </div>

</body>
<script src="./js/style.js"></script>

</html>