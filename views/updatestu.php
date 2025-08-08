<?php
include_once '../dbconnect.php';
$id = $_GET['updateid'];

if (!$id) {
  echo "No student ID provided.";
  exit();
}

  // Fetch the current data for the student
$sql = "SELECT * FROM studentdb WHERE studentid = $id";
$result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $name = $row['fullname'];
  $email = $row['email'];



if (isset($_POST['btn'])){
  $name = $_POST['fullname'];
  $email = $_POST['email'];

  $sql = "UPDATE studentdb SET $id= studentid, fullname='$name', email='$email' WHERE studentid=$id";
  $result = mysqli_query($conn,$sql);
  if($result){
    header('location:../index.php');
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update student info</title>
</head>
<body>
  <form action="updatestu.php" method="POST">
    <label for="fullname">Full Name:</label><br>
    <input type="text" id="fullname" name="fullname" required value="<?php echo $name; ?>"><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required value="<?php echo $email; ?>"><br><br>

    <button name="btn" value="update">Update</button>
  </form>
</body>
</html>

