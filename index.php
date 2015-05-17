<?php
include ("database/db_connection.php");
session_start (); // session starts here

if(isset ( $_SESSION ['companyid'] )){
	header ( "Location: companyhome.php" );
}else if (isset ( $_SESSION ['adminid'] )) {
	header ( "Location: adminhome.php" );
}

$err = array ();


if (isset ( $_POST ['login'] ) && $_POST ['login'] == 'login') {
		
		foreach ( $_POST as $key => $value ) {
			$data [$key] = filter ( $value ); // post variables are filtered
		}
		$user_username = $_POST ['username'];
		$user_pass = $_POST ['pass'];
		if ($_POST ['type'] == 'admin') {
			$check_user_sql = "select adminid, admin_user, password, firstname, lastname from admin WHERE admin_user='$user_username'AND password='$user_pass'";
			
			$result = mysqli_query ( $dbcon, $check_user_sql );
			if (mysqli_num_rows ( $result ) > 0) {
				list ( $adminid, $admin_user, $password, $firstname, $lastname ) = mysqli_fetch_row ( $result );
				session_start ();
				
				session_regenerate_id ( true ); // prevent against session fixation attacks.
				
				// this sets variables in the session
				$_SESSION ['admin_user'] = $admin_user;
				//$_SESSION ['admin_fname'] = $firstname;
				//$_SESSION ['admin_lname'] = $lastname;
				$_SESSION ['adminid'] = $adminid;
				$_SESSION ['HTTP_USER_AGENT'] = md5 ( $_SERVER ['HTTP_USER_AGENT'] );
				header ( "Location: adminhome.php" );
			}
			else {
				// $msg = urlencode("Invalid Login. Please try again with correct user email and password. ");
				$err [] = "Invalid Login. Please try again with correct user name and password.";
				header("Location: index.php");
			}
		}
		else if($_POST ['type'] == 'company'){
			$check_user_sql = "select companyid, companyname, password from companies WHERE companyname='$user_username'AND password='$user_pass'";
				
			$result = mysqli_query ( $dbcon, $check_user_sql );
			if (mysqli_num_rows ( $result ) > 0) {
				list ( $companyid, $companyname, $password ) = mysqli_fetch_row ( $result );
				session_start ();
			
				session_regenerate_id ( true ); // prevent against session fixation attacks.
			
				// this sets variables in the session
				$_SESSION ['company_name'] = $companyname;
				$_SESSION ['companyid'] = $companyid;
				$_SESSION ['HTTP_USER_AGENT'] = md5 ( $_SERVER ['HTTP_USER_AGENT'] );
				header ( "Location: companyhome.php" );
			}
			else {
				// $msg = urlencode("Invalid Login. Please try again with correct user email and password. ");
				$err [] = "Invalid Login. Please try again with correct user name and password.";
				header("Location: index.php");
			}
		}
		
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Placement Registration</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">Placement Registration</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">About</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <style>
    	header {
    		text-align: center;
    		color: #fff;
    		background: #ecf2f1;
		}
    </style>
    <header>
        <div class="container">
            <div class="row">
			    <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <img class="img-responsive" src="assets/img/profile.png" alt="">
                    
                    <?php
					/**
					 * ****************** ERROR MESSAGES*************************************************
					 * This code is to show error messages
					 * ************************************************************************
					 */
					if (! empty ( $err )) {
						echo "<div class= \" alert alert-danger msg\">";
						foreach ( $err as $e ) {
							echo "$e <br>";
						}
						echo "</div>";
					}
					/**
					 * ***************************** END *******************************
					 */
					?>
                    
                    <div class="panel-body">
						<form role="form" method="post" action="index.php">
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="username"
										name="username" type="text" autofocus>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="password" name="pass"
										type="password" value="">
								</div>
								<div class="form-group" align="center">
								<input type="radio" name="type" value="admin" required><font color="#2c3e50">Admin</font>
								<input type="radio" name="type" value="company"><font color="#2c3e50">Company</font>
								</div>

								<input class="btn btn-lg btn-success btn-block" type="submit"
									value="login" name="login">
							</fieldset>
						</form>
					</div>
                </div><div class="col-lg-4"></div>
            </div>
        </div>
    </header>

    
    <!-- Footer -->
    <footer class="text-center">
        
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; 2015
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

</body>

</html>