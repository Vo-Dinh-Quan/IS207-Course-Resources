let cart = [];
console.log(cart);

function addToCart(bookTitle, bookPrice) {
    const existingItem = cart.find(item => item.title === bookTitle);
    if (existingItem) {
        existingItem.quantity++;
    } else {
        cart.push({ title: bookTitle, price: bookPrice, quantity: 1 });
    }
    updateCart();
}

function showCart() {
    document.getElementById("cart").classList.remove("hidden");
    updateCart();
}

function updateCart() {
    const cartItems = document.getElementById("cartItems");
    cartItems.innerHTML = ``;
    let total = 0;

    cart.forEach((item, index) => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;

        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${item.title}</td>
            <td>${item.price}</td>
            <td><input type="number" value="${item.quantity}" onchange="updateQuantity(${index}, this.value)"></td>
            <td>${itemTotal}</td>
            <td><button onclick="removeItem(${index})">Xóa</button></td>
        `;
        cartItems.appendChild(row);
    });
    document.getElementById("totalAmount").innerText = total;
}

function updateQuantity(index, newQuantity) {
    cart[index].quantity = parseInt(newQuantity);
    updateCart();
}

function removeItem(index) {
    cart.splice(index, 1);
    updateCart();
}
