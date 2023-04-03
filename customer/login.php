<?php
include "../php/connection.php";
session_start();
if (isset($_SESSION['customer_username'])) {
  // Redirect to the customer dashboard
  header("Location: ./customer.php");
  exit();
}

if (isset($_POST['login-button'])) {
  $username = trim($_POST['email']);
  $password = trim($_POST['password']);
// Sanitizing User Input
  $username = mysqli_real_escape_string($conn, $username);
  $password = mysqli_real_escape_string($conn, $password);
  $message = 'Invalid Credentials. Please Try again.';

  if ($_POST['login-button'] == 'customer') {

    // Authenticate Customer
    $stmt = $conn->prepare("SELECT * FROM customer WHERE email=? AND password=SHA2(?,256)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
      // Set a session variable to remember the customer
      $_SESSION['customer_username'] = $username;
      // Redirect to the customer dashboard or home page
      header("Location: ./customer.php");
    } else {
      echo "<script type='text/javascript'>alert('$message');</script>"; // Show an alert message
      echo '<script>setTimeout(function(){ window.location.href = "./login.php"; }, 100);</script>'; //redirecting user to login.php
    }
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible"
        content="IE=edge">
  <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"
        href="../css/chef.css">
  <title>Customer Portal &#8211; Black Ash Restaurant</title>
</head>

<body>

<div class="login-container">
  <form action=""
        method="post">
    <h2>Welcome to the World of Food Delights</h2>
    <input type="email" name="email" id="email" placeholder="Email" value="" required>
    <input type="password" name="password" id="password" placeholder="Password" value="" required>
    <a href="#">Forgot your password?</a>
    <a href="./register.html">Doesn't have Account? Click Here.</a>
    <button type="submit"
            name="login-button"
            value="customer">Sign in
    </button>
  </form>
</div>

</body>

</html>
