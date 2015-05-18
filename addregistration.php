<?php include('companyheader.php')?>

<?php 

if (isset ( $_GET ['err'] )) {
	if($_GET['err']==1){
		echo "<script>alert ('An event already exists for that date, register on new date..')</script>";
	}
}

if (isset ( $_POST ['register'] )) {
		
		$personname = $_POST ['personname'];
		$email = $_POST ['email'];
		$contact = $_POST ['contact'];
		$line1 = $_POST ['line1'];
		$line2 = $_POST ['line2'];
		$intern_positions = $_POST ['intern_positions'];
		$fulltime_positions = $_POST ['fulltime_positions'];
		$peoplecount = $_POST ['peoplecount'];
		$state = $_POST ['state'];
		$zip = $_POST ['zip'];
		$regdate = $_POST ['regdate'];
		
		$regdate =  date('Y-m-d', strtotime($regdate));
		$companyid;
		
		$insert_reg_query = "INSERT INTO registration
		(regdate, personname, email, contact, companyid, line1, line2, intern_positions, fulltime_positions, peoplecount, state, zip)
		VALUES('$regdate','$personname','$email','$contact','$companyid','$line1','$line2','$intern_positions','$fulltime_positions','$peoplecount','$state','$zip')";
		
		$result = mysqli_query ( $dbcon, $insert_reg_query );
		if ($result) {
			
			$sql = "select b.company_fullname as companyname from registration a join companies b
			 on a.companyid = b.companyid and a.regdate = '$regdate'";
			
			$result = mysqli_query ( $dbcon, $sql );
			
			if (mysqli_num_rows ( $result ) ==1) {
			
			
				list ( $companyname ) = mysqli_fetch_row ( $result );
			
			include "emailsetting.php";
			
			
			$body = "<p>Dear User,</p>
			<p>An event has been registered on behalf of $companyname. The details of the event are:</p>
			<p>Date: $regdate.</p>
			<p>Point of Contact: $personname.</p>
			<p>Number of internships: $intern_positions.</p>
			<p>Number of fulltime positions: $fulltime_positions.</p>
			<p>Number of people attending the event: $peoplecount</p>
			<br><p>Many Thanks</p>
			<p>Event Registration Team</p>";
			
			if(gmail_remainder($email, "Event Registration Details", $body )){
				gmail_remainder("crmbusinesspartner@gmail.com", "Event Registration Details", $body );
				header ( "Location: addregistration.php?q=".$email );
	
}else{
	header ( "Location: addregistrations.php?q=0" );
}
			
			
			
			header ( "Location: addregistration.php" );
	}	} else {
			echo "<script>alert ('There is a problem, Error while inserting..".$regdate."')</script>";
			header ( "Location: addregistration.php?err=1" );
		}
}
?>

<script>
//This Ajax Redirect to _SELF and excute php to display Job Information for selected Department
function showcontent(str) {
	if (str == "") {
        document.getElementById("txtHint").innerHTML = "Please Select Date of Registration";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","checkdates.php?id="+str,true);
        xmlhttp.send();
    }
}
</script>

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
            <div id="page-inner">
                             
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fill the form to register for an event</p>     
                
                <div class="panel-body">
                
                <div id="msg"  align="center">
				<?php 
if (isset ( $_GET ['q'] )) {
	
if($_GET['q'] != '0' ){
	echo "<span style=\"color: Green;\">Mail has been sent to ".$_GET['q']."and Admin</span>";
}
else{
	
	echo "<span style=\"color: Red;\">Error while sending mail, Please try again later..</span>";
}
}
?>
				</div>
                
						<form role="form" method="post" action="addregistration.php">
							<fieldset>
								<div>
									<div class="col-md-6">
										<input class="form-control" placeholder="Person Name" name="personname" type="text" autofocus required>
									</div>
									<div class="col-md-6">
										<input class="form-control" placeholder="Email" name="email" type="email" required>
									</div>
								</div>&nbsp;
								

								<div>
									<div class="col-md-6">
										<input class="form-control" placeholder="Contact Number" name="contact" type="text" required>
									</div>
									<div class="col-md-6">
										<input class="form-control" placeholder="Address Line1" name="line1" type="text" required>
									</div>
								</div>&nbsp;
								
								<div>
									<div class="col-md-6">
										<input class="form-control" placeholder="Address Line2" name="line2" type="text">
									</div>
									<div class="col-md-6">
										<input class="form-control" placeholder="Intern Positions" name="intern_positions" type="number" min="0" required>
									</div>
								</div>&nbsp;
								
								<div>
									<div class="col-md-6">
										<input class="form-control" placeholder="Fulltime Positions" name="fulltime_positions" type="number" min="0" required>
									</div>
									<div class="col-md-6">
										<input class="form-control" placeholder="People Count" name="peoplecount" type="number" min="1" required>
									</div>
								</div>&nbsp;
								
								<div>
									<div class="col-md-6">		
										<select class="form-control" id="stateselect" name="state" required>
										<option>AL</option>
										<option>AK</option>
										<option>AS</option>
										<option>AZ</option>
										<option>AR</option>
										<option>CA</option>
										<option>CO</option>
										<option>CT</option>
										<option>DE</option>
										<option>DC</option>
										<option>FM</option>
										<option>FL</option>
										<option>GA</option>
										<option>GU</option>
										<option>HI</option>
										<option>ID</option>
										<option>IL</option>
										<option>IN</option>
										<option>IA</option>
										<option>KS</option>
										<option>KY</option>
										<option>LA</option>
										<option>ME</option>
										<option>MH</option>
										<option>MD</option>
										<option>MA</option>
										<option>MI</option>
										<option>MN</option>
										<option>MS</option>
										<option>MO</option>
										<option>MT</option>
										<option>NE</option>
										<option>NV</option>
										<option>NH</option>
										<option>NJ</option>
										<option>NM</option>
										<option>NY</option>
										<option selected>NC</option>
										<option>ND</option>
										<option>MP</option>
										<option>OH</option>
										<option>OK</option>
										<option>OR</option>
										<option>PW</option>
										<option>PA</option>
										<option>PR</option>
										<option>RI</option>
										<option>SC</option>
										<option>SD</option>
										<option>TN</option>
										<option>TX</option>
										<option>UT</option>
										<option>VT</option>
										<option>VA</option>
										<option>VI</option>
										<option>WA</option>
										<option>DC</option>
										<option>WV</option>
										<option>WI</option>
										<option>WY</option>
									</select>
										
										
										
									</div>
									<div class="col-md-6">
										<input class="form-control" placeholder="Zip Code" name="zip" type="text" maxlength="5" required>
									</div>
								</div>&nbsp;

								<div>
									<div class="col-md-3">
										<input class="form-control" name="regdate" type="date" min="<?php echo date('Y-m-d');?>" onchange="showcontent(this.value)"/>
									</div>
									<div class="col-md-3" id="txtHint">
									</div>
								</div><br><br><br>
								
								<div align="center">
									<input class="btn btn-success btn-lg" type="submit" value="Register" name="register">
								</div>
							</fieldset>
						</form>
					</div>          
					
					
					

					
<?php include 'footer.php';?>