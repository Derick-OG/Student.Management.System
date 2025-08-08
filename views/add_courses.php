<?php
session_start();
include '../dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $course_name = $_POST['course_name'];
  $course_code = $_POST['course_code'];
$succMess="New course added successfully";
$erroMess="Failed to add course";
  $sql = "INSERT INTO coursedb (coursetittle, course_code) VALUES ('$course_name', '$course_code')";
  if (mysqli_query($conn, $sql)) {
    $succMess;
  } else {
    echo$erroMess;
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Courses</title>
  <link rel="stylesheet" href="../css/style.css">
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
          <a href="students.php">
            <i class="fa-solid fa-eye"></i>
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
          <a href="Enrollment.php">
            <i class="fa-solid fa-plus"></i>
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
      <h1>Add Courses</h1>
      <form class="form-container" action="add_courses.php" method="POST">
      <?php
      if (isset($succMess)) {
        echo "<p class='success-message'>$succMess</p>";
      }
      ?>
    
        <label for="course_name">Course Name:</label><br>
        <input class="input-field" type="text" id="course_name" name="course_name" required>
        <br><br>
        <label for="course_code">Course Code:</label><br>
        <input class="input-field" type="text" id="course_code" name="course_code" required>
        <br><br>
        <input class="addcourse" type="submit" value="Add Course">
      </form>

    </div>  
  </body>
<script src="../js/style.js"></script>

</html>