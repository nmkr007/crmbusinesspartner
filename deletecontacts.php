<?php
include "database/db_connection.php";
if (isset ( $_GET ['q'] )&&isset ( $_GET ['p'] )) {
	$Searchcompany = $_GET ['q'];
	$email = $_GET['p'];
	
	$sql = "delete from company_contact where companyid = '$Searchcompany' and email = '$email'";
	$result = mysqli_query ( $dbcon, $sql );
	if($result){
	header("Location: contacts.php");
	}
	else{
		echo "<script>alert ('There is a problem, Error while Deleting..')</script>";
		break;
	}
} 
?>