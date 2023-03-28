<?php
include 'connection.php';

// retrieve the form data
$username = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phoneNum']);
$password = trim($_POST['password']);

// Sanitizing User Input
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// register the customer
$stmt = $conn->prepare("INSERT INTO customer (name, email, phoneNum, password) VALUES (?, ?, ?, SHA2(?,256))");
$stmt->bind_param("ssss", $username, $email, $phone, $password);
$stmt->execute();
$result = $stmt->get_result();
$message = 'Registration Successful. Login to continue.';
echo "<script type='text/javascript'>alert('$message');</script>"; // Show an alert message
echo '<script>setTimeout(function(){ window.location.href = "../customer/login.php"; }, 100);</script>'; //redirecting user to login.html
