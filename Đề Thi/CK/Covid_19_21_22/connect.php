<?php
    $connect = new mysqli("localhost", "root", "", "is207_ck_2021-2022");
    if($connect -> errno !== 0){
        die("Error: Could not connect to the database. An error ".$connect->error." ocurred.");
    } else {
        // echo ("Connect successfully!");
    }
    $connect -> set_charset("utf8");
?>