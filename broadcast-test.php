<?php
	require_once "Mail.php";
	require_once 'config.php';
	//include 'emailtest.php';
	
	$from = "mailtesting.cop4710@gmail.com";
	// $to = $row['email'];

	$sql = "SELECT email FROM professor;";
	$result = mysqli_query($link, $sql);
	$resultCheck = mysqli_num_rows($result);
	
	//$subject = 'Testing PHP Mail';
	//$message = 'Test link: http://3.80.133.37 ';
	//$headers = 'From: noreply@bookform.com';

	$host = "ssl://smtp.gmail.com";
	$port = "456";
	$username = 'mailtesting.cop4710@gmail.com';
	$password = 'password123$';
	
	$subject = "Book form request: DEADLINE: 7/30/21";
	$body = "Reminder to submit your Book form request: http://3.80.133.37/login.php";

	// if(mail($to, $subject, $message, $headers)){
	// 	echo 'Finished';
	// }
	// header('location: staff.php');
    
    if($resultCheck > 0) {
		foreach($row = mysqli_fetch_array($result)) {
				$to = $row['email'];
				// echo $row['email'];
                $headers = array ('From' => $from, 'To' => $to,'Subject' => $subject);
	            $smtp = Mail::factory('smtp',
  		        array ('host' => $host,
		        'port' => $port,
    		    'auth' => true,
    		    'username' => $username,
    		    'password' => $password));

	            $mail = $smtp->send($to, $headers, $body);
		}
	}
    header("location: staff.php");
    exit;

	
	// if($mail){
	// 	header("location: staff.php");
	// }

	// if (PEAR::isError($mail)) {
  	// 	echo($mail->getMessage());
	// 	echo $row['email'] . '<bt />';
	// } else {
  	// 	echo(" Message successfully sent!\n") . '<br />';
	// }

?>