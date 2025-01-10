-- Tạo bảng KHACHHANG
CREATE TABLE KHACHHANG (
    MAKH VARCHAR(10) PRIMARY KEY,
    HOTENKH VARCHAR(100),
    DIACHI VARCHAR(200),
    DIENTHOAI VARCHAR(15)
);

-- Tạo bảng XE
CREATE TABLE XE (
    SOXE VARCHAR(15) PRIMARY KEY,
    HANGXE VARCHAR(50),
    NAMSX INT,
    MAKH VARCHAR(10),
    FOREIGN KEY (MAKH) REFERENCES KHACHHANG(MAKH)
);

-- Tạo bảng BAODUONG
CREATE TABLE BAODUONG (
    MABD VARCHAR(10) PRIMARY KEY,
    NGAYNHAN DATE,
    NGAYTRA DATE,
    SOKM INT,
    NOIDUNG TEXT,
    SOXE VARCHAR(15),
    THANHTIEN DOUBLE,
    FOREIGN KEY (SOXE) REFERENCES XE(SOXE)
);

-- Tạo bảng CONGVIEC
CREATE TABLE CONGVIEC (
    MACV VARCHAR(10) PRIMARY KEY,
    TENCV VARCHAR(100),
    DONGIA DOUBLE
);

-- Tạo bảng CT_BD
CREATE TABLE CT_BD (
    MABD VARCHAR(10),
    MACV VARCHAR(10),
    PRIMARY KEY (MABD, MACV),
    FOREIGN KEY (MABD) REFERENCES BAODUONG(MABD),
    FOREIGN KEY (MACV) REFERENCES CONGVIEC(MACV)
);

-- Thêm 10 bản ghi vào bảng KHACHHANG
INSERT INTO KHACHHANG VALUES
('KH001', 'Nguyen Van A', 'Hanoi', '0123456789'),
('KH002', 'Tran Thi B', 'HCMC', '0987654321'),
('KH003', 'Le Van C', 'Danang', '0345678912'),
('KH004', 'Pham Thi D', 'Hue', '0765432198'),
('KH005', 'Nguyen Van E', 'Hai Phong', '0234567891'),
('KH006', 'Do Thi F', 'Can Tho', '0543219876'),
('KH007', 'Vo Van G', 'Quang Ninh', '0456789123'),
('KH008', 'Hoang Thi H', 'Bac Ninh', '0789123456'),
('KH009', 'Pham Van I', 'Vinh', '0678901234'),
('KH010', 'Dang Thi K', 'Nha Trang', '0890123456');

-- Thêm 10 bản ghi vào bảng XE
INSERT INTO XE VALUES
('29A12345', 'Toyota', 2018, 'KH001'),
('30B67890', 'Honda', 2020, 'KH002'),
('31C12345', 'Hyundai', 2017, 'KH002'),
('32D67890', 'Mazda', 2021, 'KH004'),
('33E12345', 'Ford', 2019, 'KH004'),
('34F67890', 'Kia', 2022, 'KH006'),
('35G12345', 'Suzuki', 2016, 'KH004'),
('36H67890', 'BMW', 2023, 'KH001'),
('37I12345', 'Mercedes', 2015, 'KH003'),
('38K67890', 'Lexus', 2018, 'KH003');

-- Thêm 10 bản ghi vào bảng BAODUONG
INSERT INTO BAODUONG VALUES
('BD001', '2025-01-01', '2025-01-02', 12000, 'Thay dầu', '29A12345', 500000),
('BD002', '2025-01-03', '2025-01-04', 15000, 'Bảo dưỡng định kỳ', '30B67890', 800000),
('BD003', '2025-01-05', '2025-01-06', 18000, 'Thay lốp', '31C12345', 1200000),
('BD004', '2025-01-07', '2025-01-08', 20000, 'Kiểm tra phanh', '32D67890', 300000),
('BD005', '2025-01-09', '2025-01-10', 25000, 'Sửa động cơ', '33E12345', 2500000),
('BD006', '2025-01-11', '2025-01-12', 30000, 'Thay ắc quy', '34F67890', 700000),
('BD007', '2025-01-13', '2025-01-14', 35000, 'Bảo dưỡng định kỳ', '35G12345', 800000),
('BD008', '2025-01-15', '2025-01-16', 40000, 'Thay dầu', '36H67890', 500000),
('BD009', '2025-01-17', '2025-01-18', 45000, 'Thay bugi', '37I12345', 300000),
('BD010', '2025-01-19', '2025-01-20', 50000, 'Bảo dưỡng định kỳ', '38K67890', 800000);

-- Thêm 10 bản ghi vào bảng CONGVIEC
INSERT INTO CONGVIEC VALUES
('CV001', 'Thay dầu', 500000),
('CV002', 'Bảo dưỡng định kỳ', 800000),
('CV003', 'Thay lốp', 1200000),
('CV004', 'Kiểm tra phanh', 300000),
('CV005', 'Sửa động cơ', 2500000),
('CV006', 'Thay ắc quy', 700000),
('CV007', 'Thay bugi', 300000),
('CV008', 'Vệ sinh xe', 200000),
('CV009', 'Kiểm tra điện', 400000),
('CV010', 'Thay đèn', 150000);

-- Thêm 10 bản ghi vào bảng CT_BD
INSERT INTO CT_BD VALUES
('BD001', 'CV001'),
('BD002', 'CV002'),
('BD003', 'CV003'),
('BD004', 'CV004'),
('BD005', 'CV005'),
('BD006', 'CV006'),
('BD007', 'CV002'),
('BD008', 'CV001'),
('BD009', 'CV007'),
('BD010', 'CV002');
