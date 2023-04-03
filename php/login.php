<!-- handling login requests just for chef and manager. customer requests are being handled in login.php located inside the customer directory-->
<?php
include 'connection.php';
session_start();

if (isset($_POST['login-button'])) {
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
  }
  $message = 'Invalid username or password. You will be redirected to the login page.';

   if ($_POST['login-button'] == 'chef') {
    if (isset($_SESSION['chef_username'])) {
      header("Location: ../chef/chef.php");
      exit();
    }
    // Authenticate Chef
    $stmt = $conn->prepare("SELECT * FROM chef WHERE email=? AND password=SHA2(?,256)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
      $_SESSION['chef_username'] = $username;
      header("Location: ../chef/chef.php");
    }else{
      echo "<script type='text/javascript'>alert('$message');</script>";
      echo '<script>setTimeout(function(){ window.location.href = "../chef/login.html"; }, 100);</script>';
    }
  } elseif ($_POST['login-button'] == 'manager') {
    // Authenticate Manager
    $stmt = $conn->prepare("SELECT * FROM manager WHERE email=? AND password=SHA2(?,256)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
//    echo 'console.log("'.$result->num_rows.'"))';
    if ($result->num_rows == 1) {
      $_SESSION['manager_username'] = $username;
      header("Location: ../manager/manager.php");
    }else{
      echo "<script type='text/javascript'>alert('$message');</script>";
      echo '<script>setTimeout(function(){ window.location.href = "../manager/login.html"; }, 100);</script>';
    }
  }
}
