<?php

$s_name   = "localhost";
$u_name   = "root";
$pass     = "i4m_GOOD";
$db_name  = "himuaf";


$conn = new mysqli($s_name, $u_name, $pass, $db_name);
if ($conn->connect_error) {
	die("not connection database");
}
// else {
// 	echo "connection database succssfuly";
// }


 ?>
