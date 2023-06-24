<?php
// Check if the user is already logged in
if (isset($_SESSION['username'])) {
  header('Location: Register.php');
  exit;
}
// Check if the form is submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
  // Check if the username and password are correct
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 1) {
    // The username and password are correct, so log the user in
    $_SESSION['username'] = $username;
    header('Location: index.php');
    exit;
  } else {
    // The username and password are incorrect
    echo '<div class="alert alert-danger">Incorrect username or password</div>';
  }
}
?>