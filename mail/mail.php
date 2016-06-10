<?php
	//a proper connection to MySQL was made
	$con=mysqli_connect("localhost","root","","alinmakeup");
	
	
	// Set definition data to support Hebrew
	mysqli_set_charset($con, "utf8");
	
	
	//select from table "member" where customer Email are the samw
    $SQL = "select * from `member` where Email = '".$_REQUEST['email']."'";
	
	//performs a query against the database
	$result=mysqli_query($con,$SQL);
	//fetches a result row as an associative array
	$row=mysqli_fetch_array($result);
	
	//get the custpmer password to send
	$message="<table><tr><th>לקוח/ יקר/ה הסיסמא שלך היא</th></tr>";
	$message=$message."<tr><th>".$row['Password']."</th></tr>";
	$message=$message.'<tr><th><a href="http://www.alin-Makeup.co.il">  Alin Makeup Artist חזרה לאתר </a></th></tr>';
	
    require 'PHPMailerAutoload.php';

	//Create a new PHPMailer instance
		$mail = new PHPMailer();
	//Tell PHPMailer to use SMTP
		$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	//$mail->SMTPDebug = 2;
	//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
		$mail->Host ='smtp.mail.yahoo.com';
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port =587;
	//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';
	//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
	//Add your yahoomail id. It is sender id from where your member will recieve
		$mail->Username = 'zoya.sh@yahoo.com';
	//This password for yahoo mail
		$mail->Password = 'Z.SH0703';
	//here same yahoo mail id which you are using as username, name
		$mail->setFrom('zoya.sh@yahoo.com', 'Alin Makeup Artist');
	//here same yahoo mail id which you are using as username, name
		$mail->addReplyTo('zoya.sh@yahoo.com', 'Alin Makeup Artist');
	//Set who the message is to be sent to
	
		$mail->addAddress($_REQUEST['email'],'dear reciept');
	//Set the subject line
		//$mail->Subject = 'Recover password';
		$mail->Subject ="=?UTF-8?B?".base64_encode("שחזור סיסמא")."?=";
		$mail->msgHTML($message);

	//send the message, check for errors
		if (!$mail->send()) {
			// if the mail failed
			header('location:../forget-password.php?q=0');
		}
		else {
				header('location:../forget-password.php?q=1');
		}
	
		?>