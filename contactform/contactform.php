<?php
 require_once('PHPMailer/class.phpmailer.php'); 

$mail             = new PHPMailer();
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.crediblewedding.com"; // SMTP server
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and message
                                           // 2 = messages on
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "mail.crediblewedding.com"; // sets the SMTP server
$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
$mail->Username   = "care@crediblewedding.com"; // SMTP account username
$mail->Password   = "test@123";        // SMTP account password
$mail->SetFrom('care@crediblewedding.com', 'Portfolio');
if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email']))
{
	$name = isset($_REQUEST['name']) && $_REQUEST['name'] != '' ? trim($_REQUEST['name']) : '';
	$subject = isset($_REQUEST['subject']) && $_REQUEST['subject'] != '' ? trim($_REQUEST['subject']) : '';
	$message = isset($_REQUEST['message']) && $_REQUEST['message'] != '' ? trim($_REQUEST['message']) : '';
	$from_email = isset($_REQUEST['email']) && $_REQUEST['email'] != '' ? trim($_REQUEST['email']) : '';
	$body = '<p> Name : '.$name.'</p>';
	$body .= '<p> Email : '.$from_email.'</p>';
	$body .= '<p> Subject : '.$subject.'</p>';
	$body .= '<p> Message : '.$message.'</p>';
	$mail->AddReplyTo($from_email,$name);
	$mail->Subject    = $subject;
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->MsgHTML($body);
	$address = "madhavraveesh@gmail.com";
	$mail->AddAddress($address);
	if(!$mail->Send()) {
	  echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	 echo 'OK';
	}
					   
}else{
	echo 'error';
}


?>