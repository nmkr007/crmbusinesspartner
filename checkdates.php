<?php
include "database/db_connection.php";
if (isset ( $_GET ['id'] )) {
$regdate = $_GET ['id'];
	$sql = "select count(*) as count from crm.registration where regdate = '$regdate'";
		
	$result = mysqli_query ( $dbcon, $sql );
		
	if (mysqli_num_rows ( $result ) > 0) {
			
			
		list ( $count ) = mysqli_fetch_row ( $result );
			if($count == 0){
				echo "<span style= \"color:green;\">Available for Registration</span>";
			}else{
				echo "<span style= \"color:red;\">Unavailable for registration</span>";
			}
	}
} 
?>