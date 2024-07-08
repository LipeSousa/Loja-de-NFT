/* Carrinho */

function ready() {
    const quantityNumber = document.getElementsByClassName("quantity");
    for (var i = 0; i < quantityNumber.length; i++) {
        quantityNumber[i].addEventListener("change", updateTotal);
    }

    const addToCartButtons = document.getElementsByClassName("btn");
    for (var i = 0; i < addToCartButtons.length; i++) {
        addToCartButtons[i].addEventListener("click", addProductToCart);
    }

    document.addEventListener('click', function(event) {
        if (event.target && event.target.classList.contains('remove')) {
            removeProduct1(event);
        }
    });

    document.getElementById('checkoutButton').addEventListener('click', goToPaymentPage);
}

function goToPaymentPage() {
    const cartProducts = document.getElementsByClassName("cart-product");
    let cartItems = [];

    for (var i = 0; i < cartProducts.length; i++) {
        const productTitle = cartProducts[i].getElementsByClassName("name")[0].innerText;
        const productPrice = cartProducts[i].getElementsByClassName("cart-product-price")[0].innerText;
        const productQty = cartProducts[i].getElementsByClassName("quantity")[0].innerText;

        cartItems.push({
            title: productTitle,
            price: productPrice,
            quantity: productQty
        });
    }

    localStorage.setItem('cartItems', JSON.stringify(cartItems));
    localStorage.setItem('totalAmount', document.getElementById('totalAmount').innerText);
    window.location.href = 'payment.php';
}

function addProductToCart(event) {
    const button = event.target;
    const productInfos = button.parentElement.parentElement;
    const productImage = productInfos.getElementsByClassName("product-img")[0].src;
    const productTitle = productInfos.getElementsByClassName("product-title")[0].innerText;
    const productPrice = productInfos.getElementsByClassName("product-price")[0].innerText;

    let newCartProduct = document.createElement("tr");
    newCartProduct.classList.add("cart-product");

    newCartProduct.innerHTML = `
    <td>
        <div class="product">
            <img src="${productImage}" width="200px" height="180px">
            <div class="info">
                <div class="name">${productTitle}</div>
                <div class="category">Categoria</div>
            </div>
        </div>
    </td>
    <td><span class="cart-product-price">${productPrice}</span></td>
    <td>
        <div class="qty">
            <button class="decrement-btn"><i class="bx bx-minus"></i></button>
            <span class="quantity">1</span>
            <button class="increment-btn"><i class="bx bx-plus"></i></button>
        </div>
    </td>
    <td><button class="remove"><i class="bx bx-x"></i></button></td>
    `;

    const tableBody = document.querySelector("#tbody");
    tableBody.append(newCartProduct);

    const removeButton = newCartProduct.querySelector(".remove");
    removeButton.addEventListener("click", removeProduct1);

    const incrementButton = newCartProduct.querySelector(".increment-btn");
    incrementButton.addEventListener("click", incrementProduct);

    const decrementButton = newCartProduct.querySelector(".decrement-btn");
    decrementButton.addEventListener("click", decrementProduct);

    updateTotal();
}

function removeProduct1(event) {
    event.target.closest("tr").remove();
    updateTotal();
}

function updateTotal() {
    let totalAmount = 0;
    const cartProducts = document.getElementsByClassName("cart-product");
    for (var i = 0; i < cartProducts.length; i++) {
        const productPriceString = cartProducts[i].getElementsByClassName("cart-product-price")[0].innerText;
        const productPrice = parseFloat(productPriceString.replace("ETH", ""));
        const productQty = parseInt(cartProducts[i].getElementsByClassName("quantity")[0].innerText);
        totalAmount += productPrice * productQty;
    }
    totalAmount = totalAmount.toFixed(2);
    document.querySelector("#totalAmount").innerText = totalAmount + " ETH";
    document.querySelector("#totalAmount1").innerText = totalAmount + " ETH";
}

function incrementProduct(event) {
    var quantidadeElemento = event.target.closest("tr").getElementsByClassName('quantity')[0];
    var quantidade = parseInt(quantidadeElemento.innerHTML);
    quantidadeElemento.innerHTML = quantidade + 1;
    updateTotal();
}

function decrementProduct(event) {
    var quantidadeElemento = event.target.closest("tr").getElementsByClassName('quantity')[0];
    var quantidade = parseInt(quantidadeElemento.innerHTML);
    if (quantidade > 0) {
        quantidadeElemento.innerHTML = quantidade - 1;
    }
    updateTotal();
}

if (document.readyState == "loading") {
    document.addEventListener("DOMContentLoaded", ready);
} else {
    ready();
}


/* User Perfil */

document.addEventListener('DOMContentLoaded', function() {
    var dataOriginalElement = document.getElementById('data-original');
    var dataOriginal = dataOriginalElement.textContent;

    var partesData = dataOriginal.split('/');
    var dataFormatada = partesData[2] + '-' + partesData[1] + '-' + partesData[0];

    var dataObj = new Date(dataFormatada);

    var dataFormatadaFinal = dataObj.toLocaleDateString('pt-BR');

    dataOriginalElement.textContent = dataFormatadaFinal;
});




