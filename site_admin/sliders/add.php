<?php

  if(isset( $_POST['add_new_heading'], $_POST['add_new_text'], $_FILES['add_new_img'] )){
    $title = $_POST['add_new_heading'];
		$desc= $_POST['add_new_text'];

		$errors= array();

		$file_name = $_FILES['add_new_img']['name'];
		$file_size = $_FILES['add_new_img']['size'];
		$file_tmp = $_FILES['add_new_img']['tmp_name'];
		$file_type = $_FILES['add_new_img']['type'];

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
			$sql = "insert into slider (`title` , `description`, `img`) VALUES ('$title' , ' $desc' , '$file_name')";

			if( $conn->query($sql)){
				echo "Success";
			}else{
				echo "error";
			}
		}else {
			print_r($errors);
		}
  }else{
    echo "failed";
  }
?>
