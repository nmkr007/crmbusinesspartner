
<?php
include "database/db_connection.php";
if (isset ( $_POST ['addcontact1'] )) {
	
	$email = $_POST ['email'];
	$firstname = $_POST ['firstname'];
	$lastname = $_POST ['lastname'];
	$company = $_POST ['company'];
	
	$sql = "select companyid from companies where companyname = '$company'";
	$result = mysqli_query ( $dbcon, $sql );
	
	if (mysqli_num_rows ( $result ) == 1) {
		
		list ( $companyid ) = mysqli_fetch_row ( $result );
		
		$insert_comp_query = "INSERT INTO company_contact
		(companyid, email, firstname, lastname)
		VALUES('$companyid','$email','$firstname','$lastname')";
		
		$result = mysqli_query ( $dbcon, $insert_comp_query );
		if ($result) {
			echo "<script>alert ('$company')</script>";
			header ( "Location: addcontacts.php" );
		} else {
			echo "<script>alert ('Contact already exists..')</script>";
			header ( "Location: addcontacts.php?err=1" );
		}
	}
} elseif (isset ( $_POST ['addcontact2'] )) {
	
	$email = $_POST ['email'];
	$firstname = $_POST ['firstname'];
	$lastname = $_POST ['lastname'];
	$company = $_POST ['company'];
	
	$sql = "select companyid from companies where companyname = '$company'";
	$result = mysqli_query ( $dbcon, $sql );
	
	if (mysqli_num_rows ( $result ) == 1) {
		
		list ( $companyid ) = mysqli_fetch_row ( $result );
		
		$insert_comp_query = "INSERT INTO company_contact
		(companyid, email, firstname, lastname)
		VALUES('$companyid','$email','$firstname','$lastname')";
		
		$result = mysqli_query ( $dbcon, $insert_comp_query );
		if ($result) {
			echo "<script>alert ('$company')</script>";
			header ( "Location: adminhome.php" );
		} else {
			echo "<script>alert ('Contact already exists..')</script>";
			header ( "Location: addcontacts.php?err=1" );
		}
	}
}
?>
