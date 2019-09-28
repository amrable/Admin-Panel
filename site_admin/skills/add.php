<?php

  if(isset( $_POST['addSkillName'], $_POST['addSkillRate'] )){
    $name = $_POST['addSkillName'];
		$rate= $_POST['addSkillRate'];






	require '../connect_database.php';
	$sql = "insert into skill (`name` , `skill_value`) VALUES ('$name' , ' $rate' )";

	if( $conn->query($sql)){
		echo "success";
	}else{
		echo "error";
	}

  }else{
    echo "failed";
  }
?>
