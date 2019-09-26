<?php

  if(isset($_POST['username'], $_POST['password'])){
    require 'connect_database.php';
    $uname =$_POST['username'];
    $ps =$_POST['password'];

    $sql = "SELECT *
            FROM admin
            WHERE name='$uname' and password = '$ps'" ;

    $res=$conn->query($sql);

    if($res->num_rows > 0){
      session_start();
      $_SESSION['name']=$uname;
      echo"success";
    }else{
      echo"Invalid username or password";
    }
  }

?>
