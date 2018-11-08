<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<div class="container card">
<h1> To Do App </h1>
<?php 

require("config.php");
require("functions.php");

if(isset($_POST['add_todo'])) {
    // var_dump($_POST);
    $conn = mysqli_connect($host, $username, $password, $dbname);

  //  if (!$conn) {
  //       die("Connection failed: " . mysqli_connect_error());
  //   }
    // echo "Connected successfully";
    connect_db($host, $username, $password, $dbname);

    $sql = 'INSERT INTO todos (task, due_date) VALUES ("' . $_POST['task'] . '", "' . $_POST['due_date'] .'")';
    $result = mysqli_query($conn, $sql );

    if ($result == false) {
    echo mysqli_error($conn);
    } 
    // else { 
    //     echo "table and db created";
    //     }

    //output the table values onto the app
    $sql = "SELECT id, task, due_date from TODOS";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) { ?>
        <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <?php echo "id: " . $row["id"]. " -task: " . $row["task"]. " " . $row['due_date']. "<br>"; ?> </li>
          </ul>
    <?php  }
  } else {
      echo "0 results";
  }

  mysqli_close($conn);
}

//mysqli_close($conn);


?>

<!-- <h1> To Do App </h1> -->
    
    <!-- <div class="container card"> -->
<form method="post" action="">
  <label for="task" class="badge badge-light">Task</label>
  <input type="text" name="task" class="form-control">
  <label for="due_date" class="badge badge-light">Due Date</label>
  <input type="date" name="due_date" class="form-control">
  
  <input type="submit" class="btn btn-outline-secondary" name="add_todo" value="add_todo">
  </form>
  </div>

<?php
//   $sql = "SELECT id, task, due_date from TODOS";
//   $result = mysqli_query($conn, $sql);

//   if(mysqli_num_rows($result) > 0) {
//       while($row = mysqli_fetch_assoc($result)) {
//           echo "id: " . $row["id"]. " -task: " . $row["task"]. " " . $row['due_date']. "<br>";
//       }
//   } else {
//       echo "0 results";
//   }

//   mysqli_close($conn);
  ?>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>

<!-- //create another file called functions class="php">
</functions> will need config in functions page
create a function that creates database connection for you like db() - like abstract the code from the if isset
create a list of all the todos in 
when the page loads, check if there are any records in the database and list it as task and todo date.
create a button where you can to -->