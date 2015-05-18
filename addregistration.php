<?php include('companyheader.php')?>

<?php if (isset ( $_GET ['err'] )) {
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
			header ( "Location: addregistration.php" );
		} else {
			echo "<script>alert ('There is a problem, Error while inserting..".$regdate."')</script>";
			header ( "Location: addregistration.php?err=1" );
		}
}
?>

<!-- <link href="assets/css/jquery-ui.css" type="text/css" rel="stylesheet" /> -->

<style>
.disabled span{
    color:red !important;
    background:white !important;    
}
.enabled a{
    color:black !important;
    background:white !important;    
}

</style>
<script type="text/javascript">

var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
var unavailableDates = ["2015/05/26","2015/05/27","2015/06/05"]; // yyyy/MM/dd
var unavailableDays = [];

function unavailable(date) {
    ymd = date.getFullYear() + "/" + ("0"+(date.getMonth()+1)).slice(-2) + "/" + ("0"+date.getDate()).slice(-2);
    day = new Date(ymd).getDay();
    if ($.inArray(ymd, unavailableDates) < 0 && $.inArray(days[day], unavailableDays) < 0) {
        return [true, "enabled", "Book Now"];
    } else {
        return [false,"disabled","Booked Out"];
    }
}

$('#iDate').datepicker({ beforeShowDay: unavailable });


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
						<form role="form" method="post" action="companyregistrations.php">
							<fieldset>
								<div>
									<div class="col-md-6">
										<input class="form-control" placeholder="Person Name" name="personname" type="text" autofocus>
									</div>
									<div class="col-md-6">
										<input class="form-control" placeholder="Email" name="email" type="email">
									</div>
								</div>&nbsp;
								

								<div>
									<div class="col-md-6">
										<input class="form-control" placeholder="Contact Number" name="contact" type="text">
									</div>
									<div class="col-md-6">
										<input class="form-control" placeholder="Address Line1" name="line1" type="text">
									</div>
								</div>&nbsp;
								
								<div>
									<div class="col-md-6">
										<input class="form-control" placeholder="Address Line2" name="line2" type="text">
									</div>
									<div class="col-md-6">
										<input class="form-control" placeholder="Intern Positions" name="intern_positions" type="number" min="0">
									</div>
								</div>&nbsp;
								
								<div>
									<div class="col-md-6">
										<input class="form-control" placeholder="Fulltime Positions" name="fulltime_positions" type="number" min="0">
									</div>
									<div class="col-md-6">
										<input class="form-control" placeholder="People Count" name="peoplecount" type="number" min="1">
									</div>
								</div>&nbsp;
								
								<div>
									<div class="col-md-6">
										<input class="form-control" placeholder="State" name="state" type="text">
									</div>
									<div class="col-md-6">
										<input class="form-control" placeholder="Zip Code" name="zip" type="text">
									</div>
								</div>&nbsp;

								<div>
									<div class="col-md-3">
										<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/redmond/jquery-ui.css" type="text/css" />
<input class="form-control" name="regdate" type="date" />
									</div>
								</div><br><br><br>
								
								<div align="center">
									<input class="btn btn-success btn-lg" type="submit" value="Register" name="register">
								</div>
							</fieldset>
						</form>
					</div>          
					
					
					

					
<?php include 'footer.php';?>