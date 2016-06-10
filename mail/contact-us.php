<?php

	$message="<table><tr><th>פירטי הלקוח ליצירת קשר:</th></tr>";
	$message=$message."<th>שם הלקוח</th><td>".$_REQUEST['text1']."&nbsp;".$_REQUEST['text2']."</td></tr>";
	$message=$message."<tr><th>מספר טלפון</th><td>".$_REQUEST['text3']."</td></tr>";
	$message=$message."<tr><th>ציפורניים</th><td>".$_REQUEST['nm1']."</td></tr>";
	$message=$message."<tr><th>מייקאפ</th><td>".$_REQUEST['nm2']."</td></tr>";
	$message=$message."<tr><th>גבות ושעוות</th><td>".$_REQUEST['nm3']."</td></tr></table>";
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
		
			$mail->addAddress('alin.makeup.artist@gmail.com','dear Artist');
		//Set the subject line
			//$mail->Subject = 'Customer details';
			$mail->Subject ="=?UTF-8?B?".base64_encode("בקשת לקוח/ה לטיפול מאפרת")."?=";
			$mail->msgHTML($message);

		//send the message, check for errors
			if (!$mail->send()) {
				// if the mail failed
				header('location:../contact-us.php?q=0');
			}
			else {// if mail was sended q will be true for messeg "Artist will contact you shortly"
				header('location:../contact-us.php?q=1');
			}
		
       ?>