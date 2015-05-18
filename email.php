<?php
if (isset ( $_GET ['q'] )) {
	$regdate = $_GET ['q'];
	include "database/db_connection.php";
	$sql = "select a.regdate as regdate, b.company_fullname as companyname,
 a.personname as name, a.email as email from registration a join companies b on a.companyid = b.companyid
 and a.regdate = '$regdate'";
	
	$result = mysqli_query ( $dbcon, $sql );

	if (mysqli_num_rows ( $result ) ==1) {


list ( $regdate,$companyname, $name, $email ) = mysqli_fetch_row ( $result );

$emailbody = "Hi ".$name.", <p>This is a reminder mail regarding your registration.</p>
		<p>You have registered for an event on ".$regdate." on behalf of ".$companyname."</p><p> Thankyou</p>";

include "emailsetting.php";

if(gmail_remainder($email, "Registration Reminder", $emailbody )){
	header ( "Location: allregistrations.php?q=".$email );
	
}else{
	header ( "Location: allregistrations.php?q=0" );
}
	}
}
?>