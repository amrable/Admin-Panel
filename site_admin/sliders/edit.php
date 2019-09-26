<?php

  if(isset($_POST['edit_header'], $_POST['edit_id'], $_POST['edit_text'])){

    $title = $_POST['edit_header'];
    $desc= $_POST['edit_text'];

    $id = $_POST['edit_id'];

    $errors= array();

    if(empty($_FILES['edit_new_img']['name'])){

      //Don't update the image field


      require '../connect_database.php';
      $sql = "update slider set title='$title' , description='$desc'  where id='$id'";

      if( $conn->query($sql)){
        echo "success";
      }else{
        echo "error";
      }


    }else{
      //Check the validation of the new photo
      $file_name = $_FILES['edit_new_img']['name'];
      $file_size = $_FILES['edit_new_img']['size'];
      $file_tmp = $_FILES['edit_new_img']['tmp_name'];
      $file_type = $_FILES['edit_new_img']['type'];

      $x = explode('.',$file_name);

      $file_ext=strtolower(end($x));

      $expension=array("jpeg" , "jpg" , "png");

      if(in_array($file_ext , $expension)===false){
        $errors[]="extenions not allowed, endter JP or JPEG or PNG.  ";
      }

      if($file_size > 2097152 ){
        $errors[]="File size must be exactly or less than 2MB";
      }

      if (empty($errors)==true) {
        move_uploaded_file($file_tmp, "../../course_site/images/slider/" . $file_name);
        require '../connect_database.php';
        $sql = "update slider set title='$title' , description='$desc' , img='$file_name' where id='$id'";

        if( $conn->query($sql)){
          echo "success";
          unlink("../../course_site/images/slider/" .$_POST['old_img_name']);
        }else{
          echo "error";
        }
      }else {
        print_r($errors);
      }
    }
  }else{
    echo "Error";
  }
?>
