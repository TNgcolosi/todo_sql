<?php
require("config.php");

 function connect_db() {
    
    global $host, $username, $password, $dbname;
    $conn = mysqli_connect($host, $username, $password, $dbname);
    if (!$conn) {
        return false;
            
    } 
    return $conn;
 }

 function  delete_task($id) {
     $conn = connect_db();

     if (!$conn) {
         return false;

     } 
     
     $sql = "DELETE FROM todos WHERE id =  '. $id . ' ";
     if (mysqli_query($conn, $sql)) {
         echo "deleted";
     } else {
         echo "error: " . mysqli_error($conn);
     }
     mysqli_close($conn);
 }

 

//  function get_todos() {
//     $conn = connect_db();

//     if (!$conn) {
//         return false;

//      $sql = "SELECT * from TODOS"; 
//      $todos = mysqli_query($conn, $sql);
    
//      if (mysqli_num_rows($todos) > 0) {
//       $todos = [];
//       <?php while($row = mysqli_fetch_assoc($todos)) {
//           $rows = $todos[];
//       }
//     }
//  }

?>