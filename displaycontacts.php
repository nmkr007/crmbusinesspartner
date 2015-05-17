
<?php
include "database/db_connection.php";
if (isset ( $_GET ['q'] )) {
	$Searchcompany = $_GET ['q'];
	
	$sql = "SELECT companyid, email, firstname, lastname FROM company_contact
			 where companyid = (select companyid from companies where companyname = '$Searchcompany')";
	$result = mysqli_query ( $dbcon, $sql );
		
	if (mysqli_num_rows ( $result ) > 0) {

		echo "<table class=\"table table-striped\" summary=\"Table\" border=\"1\" cellspacing=\"2\" cellpadding=\"1\">
		<thead><tr align=\"left\" valign=\"top\" style=\"color:Red;font-style:italic\"><th>Email</th>
<th>First Name</th><th>Last Name</th><th>Delete</th></tr></thead><tbody>";
		// output data of each row
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
			
			
			echo "<tr align=\"left\" valign=\"top\" style=\"color:blue\"><td>" . 
			$row ["email"] . "</td><td>". $row ['firstname'] ."</td><td>". $row ['lastname'] .  "</td>
			<td align = 'center'><a href=\"deletecontacts.php?q=".$row ["companyid"]."&p=".$row["email"].
			"\"onclick=\"return confirm('Are you sure?');\" <span class=\"glyphicon glyphicon-remove-circle\" style=\"color:red\" aria-hidden=\"true\"></span></a>
			</td></tr>";
		}
		echo "</tbody></table>";
		
	} else {
		echo "<p class= \" error\"> Sorry, No Contacts for Company '".$Searchcompany."'</p>";
	}
	
}
?>
