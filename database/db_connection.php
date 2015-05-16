<?php
// define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
// define('DB_PORT', getenv('OPENSHIFT_MYSQL_DB_PORT'));
// define('DB_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
// define('DB_PASS', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
// define('DB_NAME', getenv('OPENSHIFT_APP_NAME'));

$dbhost = "localhost"; // Host name 
$dbport = "3306"; // Host port
$dbusername = "root"; // Mysql username 
$dbpassword = "root"; // Mysql password 
$db_name = "crm"; // Database name 

// $dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PASS, "", DB_PORT) or die("Error: " . mysqli_error($dbcon));
// mysqli_select_db($dbcon, DB_NAME) or die("Error: " . mysqli_error($dbcon));


$dbcon=mysqli_connect("localhost","root","root","crm")or die("Error " . mysqli_error($dbcon));

define('SALT_LENGTH', 9);

function filter($data) {
	global $dbcon;
	$data = trim(htmlentities(strip_tags($data)));

	if (get_magic_quotes_gpc())
		$data = stripslashes($data);

	$data = mysqli_real_escape_string($dbcon,$data);

	return $data;
}

// Password and salt generation
function PwdHash($pwd, $salt = null)
{
	if ($salt === null)     {
		$salt = substr(md5(uniqid(rand(), true)), 0, SALT_LENGTH);
	}
	else     {
		$salt = substr($salt, 0, SALT_LENGTH);
	}
	return $salt . sha1($pwd . $salt);
}


function admin_page_protect() {
	session_start();

	global $dbcon;

	/* Secure against Session Hijacking by checking user agent */
	if (isset($_SESSION['HTTP_USER_AGENT']))
	{	
		//take username and search in database and if found authenticate
		$user_username=mysqli_real_escape_string($dbcon,$_SESSION['admin_user']);
		$check_user_sql="select * from admin WHERE admin_user='$user_username'";
		
		$result=mysqli_query($dbcon,$check_user_sql);
		
		// Match row found with more than 1 results  - the user is authenticated.
		if(!(mysqli_num_rows($result)>0) || $_SESSION['HTTP_USER_AGENT'] != 
				md5($_SERVER['HTTP_USER_AGENT']))
		{
			echo "Invalid User";
			//logout();
			exit;
		}
	}
	else {
			header("Location: login.php");
			exit();
		}
	}

	function company_page_protect() {
		session_start();
	
		global $dbcon;
	
		/* Secure against Session Hijacking by checking user agent */
		if (isset($_SESSION['HTTP_USER_AGENT']))
		{
			//take username and search in database and if found authenticate
			$user_username=mysqli_real_escape_string($dbcon,$_SESSION['company_name']);
			$check_user_sql="select * from companies WHERE companyname='$user_username'";
	
			$result=mysqli_query($dbcon,$check_user_sql);
	
			// Match row found with more than 1 results  - the user is authenticated.
			if(!(mysqli_num_rows($result)>0) || $_SESSION['HTTP_USER_AGENT'] !=
					md5($_SERVER['HTTP_USER_AGENT']))
			{
				echo "Invalid User";
				//logout();
				exit;
			}
		}
		else {
			header("Location: index.php");
			exit();
		}
	}	
	
	
	function logout()
	{
		global $dbcon;
		session_start();
	
		
		/************ Delete the sessions****************/
		unset($_SESSION['companyid']);
		unset($_SESSION['admin_user']);
		unset($_SESSION['company_name']);
		unset($_SESSION['adminid']);
		unset($_SESSION['HTTP_USER_AGENT']);
		session_unset();
		session_destroy();
	
		header("Location: index.php");
	}


?>