<?php
if (isset($_GET['logout'])) {
  if ($_GET['logout'] == 'customer') {
    session_start();
    // unset all session variables
    $_SESSION = array();
    session_unset();
    session_destroy();
    echo "Customer Logged out";
    header("Location: ../customer/login.php");
    exit();
  } elseif ($_GET['logout'] == 'chef') {
    session_start();
    // unset all session variables
    $_SESSION = array();
    session_unset();
    session_destroy();
    echo "Chef Logged out";
    header("Location: ../chef/login.html");
    exit();
  } elseif ($_GET['logout'] == 'manager') {
    session_start();
    // unset all session variables
    $_SESSION = array();
    session_unset();
    session_destroy();
    echo "Manager Logged out";
    header("Location: ../manager/login.html");
    exit();
  }
}
