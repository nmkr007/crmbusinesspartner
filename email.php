<?php
function gmail($to, $subject, $message){
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

gmail("k.sampathsree@gmail.com", "WARNING FOR UNLICENSED USAGE OF BRAND NAME - 'CRM BUSINESS'", "Hello Sai Kiran, This is a warning mail before we go
		further with your case on usage of brand name with prior issued approval. Hence see that you are not using our brand name, i.e, 'CRM BUSINESS'
		Thank you, Alex, CRM BUSINESS SOLUTIONS, California" );
?>