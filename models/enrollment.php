<?php
session_start();

include '../dbconnect.php';
$id = $_GET['selectid'];

if (!$id) {
  echo "No Course ID provided.";
  exit();
}

  // Fetch the current data for the course
$sql = "SELECT * FROM coursedb WHERE courseid = $id";
$result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $name = $row['coursetittle'];

if(isset($_POST['select'])) {
  $id = $_GET['selectid'];
$sql="INSERT INTO users (enrolled_courses) SELECT coursetittle FROM coursedb WHERE courseid= $id";
$result= mysqli_query($conn, $sql);
if($result){
  header('Location:./student.php');
} else{
  echo "Failed to Select Course";
}

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Courses</title>
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
          <a href="student.php">
            <i class="fa-solid fa-person"></i>
            <span class="nav-item">Students
            </span>
          </a>
          <span class="tooltip">Students
          </span>
        </li>
              <li>
          <a href="courses.php">
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
          <a href="logout.php">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <span class="nav-item">Logout</span>
          </a>
          <span class="tooltip">Logout</span>
        </li>
      </ul>
  
    </div>
    <div class="main-content">
      <table class="table" style="border-collapse: collapse;">
        <div class="title">
          <h1>Select Courses to Enroll</h1>

        </div>
      <button class="add">
      <a href="../views/add_courses.php">Add New Course</a>
      </button>
          <tr>
            <th>Course Title</th>
            <th>Course Code</th>
            <th>Actions</th>
          </tr>
      <?php
          $sql = "SELECT courseid,coursetittle, course_code FROM coursedb";
          $result = mysqli_query($conn, $sql);
          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id= $row['courseid'];
              $course = $row['coursetittle'];
              $course_code = $row['course_code'];
    
              echo "<tr>
        <td>" .$course."</td>
        <td>" .$course_code."</td>
        <td>
          <button name='select' type='submit' class='update' value='Select Course'><a href='?selectid=" . $id . "'>Select Course</a></button>
        </td>
        </tr>";
          }
        } else {
        echo "<tr><td colspan='2'>No courses found</td></tr>";
        }
     ?>

    </div>
  </body>
 <script src="../js/style.js"></script>

</html>