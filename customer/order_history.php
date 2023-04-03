<?php
include '../php/connection.php';
    session_start();

if (!isset($_SESSION['customer_username'])) {
    $message = 'You are not logged in. You will be redirected to the login page.';
    echo "<script type='text/javascript'>alert('$message');</script>"; // Show an alert message
    echo '<script>setTimeout(function(){ window.location.href = "./login.php"; }, 100);</script>'; //redirecting user to login.php
    exit();
}

$user_name = $_SESSION['customer_username'];
// fetch all food_orders with the userid using bind_param
$sql = "SELECT DISTINCT f.* 
        FROM food_order f 
        JOIN adds a ON f.num = a.order_num
        WHERE a.cust_id = (SELECT id FROM customer WHERE email = ?) order by f.date_time desc";
//        WHERE a.cust_id = 21 order by f.date_time desc";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_name);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <title>Order History &#8211; Customer</title>
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
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Account</a></li>
        <li><a href="../php/logout.php?logout=customer">Logout</a></li>
    </ul>
</div>

<main>
<div class="container" style="width: 90%">
    <p style="width: 100%;text-align: center; font-size: 1.7rem; font-weight: 900">ORDER HISTORY</p>
    <div class="status-container">
        <div><p class="status-new">NEW – Order Received</p></div>
        <div><p class="status-pending">PENDING – Confirmation Sent to Customer</p></div>
        <div><p class="status-processing">PROCESSING – Order Being Processed by Chef</p></div>
        <div><p class="status-completed">COMPLETED – Order Ready for Pickup</p></div>
    </div>
    <div class="table-container">
        <ul class="responsive-table"
            style="padding: 0">
            <li class="table-header">
                <div style="display: none" class="col col-1">Serial #<span class="sort-symbol asc">&#9660;</span><span class="sort-symbol desc">&#9650;</span></div>
                <div class="col col-2">Order
                    #<span class="sort-symbol asc">&#9660;</span><span class="sort-symbol desc">&#9650;</span></div>
                <div class="col col-3">Placement
                    Time<span class="sort-symbol asc">&#9660;</span><span class="sort-symbol desc">&#9650;</span></div>
                <div class="col col-4">Status<span class="sort-symbol asc">&#9660;</span><span class="sort-symbol desc">&#9650;</span>
                </div>
                <div class="col col-5">Amount<span class="sort-symbol asc">&#9660;</span><span class="sort-symbol desc">&#9650;</span>
                </div>
            </li>
            <?php if ($result->num_rows == 0) {
                // display fun message
                echo "<div style='padding: 10px;
    text-align: center;
    width: 93%;
    height: 85px;
    text-transform: capitalize;
    font-weight: 900;
    font-size: 25px;'> Oops! Looks like you haven't ordered anything yet. Why not try some of our delicious dishes and satisfy your cravings?
    <div><a href='./customer.php' style='background-color: #ffc107;
    border-radius: 5px;
    color: #3d3d3d;
    display: inline-block;
    margin: 10px 0;
    font-size: 1.2rem;
    padding: 10px 20px;
    text-decoration: none;
    transition: all 0.2s ease-in-out'>Order Now</a></div>
    
    
    </div>";

                exit();
            } else {
                while ($row = $result->fetch_assoc()) { ?>
                    <li class="table-row">
                        <div class="col col-2"
                             data-label="Order Number"><?php echo "#" . $row['num']; ?></div>
                        <div class="col col-3"
                             data-label="Placement Time"><?php echo date('M d, Y g:i:s A', strtotime($row['date_time'])); ?></div>
                        <div class="col col-4">
                    <span class="<?php
                    $status = $row['STATUS'];
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
                             data-label="Amount"><?php echo "Rs. " . $row['total_bill']; ?></div>
                    </li>
                <?php }
            } ?>
        </ul>
    </div>


    <?php
    $stmt->close();
    ?>
</main>
    <footer>
        <p>Copyright © 2023 Black Ash Food Ordering System. All rights reserved.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/data_sort.js"></script>


</body>
</html>