<?php
session_start();
if (!isset($_SESSION['customer_username'])) {
  $message = 'You are not logged in. You will be redirected to the login page.';
  echo "<script type='text/javascript'>alert('$message');</script>"; // Show an alert message
  echo '<script>setTimeout(function(){ window.location.href = "./login.php"; }, 100);</script>'; //redirecting user to login.php
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Confirmation - Grateful for Your Order</title>
  <style>
    body {
      background-color: #f8f8f8;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 700px;
      margin: 0 auto;
      padding: 20px;
      text-align: center;
    }

    h1 {
      font-size: 3rem;
      font-weight: bold;
      margin-bottom: 20px;
    }

    p {
      font-size: 1.5rem;
      margin-bottom: 20px;
    }

    .tagline {
      font-size: 1.2rem;
      margin-bottom: 20px;
    }

    .cta {
      background-color: #ffc107;
      border-radius: 15px;
      color: #3d3d3d;
      display: inline-block;
      font-size: 1.2rem;
      padding: 10px 20px;
      text-decoration: none;
      border-style: none;
    }

    .cta:hover {
      background-color: #ffc107;
      color: green;
      transform: scale(1.05);
    }
  </style>
</head>
<body>
<div class="container">
  <h1>Thank You!</h1>
<!--  <p>Your order has been placed and will be delivered shortly.</p>-->
  <p>Your order with number <strong>#<?php
      include "../php/connection.php";
      $username = $_SESSION['customer_username'];
      $query = "SELECT order_num FROM adds WHERE cust_id = (SELECT id FROM customer WHERE email = '$username') ORDER BY order_num DESC LIMIT 1";
      $stmt = $conn->prepare($query);
      $stmt->execute();
      $stmt->bind_result($order_id);
      $stmt->fetch();
      $stmt->close();
      echo $order_id;
      ?></strong> has been placed and will be delivered shortly.</p>
  <div class="tagline">
    We appreciate your support 😎 and are honored to have served you.
  </div>
  <a href="./customer.php" class="cta">Order Again</a>
</div>
</body>
</html>
