<?php
include '../php/connection.php';
session_start();
if (!isset($_SESSION['manager_username'])) {
    $message = 'You are not logged in. You will be redirected to the login page.';
    echo "<script type='text/javascript'>alert('$message');</script>"; // Show an alert message
    echo '<script>setTimeout(function(){ window.location.href = "./login.html"; }, 100);</script>'; //redirecting user to login.html
    exit();
}
$stmt = $conn->prepare("SELECT name FROM manager WHERE email = ?");
$stmt->bind_param("s", $_SESSION['manager_username']);
$stmt->execute();
$stmt->bind_result($managerName);
$stmt->fetch();
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>MANAGER &#8211; Black Ash Restaurant</title>
    <link rel="stylesheet"
          href="../css/tables.css">
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
        <li class="dropdown">
            <a href="#"
               onclick="toggleContainer('main-container')">Orders &#9662;</a>
            <div class="dropdown-content">
                <a href="#"
                   onclick="toggleContainer('customer-container')">Customer Orders</a>
                <a href="#"
                   onclick="toggleContainer('chef-container')">Chef Orders</a>
            </div>
        </li>
        <li><a href="#">Account</a></li>
        <li><a href="#"
               onclick="location.reload()">Help</a></li>
        <li><a href="../php/logout.php?logout=manager">Logout</a></li>
    </ul>
</div>
<main>
    <div id="main-container"
         class="container">
        <p style="text-align: center; font-size: 1.7rem; font-weight: 900">Welcome back,
            Manager <?php echo $managerName ?>!</p>
        <p class="welcome-screen-tagline">"Start managing orders by selecting 'Orders' from the top right navigation
            menu."</p>
        <!--            <br>-->
        <!--            <br>-->
        <p class="welcome-screen-tagline">"Choose whether to manage customer or chef's orders."</p>

        <!--            <br>-->
        <!--            <br>-->
        <p class="welcome-screen-tagline">"Your attention to detail and commitment to quality service will make all the
            difference. Let's get
            started!"
        </p>
    </div>

    <?php
    function generateOrderList($containerId, $status)
    {
        include '../php/connection.php';
        $sql = "SELECT num, total_bill, date_time, status FROM food_order WHERE status = ? ORDER BY date_time DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $status);
        $stmt->execute();
        $result = $stmt->get_result();
        $serial_num = 1;
        ?>
        <div id="<?php echo $containerId ?>"
             class="container"
             style="display: none">
            <div>
                <input type="checkbox"
                       style="opacity: 0"
                       id="select-all-orders"
                       onclick="selectAllOrders()"><label class="anchor-styling"
                                                          for="select-all-orders">Select All Orders</label>
            </div>
            <div id="container"
                 style="display: flex; flex-direction: inherit;">
                <div class="table-container"
                     style="width: 90%;">
                    <ul class="responsive-table"
                        style="padding: 0">
                        <li class="table-header">
                            <div class="col col-1">Serial
                                #<span class="sort-symbol asc">&#9660;</span><span class="sort-symbol desc">&#9650;</span>
                            </div>
                            <div class="col col-2">Order
                                #<span class="sort-symbol asc">&#9660;</span><span class="sort-symbol desc">&#9650;</span>
                            </div>
                            <div class="col col-3">Placement
                                Time<span class="sort-symbol asc">&#9660;</span><span class="sort-symbol desc">&#9650;</span>
                            </div>
                            <div class="col col-4">Status</div>
                            <div class="col col-5">Total
                                Amount<span class="sort-symbol asc">&#9660;</span><span class="sort-symbol desc">&#9650;</span>
                            </div>
                        </li>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <li class="table-row">
                                <div><input type="checkbox"
                                            name="order[]"
                                            value="<?php echo $row['num'] ?>"></div>
                                <div class="col col-1"
                                     data-label="Serial Num"><?php echo "#" . $serial_num++; ?></div>
                                <div class="col col-2"
                                     data-label="Order Num"><?php echo "#" . $row['num']; ?></div>
                                <div class="col col-3"
                                     data-label="Placement Time"><?php echo date('M d, Y g:i:s A', strtotime($row['date_time'])); ?></div>
                                <div class="col col-4"
                                     data-label="Status">
                            <span class="<?php
                            $status = $row['status'];
                            switch ($status) {
                                case 'new':
                                    echo 'status-new';
                                    break;
                                case 'pending':
                                    echo 'status-pending';
                                    break;
                                case 'processing':
                                    echo 'status-processing';
                                    break;
                                case 'completed':
                                    echo 'status-completed';
                                    break;
                                default:
                                    echo 'status-default';
                                    break;
                            }
                            ?>"><?php echo $status; ?></span>
                                </div>
                                <div class="col col-5"
                                     data-label="Total Amount"><?php echo "Rs. " . $row['total_bill']; ?></div>
                            </li>
                        <?php } ?>
                    </ul>
                    <button class="anchor-styling"
                            id="send-selected-orders-btn"
                            onclick="sendSelectedOrders('<?php echo $status ?>')">Send Orders For Processing
                    </button>
                </div>
            </div>
        </div>
        <?php
    }

    ?>

    <!-- Usage: -->
    <?php
    generateOrderList("customer-container", "new");
    generateOrderList("chef-container", "pending");
    ?>


</main>
<footer>
    <p>Copyright © 2023 Black Ash Food Ordering System. All rights reserved.</p>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/data_sort.js"></script>

</body>
</html>
