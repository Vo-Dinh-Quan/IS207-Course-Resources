// Thêm sách mượn
document.getElementById("addBookBtn").onclick = () => {
    const books = document.getElementById("bookContainer").getElementsByTagName("select");
    if (books.length >= 3) return alert("Chỉ được mượn tối đa 3 quyển sách");
    const newSelect = books[0].cloneNode(true);
    document.getElementById("bookContainer").appendChild(newSelect);
};

// Lưu thông tin phiếu mượn
document.querySelector(".submit").onclick = (e) => {
    e.preventDefault();
    const readerName = document.getElementById("readerName").value;
    const phone = document.getElementById("phone").value;
    const borrowDate = document.getElementById("borrowDate").value;
    const notes = document.getElementById("notes").value;

    const books = Array.from(document.getElementById("bookContainer").getElementsByTagName("select"))
        .map(select => {
            const bookName = select.value;
            const borrowDuration = select.options[select.selectedIndex].className;
            
            // Chuyển className thành chuỗi tương ứng với số ngày
            let durationText;
            if (borrowDuration === '7day') durationText = '7 ngày';
            else if (borrowDuration === '14day') durationText = '14 ngày';
            else if (borrowDuration === '21day') durationText = '21 ngày';
            else durationText = 'Không xác định';

            return { bookName, borrowDuration: durationText };
        });

    // Lưu vào localStorage
    localStorage.setItem(phone, JSON.stringify({ readerName, phone, borrowDate, notes, books }));
    
    // Hiển thị đầy đủ thông tin phiếu mượn
    document.body.innerHTML += `
        <div>
            <a href="./details.html?phone=${encodeURIComponent(phone)}" target="_blank">${readerName}</a>
            <p>Ngày mượn: ${borrowDate}</p>
            ${books.map(book => `<p>Sách: ${book.bookName} - Hạn mượn: ${book.borrowDuration}</p>`).join('')}
        </div>
    `;
};
