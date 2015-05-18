
<?php
include "database/db_connection.php";
if (isset ( $_GET ['id'] )) {
	$key = $_GET ['id'];
	
	if($key == "1"){
		$sql = "select a.regdate as regdate, b.companyname as companyname, a.personname as name, a.email as email from 
				registration a join companies b on a.companyid = b.companyid";
		$result = mysqli_query ( $dbcon, $sql );
		if (mysqli_num_rows ( $result ) > 0) {
			echo "<table class=\"table table-striped\" summary=\"Table\" border=\"1\" cellspacing=\"2\" cellpadding=\"1\">
		<thead><tr align=\"left\" valign=\"top\" style=\"color:Red;font-style:italic\"><th>Date</th>
<th>Company</th><th>Point of Contact</th><th>Email</th><th>Send Mail</th><th>Delete</th></tr></thead><tbody>";
			// output data of each row
			while ( $row = mysqli_fetch_assoc ( $result ) ) {
				echo "<tr align=\"left\" valign=\"top\" style=\"color:blue\"><td>" .
						$row ["regdate"] . "</td><td>". $row ['companyname'] ."</td><td>". $row ['name'] .
						"</td><td>". $row ['email'] .
						"</td><td align = 'center'><a href=\"email.php?q=".$row ["regdate"].
							"\"onclick=\"return confirm('Are you sure you want to send mail?');\" <span class=\"glyphicon glyphicon-send\" style=\"color:blue\" aria-hidden=\"true\"></span></a>
			</td><td align = 'center'><a href=\"deleteregistration.php?q=".$row ["regdate"].
							"\"onclick=\"return confirm('Are you sure?');\" <span class=\"glyphicon glyphicon-remove-circle\" style=\"color:red\" aria-hidden=\"true\"></span></a>
			</td></tr>";
				}
				echo "</tbody></table>";;
			
			
		}
		else {
			echo "<p class= \" error\"> Sorry, No Registrations at all!!!</p>";
		}
	}
	else{
		$sql = "select a.regdate as regdate, b.companyname as companyname, a.personname as name, a.email as email from
				registration a join companies b on a.companyid = b.companyid and a.regdate = '$key'";
		$result = mysqli_query ( $dbcon, $sql );
		if (mysqli_num_rows ( $result ) > 0) {
			echo "<table class=\"table table-striped\" summary=\"Table\" border=\"1\" cellspacing=\"2\" cellpadding=\"1\">
		<thead><tr align=\"left\" valign=\"top\" style=\"color:Red;font-style:italic\"><th>Date</th>
<th>Company</th><th>Point of Contact</th><th>Email</th><th>Send Mail</th><th>Delete</th></tr></thead><tbody>";
			// output data of each row
			while ( $row = mysqli_fetch_assoc ( $result ) ) {
				echo "<tr align=\"left\" valign=\"top\" style=\"color:blue\"><td>" .
						$row ["regdate"] . "</td><td>". $row ['companyname'] ."</td><td>". $row ['name'] .
						"</td><td>". $row ['email'] .
						"</td><td align = 'center'><a href=\"email.php?q=".$row ["regdate"].
						"\"onclick=\"return confirm('Are you sure?');\" <span class=\"glyphicon glyphicon-send\" style=\"color:red\" aria-hidden=\"true\"></span></a>
			</td><td align = 'center'><a href=\"deleteregistration.php?q=".$row ["regdate"].
					"\"onclick=\"return confirm('Are you sure?');\" <span class=\"glyphicon glyphicon-remove-circle\" style=\"color:red\" aria-hidden=\"true\"></span></a>
			</td></tr>";
			}
			echo "</tbody></table>";
				
				
		}
		else {
			echo "<p class= \" error\"> Sorry, No Registrations on '".$key."'</p>";
		}
	}
}
?>
