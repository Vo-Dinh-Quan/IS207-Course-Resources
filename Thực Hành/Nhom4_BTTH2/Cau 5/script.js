const cartTable = document.getElementById("cartTable");

// Hàm cập nhật thành tiền (subtotal) cho từng sản phẩm
function updateSubtotal(row) {
    const quantity = row.querySelector(".quantity").valueAsNumber || 1;
    const price = parseInt(row.querySelector(".price").value) || 0;
    const subtotal = quantity * price;

    row.querySelector(".subtotal").textContent = subtotal;
    updateTotal();
}

// Hàm cập nhật tổng tiền (total) của toàn bộ giỏ hàng
function updateTotal() {
    // Tính tổng tiền từ tất cả các ô thành tiền (subtotal)
    const total = Array.from(document.querySelectorAll(".subtotal")).reduce(
        (sum, cell) => sum + parseInt(cell.textContent),
        0
    );

    document.getElementById("total").textContent = total;
}

// Sự kiện khi người dùng nhập vào ô số lượng hoặc giá
cartTable.addEventListener("input", (event) => {
    if (
        event.target.classList.contains("quantity") ||
        event.target.classList.contains("price")
    ) {
        // Cập nhật thành tiền cho dòng chứa ô được thay đổi
        updateSubtotal(event.target.closest("tr"));
    }
});

// Sự kiện khi người dùng bấm nút xóa
cartTable.addEventListener("click", (event) => {
    if (event.target.classList.contains("deleteBtn")) {
        event.target.closest("tr").remove();
        updateTotal();
    }
});

updateTotal();
