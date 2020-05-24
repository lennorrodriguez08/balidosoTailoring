<?php

if (isset($_POST['submit'])) 
{
  
  require 'handler.php';
  
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  if (empty($username) || empty($password)) {
    //sents back the user if the username or password is empty
  header("Location: ../index?error=emptyfields");   
    exit();
  }

  else {
    $sql = "SELECT * FROM users WHERE username=?;";
    $stmt = mysqli_stmt_init($connection);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../index?error=sqlerror");
      exit();
    }
    
    else 
    {
      //This line binds the value of the user input
      mysqli_stmt_bind_param($stmt, "s", $username);
      
      //This line of code will execute the statement from the bind query to the db
      mysqli_stmt_execute($stmt);
      
      //Sets the result from the db using query
      $result = mysqli_stmt_get_result($stmt);
      
      if ($row = mysqli_fetch_assoc($result)) {

        //Check if password input has row in the db
        $pwdCheck = password_verify($password, $row['password']);

        if ($pwdCheck == true) {
          
          //Session start
          session_start();
          $_SESSION["id"] = $row['id'];
          $_SESSION["role"] = $row['role'];

          header("Location: ../home");
          exit();
        }

        else {
          header("Location: ../index?login=failed");
          exit();
        }

        }
      else {
        //Sents back the user if no user was found
        header("Location: ../index?error=nouserfound");
        exit();
      }
    }
  }
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
else 
{
  //sents back the user if the user access this file via header
  header("Location: ../index"); 
}