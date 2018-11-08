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


<?php 

require("config.php");
require("functions.php");

if(isset($_POST['add_todo'])) {
    
  //connect to db
      $conn = connect_db();
   
      $sql = 'INSERT INTO todos (task, due_date) VALUES ("' . $_POST['task'] . '", "' . $_POST['due_date'] .'")';
      $result = mysqli_query($conn, $sql );

      //check if there is an error
      if ($result == false) {
        echo mysqli_error($conn);
      } 
    
    mysqli_close($conn);
}

if(isset($_POST['delete'])) {
  delete_task($_POST['delete']);

}


?>


    
    
    <div class="container card">
      <h1 class="card-title text-center"> To Do App </h1>
      <?php $conn = connect_db();
      if (!$conn) {
        echo "no connection";
      }
       $sql = "SELECT * from TODOS"; 
       $todos = mysqli_query($conn, $sql);
      
       if (mysqli_num_rows($todos) > 0) :
       ?>
        <form method="post" action="">
      <ul class="list-group">
        <?php while($row = mysqli_fetch_assoc($todos)) : ?>
          <li class="list-group-item"><?php echo $row['task']; ?><button type="submit" class="btn btn-danger float-right" value="<?php $row['id']; ?>" name="delete">Delete</button></li>
        <?php endwhile; ?>
      </ul>
        <?php endif ?>

        <!-- <form method="post" action=""> -->
          <label for="task" class="badge badge-light">Task</label>
          <input type="text" name="task" class="form-control">
          <label for="due_date" class="badge badge-light">Due Date</label>
          <input type="date" name="due_date" class="form-control">
          
          <input type="submit" class="btn btn-outline-secondary" name="add_todo" value="add_todo">
        </form>
    </div>

<?php

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