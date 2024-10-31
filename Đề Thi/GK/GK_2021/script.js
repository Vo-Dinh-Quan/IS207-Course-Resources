let cart = [];
console.log(cart);

function addToCart(name, price) {
    const existing = cart.find(item => item.name === name);
    if (existing) {
        existing.quantity++;
    } else {
        cart.push({ name: name, price: price, quantity: 1 });
    }
    updateCart();
}

function updateCart() {
    const cartItems = document.querySelector('.cartItems');
    cartItems.innerHTML = '';
    let totalAmount = 0;

    cart.forEach((item, index) => {
        const itemTotal = item.price * item.quantity;
        totalAmount += itemTotal;

        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${item.name}</td>
            <td>${item.quantity}</td>
            <td>${itemTotal}</td>
            <td><button onclick="removeFromCart(${index})">delete</button></td>
        `;
        cartItems.appendChild(row);
    });
}

function payTotal() {
    let totalAmount = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
    document.querySelector(".totalAmount").innerText = totalAmount;
}


function removeFromCart(index) {
    cart.splice(index, 1);
    updateCart();
}