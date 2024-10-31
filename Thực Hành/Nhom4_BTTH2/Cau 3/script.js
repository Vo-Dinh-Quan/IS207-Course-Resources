document.addEventListener("DOMContentLoaded", () => {
    const updateTotal = (tableDiv) => {
        const total = Array.from(tableDiv.querySelectorAll(".price"))
            .reduce((sum, p) => sum + parseInt(p.textContent.replace(/,/g, "")), 0);
        tableDiv.querySelector(".totalAmount").textContent = total.toLocaleString();
    };

    document.getElementById("addItem").addEventListener("click", () => {
        const tableNum = document.getElementById("tableSelect").value.slice(-1);
        const foodSelect = document.getElementById("foodSelect");
        const foodName = foodSelect.selectedOptions[0].text;
        const foodPrice = parseInt(foodSelect.value);
        let tableDiv = document.getElementById("table" + tableNum);

        if (!tableDiv) {
            tableDiv = document.createElement("div");
            tableDiv.id = "table" + tableNum;
            tableDiv.innerHTML = `
                <h4>Bàn ${tableNum}</h4>
                <table class="orderTable"><tr><th>Món</th><th>SL</th><th>Tiền</th><th>Xóa</th></tr></table>
                <div class="total">Tổng tiền: <span class="totalAmount">0</span> đ</div>
                <button class="printBill">In hóa đơn</button>
            `;
            document.getElementById("tablesContainer").appendChild(tableDiv);
        }

        const existingRow = tableDiv.querySelector(`tr[data-food="${foodName}"]`);
        if (existingRow) {
            const quantity = existingRow.querySelector(".quantity");
            quantity.value = parseInt(quantity.value) + 1;
            existingRow.querySelector(".price").textContent = (quantity.value * foodPrice).toLocaleString();
        } else {
            const row = document.createElement("tr");
            row.setAttribute("data-food", foodName);
            row.innerHTML = `
                <td>${foodName}</td>
                <td><input type="number" class="quantity" value="1" min="1" data-price="${foodPrice}"></td>
                <td class="price">${foodPrice.toLocaleString()}</td>
                <td><button class="remove-btn">Xóa</button></td>
            `;
            tableDiv.querySelector(".orderTable").appendChild(row);
        }
        updateTotal(tableDiv);
    });

    document.addEventListener("input", (e) => {
        if (e.target.classList.contains("quantity")) {
            const row = e.target.closest("tr");
            row.querySelector(".price").textContent = (e.target.value * e.target.dataset.price).toLocaleString();
            updateTotal(row.closest("div"));
        }
    });

    document.addEventListener("click", (e) => {
        if (e.target.classList.contains("remove-btn")) {
            const tableDiv = e.target.closest("div");
            e.target.closest("tr").remove();
            updateTotal(tableDiv);
        }
        if (e.target.classList.contains("printBill")) {
            const tableDiv = e.target.closest("div");
            const employeeName = "Nguyễn Văn A";
            let billContent = `
                <div style="text-align: center; font-family: Arial, sans-serif;">
                    <h3>Hóa đơn</h3>
                    <p>Ngày hóa đơn: ${new Date().toLocaleString("vi-VN")}</p>
                    <p>Nhân viên: ${employeeName}</p>
                    <p>Bàn: ${tableDiv.id.slice(-1)}</p>
                    <table border="1" style="width: 100%; text-align: center;">
                        <tr><th>Món</th><th>SL</th><th>Thành Tiền</th></tr>
            `;
            let total = 0;
            tableDiv.querySelectorAll("tr[data-food]").forEach(row => {
                const food = row.getAttribute("data-food");
                const qty = row.querySelector(".quantity").value;
                const price = row.querySelector(".price").textContent;
                total += parseInt(price.replace(/,/g, ""));
                billContent += `<tr><td>${food}</td><td>${qty}</td><td>${price} đ</td></tr>`;
            });
            billContent += `</table><p>Tổng tiền: ${total.toLocaleString()} đ</p></div>`;
            const newWindow = window.open("", "_blank");
            newWindow.document.write(billContent);
            newWindow.document.close();
        }
    });
});
