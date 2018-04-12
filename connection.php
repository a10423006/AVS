<?php
    $servername = "127.0.0.1"; //replace it with your database server name
    $username = "root";  //replace it with your database username
    $password = "123";  //replace it with your database password
    $dbname = "AVS";
    // Create connection
    $con = mysqli_connect($servername, $username, $password, $dbname);

    // $servername = "212.1.212.1"; //replace it with your database server name
    // $username = "bigcattl_test";  //replace it with your database username
    // $password = "s6951435";  //replace it with your database password
    // $dbname = "bigcattl_formal";
    // // Create connection
    // $conn = mysql_connect($servername, $username, $password);
    // mysql_select_db("bigcattl_formal", $conn);

    mysqli_query("set names utf8");

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>