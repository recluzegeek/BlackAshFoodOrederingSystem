(function () {
  // VARS
  const productsContainer = document.querySelector("#grid");
  const cartContainer = document.querySelector("#shopping-cart");
  const cartContent = document.querySelector("#cart-content");
  const toggleCartBtn = document.querySelector("#toggle-cart-btn");
  const clearCartBtn = document.querySelector("#clear-cart");
  const checkoutBtn = document.querySelector("#checkout-btn");
  const totalPriceContainer = document.querySelector("#total-price");
  console.log('in the cart.js file');

  function getLSContent() {
    const lsContent = JSON.parse(localStorage.getItem("products")) || [];
    return lsContent;
  }

  // function getOrderDetails() {
  //   // const ids = getLSContent().map(item => item.id);
  //   const itemIds = [];
  //   for (const product of getLSContent()) {
  //     if (product.hasOwnProperty('id')) {
  //       itemIds.push(product.id);
  //     }
  //   }
  //   const prices = getCartItemPrices();
  //   let total = 0;
  //   if (prices) {
  //     total = calculateTotal(prices);
  //   }
  //   // push total in front of the array
  //   itemIds.unshift(total);
  //   // sending data to php file using post method with ajax
  //   $.ajax({
  //     url: "../php/checkout.php",
  //     method: "POST",
  //     data: {lsContent: JSON.stringify(itemIds)},
  //     success: function (res) {
  //       console.log(res);
  //     }
  //   })
  // }

  function setLSContent(lsContent) {
    localStorage.setItem("products", JSON.stringify(lsContent));
  }

  function calculateTotal(prices) {
    return prices.reduce(function (prev, next) {
      return prev + next;
    }, 0);
  }

  function getCartItemPrices() {
    const prices = [];
    // for each product in the cart
    let nums = cartContent.querySelectorAll("tr td:nth-child(3)");

    if (nums.length > 0) {
      for (let cell = 0; cell < nums.length; cell++) {
        let num = nums[cell].innerText;
        console.log(num)
        num = num.replace('Rs.', "");
        num = parseFloat(num);
        prices.push(num);
      }
      return prices;
    } else {
      return;
    }
  }

  function displayCartTotal() {
    // console.log('in the displayCartTotal function')
    const prices = getCartItemPrices();
    let total = 0;
    if (prices) {
      total = calculateTotal(prices);
      console.log(total)
      totalPriceContainer.innerHTML = `<span class="total">Total: Rs.${total.toFixed(2)}</span>`;
    } else {
      totalPriceContainer.innerHTML = '<div style="margin-bottom: 20px">Cart is Empty </div><span class="total">Total: Rs. 0</span>';
    }
    // console.log(getLSContent())
  }

  function displayProducts() {
    const lsContent = getLSContent();
    let productMarkup = "";
    if (lsContent !== null && lsContent.length !== 0) {
      for (let product of lsContent) {
        productMarkup += `
        <tr>
          <td><img class="cart-image" src="${product.image}" alt="${product.name}" width="120"></td>
          <td>${product.name}</td>
          <td>${product.price}</td>
          <td><a href="#" data-id="${product.id}" class="remove" title="Remove Item">X</a></td>
        </tr>
      `;
      }
    } else {
      productMarkup = ``;
    }

    // add markup to DOM
    cartContent.querySelector("tbody").innerHTML = productMarkup;
  }

  function saveProduct(clickedBtn) {
    const productId = clickedBtn.getAttribute("data-id");
    const card = clickedBtn.parentElement.parentElement;
    const cardInfo = clickedBtn.parentElement;
    const prodImage = card.querySelector("img").src;
    const prodName = cardInfo.querySelector("h4").textContent;
    const prodPrice = cardInfo.querySelector(".card__price").textContent;

    let isProductInCart = false;
    let lsContent = getLSContent();
    lsContent.forEach(function (product) {
      if (product.id === productId) {
        alert("This Product is already in your cart.");
        isProductInCart = true;
      }
    });

    if (!isProductInCart) {
      lsContent.push({
        id: productId,
        image: prodImage,
        name: prodName,
        quantity: 1,
        price: prodPrice
      });

      setLSContent(lsContent);
      displayProducts();
    } else {
      lsContent.forEach(function (product) {
        if (product.id === productId) {
          product.quantity = Number(product.quantity) + 1;
        }
      });

      setLSContent(lsContent);
    }
  }

  function removeProduct(productId) {
    const lsContent = getLSContent();
    let productIndex;
    lsContent.forEach(function (product, i) {
      if (product.id === productId) {
        productIndex = i;
      }
    });
    lsContent.splice(productIndex, 1);
    setLSContent(lsContent);
    displayProducts();
  }

  function clearCart() {
    const lsContent = getLSContent();
    lsContent.splice(0, lsContent.length);
    setLSContent(lsContent);
    displayProducts();
  }

  function checkout() {
    const cartProducts = cartContent.querySelector("tbody").innerHTML;
    if (cartProducts !== "" && confirm("Are you sure you want to checkout?")) {
      getOrderDetails();
      clearCart();
      window.location.href = "../customer/checkout.php";
      // window.location.href = "../customer/thanks.php";
      // window.open("../customer/thanks.php");
    } else {
      return;
    }
  }

  document.addEventListener("DOMContentLoaded", function (e) {
    displayProducts();
    displayCartTotal();
  });
  productsContainer.addEventListener("click", function (e) {
    if (e.target.classList.contains("add-to-cart")) {
      e.preventDefault();
      const clickedBtn = e.target;
      saveProduct(clickedBtn);
    }
  });

  productsContainer.addEventListener("click", function (e) {
    if (e.target.classList.contains("add-to-cart")) {
      displayCartTotal();
    }
  });

  cartContent.querySelector("tbody").addEventListener("click", function (e) {
    e.preventDefault();
    const clickedBtn = e.target;
    if (e.target.classList.contains("remove")) {
      const productId = clickedBtn.getAttribute("data-id");
      removeProduct(productId);
      displayCartTotal();
    }
  });
  clearCartBtn.addEventListener("click", function (e) {
    e.preventDefault();
    clearCart();
  });
  clearCartBtn.addEventListener("click", displayCartTotal);
  checkoutBtn.addEventListener("click", function (e) {
    e.preventDefault();
    setLSContent(getLSContent());
    // checkout();
    if (totalPriceContainer.innerHTML !== '<div style="margin-bottom: 20px">Cart is Empty </div><span class="total">Total: Rs. 0</span>') {
      window.location.href = "../customer/checkout.php";
    }else{
      alert("Cart is Empty!\nAdd Items to Cart for Checkout.")
    }
    console.log("checkout button clicked")
    // displayCheckoutProducts();
  });
  // checkoutBtn.addEventListener("click", displayCartTotal);
})();
