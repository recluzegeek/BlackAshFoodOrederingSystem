<?php
session_start();
//if (!isset($_SESSION['chef_username'])){
//  $message = 'You are not logged in. You will be redirected to the login page.';
//  echo "<script type='text/javascript'>alert('$message');</script>"; // Show an alert message
//echo '<script>setTimeout(function(){ window.location.href = "./login.html"; }, 100);</script>'; //redirecting user to login.html
//exit();}
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/chef.css">
  <title>CHEF &#8211; Black Ash Restaurant</title>
</head>
<body>

<header class="chef-header">
  <h3 class="header-title">Welcome to Black Ash Restaurant Chef's Corner</h3>
  <img id="logo" src="../img/cropped-blackashlogo@4x.webp"
       alt="nice logo">
  <div class="account-icon">
    <div class="account-options">
      <div class="option">Change Password</div>
      <div class="option">Profile</div>
      <a href="../php/logout.php?logout=chef">Logout</a>
    </div>
  </div>
</header>


<div class="container">
  <button class="collapsible" id="pending-orders-btn">Pending Orders</button>
  <div class="content" id="pending-orders-row">
    <table id="table1">
      <tr>
        <th>Order ID</th>
        <th>Customization</th>
        <th>Items</th>
        <th>Action</th>
      </tr>
      <tr>
        <td>1</td>
        <td>No extra spice</td>
        <td>Pizza, burger, fries</td>
        <td><input type="checkbox" name="check-tab1"></td>

      </tr>
      <tr>
        <td>2</td>
        <td>Extra cheese</td>
        <td>Pizza, fries</td>
        <td><input type="checkbox" name="check-tab1"></td>
      </tr>
      <tr>
        <td>3</td>
        <td>No onions</td>
        <td>Burger, fries</td>
        <td><input type="checkbox" name="check-tab1"></td>
      </tr>
      <tr>
        <td>4</td>
        <td>No tomatoes</td>
        <td>Pizza</td>
        <td><input type="checkbox" name="check-tab1"></td>
      </tr>
      <tr>
        <td>5</td>
        <td>Extra spicy</td>
        <td>Burger</td>
        <td><input type="checkbox" name="check-tab1"></td>
      </tr>
    </table>
  </div>

  <div>
    <button onclick="tab1_To_tab2();" class="collapsible">
      <span>Ready for Takeaway</span>
      <svg viewBox="0 0 13 10" height="10px" width="15px">
        <path d="M1,5 L11,5"></path>
        <polyline points="8 1 12 5 8 9"></polyline>
      </svg>
    </button>
  </div>

  <button class="collapsible" id="completed-orders-btn">Completed Orders</button>
  <div class="content" id="completed-orders-row">
    <table id="table2">
      <tr>
        <th>Order ID</th>
        <th>Customization</th>
        <th>Items</th>
        <th>Completed</th>
      </tr>
    </table>
  </div>
</div>


</body>

<script>
  document.getElementById('logout').onclick = function () {
    location.href = './login.html';
  };


  // Get the buttons that toggle the collapsible rows
  const pendingOrdersBtn = document.getElementById("pending-orders-btn");
  const completedOrdersBtn = document.getElementById("completed-orders-btn");

  // Get the collapsible rows
  const pendingOrdersRow = document.getElementById("pending-orders-row");
  const completedOrdersRow = document.getElementById("completed-orders-row");

  // Function to toggle the display of a collapsible row
  function toggleCollapse(element) {
    if (element.style.display === "none") {
      element.style.display = "block";
    } else {
      element.style.display = "none";
    }
  }

  // Add click event listeners to the toggle buttons
  pendingOrdersBtn.addEventListener("click", function () {
    toggleCollapse(pendingOrdersRow);
  });

  completedOrdersBtn.addEventListener("click", function () {
    toggleCollapse(completedOrdersRow);
  });

  // Hide the collapsible rows by default
  pendingOrdersRow.style.display = "";
  completedOrdersRow.style.display = "none";


  // Function to Switch Rows from One Table to another

  function tab1_To_tab2() {

    const table1 = document.getElementById("table1"),

      table2 = document.getElementById("table2");

    const checkboxes = document.getElementsByName("check-tab1");

    console.log(" Val1 = " + checkboxes.length);

    for (let i = 0; checkboxes.length; i++) {

      if (checkboxes[i].checked) {


        // Creates new rows and cells

        const newRow = table2.insertRow(table2.length),

          cell1 = newRow.insertCell(0),

          cell2 = newRow.insertCell(1),

          cell3 = newRow.insertCell(2),

          cell4 = newRow.insertCell(3);


        // Adds values to the cells

        cell1.innerHTML = table1.rows[i + 1].cells[0].innerHTML;

        cell2.innerHTML = table1.rows[i + 1].cells[1].innerHTML;

        cell3.innerHTML = table1.rows[i + 1].cells[2].innerHTML;

        cell4.innerHTML = "<input type='checkbox' name='check-tab2' checked disabled>";


        // Remove the transferred rows from the first table[table1]

        const index = table1.rows[i + 1].rowIndex;

        table1.deleteRow(index);

        // We have deleted some rows, so the checkboxes.length have changed.

        // So, we have to decrement the value of i.

        i--;

        console.log(checkboxes.length);

      }

    }

  }

</script>

</html>
