<?php
include ("database/db_connection.php");
// session_start (); // session starts here

if (isset ( $_SESSION ['admin_user'] )) {
	header ( "Location: adminhome.php" );
}else if(isset ( $_SESSION ['company_name'] )){
	header("Location: companyhome.php");
}

$err = array ();


if (isset ( $_POST ['login'] ) && $_POST ['login'] == 'login') {
		
		foreach ( $_POST as $key => $value ) {
			$data [$key] = filter ( $value ); // post variables are filtered
		}
		$user_username = $data ['username'];
		$user_pass = $data ['pass'];
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

<html>
<head>
<title>Login</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
</head>

<style>
.login-panel {
	margin-top: 150px;
}
</style>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-success">
					<div>
						<h3 class="panel-title" align = "center">Sign In</h3>
					</div>
					<p><?php
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
					?></p>
					<div class="panel-body">
						<form role="form" method="post" action="index.php">
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="username"
										name="username" type="username" autofocus>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="password" name="pass"
										type="password" value="">
								</div>
								<div class="form-group" align="center">
								<input type="radio" name="type" value="admin" required>Admin
								<input type="radio" name="type" value="company">Company
								</div>

								<input class="btn btn-lg btn-success btn-block" type="submit"
									value="login" name="login">
						</fieldset>
					</form>
			</div>
		</div>
	</div>
	</div>
</body>
</html>