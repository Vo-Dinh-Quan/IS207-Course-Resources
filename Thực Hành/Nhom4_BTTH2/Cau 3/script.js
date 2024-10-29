$(document).ready(function () {
    // Thêm món vào bàn đã chọn
    $("#addItem").click(function () {
        const tableNum = $("#tableSelect").val();
        const foodName = $("#foodSelect option:selected").text();
        const foodPrice = parseInt($("#foodSelect").val());

        let $tableDiv = $("#table" + tableNum);

        if ($tableDiv.length === 0) {
            $tableDiv = $(`
                <div id="table${tableNum}">
                    <h4>Bàn ${tableNum}</h4>
                    <table class="orderTable" data-table="${tableNum}">
                        <tr>
                            <th>Món</th>
                            <th>SL</th>
                            <th>Tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </table>
                    <div class="total">Tổng tiền: <span class="totalAmount">0</span> đ</div>
                    <button class="printBill" data-table="${tableNum}">In hóa đơn</button>
                </div>
            `);
            $("#tablesContainer").append($tableDiv);
        }

        const $existingRow = $tableDiv.find(`tr[data-food="${foodName}"]`);
        if ($existingRow.length > 0) {
            const quantity = $existingRow.find(".quantity");
            const newQty = parseInt(quantity.val()) + 1;
            quantity.val(newQty);
            $existingRow
                .find(".price")
                .text((newQty * foodPrice).toLocaleString());
        } else {
            const newRow = `
                <tr data-food="${foodName}">
                    <td>${foodName}</td>
                    <td><input type="number" class="quantity" value="1" min="1" data-price="${foodPrice}"></td>
                    <td class="price">${foodPrice.toLocaleString()}</td>
                    <td><button class="remove-btn">Xóa</button></td>
                </tr>
            `;
            $tableDiv.find(".orderTable").append(newRow);
        }

        updateTotal($tableDiv);
    });

    // Cập nhật tổng khi thay đổi số lượng
    $(document).on("input", ".quantity", function () {
        const $row = $(this).closest("tr");
        const quantity = parseInt($(this).val());
        const unitPrice = $(this).data("price");
        const totalPrice = quantity * unitPrice;
        $row.find(".price").text(totalPrice.toLocaleString());

        const $tableDiv = $(this).closest(".orderTable").parent();
        updateTotal($tableDiv);
    });

    // Xóa món
    $(document).on("click", ".remove-btn", function () {
        const $tableDiv = $(this).closest(".orderTable").parent();
        $(this).closest("tr").remove();
        updateTotal($tableDiv);
    });

    // In hóa đơn
    $(document).on("click", ".printBill", function () {
        const tableNum = $(this).data("table");
        const $tableDiv = $(`#table${tableNum}`);
        const employeeName = "Nguyễn Văn A";
        let billContent = `
            <style>
                body { font-family: Arial, sans-serif; text-align: center; }
                .bill-container { width: 60%; margin: auto; text-align: left; }
                table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                th, td { padding: 8px; text-align: center; }
                .info-row { text-align: left; margin-top: 20px; }
                .info-row span { font-weight: bold; display: inline-block; width: 100px; }
                .total { font-weight: bold; text-align: center; font-size: 18px; margin-top: 20px; }
                .total .total-amount { font-size: 20px; }
                .title { font-size: 18px; font-weight: bold; text-align: center; }
            </style>
            <div class="bill-container">
                <div class="title">Hóa đơn</div>
                <div class="info-row"><span>Ngày hóa đơn:</span> ${new Date().toLocaleString(
                    "vi-VN",
                    {
                        weekday: "long",
                        day: "2-digit",
                        month: "2-digit",
                        year: "numeric",
                        hour: "2-digit",
                        minute: "2-digit",
                    }
                )}</div>
                <div class="info-row"><span>Nhân viên:</span> ${employeeName}</div>
                <div class="info-row"><span>Bàn:</span> Số ${tableNum}</div>
                <table>
                    <tr><th>Món</th><th>SL</th><th>Thành Tiền</th></tr>
        `;

        let total = 0;
        $tableDiv.find("tr[data-food]").each(function () {
            const food = $(this).data("food");
            const qty = $(this).find(".quantity").val();
            const price = $(this).find(".price").text();
            total += parseInt(price.replace(/,/g, ""));
            billContent += `<tr><td>${food}</td><td>${qty}</td><td>${price} đ</td></tr>`;
        });

        billContent += `
                </table>
                <div class="total">Tổng tiền: <span class="total-amount">${total.toLocaleString()} đ</span></div>
            </div>
        `;

        const newWindow = window.open();
        newWindow.document.write(billContent);
        newWindow.document.close();
    });

    // Cập nhật tổng tiền
    function updateTotal($tableDiv) {
        let total = 0;
        $tableDiv.find(".price").each(function () {
            total += parseInt($(this).text().replace(/,/g, ""));
        });
        $tableDiv.find(".totalAmount").text(total.toLocaleString());
    }
});
