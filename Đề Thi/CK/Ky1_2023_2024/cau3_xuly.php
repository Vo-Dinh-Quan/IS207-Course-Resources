<?php
  include "connect.php";
  $action = $_POST['action'];
  $soxe = $_POST['soxe'];
  if ($action == 'thue') {
    $makhachhang = $_POST['makhachhang'];
    $ngaythue = $_POST['ngaythue'];
    $sql = "INSERT INTO THUE (MAKH, SOXE, NGAYTHUE) VALUES ('$makhachhang', '$soxe', '$ngaythue')";
    $connect->query($sql);
    $connect->query("UPDATE XE SET TINHTRANG = 1 WHERE SOXE = '$soxe'");
    
    $row = $connect->query("SELECT TENXE FROM XE WHERE SOXE = '$soxe'")->fetch_assoc();
    echo "<tr>
            <td>$soxe</td>
            <td>{$row['TENXE']}</td>
            <td>$ngaythue</td>
            <td><button class='khongthue' data-soxe='$soxe'>Không Thuê</button></td>
          </tr>";
  } elseif ($action == 'khongthue') {
    $connect->query("DELETE FROM THUE WHERE SOXE = '$soxe'");
    $connect->query("UPDATE XE SET TINHTRANG = 0 WHERE SOXE = '$soxe'");

    $row = $connect->query("SELECT TENXE, HANGXE, NAMSX, SOCHO, DGTHUE FROM XE WHERE SOXE = '$soxe'")->fetch_assoc();
    echo "<tr>
            <td>$soxe</td>
            <td>{$row['TENXE']}</td>
            <td>{$row['HANGXE']}</td>
            <td>{$row['NAMSX']}</td>
            <td>{$row['SOCHO']}</td>
            <td>{$row['DGTHUE']}</td>
            <td><button class='thue' data-soxe='$soxe'>Thuê</button></td>
          </tr>";
  }
?>
