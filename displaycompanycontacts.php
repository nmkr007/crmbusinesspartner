
<?php
include "database/db_connection.php";
if (isset ( $_GET ['q'] )) {
	$Searchcompany = $_GET ['q'];
	
	$sql = "SELECT companyid, companyname, password, company_fullname FROM companies
			 where companyname like '$Searchcompany' order by companyname";
	$result = mysqli_query ( $dbcon, $sql );
		
	if (mysqli_num_rows ( $result ) > 0) {

		echo "<table class=\"table table-striped\" summary=\"Table\" border=\"1\" cellspacing=\"2\" cellpadding=\"1\">
		<thead><tr align=\"left\" valign=\"top\" style=\"color:Red;font-style:italic\"><th>Company Username</th>
<th>Company Fullname</th><th>Delete</th></tr></thead><tbody>";
		// output data of each row
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
			
			
			echo "<tr align=\"left\" valign=\"top\" style=\"color:blue\"><td>" . 
			$row ["companyname"] . "</td><td>". $row ['company_fullname'] . "</td>
			<td align = 'center'><a href=\"deletecompanies.php?q=".$row ["companyid"].
			"\"onclick=\"return confirm('Are you sure?');\" <span class=\"glyphicon glyphicon-remove-circle\" style=\"color:red\" aria-hidden=\"true\"></span></a>
			</td></tr>";
		}
		echo "</tbody></table>";
		
	} else {
		echo "<p class= \" error\"> Sorry, No Companies with letter '".str_replace('%', '',$Searchcompany)."'</p>";
	}
	
}
?>
