<?php
function gmail_remainder($to, $subject, $message){
    //path to PHPMailer class
    require_once('./Mail/class.phpmailer.php');
    // optional, gets called from within class.phpmailer.php if not already loaded
    include("./Mail/class.smtp.php"); 

    $mail = new PHPMailer();
    $mail->CharSet = "UTF-8";
    // telling the class to use SMTP
    $mail->IsSMTP();
    // enables SMTP debug information (for testing)
    // 1 = errors and messages
    // 2 = messages only
    $mail->SMTPDebug  = 0;
    // enable SMTP authentication
    $mail->SMTPAuth   = true;
    // sets the prefix to the servier
    $mail->SMTPSecure = "ssl";
    // sets GMAIL as the SMTP server
    $mail->Host       = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port       = 465;
    // GMAIL username
    $mail->Username   = "crmbusinesspartner@gmail.com";
    // GMAIL password
    $mail->Password   = "Unccgmail";
    //Set reply-to email this is your own email, not the gmail account 
    //used for sending emails
    $mail->SetFrom('crmbusinesspartner@gmail.com');
    $mail->FromName = "CRM Business";
    // Mail Subject
    $mail->Subject    = $subject;

    //Main message
    $mail->MsgHTML($message);

    //Your email, here you will receive the messages from this form. 
    //This must be different from the one you use to send emails, 
    //so we will just pass email from functions arguments
    $mail->AddAddress($to, "");
    if(!$mail->Send()) 
    {
        //couldn't send
        return false;
    } 
    else 
    {
        //successfully sent
        return true;
    }
}
include "database/db_connection.php";
if (isset ( $_GET ['q'] )) {
	$regdate = $_GET ['q'];

	$sql = "select a.regdate as regdate, b.company_fullname as companyname,
 a.personname as name, a.email as email from registration a join companies b on a.companyid = b.companyid
 and a.regdate = '$regdate'";
	
	$result = mysqli_query ( $dbcon, $sql );

	if (mysqli_num_rows ( $result ) ==1) {


list ( $regdate,$companyname, $name, $email ) = mysqli_fetch_row ( $result );

$emailbody = "Hi ".$name.", <p>This is a reminder mail regarding your registration.</p>
		<p>You have registered for an event on ".$regdate." on behalf of ".$companyname." Thankyou</p>";

if(gmail_remainder($email, "Registration Reminder", $emailbody )){
	header ( "Location: allregistrations.php?q=".$email );
	
}else{
	header ( "Location: allregistrations.php?q=0" );
}
	}
}
?>