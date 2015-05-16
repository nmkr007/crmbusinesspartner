<?php
include "database/db_connection.php";
if (isset ( $_GET ['q'] )) {
	$Searchcompany = $_GET ['q'];
	
	$sql = "delete from companies where companyid = '$Searchcompany'";
	$result = mysqli_query ( $dbcon, $sql );
	
	header("Location: companies.php");
	
} 
?>