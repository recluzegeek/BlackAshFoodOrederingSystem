<?php
session_start();
include '../php/connection.php';
if (!isset($_SESSION['chef_username'])) {
    $message = 'You are not logged in. You will be redirected to the login page.';
    echo "<script type='text/javascript'>alert('$message');</script>"; // Show an alert message
    echo '<script>setTimeout(function(){ window.location.href = "./login.html"; }, 100);</script>'; //redirecting user to login.html
    exit();
}
$stmt = $conn->prepare("SELECT name FROM chef WHERE email = ?");
$stmt->bind_param("s", $_SESSION['chef_username']);
$stmt->execute();
$stmt->bind_result($chefName);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="../css/tables.css">
    <title>CHEF &#8211; Black Ash Restaurant</title>
</head>
<body>

<div class="nav-bar">
    <div class="logo-wrapper">
        <img style="height: 64px; width: 64px"
             src="../img/cropped-blackashlogo@4x.webp"
             alt="logo">
        <h1 style="text-transform: uppercase;color: white;font-weight: 900">Black Ash</h1>
    </div>
    <ul>
        <li><a href="./customer.php">Homepage</a></li>
        <li><a href="#"
               onclick="toggleContainer('chef-container')">Orders</a></li>
        <li><a href="#">Account</a></li>
        <li><a href="#"
               onclick="location.reload()">Help</a></li>
        <li><a href="../php/logout.php?logout=chef">Logout</a></li>
    </ul>
</div>

<main>
    <div id="main-container"
         class="container">
        <p style="text-align: center; font-size: 1.7rem; font-weight: 900">Welcome back, Chef <?php echo $chefName ?>
            !</p>
        <p class="welcome-screen-tagline">"Start managing orders by selecting 'Orders' from the top right navigation
            menu."</p>
        <!--            <br>-->
        <!--            <br>-->
        <p class="welcome-screen-tagline">
            "Choose the 'Pending' tab to see orders that require your attention."
        </p>
        <!--            <br>-->
        <!--            <br>-->
        <p class="welcome-screen-tagline">"Your attention to detail and commitment to quality service will make all the
            difference. Let's get
            started!"
        </p>
    </div>

    <?php
    include '../php/connection.php';
    $sql = "SELECT o.num, a.item_id, q.quantity, i.name
    FROM food_order o
    JOIN adds a ON o.num = a.order_num
    JOIN order_quantity q ON a.item_id = q.item_id AND o.num = q.order_num
    JOIN item i on a.item_id = i.id
    WHERE o.status = 'processing'
    ORDER BY o.date_time DESC";
    $result = $conn->query($sql);
    ?>

    <div id="chef-container"
         class="container"
         style="display: none">
        <div>
            <input type="checkbox"
                   style="opacity: 0"
                   id="select-all-orders"
                   onclick="selectAllOrders()">
            <label class="anchor-styling"
                   for="select-all-orders">Select All Orders</label>
        </div>
        <div id="container"
             style="display: flex;flex-direction: inherit;">
            <div class="table-container"
                 style="width: 90%">
                <ul class="responsive-table"
                    style="padding: 0">
                    <li class="table-header">
                        <div class="col col-1"
                             style="flex-basis: 20%">Serial
                            #<span class="sort-symbol asc">&#9660;</span><span class="sort-symbol desc">&#9650;</span>
                        </div>
                        <div class="col col-2"
                             style="flex-basis: 25%">Order
                            #<span class="sort-symbol asc">&#9660;</span><span class="sort-symbol desc">&#9650;</span>
                        </div>
                        <div class="col col-3"
                             style="display: none"></div>
                        <div class="col col-4"
                             style="display: none"></div>
                        <div class="col col-5"
                             style="display: none"></div>
                        <div class="col col-3"
                             style="flex-basis: 50%">Order Details
                        </div>
                    </li>
                    <?php
                    $prev_order_num = null;
                    $serial_num = 1;
                    if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                    $order_num = $row['num'];
                    $item_name = $row['name'];
                    $quantity = $row['quantity'];

                    if ($order_num != $prev_order_num) {
                    // Start a new order row
                    ?>
                    <li class="table-row order-row">
                        <div><input type="checkbox"
                                    name="order[]"
                                    value="<?php echo $row['num'] ?>"></div>
                        <div class="col col-1"
                             style="flex-basis: 20%"
                             data-label="Serial Num"><?php echo "#" . $serial_num++; ?></div>
                        <div class="col col-2"
                             style="flex-basis: 25%"
                             data-label="Order Num"><?php echo "#" . $order_num ?></div>
                        <div class="col col-3"
                             style="display: none"></div>
                        <div class="col col-4"
                             style="display: none"></div>
                        <div class="col col-5"
                             style="display: none"></div>
                        <div class="col col-3"
                             style="flex-basis: 50%"
                             data-label="Order Details">
                            <div class="order-item-container">
                                <div class="order-item-name"
                                     style="color: black;font-weight: 900;font-size: 1.15rem;">Item Name x Quantity
                                </div>
                                <div class="order-item-name"><?php echo $item_name . ' x ' . $quantity ?></div>
                            </div>
                            <?php
                            } else {
                                // Continue the previous order row
                                ?>
                                <div class="order-item-container">
                                    <div class="order-item-name"><?php echo $item_name . ' x ' . $quantity ?></div>
                                </div>
                                <?php
                            }
                            $prev_order_num = $order_num;
                            }
                            } else {
                                echo "<p>No orders found.</p>";
                            }
                            ?>
                        </div>
                    </li>
                </ul>
                <button class="anchor-styling"
                        id="send-selected-orders-btn"
                        onclick="sendSelectedOrders('processing')">Ready For Takeaway
                </button>
            </div>
        </div>
    </div>
</main>


<footer>
    <p>Copyright © 2023 Black Ash Food Ordering System. All rights reserved.</p>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/data_sort.js"></script>


</body>

</html>
