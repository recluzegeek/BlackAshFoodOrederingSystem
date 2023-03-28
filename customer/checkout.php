<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION['customer_username'])) {
  $message = 'You are not logged in. You will be redirected to the login page.';
  echo "<script type='text/javascript'>alert('$message');</script>"; // Show an alert message
  echo '<script>setTimeout(function(){ window.location.href = "./login.php"; }, 100);</script>'; //redirecting user to login.html
  exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout &#8211; Black Ash Restaurant</title>
    <style>
      :root {
        --onyx: hsl(0, 0%, 25%);
        --azure: hsl(219, 77%, 60%);
        --white: hsl(0, 0%, 100%);
        --platinum: hsl(0, 0%, 91%);
        --gainsboro: hsl(0, 0%, 90%);
        --red-salsa: hsl(0, 77%, 60%);
        --dim-gray: hsl(0, 0%, 39%);
        --davys-gray: hsl(0, 0%, 30%);
        --spanish-gray: hsl(0, 0%, 62%);
        --quick-silver: hsl(0, 0%, 64%);
        /**
       * Typography
       */
        --fs-28: 28px;
        --fs-24: 24px;
        --fs-18: 18px;
        --fs-15: 15px;
        --fs-14: 14px;
        --fw-5: 500;
        --fw-6: 600;
        --fw-7: 700;
        --px: 60px;
        --radius: 5px;
      }

      *,
      *::before,
      *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      html {
        font-family: 'Urbanist', sans-serif;
      }

      a {
        color: inherit;
        text-decoration: none;
      }

      button {
        border: none;
        background: none;
        font: inherit;
        cursor: pointer;
      }

      ion-icon,
      span {
        display: inline-block;
      }

      label,
      img {
        display: block;
      }

      input {
        font: inherit;
        width: 100%;
        border: none;
      }

      input:focus {
        outline: 2px solid var(--azure);
      }

      input::-webkit-inner-spin-button,
      input::-webkit-outer-spin-button {
        appearance: none;
        -webkit-appearance: none;
        margin: 0;
      }

      ::-webkit-scrollbar {
        width: 8px;
      }

      ::-webkit-scrollbar-track {
        background: transparent;
      }

      ::-webkit-scrollbar-thumb {
        background: hsl(0, 0%, 80%);
        border-radius: 10px;
      }

      ::-webkit-scrollbar-thumb:hover {
        background: hsl(0, 0%, 70%);
      }

      .container {
        max-width: 1440px;
        min-height: 100vh;
        margin: auto;
        display: flex;
        flex-direction: column;
      }

      .heading {
        font-size: var(--fs-28);
        font-weight: var(--fw-6);
        color: var(--onyx);
        border-bottom: 1px solid var(--gainsboro);
        padding: 20px var(--px);
        display: flex;
        align-items: center;
        gap: 20px;
      }

      .heading ion-icon {
        font-size: 40px;
      }

      .item-flex {
        display: flex;
        flex-grow: 1;
      }

      .checkout {
        width: 70%;
        padding: 40px var(--px);
        background: var(--white);
        border-right: 1px solid var(--gainsboro);
      }

      .section-heading {
        color: var(--onyx);
        margin-bottom: 30px;
        font-size: var(--fs-24);
        font-weight: var(--fw-5);
      }

      .payment-form {
        margin-bottom: 40px;
      }

      .payment-method {
        display: flex;
        align-items: center;
        gap: 30px;
        margin-bottom: 40px;
      }

      .payment-method .method {
        border: 1px solid var(--quick-silver);
        border-radius: var(--radius);
        width: 50%;
        display: flex;
        align-items: center;
        padding: 15px 30px;
        gap: 20px;
        cursor: pointer;
      }

      .payment-method .selected {
        border-color: var(--azure);
      }

      .payment-method .method ion-icon {
        font-size: 20px;
      }

      .payment-method .method .checkmark {
        margin-left: auto;
        color: var(--quick-silver);
      }

      .payment-method .method .fill {
        color: var(--azure);
      }

      .label-default {
        padding-left: 10px;
        margin-bottom: 5px;
        font-size: var(--fs-14);
        color: var(--spanish-gray);
      }

      .input-default {
        background: var(--platinum);
        border-radius: var(--radius);
        color: var(--davys-gray);
      }

      .payment-form input {
        padding: 10px 15px;
        font-size: var(--fs-18);
        font-weight: var(--fw-5);
      }

      .cardholder-name,
      .card-number {
        margin-bottom: 20px;
      }

      .card-number input,
      .cvv input {
        letter-spacing: 3px;
      }

      .input-flex {
        display: flex;
        align-items: center;
        gap: 30px;
      }

      .input-flex .expire-date,
      .input-flex .cvv {
        width: 50%;
      }

      .expire-date .input-flex {
        color: var(--spanish-gray);
        gap: 13px;
      }

      .expire-date .input-flex input {
        text-align: center;
      }

      .btn {
        margin: 10px 5px;
        border-radius: var(--radius);
      }

      .btn:active {
        color: black;
        background: #FFD700;
        transform: scale(0.95);
      }

      .btn:focus {
        outline: 2px solid black;
      }

      .btn-primary {
        font-weight: normal;
        color: black;
        background: #FFD700;
        padding: 13px 45px;
      }

      .btn-primary b {
        margin-right: 10px;
      }

      .cart {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 20px;
        width: 40%;
        position: relative;
        height: calc(100vh - 100px);
        /* subtract 100px to account for the header/footer */
      }

      .cart-total {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #fff;
      }

      .cart-item-box {
        overflow-y: auto;
        height: calc(100% - 60px);
        /* subtract 60px to account for the Order Summary heading */
      }

      .product-card:not(:last-child) {
        margin-bottom: 20px;
      }

      .wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 13px;
        border-top: 1px solid #ddd;
      }

      .product-card .card {
        position: relative;
        display: flex;
        align-items: flex-start;
        gap: 20px;
      }

      .card .product-img {
        border-radius: var(--radius);
      }

      .card .detail .product-name {
        font-weight: var(--fw-6);
        font-size: var(--fs-15);
        color: var(--dim-gray);
        margin-bottom: 10px;
      }

      .card .detail .wrapper {
        display: flex;
        gap: 210px;
      }

      .product-qty {
        display: flex;
        align-items: center;
        gap: 10px;
      }

      .product-qty button {
        background: var(--platinum);
        width: 20px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .product-qty button:active,
      .product-close-btn:active ion-icon {
        transform: scale(0.95);
      }

      .product-qty button ion-icon {
        --ionicon-stroke-width: 60px;
        font-size: 10px;
      }

      .product-close-btn {
        position: absolute;
        top: 0;
        right: 0;
      }

      .product-close-btn ion-icon {
        font-size: 25px;
        color: var(--quick-silver);
      }

      .product-close-btn:hover ion-icon {
        color: var(--red-salsa);
      }

      .wrapper-flex input {
        padding: 12px 15px;
        font-weight: var(--fw-6);
        letter-spacing: 2px;
      }

      .amount>div {
        display: flex;
        justify-content: space-between;
      }

      .amount>div:not(:last-child) {
        margin-bottom: 10px;
      }

      .total {
        display: flex;
        align-items: center;
        font-size: 20px;
        font-weight: bold;
      }

      .amount .total {
        font-size: var(--fs-18);
        font-weight: var(--fw-7);
        color: var(--onyx);
      }

      @media (max-width: 1200px) {
        .item-flex {
          flex-direction: column-reverse;
        }

        .checkout {
          width: 100%;
          border-right: none;
        }

        .btn-primary {
          width: 100%;
        }

        .cart {
          display: grid;
          grid-template-columns: 1fr 1fr;
          width: 100%;
          border-bottom: 1px solid var(--gainsboro);
        }

        .cart .wrapper {
          margin-top: auto;
        }

        .cart .cart-item-box {
          border-right: 1px solid var(--gainsboro);
          margin-bottom: 0;
        }
      }

      @media (max-width: 768px) {
        :root {
          --px: 40px;
        }

        .cart {
          grid-template-columns: 1fr;
        }
      }

      @media (max-width: 567px) {
        :root {
          --px: 20px;
        }

        .payment-method,
        .input-flex {
          flex-direction: column;
          gap: 20px;
        }

        .payment-method .method {
          width: 100%;
        }

        .input-flex .expire-date,
        .input-flex .cvv {
          width: 100%;
        }

        .expire-date .input-flex {
          flex-direction: row;
        }
      }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Urbanist:200,300,regular,500,600,700,800,900,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic" rel="stylesheet" />
  </head>
  <body>
    <main class="container">
      <h1 class="heading">
        <ion-icon name="cart-outline"></ion-icon> Black Ash &#8211; Bites on Wheel
      </h1>
      <div class="item-flex">
        <section class="checkout">
          <h2 class="section-heading">Payment Details</h2>
          <div class="payment-form">
            <div class="payment-method"><button class="method selected">
                <ion-icon name="card"></ion-icon><span style="font-weight: bold">Credit / Debit Card</span>
                <ion-icon class="checkmark fill" name="checkmark-circle"></ion-icon>
              </button></div>
            <form>
              <div class="cardholder-name"><label for="cardholder-name" class="label-default">Cardholder Name</label><input type="text" name="cardholder-name" id="cardholder-name" class="input-default" required></div>
              <div class="card-number"><label for="card-number" class="label-default">Card Number</label><input type="text" name="accountNumber" id="accountNumber" class="input-default" required></div>
              <div class="input-flex">
                <div class="expire-date"><label for="expire-date" class="label-default">Expiration Date</label>
                  <div class="input-flex"><input type="date" id="expire-date" name="card-expiry" class="input-default" required></div>
                </div>
                <div class="cvv"><label for="cvv" class="label-default">CVV</label><input type="text" name="cvv" id="cvv" class="input-default" required></div>
              </div>
            </form>
          </div>
          <div style="display: flex;"><button class="btn btn-primary" style="flex: 1;" onclick="getOrderDetails()"><b>Pay With a Click and Enjoy Your Pick</b></button><button class="btn btn-primary" style="flex: 1;" onclick="window.location.href='../customer/customer.php#products'"><b>Continue Adding Items to Cart</b></button></div>
</section>
        <section class="cart">
          <div class="cart-item-box">
            <h2 class="section-heading">Order Summary</h2>
            <div id="product-card-container"></div>
          </div>
          <div class="cart-total">
            <div class="wrapper">
              <div class="total"><span style="margin-left: 50px;">Total</span><span style="margin-left: 230px;">Rs. <span id="total">0.00</span></span></div>
            </div>
          </div>
        </section>
      </div>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="../js/checkout.js"></script>
  </body>
</html>
