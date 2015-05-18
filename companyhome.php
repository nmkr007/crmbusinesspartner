<?php include('companyheader.php')?> 
<?php 
	$check_user_sql = "select count(*) from company_contact where companyid=$companyid";
	$result = mysqli_query ( $dbcon, $check_user_sql );
	list ( $nof_contacts) = mysqli_fetch_row ( $result );
	$check_user_sql = "select count(*) from registration where companyid=$companyid and regdate >= curdate()";
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
                <div class="row">
                    <div class="col-md-12">
                     <h2>Company Dashboard</h2>   
                        <h5>Welcome <?=ucwords(strtolower($company_name)) ?> , Love to see you back. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                
                  
		     
                <div class="col-md-4 col-sm-6 col-xs-6">           
				<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?=$nof_contacts ?></p>
                    <p class="text-muted">Contacts</p>
                </div>
             </div>
		     </div>
                   
                    <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?=$nof_registrations ?></p>
                    <p class="text-muted">Upcoming Registrations</p>
                </div>
             </div>
		     </div>
                  
			</div>
                 <!-- /. ROW  -->
                <hr />                
                    
                    
                    
           <?php include 'footer.php';?>