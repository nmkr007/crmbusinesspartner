<?php include('companyheader.php')?> 



     <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a class="active-menu"  href="companyhome.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>	
                    
                    <li><a href="#"><i class="fa fa-desktop fa-3x"></i>Registrations<span
						class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li><a href="companyregistrations.php">View</a></li>
						<li><a href="addregistration.php">New Registration</a></li>
					</ul>
				</li>		

                </ul>
               
            </div>
            
        </nav>
    
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            
                <div class="row">
                    <div class="col-md-12">
                     <h3>Event Registrations</h3>   
                        
                        <?php
	
	$sql = "SELECT regdate, personname, email, peoplecount FROM registration
			 where companyid='$companyid' order by regdate desc";
	$result = mysqli_query ( $dbcon, $sql );
		
	if (mysqli_num_rows ( $result ) > 0) {

		echo "<table class=\"table table-striped\" summary=\"Table\" border=\"1\" cellspacing=\"2\" cellpadding=\"1\">
		<thead><tr align=\"left\" valign=\"top\" style=\"color:Red;font-style:italic\"><th>Registration Date</th>
<th>Person Name</th><th>Email</th></tr></thead><tbody>";
		// output data of each row
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
			
			
			echo "<tr align=\"left\" valign=\"top\" style=\"color:blue\"><td>" . 
			$row ["regdate"] . "</td><td>". $row ['personname'] . "</td>
			<td>".$row['email']."</td></tr>";
		}
		echo "</tbody></table>";
		
	} else {
		echo "<p class= \" error\"> Sorry, No Registrations!!!</p>";
	}
	

?>
                        
                        
                        
                    </div>
                </div>
                  
			</div>
                 <!-- /. ROW  -->
                <hr />                
                    
                    
                    
           <?php include 'footer.php';?>