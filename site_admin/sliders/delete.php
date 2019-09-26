<?php

  if(isset($_POST['delete_id'])){

    $id = $_POST['delete_id'];
    require '../connect_database.php';
    $sql = "delete from slider where id='$id'";
     if ($conn->query($sql)) {
       echo "success";
     }else {
       echo "failed";
     }
  }else{

    echo "error";
  }

 ?>
