// Hàm cập nhật tổng số tiền cho từng bàn
const updateTotal = (tableDiv) => {
    // Tính tổng tiền từ các phần tử có lớp "price" trong div của bàn
    const total = Array.from(tableDiv.querySelectorAll(".price")).reduce(
        (sum, p) => sum + parseInt(p.textContent),
        0
    );
    // Cập nhật nội dung tổng tiền cho bàn hiện tại
    tableDiv.querySelector(".totalAmount").textContent = total;
};

// Hàm tạo một div mới cho bàn nếu bàn chưa tồn tại
const createTableDiv = (tableNum) => {
    // Tạo div mới cho bàn với mã số bàn
    const tableDiv = document.createElement("div");
    tableDiv.id = "table" + tableNum;
    tableDiv.innerHTML = `
            <h4>Bàn ${tableNum}</h4>
            <table class="orderTable">
                <tr>
                <th>Món</th><th>SL</th><th>Tiền</th><th>Xóa</th>
                </tr>
            </table>
            <div class="total">Tổng tiền: <span class="totalAmount">0</span> đ</div>
            <button class="printBill">In hóa đơn</button>
        `;
    // Thêm div của bàn mới vào vùng chứa các bàn
    document.getElementById("tablesContainer").appendChild(tableDiv);
    return tableDiv;
};

// Hàm thêm một dòng mới vào bàn với món ăn và giá tương ứng
const addRow = (tableDiv, foodName, foodPrice) => {
    const row = document.createElement("tr");
    row.setAttribute("data-food", foodName);
    row.innerHTML = `
        <td>${foodName}</td>
        <td><span class="quantity">1</span></td>
        <td class="price">${foodPrice}</td>
        <td><button class="remove-btn">Xóa</button></td>
    `;
    tableDiv.querySelector(".orderTable").appendChild(row);
};

// Xử lý sự kiện khi nhấn nút "Thêm Món"
const handleAddItem = () => {
    const tableNum = document.getElementById("tableSelect").value;
    const foodSelect = document.getElementById("foodSelect");
    const foodName = foodSelect.selectedOptions[0].text;
    const foodPrice = parseInt(foodSelect.value);

    let tableDiv =
        document.getElementById("table" + tableNum) || createTableDiv(tableNum);
    const existingRow = tableDiv.querySelector(`tr[data-food="${foodName}"]`);

    if (existingRow) {
        const quantitySpan = existingRow.querySelector(".quantity");
        const newQuantity = parseInt(quantitySpan.textContent) + 1;
        quantitySpan.textContent = newQuantity;
        existingRow.querySelector(".price").textContent =
            newQuantity * foodPrice;
    } else {
        addRow(tableDiv, foodName, foodPrice);
    }

    updateTotal(tableDiv);
};

// Gán sự kiện cho nút "Thêm Món"
document.getElementById("addItem").addEventListener("click", handleAddItem);

// Lắng nghe sự kiện click để xóa món hoặc in hóa đơn
document.addEventListener("click", (e) => {
    if (e.target.classList.contains("remove-btn")) {
        const tableDiv = e.target.closest("div");
        e.target.closest("tr").remove();
        updateTotal(tableDiv);
    }
    if (e.target.classList.contains("printBill")) {
        printBill(e.target.closest("div"));
    }
});

// Hàm in hóa đơn cho bàn khi nhấn nút "In hóa đơn"
const printBill = (tableDiv) => {
    const employeeName = "Nguyễn Văn A";
    const tableNum = tableDiv.id.slice(-1);
    // Tạo nội dung hóa đơn gồm thông tin bàn, ngày giờ và danh sách món
    const billContent = `
            <div style="text-align: center; font-family: Arial, sans-serif;">
                <h3>Hóa đơn</h3>
                <p>Ngày hóa đơn: ${new Date().toLocaleString("vi-VN")}</p>
                <p>Nhân viên: ${employeeName}</p>
                <p>Bàn: ${tableNum}</p>
                <table border="1" style="width: 100%; text-align: center;">
                    <tr><th>Món</th><th>SL</th><th>Thành Tiền</th></tr>
                    ${Array.from(tableDiv.querySelectorAll("tr[data-food]"))
                        .map(
                            (row) => `
                        <tr><td>${row.dataset.food}</td><td>${
                                row.querySelector(".quantity").textContent
                            }</td>
                        <td>${
                            row.querySelector(".price").textContent
                        } đ</td></tr>
                    `
                        )
                        .join("")}
                </table>
                <p>Tổng tiền: ${
                    tableDiv.querySelector(".totalAmount").textContent
                } đ</p>
            </div>`;
    // Mở cửa sổ mới và hiển thị hóa đơn
    const newWindow = window.open("", "_blank");
    newWindow.document.write(billContent);
    newWindow.document.close();
};
