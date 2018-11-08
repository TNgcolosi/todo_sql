<?php 
//require connection details
require ("config.php");

//connect to database
$conn = mysqli_connect($host, $username, $password);


//check if db connect is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


//fetch sql statement to creat db and table
$sql = file_get_contents("data/init.sql");
$result = mysqli_multi_query($conn, $sql );


//check if execution failed 
if ($result == false) {
    echo mysqli_error($conn);
} else { 
    echo "table and db created";
}

//close db connection
mysqli_close($conn); 


?>