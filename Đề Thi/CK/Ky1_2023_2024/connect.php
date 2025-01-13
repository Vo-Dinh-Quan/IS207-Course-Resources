<?php
    $connect = new mysqli("localhost", "root", "", "db_2020_2021");
    if($connect -> errno !== 0){
        die("Error: Could not connect to the database. An error ".$connect->error." ocurred.");
    } else {
        // echo ("Connect successfully!");
    }
    $connect -> set_charset("utf8");
?>