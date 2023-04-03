<?php
include '../php/connection.php';
// fetch order details using query having order status new using bind_param
$stmt = $conn->prepare("SELECT * FROM food_order WHERE status=?");
$stmt->bind_param("s", "new");
$stmt->execute();
$result = $stmt->get_result();
// if there are orders with status new, display them
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $order_id = $row['order_id'];
        $items = $row['items'];
        $status = $row['status'];
        $quantity = $row['quantity'];
        echo "<tr>";
        echo "<td>$order_id</td>";
        echo "<td>$items</td>";
        echo "<td>$status</td>";
        echo "<td>$quantity</td>";
        echo "<td><button class='accept-btn' id='$order_id'>Accept</button></td>";
        echo "</tr>";
    }
}
