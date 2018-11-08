<?php

 function connect_db($host, $username, $password, $dbname) {
    require("config.php");
    $conn = mysqli_connect($host, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } return $conn;
 }


?>