<?php

// Start the session
session_start();

// session_abort();
// Check if the user has already logged in
if (isset($_SESSION['username'])) {
  // Redirect to the home page
  header("Location: index.php");
  exit;
}

// Check if the login form has been submitted
if (isset($_POST['login'])) {

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "trekwebsite";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  echo $password;
  $query = "SELECT * FROM users WHERE username='$username'";
  $result = mysqli_query($conn, $query);
  var_dump($query);
  var_dump($result);

  $row = mysqli_fetch_array($result);
  // echo $row['password'];

  if (mysqli_num_rows($result) == 1) {
    // Set the session variable
    if (password_verify($password, $row['password'])) {
      $_SESSION['username'] = $username;
      echo "Successful";
      // Redirect to the home page
      header("Location: index.php");
      exit;
    } else {
      // Display an error message
      echo "Invalid username or password.";
      echo $password;
    }

    // Close the database connection
    mysqli_close($conn);
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Log In</title>
  <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet">
  <link rel="stylesheet" href="../Styles/login_form_style.css">

</head>

<body>
  <!-- partial:index.partial.html -->

  <section class='login' id='login'>
    <div class='head'>
      <h1 class='company'>Nature Nomads</h1>
    </div>
    <p class='msg'>Welcome back</p>
    <div class='form'>
      <form action="login_form.php" method="post">
        <input type="text" placeholder='Username' class='text' id='username' name='username' required><br>
        <input type="password" placeholder='••••••••••••••' class='password' name='password'><br>
        <input type="submit" name='login' value='login' class="btn-login" id="do-login">
        <a href="#" class='forgot'>Forgot?</a>
      </form>
    </div>
  </section>

  <!-- partial -->
  <!-- <script src="../Script/login_form_script.js"></script> -->

</body>

</html>