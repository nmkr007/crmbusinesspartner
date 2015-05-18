<?php include('adminheader.php')?>

<div class="wrapper">
	<nav class="navbar-default navbar-side" role="navigation">
		<div class="sidebar-collapse">
			<ul class="nav" id="main-menu">
				<li class="text-center"><img src="assets/img/find_user.png"
					class="user-image img-responsive" /></li>


				<li><a href="adminhome.php"><i
						class="fa fa-dashboard fa-3x"></i> Dashboard</a></li>
				<li><a href="#"><i class="fa fa-desktop fa-3x"></i>Companies<span
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

				<li><a href="allregistrations.php"><i class="fa fa-table fa-3x"></i>Registrations</a>
				</li>

				<li><a class="active-menu" href="mailbox.php"><i class="fa fa-edit fa-3x"></i>Mail Box</a>
				</li>

			</ul>

		</div>

	</nav>
</div>

<?php
##################################################################
# IMAP Inbox Notifier 
# by Nikos Tsaganos
# http://www.backslash.gr - nikos@backslash.gr 
# 
# DISCLAIMER:
# This is a demo on how to use some imap php functions. 
# It is NOT recommended to store your passwords in an 
# unencoded php file on a shared server.
##################################################################

// general password protection
// leave blank if you don't want to protect this page
$pageauth['username'] = 'demo';
$pageauth['password'] = 'demo123';


// configure your imap mailboxes
$mailboxes = array(
		array(
		'label' 	=> 'Gmail',
		'enable'	=> true,
		'mailbox' 	=> '{imap.gmail.com:993/imap/ssl}INBOX',
		'username' 	=> 'crmbusinesspartner@gmail.com',
		'password' 	=> 'Unccgmail')
);

// if ($pageauth['username'] && $pageauth['password']) {
// 	if(($_SERVER["PHP_AUTH_USER"]!==$pageauth['username']) || ( $_SERVER["PHP_AUTH_PW"]!==$pageauth['password'])){
// 		header("WWW-Authenticate: Basic realm=Protected area" );
// 		header("HTTP/1.0 401 Unauthorized");
// 		echo "Protected area";
// 		exit;
// 	}
// }


// a function to decode MIME message header extensions and get the text
function decode_imap_text($str){
	$result = '';
	$decode_header = imap_mime_header_decode($str);
	foreach ($decode_header AS $obj) {
		$result .= htmlspecialchars(rtrim($obj->text, "\t"));
	}
	return $result;
}
?>



<!-- /. NAV SIDE  -->
<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">Mail Box</div>
				<div class="panel-body">

				<link href="css/demo.css" rel="stylesheet" type="text/css" />
			
	<?php if (!count($mailboxes)) { ?>
		<p>Please configure at least one IMAP mailbox.</p>
	<?php } else { 

		foreach ($mailboxes as $current_mailbox) {
			?>
			<div class="mailbox">
			<h2><?php $current_mailbox['label']?></h2>
			<?php
			if (!$current_mailbox['enable']) {
			?>
				<p>This mailbox is disabled.</p>
			<?php
			} else {
				
				// Open an IMAP stream to our mailbox
				$stream = @imap_open($current_mailbox['mailbox'], $current_mailbox['username'], $current_mailbox['password']);
				
				if (!$stream) { 
				?>
					<p>Could not connect to: <?=$current_mailbox['label']?>. Error: <?=imap_last_error()?></p>
				<?php
				} else {
					// Get our messages from the last week
					// Instead of searching for this week's message you could search for all the messages in your inbox using: $emails = imap_search($stream,'ALL');
					$emails = imap_search($stream, 'ALL');
					
					if (!count($emails)){
					?>
						<p>No e-mails found.</p>
					<?php
					} else {

						// If we've got some email IDs, sort them from new to old and show them
						rsort($emails);
						
						foreach($emails as $email_id){
						
							// Fetch the email's overview and show subject, from and date. 
							$overview = imap_fetch_overview($stream,$email_id,0);
							$message = imap_fetchbody($stream,$email_id,1);
							?>
							<div class="email_item clearfix <?=$overview[0]->seen?'read':'unread'?>"> <? // add a different class for seperating read and unread e-mails ?>
								<span class="subject" title="<?=decode_imap_text($overview[0]->subject)?>"><?=decode_imap_text($overview[0]->subject)?></span>
								<span class="from" title="<?=decode_imap_text($overview[0]->from)?>"><?=decode_imap_text($overview[0]->from)?></span>
								<span class="date"><?=$overview[0]->date?></span>
							<br><br><span><?=$message?></span></div>
							<?php
						} 
					} 
					imap_close($stream); 
				}
				
			} 
			?>
			</div>
			<?php
		} // end foreach 
	} ?>
	</div>

			</div>
		</div>
	</div>

	<!-- /. ROW  -->
</div>
<?php include 'footer.php';?>