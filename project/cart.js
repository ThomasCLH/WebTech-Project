document.addEventListener("DOMContentLoaded", cart);

function cart() {
    var removeCartItemButtons = document.getElementsByClassName("btn-remove")
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i]
        button.addEventListener("click", removeCartItem)
    }

    var quantityInputs = document.getElementsByClassName("cart-quantity-input")
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i]
        input.addEventListener("change", quantityChanged)
    }

    var addToCartButtons = document.getElementsByClassName("shop-item-button")
    for (var i = 0; i < addToCartButtons.length; i++) {
        var button = addToCartButtons[i]
        button.addEventListener("click", addToCartClicked)


    }   
}

function removeCartItem(event) {
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove()
    updateCartTotal()
}

function quantityChanged(event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateCartTotal()
}

function addToCartClicked(event) {
    var button = event.target
    var product = button.parentElement.parentElement
    var name = product.getElementsByClassName("product-name")[0].innerText
    var price = product.getElementsByClassName("product-price")[0].innerText
    var image = product.getElementsByClassName("product-image")[0].src
    addItemToCart(name, price, image)
    updateCartTotal()
}

function addItemToCart(name, price, image) {
    var cartRow = document.createElement("div")
    cartRow.classList.add("cart-row")
    var cartProducts = document.getElementsByClassName("cart-products")[0]
    var cartProductNames = cartProducts.getElementsByClassName("cart-product-name")
    for (var i = 0; i < cartProductNames.length; i++) {
        if (cartProductNames[i].innerText == name) {
            alert("You already added to the cart")
            return
        }
    }
    var cartRowContents = `
        <div class="cart-product">
            <img class="cart-product-image" src="${image}" width="100" height="100">
            <span class="cart-product-name">${name}</span>
            
        </div>
        <span class="cart-price">${price}</span>
        <div class="cart-quantity">
            <input class="cart-quantity-input" type="number" value="1">
            <button class="btn btn-remove" type="button">REMOVE</button>
        </div>`
    cartRow.innerHTML = cartRowContents
    cartProducts.append(cartRow)
    cartRow.getElementsByClassName("btn-remove")[0].addEventListener("click", removeCartItem)
    cartRow.getElementsByClassName("cart-quantity-input")[0].addEventListener("change", quantityChanged)
}

function updateCartTotal() {
    var cartProductContainer = document.getElementsByClassName("cart-products")[0]
    var cartRows = cartProductContainer.getElementsByClassName("cart-row")
    var total = 0
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName("cart-price")[0]
        var quantityElement = cartRow.getElementsByClassName("cart-quantity-input")[0]
        var price = parseFloat(priceElement.innerText.replace("$", ""))
        var quantity = quantityElement.value
        total = total + (price * quantity)
    }
}

function submitCart() {
    const product = document.getElementsByClassName("cart-total-name");
    const price = document.getElementsByClassName("cart-total-price");

    alert(product + " " + price);

    document.getElementById("product").value = product;
    document.getElementById("price").value = price;
}

document.getElementsByClassName("cart-total-price")[0].innerText = '$' + total