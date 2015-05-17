<?php include('adminheader.php')?>
<!-- BOOTSTRAP STYLES-->
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<!-- MORRIS CHART STYLES-->

<!-- CUSTOM STYLES-->
<link href="assets/css/custom.css" rel="stylesheet" />
<!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans'
	rel='stylesheet' type='text/css' />
<!-- TABLE STYLES-->
<link href="assets/js/dataTables/dataTables.bootstrap.css"
	rel="stylesheet" />
<link href="assets/css/dataTables.bootstrap.css" rel="stylesheet" />

<div class="wrapper">
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<li class="text-center"><img src="assets/img/find_user.png"
						class="user-image img-responsive" /></li>


					<li><a href="adminhome.php"><i class="fa fa-dashboard fa-3x"></i>
							Dashboard</a></li>
					<li><a class="active-menu" href="#"><i class="fa fa-desktop fa-3x"></i>Companies<span
							class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li><a href="companies.php">View or Delete</a></li>
							<li><a href="addcompanies.php">Add Companies</a></li>
						</ul></li>

					<li><a href="#"><i class="fa fa-qrcode fa-3x"></i>Contacts<span
							class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li><a href="contacts.php">View or Delete</a></li>
							<li><a href="addcontacts.php">Add Contacts</a></li>
						</ul></li>

					<li><a href="adminregistrations.php"><i class="fa fa-table fa-3x"></i>View
							Registration</a></li>

				</ul>

			</div>

		</nav>
	</div>


<!-- /. NAV SIDE  -->
<div id="page-wrapper">
	<!--             <div id="page-inner"> -->

	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">Add Company Details</div>
				<div class="panel-body">
					<br> Enter Company details to add:

					<form method="POST" action="insertcompanies.php">
						<input type="text" name="fullname" placeholder="Full Name" value="" required>
						<input type="text" name="username" placeholder="Username" value="" required>
						<input type="password" name="password" placeholder="Password" value="" required>

						<input class="btn btn-success" type="submit" value="Add more"
							name="addcompany1">
									<input class="btn btn-success" type="submit" 
						value="Final Entry" name="addcompany2">						 
					</form>


				</div>
			</div>
		</div>
	</div>



	<!-- /. PAGE INNER  -->
	<!--             </div> -->
	<!-- /. PAGE WRAPPER  -->
</div>
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->



<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>


<?php include('footer.php')?>
