<?php
include '../php/connection.php';
// Retrieve the JSON data from the request body
$json_data = file_get_contents('php://input');
$result = json_decode($json_data, true);

// Proceed with the rest of the code if the order has been submitted
if (isset($result['submitOrder']) && $result['totalBill'] > 0 && !empty($result['accountNum'])) {
  include '../php/connection.php';
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $customer_username = $_SESSION['customer_username'];
// retrieve customer id from customer table using customer email
  $stmt = $conn->prepare("SELECT id FROM customer WHERE email = ?");
  $stmt->bind_param("s", $customer_username);
  $stmt->execute();
  $stmt->bind_result($customer_id);
  $stmt->fetch();
  $stmt->close();

// retrieve bill and account num from the result
  array_pop($result); // this call is popping out the submitOrder key
  $account_num = array_pop($result);
  $total_bill = array_pop($result);
// inserting order_data
  $stmt = $conn->prepare("INSERT INTO food_order (total_bill) VALUES (?)");
  $stmt->bind_param("i", $total_bill);
  $stmt->execute();
  $stmt->close();

// Inserting order_details
  $stmt = $conn->prepare("INSERT INTO adds (cust_id, order_num, item_id) VALUES (?, ?, ?)");
//  Inserting order_quantity
  $quantity_stmt = $conn->prepare("INSERT INTO order_quantity (order_num, item_id, quantity) VALUES (?, ?, ?)");
  $order_num = $conn->insert_id;  // this query is giving me the last inserted id
  foreach ($result as $itemId => $quantity) {
    $stmt->bind_param("iii", $customer_id, $order_num, $itemId);
    $quantity_stmt->bind_param("iii", $order_num, $itemId, $quantity);
    $stmt->execute();
    $quantity_stmt->execute();
  }
  $stmt->close();
  $quantity_stmt->close();

//  inserting payment data
  $stmt = $conn->prepare("INSERT INTO payment (account_num) VALUES (?)");
  $stmt->bind_param("s", $account_num);
  $stmt->execute();
  $stmt->close();

//  inserting payment details
  $stmt = $conn->prepare("INSERT INTO pays (cust_id, order_num, payment_id) VALUES (?, ?, ?)");
  $payment_id = $conn->insert_id;
  $stmt->bind_param("sss", $customer_id, $order_num, $payment_id );
  $stmt->execute();
  $stmt->close();

// Return a response to the JavaScript function
  $response = array('status' => 'success', 'message' => 'Checkout successful!');
} else {
  $response = array('status' => 'error', 'message' => 'Checkout failed!');
}
echo json_encode($response);
exit();
