
<?php
include "database/db_connection.php";
if (isset ( $_POST ['addcompany1'] )) {
		
		$fullname = $_POST ['fullname'];
		$password = $_POST ['password'];
		$username = $_POST ['username'];
		
		$insert_comp_query = "INSERT INTO companies
		(companyname, password, company_fullname)
		VALUES('$username','$password','$fullname')";
		
		$result = mysqli_query ( $dbcon, $insert_comp_query );
		if ($result) {
			echo "<script>alert ('$fullname')</script>";
			header ( "Location: addcompanies.php" );
		} else {
			echo "<script>alert ('There is a problem, Error while inserting..".$fullname."')</script>";
			header ( "Location: addcompanies.php?err=1" );
		}
}
elseif (isset ( $_POST ['addcompany2'] )) {
		$fullname = $_POST ['fullname'];
		$password = $_POST ['password'];
		$username = $_POST ['username'];
	
		$insert_comp_query = "INSERT INTO companies
		(companyname, password, company_fullname)
		VALUES('$username','$password','$fullname')";
	
		$result = mysqli_query ( $dbcon, $insert_comp_query );
		if ($result) {
			header ( "Location: adminhome.php" );
		} else {
			echo "<script>alert ('There is a problem, Error while inserting..".$fullname."')</script>";
			header ( "Location: addcompanies.php?err=1" );
		}
}

?>
