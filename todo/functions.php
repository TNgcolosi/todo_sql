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
         $sql = 'DELETE FROM todos WHERE id ='. $id.';';
    //  $result = mysqli_query($conn, $sql);
    //  if ($result===false) {
    //      return mysqli_error($conn);
    //  }  else {
    //         return "success";
    //     }
     if (mysqli_query($conn, $sql)) {
         echo "deleted";
     }  else {
         echo "error: " . mysqli_error($conn);
        }
     mysqli_close($conn);
 }







 
 

//  function get_todos() {
//     $conn = connect_db();

//     if (!$conn) {
//         return false;
//     } echo "connection created";

//      $sql = 'INSERT INTO todos (task, due_date) VALUES ("' . $_POST['task'] . '", "' . $_POST['due_date'] .'")'; 
//      $todos = mysqli_query($conn, $sql);

//      //check if there is an error
//        if ($todos == false) {
//          echo mysqli_error($conn);
//        } 
     
//     //Marcus way - an attempt
//     //  if (mysqli_num_rows($todos) > 0) {
//     //   $todos = [];
//     //   while($row = mysqli_fetch_assoc($todos)) {
//     //       $row['task'] = $todos;
//     //   }
//     // }
//     mysqli_close($conn);
// } 

?>