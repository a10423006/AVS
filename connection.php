<?php
    $servername = "127.0.0.1"; //replace it with your database server name
    $username = "root";  //replace it with your database username
    $password = "123";  //replace it with your database password
    $dbname = "AVS";
    // Create connection
    $con = mysqli_connect($servername, $username, $password, $dbname);

    mysqli_query("set names utf8");

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>