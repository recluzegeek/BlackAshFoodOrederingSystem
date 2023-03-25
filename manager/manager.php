<?php
session_start();
if (!isset($_SESSION['manager_username'])){
  $message = 'You are not logged in. You will be redirected to the login page.';
  echo "<script type='text/javascript'>alert('$message');</script>"; // Show an alert message
echo '<script>setTimeout(function(){ window.location.href = "./login.html"; }, 100);</script>'; //redirecting user to login.html
exit();}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Food Ordering System</title>
    <link rel="stylesheet" href="../css/chef.css">
  </head>
  <body>
    <header>
      <h1>Food Ordering System</h1>
      <nav>
<!--        <ul>-->
          <a href="../index.html">Home</a>
          <a href="#">Orders</a>
          <a href="../php/logout.php?logout=manager">Logout</a>
<!--        </ul>-->
      </nav>
    </header>
    <main>
      <h2>Welcome to the Food Ordering System Manager View!</h2>
       <div class="container">
        <button class="collapsible" id="pending-orders-btn">Pending Orders</button>
        <div class="content" id="pending-orders-row">

          <table>
            <tr>
              <th>Order ID</th>
              <th>Customization</th>
              <th>Items</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            <tr>
              <td>1</td>
              <td>No extra spice</td>
              <td>Pizza, burger, fries</td>
              <td>Pending</td>
              <td>
                <button class="collapsible-takeaway">
                  <span>Send order no to Chef and Customer</span>
                  <svg viewBox="0 0 13 10" height="10px" width="15px">
                    <path d="M1,5 L11,5"></path>
                    <polyline points="8 1 12 5 8 9"></polyline>
                  </svg>
                </button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Extra cheese</td>
              <td>Pizza, fries</td>
              <td>Pending</td>
              <td>
                <button class="collapsible-takeaway">
                  <span>Send order no to Chef and Customer</span>
                  <svg viewBox="0 0 13 10" height="10px" width="15px">
                    <path d="M1,5 L11,5"></path>
                    <polyline points="8 1 12 5 8 9"></polyline>
                  </svg>
                </button>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>No onions</td>
              <td>Burger, fries</td>
              <td>Pending</td>
              <td>
                <button class="collapsible-takeaway">
                  <span>Send order no to Chef and Customer</span>
                  <svg viewBox="0 0 13 10" height="10px" width="15px">
                    <path d="M1,5 L11,5"></path>
                    <polyline points="8 1 12 5 8 9"></polyline>
                  </svg>
                </button>
              </td>
            </tr>
            <tr>
              <td>4</td>
              <td>No tomatoes</td>
              <td>Pizza</td>
              <td>Pending</td>
              <td>
                <button class="collapsible-takeaway">
                  <span>Send order no to Chef and Customer</span>
                  <svg viewBox="0 0 13 10" height="10px" width="15px">
                    <path d="M1,5 L11,5"></path>
                    <polyline points="8 1 12 5 8 9"></polyline>
                  </svg>
                </button>
              </td>
            </tr>
            <tr>
              <td>5</td>
              <td>Extra spicy</td>
              <td>Burger</td>
              <td>Pending</td>
              <td>
                <button class="collapsible-takeaway">
                  <span>Send order no to Chef and Customer</span>
                  <svg viewBox="0 0 13 10" height="10px" width="15px">
                    <path d="M1,5 L11,5"></path>
                    <polyline points="8 1 12 5 8 9"></polyline>
                  </svg>
                </button>
              </td>
            </tr>
          </table>
        </div>

        <br>

        <button class="collapsible" id="completed-orders-btn">Completed Orders</button>
  <div class="content" id="completed-orders-row">
    <table>
      <tr>
        <th>Order ID</th>
        <th>Customization</th>
        <th>Items</th>
        <th>Status</th>
      </tr>
      <tr>
        <td>10</td>
        <td>No extra spice</td>
        <td>Pizza, burger, fries</td>
        <td>Completed</td>
      </tr>
      <tr>
        <td>22</td>
        <td>Extra cheese</td>
        <td>Pizza, fries</td>
        <td>Completed</td>
      </tr>
      <tr>
        <td>34</td>
        <td>No onions</td>
        <td>Burger, fries</td>
        <td>Completed</td>
      </tr>
      <tr>
        <td>41</td>
        <td>No tomatoes</td>
        <td>Pizza</td>
        <td>Completed</td>
      </tr>
      <tr>
        <td>51</td>
        <td>Extra spicy</td>
        <td>Burger</td>
        <td>Completed</td>
      </tr>
    </table>
  </div>
</div>
    </main>
    <footer>
      <p>Copyright © 2023 Food Ordering System. All rights reserved.</p>
    </footer>
  </body>
</html>
