<?php include('adminheader.php')?> 
<?php 
$check_user_sql = "select count(*) from companies";
	
$result = mysqli_query ( $dbcon, $check_user_sql );

	list ( $nof_companies) = mysqli_fetch_row ( $result );

	$check_user_sql = "select count(*) from company_contact";
	
	$result = mysqli_query ( $dbcon, $check_user_sql );
	
	list ( $nof_contacts) = mysqli_fetch_row ( $result );
	
	$check_user_sql = "select count(*) from registration where regdate >= curdate() ";
	
	$result = mysqli_query ( $dbcon, $check_user_sql );
	
	list ( $nof_registrations) = mysqli_fetch_row ( $result );
	
	
?>
<div class="wrapper">
	<nav class="navbar-default navbar-side" role="navigation">
		<div class="sidebar-collapse">
			<ul class="nav" id="main-menu">
				<li class="text-center"><img src="assets/img/find_user.png"
					class="user-image img-responsive" /></li>


				<li><a  class="active-menu" href="adminhome.php"><i class="fa fa-dashboard fa-3x"></i>
						Dashboard</a></li>
				<li><a href="#"><i class="fa fa-desktop fa-3x"></i>Companies<span
						class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li><a href="companies.php">View or Delete</a></li>
						<li><a href="addcompanies.php">Add Companies</a></li>
					</ul></li>

				<li><a  href="#"><i class="fa fa-qrcode fa-3x"></i>Contacts<span
						class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li><a href="contacts.php">View or Delete</a></li>
						<li><a href="addcontacts.php">Add Contacts</a></li>
					</ul>
				</li>
				
				<li><a href="allregistrations.php"><i class="fa fa-table fa-3x"></i>Registrations</a>
				</li>
<li><a href="mailbox.php"><i class="fa fa-edit fa-3x"></i>Mail Box</a>
				</li>
				
			</ul>

		</div>

	</nav>
</div>


    
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome <?=ucwords(strtolower($admin_user)) ?> , Love to see you back. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                
                  <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                <div class="text-box" ><a href="companies.php">
                    <p class="main-text"><?=$nof_companies ?></p>
                    <p class="text-muted">Companies</p>
                </div>
             </div>
		     </div>
		     
                <div class="col-md-4 col-sm-6 col-xs-6">           
				<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box" ><a href="contacts.php">
                    <p class="main-text"><?=$nof_contacts ?></p>
                    <p class="text-muted">Contacts</p></a>
                </div>
             </div>
		     </div>
                   
                    <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box" ><a href="allregistrations.php">
                    <p class="main-text"><?=$nof_registrations ?></p>
                    <p class="text-muted">Registrations</p></a>
                </div>
             </div>
		     </div>
                  
			</div>
                 <!-- /. ROW  -->
                <hr />                
        <p>
        Admin should be able add delete and view companies.<br>
Admin should be able to add ,delete and view contacts.<br>
Admin should be able to view list of dates and the companies who have registered for the date, as well as its point of contact and email address.
</p>            
                 <!-- /. ROW  -->           
    </div>
           <?php include 'footer.php';?>