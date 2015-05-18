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

<script>
//This Ajax Redirect to _SELF and excute php to display Job Information for selected Department
function showcontent(str) {
	if(str == "Show All"){
		str=1;
		}
	if (str == "") {
        document.getElementById("txtHint").innerHTML = "List of Registrations are displayed here...";
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
        xmlhttp.open("GET","showallregistrations.php?id="+str,true);
        xmlhttp.send();
    }
}
</script>
<div class="wrapper">
	<nav class="navbar-default navbar-side" role="navigation">
		<div class="sidebar-collapse">
			<ul class="nav" id="main-menu">
				<li class="text-center"><img src="assets/img/find_user.png"
					class="user-image img-responsive" /></li>


				<li><a href="adminhome.php"><i class="fa fa-dashboard fa-3x"></i>
						Dashboard</a></li>
				<li><a  href="#"><i class="fa fa-desktop fa-3x"></i>Companies<span
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

				<li><a class="active-menu" href="allregistrations.php"><i class="fa fa-table fa-3x"></i>Registrations</a>
				</li>

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
				<div class="panel-heading">View or Delete Registrations</div>
				<div class="panel-body">
				<div id="msg" style="color: Green;" align="center">
				<?php 
if (isset ( $_GET ['q'] )) {
	
if($_GET['q'] != '0' ){
	echo "<span style=\"color: Green;\">Mail has been sent to ".$_GET['q']."</span>";
}
else{
	
	echo "<span style=\"color: Red;\">Error while sending mail, Please try again later..</span>";
}
}
?>
				</div>
					<br>
					<div class="row">
						<div class="col-md-3">
								<input class="btn btn-success" type="submit"
									name="regall" id="regall" value="Show All"
									onclick="showcontent(this.value)">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OR
						
						</div>
						<div class="col-md-4" align="left">
							<form>
								Select Date: <input type="date" name="registrationdate"
									max="2016-01-02" min="2014-12-31"
									onchange="showcontent(this.value)">
							</form>
						</div>
						<div class="col-md-3"></div>
						<div class="col-md-3"></div>
					</div>
					<br>
					<div id="txtHint">
						<b>Registration Details are listed here...</b>
					</div>
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
