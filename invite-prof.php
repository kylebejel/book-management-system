<?php
    session_start()
	require_once "Mail.php";
	require_once 'config.php';

	$to = $_REQUEST['emailinv'];

	$from = "mailtesting.cop4710@gmail.com";

	$host = "ssl://smtp.gmail.com";
	$port = "465";
	$username = 'mailtesting.cop4710@gmail.com';
	$password = 'password123$';
	
	$subject = "Book form request";
	$body = "Please make an account on our book request website: http://3.80.133.37/register-prof.php";

	$headers = array ('From' => $from, 'To' => $to,'Subject' => $subject);
	$smtp = Mail::factory('smtp',
  		array ('host' => $host,
		    'port' => $port,
    		'auth' => true,
    		'username' => $username,
    		'password' => $password));

	$mail = $smtp->send($to, $headers, $body);
	header("location: staff.php");

	if (PEAR::isError($mail)) {
  		echo($mail->getMessage());
		echo $row['email'] . '<bt />';
	} else {
  		echo(" Message successfully sent!\n") . '<br />';
	}

?>