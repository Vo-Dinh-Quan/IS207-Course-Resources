document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("buyTicket").addEventListener("click", () => {
        const customerName = "Nguyễn Văn A";
        const showDate = document.getElementById("showDate").value;
        const movie = document.getElementById("movieSelect").selectedOptions[0].text;
        const showTimeSelect = document.getElementById("showTimeSelect");
        const showTimePrice = parseFloat(showTimeSelect.value);
        const showTime = showTimeSelect.selectedOptions[0].text;
        const roomSelect = document.getElementById("roomSelect");
        const roomPrice = parseFloat(roomSelect.value);
        const room = roomSelect.selectedOptions[0].text;
        const seats = Array.from(document.getElementById("seatSelect").selectedOptions).map(opt => opt.value);

        if (showDate && movie !== "Phim" && showTime && room && seats.length) {
            const ticketPrice = showTimePrice * roomPrice;
            const totalPrice = seats.length * ticketPrice;
            const ticketContent = `
                <div class="ticket-info">
                    <p class="header">Thông tin vé</p>
                    <div><span>Khách hàng:</span><span>${customerName}</span></div>
                    <div><span>Ngày chiếu:</span><span>${showDate}</span></div>
                    <div><span>Phim:</span><span>${movie}</span></div>
                    <div><span>Suất chiếu:</span><span>${showTime}</span></div>
                    <div><span>Phòng chiếu:</span><span>${room}</span></div>
                    <table>
                        <tr><th>Ghế</th><th>Giá Vé</th></tr>
                        ${seats.map(seat => `<tr><td>${seat}</td><td>${ticketPrice.toLocaleString()} đ</td></tr>`).join('')}
                        <tr><td colspan="2" class="total">Tổng tiền: ${totalPrice.toLocaleString()} đ</td></tr>
                    </table>
                </div>
            `;

            const newWindow = window.open("", "_blank");
            newWindow.document.write(ticketContent);
            newWindow.document.close();
        } else {
            alert("Vui lòng điền đầy đủ thông tin!");
        }
    });
});
