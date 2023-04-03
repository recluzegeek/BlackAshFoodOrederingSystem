'use strict';
const displayContainer = document.querySelector('#product-card-container');
// Retrieve the data from localStorage
const cartItems = JSON.parse(localStorage.getItem('products'))
displayCheckoutProducts();

function displayCheckoutProducts() {
    const cartItems = JSON.parse(localStorage.getItem('products'));
    let productMarkup = "";
    // console.log(cartItems)
    if (cartItems !== null) {
        for (let product of cartItems) {
            productMarkup += `
        <div class="product-card">
          <div class="card">
            <div class="img-box">
              <img src="${product.image}" width="80px" class="product-img">
            </div>
            <div class="detail">
              <h4 class="product-name">${product.name}</h4>
              <div class="wrapper">
                <div class="product-qty">
                  <button class="decrement" data-id="${product.id}"><ion-icon name="remove-outline"></ion-icon></button>
                  <span class="quantity">${product.quantity}</span>
                  <button class="increment" data-id="${product.id}"><ion-icon name="add-outline"></ion-icon></button>
                </div>
                <div ><span class="price">${product.price}</span></div>
              </div>
            </div>
            <button class="product-close-btn remove" data-id="${product.id}" title="Remove Item"><ion-icon name="close-outline"></ion-icon></button>

          </div>
        </div>
      `;
        }
    } else {
        productMarkup = "\"Congratulations, your cart is officially a minimalist masterpiece!\".";
    }
    totalCalc();
    displayContainer.innerHTML = productMarkup;
}

function totalCalc() {
    let total = 0;
    let products = document.querySelectorAll('.card');
    // console.log(products)
    for (let i = 0; i < products.length; i++) {
        let product = products[i];
        let quantity = parseInt(product.querySelector('.quantity').textContent);
        let priceString = product.querySelector('.price').textContent.trim();
        let price = parseInt(priceString.substring(priceString.indexOf("Rs.") + 4));
        total += quantity * price;
    }
    // console.log(total)
    document.querySelector('#total').textContent = total.toFixed(2);
    // document.querySelector('#payAmount').textContent = +total.toFixed(2);
    // return total;

}

function updateCartItemQuantity(itemId, newQuantity) {
    const cartItems = JSON.parse(localStorage.getItem('products'));
    // console.log('in updateCartItemQuantity and passed itemId is: ' + itemId + ' and newQuantity is: ' + newQuantity)
    // console.log('before')
    // console.log(cartItems)
    for (let i = 0; i < cartItems.length; i++) {
        if (cartItems[i].id === itemId) {
            cartItems[i].quantity = newQuantity;
            // console.log('updated')
            localStorage.setItem('products', JSON.stringify(cartItems)); // Update the localStorage
            break;
        }
    }
    // console.log('after')
    // console.log(JSON.parse(localStorage.getItem('products')))
    totalCalc();
}

function removeCartItem(itemId) {
    let cartItems = JSON.parse(localStorage.getItem('products'));
    let removedItem;
    for (let i = 0; i < cartItems.length; i++) {
        if (cartItems[i].id === itemId) {
            removedItem = cartItems.splice(i, 1)[0];
            break;
        }
    }
    localStorage.setItem('products', JSON.stringify(cartItems));
    totalCalc(removedItem.price, removedItem.quantity);
    displayCheckoutProducts();
}

async function getOrderDetails() {
    console.log('getOrderDetails() called'); // Debugging statement
    const itemAndQuantities = {};
    const cartItems = JSON.parse(localStorage.getItem('products'));
    for (const product of cartItems) {
        if (product.hasOwnProperty('id') && product.hasOwnProperty('quantity')) {
            itemAndQuantities[product.id] = product.quantity;
        }
    }
    itemAndQuantities['totalBill'] = document.querySelector('#total').textContent;
    itemAndQuantities['accountNum'] = document.querySelector('#accountNumber').value;
    if (itemAndQuantities['accountNum'] === '') {
        alert('Account Number is Required');
        return;
    }
    itemAndQuantities['submitOrder'] = true;
    console.log('data is sent to paymentProcessing file')
    console.log(itemAndQuantities)
    const resp = await fetch('../customer/paymentProcessing.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(itemAndQuantities),
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            window.location.replace("../customer/thanks.php");
        })
        .catch(error => console.error('Error:', error));
    clearStorage();
}

function clearStorage() {
    console.log('clearStorage() called'); // Debugging statement
    const lsContent = JSON.parse(localStorage.getItem('products'));
    lsContent.splice(0, lsContent.length);
    localStorage.setItem('products', JSON.stringify(lsContent));
    displayCheckoutProducts()
}


displayContainer.addEventListener('click', function (e) {
    const incrementBtn = e.target.closest('.increment');
    const decrementBtn = e.target.closest('.decrement');
    const removeBtn = e.target.closest('.remove');
    if (incrementBtn) {
        const quantityElem = incrementBtn.parentNode.querySelector('.quantity');
        const newQuantity = parseInt(quantityElem.textContent) + 1;
        quantityElem.textContent = newQuantity;
        const itemId = incrementBtn.getAttribute('data-id');
        updateCartItemQuantity(itemId, newQuantity);
    } else if (decrementBtn) {
        const quantityElem = decrementBtn.parentNode.querySelector('.quantity');
        const newQuantity = parseInt(quantityElem.textContent) - 1;
        if (newQuantity >= 0) {
            quantityElem.textContent = newQuantity;
            const itemId = decrementBtn.getAttribute('data-id');
            updateCartItemQuantity(itemId, newQuantity);
            if (newQuantity === 0) {
                removeCartItem(itemId);
                displayCheckoutProducts();
            }
        }
    } else if (removeBtn) {
        const itemId = removeBtn.getAttribute('data-id');
        console.log('remove item id')
        console.log(itemId)
        removeCartItem(itemId);
        displayCheckoutProducts();
    }
});

// add event listener to domcontent load and call totalcalc()
document.addEventListener('DOMContentLoaded', function () {
    totalCalc()

});

// // add event listener to payButton and call getOrderDetails()
// document.querySelector('#payButton').addEventListener('click', function () {
//   getOrderDetails();
// }
