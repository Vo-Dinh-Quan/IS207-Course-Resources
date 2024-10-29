$(document).ready(function () {
    $("#buyTicket").click(function () {
        const customerName = "Nguyễn Văn A";
        const showDate = $("#showDate").val();
        const movie = $("#movieSelect option:selected").text();
        const showTimePrice = parseFloat($("#showTimeSelect").val());
        const showTime = $("#showTimeSelect option:selected").data("time");
        const roomPrice = parseFloat($("#roomSelect").val());
        const room = $("#roomSelect option:selected").text();
        const seats = $("#seatSelect").val();

        if (showDate && movie !== "Phim" && showTime && room && seats.length > 0) {
            const seatCount = seats.length;
            const ticketPrice = showTimePrice * roomPrice;
            const totalPrice = seatCount * ticketPrice;
            
            let ticketContent = `
                <style>
                    body { font-family: Arial, sans-serif; text-align: center; }
                    .ticket-info { width: 300px; margin: auto; text-align: left; }
                    .ticket-info .info-row { display: flex; justify-content: space-between; padding: 5px 0; }
                    .ticket-info .header { font-weight: bold; font-size: 18px; text-align: center; margin-bottom: 10px; }
                    .ticket-info table { width: 100%; border-collapse: collapse; margin-top: 10px; }
                    .ticket-info th, .ticket-info td { padding: 5px; text-align: left; }
                    .ticket-info .total { font-weight: bold; text-align: right; }
                </style>
                <div class="ticket-info">
                    <p class="header">Thông tin vé</p>
                    <div class="info-row"><span>Khách hàng:</span><span>${customerName}</span></div>
                    <div class="info-row"><span>Ngày chiếu:</span><span>${showDate}</span></div>
                    <div class="info-row"><span>Phim:</span><span>${movie}</span></div>
                    <div class="info-row"><span>Suất chiếu:</span><span>${showTime}</span></div>
                    <div class="info-row"><span>Phòng chiếu:</span><span>${room}</span></div>
                    <table>
                        <tr><th>Ghế</th><th>Giá Vé</th></tr>
            `;
            
            seats.forEach(seat => {
                ticketContent += `<tr><td>${seat}</td><td>${ticketPrice.toLocaleString()} đ</td></tr>`;
            });
            
            ticketContent += `
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
