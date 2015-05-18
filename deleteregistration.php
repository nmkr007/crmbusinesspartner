<?php
include "database/db_connection.php";
if (isset ( $_GET ['q'] )) {
	$regdate = $_GET ['q'];
	
	$sql = "delete from registration where regdate = '$regdate'";
	$result = mysqli_query ( $dbcon, $sql );
	
	header("Location: allregistrations.php");
	
} 
?>