<?php
    $servername = "127.0.0.1"; //replace it with your database server name
    $username = "root";  //replace it with your database username
    $password = "123";  //replace it with your database password
    $dbname = "AVS";
    // Create connection
    $conn = mysql_connect($servername, $username, $password);
    mysql_select_db("AVS", $conn);


    // $dbname = "bigcattl_formal";
    // // Create connection
    // $conn = mysql_connect($servername, $username, $password);
    // mysql_select_db("bigcattl_formal", $conn);

    mysql_query("set names utf8");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>