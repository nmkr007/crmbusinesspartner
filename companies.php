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
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "Company Details are listed here...";
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
        xmlhttp.open("GET","displaycompanies.php?q="+str,true);
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
				<li><a class="active-menu" href="#"><i class="fa fa-desktop fa-3x"></i>Companies<span
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
				
				<li><a href="#"><i class="fa fa-table fa-3x"></i>Registrations<span
						class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li><a href="allregistrations.php">All Registrations</a></li>
						<li><a href="dateregistrations.php">View By Date</a></li>
					</ul>
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
				<div class="panel-heading">View or Delete Company Details</div>
				<div class="panel-body">
					<br>
						<form>
							Select Company starting with:
							 			<select name="company" onchange="showcontent(this.value)">
										<option value="">Select</option>
										<option value="%">ALL</option>
										<option value="A%">A</option>
										<option value="B%">B</option>
										<option value="C%">C</option>
										<option value="D%">D</option>
										<option value="E%">E</option>
										<option value="F%">F</option>
										<option value="G%">G</option>
										<option value="H%">H</option>
										<option value="I%">I</option>
										<option value="J%">J</option>
										<option value="K%">K</option>
										<option value="L%">L</option>
										<option value="M%">M</option>
										<option value="N%">N</option>
										<option value="O%">O</option>
										<option value="P%">P</option>
										<option value="Q%">Q</option>
										<option value="R%">R</option>
										<option value="S%">S</option>
										<option value="T%">T</option>
										<option value="U%">U</option>
										<option value="V%">V</option>
										<option value="W%">W</option>
										<option value="X%">X</option>
										<option value="Y%">Y</option>
										<option value="Z%">Z</option>
									</select>
								</form>


								<br>
								<div id="txtHint">
									<b>Company Details are listed here...</b>
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
