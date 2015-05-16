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
<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>

<div class="wrapper">
	<nav class="navbar-default navbar-side" role="navigation">
		<div class="sidebar-collapse">
			<ul class="nav" id="main-menu">
				<li class="text-center"><img src="assets/img/find_user.png"
					class="user-image img-responsive" /></li>


				<li><a href="adminhome.php"><i class="fa fa-dashboard fa-3x"></i>
						Dashboard</a></li>
				<li><a class="active-menu" href="companies.php"><i
						class="fa fa-desktop fa-3x"></i>Companies</a></li>
				<li><a href="contacts.php"><i class="fa fa-qrcode fa-3x"></i>Contacts</a>
				</li>
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
				<div class="panel-heading">Actions</div>
				<div class="panel-body">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#view" data-toggle="tab">View</a></li>
						<li class=""><a href="#add" data-toggle="tab">Add</a></li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane fade active in" id="view">

							<!-- Advanced Tables -->
							<div class="panel panel-default">
								<div class="panel-heading">Advanced Tables</div>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped table-bordered table-hover"
											id="dataTables_example">
											<thead>
												<tr>
													<th>Rendering engine</th>
													<th>Browser</th>
													<th>Platform(s)</th>
													<th>Engine version</th>
													<th>CSS grade</th>
												</tr>
											</thead>
											<tbody>
												<tr class="odd gradeX">
													<td>Trident</td>
													<td>Internet Explorer 4.0</td>
													<td>Win 95+</td>
													<td class="center">4</td>
													<td class="center">X</td>
												</tr>
												<tr class="even gradeC">
													<td>Trident</td>
													<td>Internet Explorer 5.0</td>
													<td>Win 95+</td>
													<td class="center">5</td>
													<td class="center">C</td>
												</tr>
												<tr class="odd gradeA">
													<td>Trident</td>
													<td>Internet Explorer 5.5</td>
													<td>Win 95+</td>
													<td class="center">5.5</td>
													<td class="center">A</td>
												</tr>

											</tbody>
										</table>

									</div>
									<!--End Advanced Tables -->
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="add">
							<h4>Add Companies</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
								do eiusmod tempor incididunt ut labore et dolore magna aliqua.
								Ut enim ad minim veniam, quis nostrud exercitation ullamco
								laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
								dolor in reprehenderit in voluptate velit esse cillum dolore eu
								fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est
								laborum.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="panel panel-default">
								<div class="panel-heading">Advanced Tables</div>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped table-bordered table-hover"
											id="dataTables-example">
											<thead>
												<tr>
													<th>Rendering engine</th>
													<th>Browser</th>
													<th>Platform(s)</th>
													<th>Engine version</th>
													<th>CSS grade</th>
												</tr>
											</thead>
											<tbody>
												<tr class="odd gradeX">
													<td>Trident</td>
													<td>Internet Explorer 4.0</td>
													<td>Win 95+</td>
													<td class="center">4</td>
													<td class="center">X</td>
												</tr>
												<tr class="even gradeC">
													<td>Trident</td>
													<td>Internet Explorer 5.0</td>
													<td>Win 95+</td>
													<td class="center">5</td>
													<td class="center">C</td>
												</tr>
												<tr class="odd gradeA">
													<td>Trident</td>
													<td>Internet Explorer 5.5</td>
													<td>Win 95+</td>
													<td class="center">5.5</td>
													<td class="center">A</td>
												</tr>

											</tbody>
										</table>

									</div>
									<!--End Advanced Tables -->
								</div>
							</div>
	<!-- /. PAGE INNER  -->
	<!--             </div> -->
	<!-- /. PAGE WRAPPER  -->
</div>
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->

<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>

<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>


<?php include('footer.php')?>
