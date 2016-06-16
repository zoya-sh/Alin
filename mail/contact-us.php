<?php


	$message = '<html lang="he-IL">';
	$message .= '<head><meta charset="utf-8"></head>';
	$message .= '<body dir="rtl" style="width:97%;margin:10px auto;padding:0;color:#990033;font-size:1em;line-height:1;font-family:Arial,Helvetica,sans-serif;">';
		$message .= '<div style="border:1px solid #DAA520;">';
			$message .= '<div id="header" style="background:#FFCCCC;border-bottom:1px solid #DAA520;">';
				$message .= '<div style="padding:20px;text-align:center;width:50%;margin:0 auto;">';
					$message .= '<h1>פירטי הלקוח/ה ליצירת קשר</h1>';
				$message .= '</div>';
			$message .= '</div>';
			$message .= '<div style="width:100%;background:#ffffff;">';
				$message .= '<div style="width:100%;margin-right:20px;">';			
						$message=$message."<th>שם הלקוח/ה: </th><td>"."&nbsp;".$_REQUEST['text1']."&nbsp;".$_REQUEST['text2']."</td></tr>";
						$message=$message."<tr><th>מספר טלפון: </th><td>"."&nbsp;".$_REQUEST['text3']."</td></tr>";
						$message=$message."<tr><th>ציפורניים:  </th><td>"."&nbsp;".$_REQUEST['nm1']."</td></tr>";
						$message=$message."<tr><th>איפור: </th><td>"."&nbsp;".$_REQUEST['nm2']."</td></tr>";
						$message=$message."<tr><th>גבות ושעוות: </th><td>"."&nbsp;".$_REQUEST['nm3']."</td></tr>";
				$message .= '</div>';
			$message .= '</div>';
			$message .= '<div id="footer" style="background:#FFCCCC;border-top:1px solid #DAA520;">';
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
		
			$mail->addAddress('alin.makeup.artist@gmail.com','dear Artist');
		//Set the subject line
			//$mail->Subject = 'Customer details';
			$mail->Subject ="=?UTF-8?B?".base64_encode("בקשת לקוח/ה לטיפול מאפרת")."?=";
			$mail->msgHTML($message);

		//send the message, check for errors
			if (!$mail->send()) {
				// if the mail failed
				//echo 'Mailer Error: ' . $mail->ErrorInfo;
				header('location:../contact-us.php?q=0');
			}
			else {// if mail was sended q will be true for messeg "Artist will contact you shortly"
				//echo 'Mailer Error: ' . $mail->ErrorInfo;
				header('location:../contact-us.php?q=1');
			}
		
       ?>