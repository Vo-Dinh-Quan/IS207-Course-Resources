document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("buyTicket").addEventListener("click", function () {
        const customerName = "Nguyễn Văn A";

        // lấy ngày
        const showDate = document.getElementById("showDate").value;

        // lấy tên phim đã chọn
        const movie =
            document.getElementById("movieSelect").selectedOptions[0].text;

        // lấy giá của suất chiếu đã chọn
        const showTimeSelect = document.getElementById("showTimeSelect");
        const showTimePrice = parseFloat(showTimeSelect.value);

        // lấy khung giờ
        const showTime = showTimeSelect.selectedOptions[0].text;

        // lấy loại phòng và giá phòng
        const roomSelect = document.getElementById("roomSelect");
        const roomPrice = parseFloat(roomSelect.value);
        const room = roomSelect.selectedOptions[0].text;

        // lấy ghế được chọn
        const seats = Array.from(
            document.getElementById("seatSelect").selectedOptions
        ).map((opt) => opt.value);

        if (showDate && movie !== "Phim" && showTime && room && seats.length) {
            const ticketPrice = showTimePrice * roomPrice;
            const totalPrice = seats.length * ticketPrice;

            let ticketContent = `
                <div class="ticket-info">
                    <p class="header">Thông tin vé</p>
                    <div><span>Khách hàng:</span><span>${customerName}</span></div>
                    <div><span>Ngày chiếu:</span><span>${showDate}</span></div>
                    <div><span>Phim:</span><span>${movie}</span></div>
                    <div><span>Suất chiếu:</span><span>${showTime}</span></div>
                    <div><span>Phòng chiếu:</span><span>${room}</span></div>
                    <table>
                        <tr><th>Ghế</th><th>Giá Vé</th></tr>
                        ${seats
                            .map(
                                (seat) =>
                                    `<tr><td>${seat}</td><td>${ticketPrice.toLocaleString()} đ</td></tr>`
                            )
                        }
                        <tr><td colspan="2" class="total">Tổng tiền: ${totalPrice.toLocaleString()} đ</td></tr>
                    </table>
                </div>
            `;

            const newWindow = window.open();
            newWindow.document.write(ticketContent);
            newWindow.document.close();
        } else {
            alert("Vui lòng điền đầy đủ thông tin!");
        }
    });
});
