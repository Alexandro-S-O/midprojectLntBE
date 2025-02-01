<?php 
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "midproject";

    $conn = mysqli_connect(
        hostname: $dbHost, 
        username: $dbUser, 
        password: $dbPass, 
        database: $dbName
    );
    
    if (!$conn) {
        die("Something went Wrong");
    } 
?>