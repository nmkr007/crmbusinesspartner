<?php include('companyheader.php')?> 
<?php 
$check_user_sql = "select count(*) from companies";
	
$result = mysqli_query ( $dbcon, $check_user_sql );

	list ( $nof_companies) = mysqli_fetch_row ( $result );

	$check_user_sql = "select count(*) from company_contact";
	
	$result = mysqli_query ( $dbcon, $check_user_sql );
	
	list ( $nof_contacts) = mysqli_fetch_row ( $result );
	
	$check_user_sql = "select count(*) from registration where regdate >= curdate()";
	
	$result = mysqli_query ( $dbcon, $check_user_sql );
	
	list ( $nof_registrations) = mysqli_fetch_row ( $result );
	
	
?>


     <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a class="active-menu"  href="viewregistration.php"><i class="fa fa-dashboard fa-3x"></i> View</a>
                    </li>
                     <li>
                        <a  href="addregistration.php"><i class="fa fa-desktop fa-3x"></i>Register</a>
                    </li>	
                    <li>
                        <a  href="#"><i ></i></a>
                    </li>		

                </ul>
               
            </div>
            
        </nav>
    
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                             
                     
                
                <div class="panel-body">
						<form role="form" method="post" action="index.php">
							<fieldset>
								<div>
									<div class="col-md-6">
										<input class="form-control" placeholder="Person Name" name="personname" type="text" autofocus>
									</div>
									<div class="col-md-6">
										<input class="form-control" placeholder="Email" name="email" type="text">
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
										<input class="form-control" name="date" type="date" min="<?php echo date('Y-m-d');?>">
									</div>
								</div><br><br><br>
								
								<div align="center">
									<input class="btn btn-success btn-lg" type="submit" value="Register" name="register">
								</div>
							</fieldset>
						</form>
					</div>          
                    
                    
                    
           <?php include 'footer.php';?>