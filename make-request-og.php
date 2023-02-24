<?php
// session_start();
include "Mail.php";
include "config.php";

$sem = $_REQUEST['semester'];
$rem = $_REQUEST['reminder'];
$dead = $_REQUEST['deadline'];

if($_SERVER['REQUEST_METHOD'] == "POST"){
        $insert_form_sql = mysqli_query($link,"INSERT INTO requestform (semesterID, reminder, deadline) VALUES ('$sem','$rem','$dead')");
        // $insert_form_sql = "INSERT INTO requestform (semesterID, reminder, deadline) VALUES (?, ?, ?)";
        // $stmt = mysqli_prepare($link, $insert_form_sql));
        // mysqli_stmt_bind_param($link, $sql);
        // $stmt = mysqli_prepare($link, $sql);
        
        // EMAIL FUNCTION

        echo $to;
	// edit ends here

	    $from = "mailtesting.cop4710@gmail.com";
	    $to = $row['email'];

	    $sql = "SELECT * FROM professor;";
	    $result = mysqli_query($link, $sql);
	    $resultCheck = mysqli_num_rows($result);

	    if($resultCheck > 0) {
		    if(condition) {
			    while($row = mysqli_fetch_assoc($result)) {
				    echo $row['email'];
				    $to = $row['email'];
			    }
		    }
	    }
	
	// $subject = 'Testing PHP Mail';
	// $message = 'Test link: http://3.80.133.37 ';
	// $headers = 'From: noreply@bookform.com';

	    $host = "ssl://smtp.gmail.com";
	    $port = "465";
	    $username = 'mailtesting.cop4710@gmail.com';
	    $password = 'password123$';
	
	    $subject = "Book form request";
	    $body = "Reminder to submit your Book form request: http://3.80.133.37/register-prof.php";

	// if(mail($to, $subject, $message, $headers)){
	// 	echo 'Finished';
	// }
	// header('location: staff.php');

	    $headers = array ('From' => $from, 'To' => $to,'Subject' => $subject);
	    $smtp = Mail::factory('smtp',
  		    array ('host' => $host,
		    'port' => $port,
    		    'auth' => true,
    		    'username' => $username,
    		    'password' => $password));

	    $mail = $smtp->send($to, $headers, $body);
	    if($mail){
		    header("location: staff.php");
	    }

	    if (PEAR::isError($mail)) {
  		    echo($mail->getMessage());
		    echo $row['email'] . '<bt />';
	    } else {
  		    echo(" Message successfully sent!\n") . '<br />';
	    }

        // END EMAIL FUNCTION

        if($insert_form_sql){
            mysqli_close($link);
            header("location:staff.php");
        }
        else{
            echo "insert didn't work.";
        }
    }

    ?>