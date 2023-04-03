<?php
  session_start();
if (!isset($_SESSION['customer_username'])) {
  $message = 'You are not logged in. You will be redirected to the login page.';
  echo "<script type='text/javascript'>alert('$message');</script>"; // Show an alert message
  echo '<script>setTimeout(function(){ window.location.href = "./login.php"; }, 100);</script>'; //redirecting user to login.php
  exit();
}
?>
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Customer &#8211; Black Ash Restaurant</title>
  <script src="../js/cart.js"></script>
  <link rel='stylesheet' id='wp-block-library-css' href='../css/style.min.css' media='all' />
  <style id='wp-block-library-theme-inline-css'>
    .wp-block-audio figcaption {
      color: #555;
      font-size: 13px;
      text-align: center
    }

    .is-dark-theme .wp-block-audio figcaption {
      color: hsla(0, 0%, 100%, .65)
    }

    .wp-block-embed figcaption {
      color: #555;
      font-size: 13px;
      text-align: center
    }

    .is-dark-theme .wp-block-embed figcaption {
      color: hsla(0, 0%, 100%, .65)
    }

    .is-dark-theme .blocks-gallery-caption {
      color: hsla(0, 0%, 100%, .65)
    }

    .wp-block-image figcaption {
      color: #555;
      font-size: 13px;
      text-align: center
    }

    .is-dark-theme .wp-block-image figcaption {
      color: hsla(0, 0%, 100%, .65)
    }

    .wp-block-pullquote cite,
    .wp-block-pullquote footer {
      color: currentColor;
      text-transform: uppercase;
      font-size: .8125em;
      font-style: normal
    }

    .wp-block-quote cite,
    .wp-block-quote footer {
      color: currentColor;
      font-size: .8125em;
      position: relative;
      font-style: normal
    }

    .wp-block-table thead {
      border-bottom: 3px solid
    }

    .wp-block-table tfoot {
      border-top: 3px solid
    }

    .wp-block-table td,
    .wp-block-table th {
      word-break: normal
    }

    .wp-block-table figcaption {
      color: #555;
      font-size: 13px;
      text-align: center
    }

    .is-dark-theme .wp-block-table figcaption {
      color: hsla(0, 0%, 100%, .65)
    }

    .wp-block-video figcaption {
      color: #555;
      font-size: 13px;
      text-align: center
    }

    .is-dark-theme .wp-block-video figcaption {
      color: hsla(0, 0%, 100%, .65)
    }
  </style>
  <style id='global-styles-inline-css'>
    body {
      --wp--preset--color--black: #000000;
      --wp--preset--color--cyan-bluish-gray: #abb8c3;
      --wp--preset--color--white: #FFF;
      --wp--preset--color--pale-pink: #f78da7;
      --wp--preset--color--vivid-red: #cf2e2e;
      --wp--preset--color--luminous-vivid-orange: #ff6900;
      --wp--preset--color--luminous-vivid-amber: #fcb900;
      --wp--preset--color--light-green-cyan: #7bdcb5;
      --wp--preset--color--vivid-green-cyan: #00d084;
      --wp--preset--color--pale-cyan-blue: #8ed1fc;
      --wp--preset--color--vivid-cyan-blue: #0693e3;
      --wp--preset--color--vivid-purple: #9b51e0;
      --wp--preset--color--dark-gray: #111;
      --wp--preset--color--light-gray: #767676;
      --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
      --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
      --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
      --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
      --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
      --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
      --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
      --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
      --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
      --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
      --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
      --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
      --wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');
      --wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');
      --wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');
      --wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');
      --wp--preset--duotone--midnight: url('#wp-duotone-midnight');
      --wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');
      --wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');
      --wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');
      --wp--preset--font-size--small: 16px;
      --wp--preset--font-size--medium: 20px;
      --wp--preset--font-size--large: 36.5px;
      --wp--preset--font-size--x-large: 42px;
      --wp--preset--font-size--normal: 22px;
      --wp--preset--font-size--huge: 49.5px;
      --wp--preset--spacing--20: 0.44rem;
      --wp--preset--spacing--30: 0.67rem;
      --wp--preset--spacing--40: 1rem;
      --wp--preset--spacing--50: 1.5rem;
      --wp--preset--spacing--60: 2.25rem;
      --wp--preset--spacing--70: 3.38rem;
      --wp--preset--spacing--80: 5.06rem;
    }

    :where(.is-layout-flex) {
      gap: 0.5em;
    }

    body .is-layout-flow>.alignleft {
      float: left;
      margin-inline-start: 0;
      margin-inline-end: 2em;
    }

    body .is-layout-flow>.alignright {
      float: right;
      margin-inline-start: 2em;
      margin-inline-end: 0;
    }

    body .is-layout-flow>.aligncenter {
      margin-left: auto !important;
      margin-right: auto !important;
    }

    body .is-layout-constrained>.alignleft {
      float: left;
      margin-inline-start: 0;
      margin-inline-end: 2em;
    }

    body .is-layout-constrained>.alignright {
      float: right;
      margin-inline-start: 2em;
      margin-inline-end: 0;
    }

    body .is-layout-constrained>.aligncenter {
      margin-left: auto !important;
      margin-right: auto !important;
    }

    body .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
      max-width: var(--wp--style--global--content-size);
      margin-left: auto !important;
      margin-right: auto !important;
    }

    body .is-layout-constrained>.alignwide {
      max-width: var(--wp--style--global--wide-size);
    }

    body .is-layout-flex {
      display: flex;
    }

    body .is-layout-flex {
      flex-wrap: wrap;
      align-items: center;
    }

    body .is-layout-flex>* {
      margin: 0;
    }

    :where(.wp-block-columns.is-layout-flex) {
      gap: 2em;
    }

    .has-black-color {
      color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-color {
      color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-color {
      color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-color {
      color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-color {
      color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-color {
      color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-color {
      color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-color {
      color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-color {
      color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-color {
      color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-color {
      color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-color {
      color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-black-background-color {
      background-color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-background-color {
      background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-background-color {
      background-color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-background-color {
      background-color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-background-color {
      background-color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-background-color {
      background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-background-color {
      background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-background-color {
      background-color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-background-color {
      background-color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-background-color {
      background-color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-background-color {
      background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-background-color {
      background-color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-black-border-color {
      border-color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-border-color {
      border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-border-color {
      border-color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-border-color {
      border-color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-border-color {
      border-color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-border-color {
      border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-border-color {
      border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-border-color {
      border-color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-border-color {
      border-color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-border-color {
      border-color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-border-color {
      border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-border-color {
      border-color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
      background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
    }

    .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
      background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
    }

    .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
      background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-orange-to-vivid-red-gradient-background {
      background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
    }

    .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
      background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
    }

    .has-cool-to-warm-spectrum-gradient-background {
      background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
    }

    .has-blush-light-purple-gradient-background {
      background: var(--wp--preset--gradient--blush-light-purple) !important;
    }

    .has-blush-bordeaux-gradient-background {
      background: var(--wp--preset--gradient--blush-bordeaux) !important;
    }

    .has-luminous-dusk-gradient-background {
      background: var(--wp--preset--gradient--luminous-dusk) !important;
    }

    .has-pale-ocean-gradient-background {
      background: var(--wp--preset--gradient--pale-ocean) !important;
    }

    .has-electric-grass-gradient-background {
      background: var(--wp--preset--gradient--electric-grass) !important;
    }

    .has-midnight-gradient-background {
      background: var(--wp--preset--gradient--midnight) !important;
    }

    .has-small-font-size {
      font-size: var(--wp--preset--font-size--small) !important;
    }

    .has-medium-font-size {
      font-size: var(--wp--preset--font-size--medium) !important;
    }

    .has-large-font-size {
      font-size: var(--wp--preset--font-size--large) !important;
    }

    .has-x-large-font-size {
      font-size: var(--wp--preset--font-size--x-large) !important;
    }

    .wp-block-navigation a:where(:not(.wp-element-button)) {
      color: inherit;
    }

    :where(.wp-block-columns.is-layout-flex) {
      gap: 2em;
    }

    .wp-block-pullquote {
      font-size: 1.5em;
      line-height: 1.6;
    }
  </style>
  <style>
    #toggle-cart-btn {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 999;
      display: block;
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px;
      border-radius: 5px;
    }

    .add-to-cart {
      display: inline-block;
      background-color: #4CAF50;
      color: #fff;
      font-weight: bold;
      padding: 12px 24px;
      border-radius: 10px;
      border: none;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .add-to-cart:hover {
      background-color: #FFD700;
    }

    .add-to-cart:focus {
      outline: none;
      box-shadow: 0 0 0 2px #fff, 0 0 0 4px #4CAF50;
    }

    .add-to-cart:active {
      transform: translateY(2px);
      box-shadow: none;
    }

    #shopping-cart {
      position: fixed;
      bottom: 80px;
      right: 20px;
      z-index: 999;
      display: none;
      width: 400px;
      max-height: calc(100vh - 120px);
      overflow-y: auto;
      background-color: black;
      border: solid 1px #d6d6d6;
      color: white;
      border-radius: 5px;
      padding: 10px;
    }

    #cart-content {
      width: 100%;
    }

    #cart-content th,
    #cart-content td {
      padding: 10px;
      text-align: left;
      border-bottom: solid 1px #d6d6d6;
    }

    #cart-content th:first-child,
    #cart-content td:first-child {
      width: 100px;
    }

    #cart-content th:nth-child(2),
    #cart-content td:nth-child(2) {
      width: 150px;
    }

    #cart-content th:nth-child(3),
    #cart-content td:nth-child(3) {
      width: 100px;
    }

    #submenu:hover #shopping-cart {
      display: block;
    }

    .cart-btn {
      display: block;
      margin-top: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 5px;
      border-radius: 5px;
      text-align: center;
    }

    .cart-btn:hover {
      background-color: #0062cc;
    }

    .total-container {
      text-align: right;
      margin-top: 10px;
    }

    #checkout-btn,
    #clear-cart {
      display: block;
      margin-top: 5px;
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 5px;
      border-radius: 5px;
      text-align: center;
      width: 100%;
    }

    .total-container {
      margin-top: 10px;
      font-size: 16px;
      font-weight: bold;
      text-align: center;
      padding-top: 10px;
    }

    tr.empty-cart-mssg {
      border: none;
    }
  </style>
  <style>
    body.page-template-page-hero #pagehero h1 {
      color: white;
      font-weight: bold;
    }

    h5 {
      color: white;
    }

    .slider_btn {
      border-radius: 0;
      font-size: 1.25rem;
      padding: .5rem 1rem;
      border: 2px solid white;
      font-weight: bold;
      color: white;
      transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
      vertical-align: middle;
    }

    .slider_btn:hover {
      background-color: white;
      color: black;
      background-image: linear-gradient(to right, transparent 50%, white 50%);
      background-size: 200%;
      background-position: right;
      transition: background 0.3s ease-out, color 0.3s ease-out;
    }
  </style>
  <link rel='stylesheet' id='dashicons-css' href='../css/dashicons.min.css' media='all' />
  <link rel='stylesheet' id='blackash-style-main-css' href='../css/main.css' media='all' />
  <link rel='stylesheet' href='../css/cust_main.css' media='all' />
  <script src='../js/blackash.bundle.js' id='blackash-main-script-js'></script>
</head>
<body class="home page-template page-template-page-hero page-template-page-hero-php page page-id-49 wp-custom-logo wp-embed-responsive">
<div id="page" class="site">
  <header id="masthead" class="site-header has-pagehero">
    <div id="primaryMenu">
      <div class="container-fluid container-lg py-3 d-none d-lg-block">
        <div class="row  ">
          <div class="d-none d-md-flex col-md d-flex align-items-center">
            <nav id="site-navigation-left" class="main-navigation" aria-label="Top Menu">
              <div class="menu-left-menu-container">
                <ul id="menu-left-menu" class="nav mr-auto" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                  <li id="menu-item-127" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-49 current_page_item active menu-item-127 nav-item"><a itemprop="url" href="../index.html" class="nav-link" aria-current="page"><span itemprop="name">Homepage</span></a></li>
                  <li id="menu-item-136" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-136 nav-item"><a itemprop="url" href="#" class="nav-link"><span itemprop="name">About us</span></a></li>
                  <li id="menu-item-368" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-368 nav-item"><a itemprop="url" href="#" class="nav-link"><span itemprop="name">Contact</span></a></li>
                </ul>
              </div>
            </nav>
            <!-- #site-navigation -->
          </div><div class="col-md-1 justify-content-center align-items-center d-flex ">
            <div class="site-logo">
              <a href="../index.html" class="custom-logo-link" rel="home" aria-current="page">
<!--                <img width="200" height="140" src="https://blackash.pacificcodeline.com/wp-content/uploads/2021/11/cropped-blackashlogo@4x.png" class="custom-logo" alt="Black Ash Restaurant - Taste of the Forbidden" decoding="async" />-->
                <img width="200" height="140" src="../img/cropped-blackashlogo@4x.webp" class="custom-logo" alt="Black Ash Restaurant - Taste of the Forbidden" decoding="async" />
              </a>
            </div>
          </div><div class="d-none col-md d-md-flex align-items-center justify-content-end">
            <nav id="site-navigation-right" class="main-navigation" aria-label="Top Menu">
              <div class="menu-right-menu-container">
                <ul id="menu-right-menu" class="nav mr-auto" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                  <div class="header__cart">
                    <ul>
                      <li class="header__submenu" id="submenu">
                        <button class="header__cart-btn" id="toggle-cart-btn">
                          <svg class="cart" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z"></path>
                          </svg> Your Cart </button>
                        <div id="shopping-cart" class="shopping-cart-container">
                          <table id="cart-content">
                            <thead>
                            <tr>
                              <th>Image</th>
                              <th>Name</th>
                              <th>Price - Rs.</th>
                              <th></th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                          </table>
                          <p style="text-align: center; font-weight: bold; margin-top: 5px; padding-top: 10px"></p>
                          <p class="total-container" id="total-price" style="text-align: center"></p>
                          <a href="#" id="checkout-btn" class="cart-btn">Proceed to Checkout</a>
                          <a href="#" id="clear-cart" class="cart-btn">Clear Cart</a>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <li id="menu-item-235" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-235 nav-item">
                    <a itemprop="url" href="#" class="nav-link">
                      <span itemprop="name">Account</span>
                    </a>
                  </li>
                    <li id="menu-item-235" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-235 nav-item">
                    <a itemprop="url" href="./order_history.php" class="nav-link">
                      <span itemprop="name">Order History</span>
                    </a>
                  </li>
                  <li id="menu-item-296" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-296 nav-item">
                    <a itemprop="url" href="../php/logout.php?logout=customer" class="nav-link" onclick="localStorage.clear()">
                      <span itemprop="name">Logout</span>
                    </a>
                  </li>
                </ul>
              </div>
            </nav>
            <!-- #site-navigation -->
          </div>
        </div>
      </div><nav id="mobileNav" class="d-lg-none navbar navbar-expand-lg navbar-dark fixed-top"><div class="container-fluid"><div class="d-flex w-100">
            <div class="site-logo me-auto">
              <a href="./index.html" class="custom-logo-link" rel="home" aria-current="page">
<!--                <img width="200" height="140" src="https://blackash.pacificcodeline.com/wp-content/uploads/2021/11/cropped-blackashlogo@4x.png" class="custom-logo" alt="Black Ash Restaurant - Taste of the Forbidden" decoding="async" />-->
                <img width="200" height="140" src="../img/cropped-blackashlogo@4x.webp" class="custom-logo" alt="Black Ash Restaurant - Taste of the Forbidden" decoding="async" />
              </a>
            </div>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div><div class="collapse navbar-collapse pt-3" id="navbarToggler">
            <a class="navbar-brand" href="#"> Black Ash Restaurant - Taste of the Forbidden </a>
            <div class="menu-left-menu-container">
              <ul id="menu-left-menu-1" class="navbar-nav me-auto mt-2 mb-2 mb-lg-0" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-49 current_page_item active menu-item-127 nav-item">
                  <a itemprop="url" href="../index.html
" class="nav-link" aria-current="page">
                    <span itemprop="name">Homepage</span>
                  </a>
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-136 nav-item">
                  <a itemprop="url" href="#" class="nav-link">
                    <span itemprop="name">About us</span>
                  </a>
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-368 nav-item">
                  <a itemprop="url" href="#" class="nav-link">
                    <span itemprop="name">Contact</span>
                  </a>
                </li>
              </ul>
            </div>
            <div class="menu-right-menu-container">
              <ul id="menu-right-menu-1" class="navbar-nav me-auto mt-2 mb-2 mb-lg-0" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-723 nav-item">
                  <a itemprop="url" href="./customer/login.php" class="nav-link">
                    <span itemprop="name">LOGIN</span>
                  </a>
                </li>
              </ul>
            </div>
          </div></div></nav>
    </div><div id="pagehero"><div class="swiper swiper-14caad5d2481d0047221829d7fc21514" id="pageheroSwiper">
        <!-- Additional required wrapper --><div class="swiper-wrapper"><div class="swiper-slide" style="background-image: url('https://goodtaste.ththeme.net/wp-content/uploads/2021/11/banner-1-1536x849.jpg')" data-2x="">
            <div class="container-fluid position-relative z-10">
              <div class="row h-100 align-items-center">
                <div class="col-lg-6">
                  <div class="pagehero-cta text-center px-5" data-aos="fade-in" data-aos-delay="150">
                    <h1>Black Ash</h1>
                    <h5>Burger &amp; Steakhouse Cuisine.</h5>
                    <p class="mt-4 text-center" data-aos="fade-in" data-aos-delay="450">
                      <a class="slider_btn" href="#">BOOK A TABLE</a>
                    </p>
                    <div class="pt-5 justify-content-center d-flex">
                      <ul class='nav social-media-icons d-flex '>
                        <li>
                          <a class="nav-link instagram" target="_blank" href="#">
                            <i class="dashicons dashicons-instagram" title="instagram icon"></i>
                          </a>
                        </li>
                        <li>
                          <a class="nav-link YouTube" target="_blank" href="#">
                            <i class="dashicons dashicons-youtube" title="YouTube icon"></i>
                          </a>
                        </li>
                        <li>
                          <a class="nav-link Email" target="_blank" href="#">
                            <i class="dashicons dashicons-email" title="Email icon"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><div class="swiper-slide" style="background-image: url('https://blackash.pacificcodeline.com/wp-content/uploads/2021/11/pexels-valeria-boltneva-1639559-scaled-1-1920x1280.jpg')" data-2x="https://blackash.pacificcodeline.com/wp-content/uploads/2021/11/pexels-valeria-boltneva-1639559-scaled-1.jpg">
            <div class="container-fluid position-relative z-10">
              <div class="row h-100 align-items-center">
                <div class="col-lg-6">
                  <div class="pagehero-cta text-center px-5" data-aos="fade-in" data-aos-delay="150">
                    <h1>Fresh Food</h1>
                    <h5>Only organic &amp; local ingredients.</h5>
                    <p class="mt-4 text-center" data-aos="fade-in" data-aos-delay="450">
                      <a class="slider_btn" href="#"> VIEW MENU </a>
                    </p>
                    <div class="pt-5 justify-content-center d-flex">
                      <ul class='nav social-media-icons d-flex '>
                        <li>
                          <a class="nav-link instagram" target="_blank" href="#">
                            <i class="dashicons dashicons-instagram" title="instagram icon"></i>
                          </a>
                        </li>
                        <li>
                          <a class="nav-link YouTube" target="_blank" href="#">
                            <i class="dashicons dashicons-youtube" title="YouTube icon"></i>
                          </a>
                        </li>
                        <li>
                          <a class="nav-link Email" target="_blank" href="#">
                            <i class="dashicons dashicons-email" title="Email icon"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><div class="swiper-slide" style="background-image: url('https://goodtaste.ththeme.net/wp-content/uploads/2021/11/banner-2-1536x849.jpg')" data-2x="">
            <div class="container-fluid position-relative z-10">
              <div class="row h-100 align-items-center">
                <div class="col-lg-6">
                  <div class="pagehero-cta text-center px-5" data-aos="fade-in" data-aos-delay="150">
                    <h1>FINE DINE</h1>
                    <h5>Modern &amp; rustic location.</h5>
                    <p class="mt-4 text-center" data-aos="fade-in" data-aos-delay="450">
                      <a class="slider_btn" href="#"> ABOUT US </a>
                    </p>
                    <div class="pt-5 justify-content-center d-flex"></div>
                  </div>
                </div>
              </div>
            </div>
          </div></div><div class="swiper-button-prev prev-hero"></div><div class="swiper-button-next next-hero"></div>
      </div></div>
  </header><section class="page-content" id="products"><h2 class="page-title" style="text-align: center;">OUR PRODUCTS</h2><div class="grid" id="grid"><?php include './products.php'; ?></div></section><footer id="footer" class="site-footer py-3 mt-5 text-white"><div class="site-info"><div class="container"><div class="row"><div class="col-md-3 text-md-start text-center d-flex align-items-center justify-content-center justify-content-md-start mb-4 mb-sm-0">
            <div class="site-logo">
              <a href="./index.html" class="custom-logo-link" rel="home" aria-current="page">
<!--                <img width="200" height="140" src="https://blackash.pacificcodeline.com/wp-content/uploads/2021/11/cropped-blackashlogo@4x.png" class="custom-logo" alt="Black Ash Restaurant - Taste of the Forbidden" decoding="async" />-->
                <img width="200" height="140" src="../img/cropped-blackashlogo@4x.webp" class="custom-logo" alt="Black Ash Restaurant - Taste of the Forbidden" decoding="async" />
              </a>
            </div>
          </div><div class="col-md-6 d-flex justify-content-center align-items-center">
            <nav class="footer-navigation" aria-label="Footer Menu">
              <div class="menu-footer-container">
                <ul id="menu-footer" class="nav mx-auto" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                  <li id="menu-item-421" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-421 nav-item">
                    <a itemprop="url" href="#" class="nav-link">
                      <span itemprop="name">About us</span>
                    </a>
                  </li>
                  <li id="menu-item-418" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-418 nav-item">
                    <a itemprop="url" href="#" class="nav-link">
                      <span itemprop="name">Contact</span>
                    </a>
                  </li>
                  <li id="menu-item-420" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-420 nav-item">
                    <a itemprop="url" href="#" class="nav-link">
                      <span itemprop="name">Reservations</span>
                    </a>
                  </li>
                  <li id="menu-item-419" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-419 nav-item">
                    <a itemprop="url" href="#" class="nav-link">
                      <span itemprop="name">Menu</span>
                    </a>
                  </li>
                  <li id="menu-item-424" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-424 nav-item">
                    <a itemprop="url" href="#" class="nav-link">
                      <span itemprop="name">Gallery</span>
                    </a>
                  </li>
                </ul>
              </div>
            </nav>
            <!-- .footer-navigation -->
          </div><div class="col-md-3 d-flex justify-content-center align-items-start align-items-md-end">
            <ul class='nav social-media-icons d-flex justify-content-md-end justify-content-center text-center text-md-right'>
              <li>
                <a class="nav-link instagram" target="_blank" href="#">
                  <i class="dashicons dashicons-instagram" title="instagram icon"></i>
                </a>
              </li>
              <li>
                <a class="nav-link YouTube" target="_blank" href="#">
                  <i class="dashicons dashicons-youtube" title="YouTube icon"></i>
                </a>
              </li>
              <li>
                <a class="nav-link Email" target="_blank" href="#">
                  <i class="dashicons dashicons-email" title="Email icon"></i>
                </a>
              </li>
            </ul>
          </div></div>
        <hr><div class="row footer-sub">
          <div class="col-md-6 text-md-start text-center"> ® 2023 Black Ash Ltd. All rights reserved. </div>
          <div class="col-md-6 d-flex justify-content-center justify-content-md-end align-items-center">
            <nav class="footer-navigation-legal text-center text-md-right small" aria-label="Footer Menu">
              <div class="menu-legal-menu-container">
                <ul id="menu-legal-menu" class="nav nav-legal mx-auto" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                  <li id="menu-item-430" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-430 nav-item">
                    <a itemprop="url" href="#" class="nav-link">
                      <span itemprop="name">Privacy Policy</span>
                    </a>
                  </li>
                  <li id="menu-item-429" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-429 nav-item">
                    <a itemprop="url" href="#" class="nav-link">
                      <span itemprop="name">Terms &#038; Conditions</span>
                    </a>
                  </li>
                </ul>
              </div>
            </nav>
            <!-- .footer-navigation -->
          </div>
        </div>
      </div></div>
    <!-- .site-info -->
  </footer>
  <!-- #footer -->
</div>
<!-- #page --><script>
  const toggleBtn = document.getElementById("toggle-cart-btn");
  const cartContainer = document.getElementById("shopping-cart");
  const addToCartBtns = document.querySelectorAll(".add-to-cart");
  toggleBtn.addEventListener("mouseenter", function() {
    cartContainer.style.display = "block";
  });
  toggleBtn.addEventListener("click", function() {
    cartContainer.style.display = "block";
  });
  document.addEventListener("click", function(e) {
    if (e.target !== toggleBtn && e.target.closest("#shopping-cart") !== cartContainer && !Array.from(addToCartBtns).includes(e.target) && !e.target.classList.contains("remove") && cartContainer.style.display === "block") {
      cartContainer.style.display = "none";
    }
  });
</script><script src="../js/cart.js"></script>
</body>
</html>
