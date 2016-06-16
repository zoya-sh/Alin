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
	$decode = base64_decode($row['Password']);
	//get the custpmer password to send	
	$message = '<html lang="he-IL">';
	$message .= '<head><meta charset="utf-8"></head>';
	$message .= '<body dir="rtl" style="width:97%;margin:10px auto;padding:0;color:#202020;font-size:1em;line-height:1;font-family:Arial,Helvetica,sans-serif;">';
		$message .= '<div style="border:1px solid #009999;">';
			$message .= '<div id="header" style="background:#66ffb2;border-bottom:1px solid #009999;">';
				$message .= '<div style="padding:20px;text-align:center;width:50%;margin:0 auto;">';
					$message .= '<h1>שחזור סיסמא לאתר</h1>';
				$message .= '</div>';
			$message .= '</div>';
			$message .= '<div style="width:100%;background:#ffffff;">';
				$message .= '<div style="width:100%;margin-right:20px;">';			
						$message=$message."<tr><th>לקוח/ה יקר הסיסמא שלך היא:</th><td>"."&nbsp;".$decode."</th></tr>";
						$message .= '<p><tr><th>נשמח לראותך באתר :)</th><td></p>';
						$message .= '<p></p>';
				$message .= '</div>';
			$message .= '</div>';
			$message .= '<div id="footer" style="background:#66ffb2;border-top:1px solid #009999;">';
				$message .= '<div style="padding:20px;text-align:center;width:50%;margin:0 auto;">';
					$message .= '<a href="http://www.alin-Makeup.co.il" style="font-size:1em;"> חזרה לאתר Alin Makeup Artist ';
			$message .= '</div></div></div>';
	$message .= '</body></html>';
	
	
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
		$mail->Port =465;
	//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'ssl';
	//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
	//Add your yahoomail id. It is sender id from where your member will recieve
		$mail->Username = 'zoya.shaulove@yahoo.com';
	//This password for yahoo mail
		$mail->Password = 'ZOYA0703';
	//here same yahoo mail id which you are using as username, name
		$mail->setFrom('zoya.shaulove@yahoo.com', 'Alin Makeup Artist');
	//here same yahoo mail id which you are using as username, name
		$mail->addReplyTo('zoya.shaulove@yahoo.com', 'Alin Makeup Artist');
	//Set who the message is to be sent to
	
		$mail->addAddress($_REQUEST['email'],'dear reciept');
	//Set the subject line
		$mail->Subject ="=?UTF-8?B?".base64_encode("שחזור סיסמא")."?=";
		$mail->msgHTML($message);

	//send the message, check for errors
		if (!$mail->send()) {
			//echo 'Message could not be sent.';
			//echo 'Mailer Error: ' . $mail->ErrorInfo;
			// if the mail failed
			header('location:../forget-password.php?q=0');
		}
		else {
				//echo 'Mailer Error: ' . $mail->ErrorInfo;
				header('location:../forget-password.php?q=1');
		}
	
		?>