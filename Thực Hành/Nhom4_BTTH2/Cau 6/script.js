document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("registerBtn").addEventListener("click", () => {
        const customerName = document.getElementById("customerName").value;
        const address = document.getElementById("address").value;
        const phone = document.getElementById("phone").value;
        const tourSelect = document.getElementById("tourSelect");
        const tourPrice = parseFloat(tourSelect.value);
        const tourName = tourSelect.options[tourSelect.selectedIndex].text;
        const adultCount = parseInt(document.getElementById("adultCount").value);
        const childCount = parseInt(document.getElementById("childCount").value);
        const note = document.getElementById("note").value;

        if (tourPrice > 0 && customerName && address && phone) {
            const adultTotal = adultCount * tourPrice;
            const childTotal = childCount * (tourPrice / 2);
            const total = adultTotal + childTotal;

            const bookingContent = `
                <div class="booking-info">
                    <p class="header">Thông tin đăng ký</p>
                    <table>
                        <tr><td class="label">Ngày đăng ký:</td><td>${new Date().toLocaleString("vi-VN", {
                            weekday: "long",
                            day: "2-digit",
                            month: "2-digit",
                            year: "numeric",
                            hour: "2-digit",
                            minute: "2-digit",
                        })}</td></tr>
                        <tr><td class="label">Nhân viên:</td><td>Họ tên nhân viên</td></tr>
                        <tr><td class="label">Họ tên khách:</td><td>${customerName}</td></tr>
                        <tr><td class="label">Địa chỉ:</td><td>${address}</td></tr>
                        <tr><td class="label">Tour:</td><td>${tourName}</td></tr>
                        <tr><td class="label">Ghi chú:</td><td>${note}</td></tr>
                    </table>
                    <br>
                    <p class="header">Số lượng khách đoàn</p>
                    <table>
                        <tr><th>SL</th><th>Đơn giá</th><th>Thành Tiền</th></tr>
                        <tr><td>Người lớn (${adultCount})</td><td>${tourPrice.toLocaleString()} đ</td><td>${adultTotal.toLocaleString()} đ</td></tr>
                        <tr><td>Trẻ em (${childCount})</td><td>${(tourPrice / 2).toLocaleString()} đ</td><td>${childTotal.toLocaleString()} đ</td></tr>
                        <tr><td colspan="3" class="total">Tổng tiền: ${total.toLocaleString()} đ</td></tr>
                    </table>
                </div>
            `;

            const newWindow = window.open("", "_blank");
            newWindow.document.write(bookingContent);
            newWindow.document.close();
        } else {
            alert("Vui lòng điền đầy đủ thông tin đăng ký!");
        }
    });
});
