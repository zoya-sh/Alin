<?php
	require 'PHPMailerAutoload.php';
	//a proper connection to MySQL was made
	$con=mysqli_connect("localhost","root","","alinmakeup");
	
	
	// Set definition data to support Hebrew
	mysqli_set_charset($con, "utf8");
	
	
	//select all columns from table "mcustomer"
    $SQL = "select * from `mcustomer`";
	
	//performs a query against the database
	$result=mysqli_query($con,$SQL);
	
	//fetches a result row as an associative array
	while($row=mysqli_fetch_array($result))
	{
		//select all the lines where "name" on  program table and "MakeupType" on mcustomer are the same
		$SQL1 = "select * from `program` where `name`='".$row["MakeupType"]."'";
	
		$result1=mysqli_query($con,$SQL1);
		$row1=mysqli_fetch_array($result1);
	
		$date=$row['date'];
		//search for the string  date , find the value "-" and then replace the value with "/"
		$date1 = str_replace('-', '/', $date);
		//calculation of relative dates base on duration that pass depends on makeup type(week, month....)
		$finaldate = date('Y-m-d',strtotime($date1 .$row1['duration']));//date1+duration

		//for birthday
		$dt1 = DateTime::CreateFromFormat("Y-m-d", $row['DOB']);//Returns new DateTime object because DOB is a varchar
		$bday = $dt1->format('m-d'); //take onlet day and month, for years to come on birthday

	
		if($row1['id']!='')
		{
			//if time duration is passed will send email to makeup artist
			if(date('Y-m-d')==$finaldate)
			{
				$message = '<html lang="he-IL">';
				$message .= '<head><meta charset="utf-8"></head>';
				$message .= '<body dir="rtl" style="width:97%;margin:10px auto;padding:0;color:#D42D2D;font-size:1em;line-height:1;font-family:Arial,Helvetica,sans-serif;">';
				$message .= '<div style="border:1px solid #A52A2A;">';
					$message .= '<div id="header" style="background:#FFE4C4;border-bottom:1px solid #A52A2A;">';
						$message .= '<div style="padding:20px;text-align:center;width:50%;margin:0 auto;">';
						$message .= '<h1>שימרי על הלקוחות שלך</h1>';
					$message .= '</div>';
				$message .= '</div>';
				$message .= '<div style="width:100%;background:#ffffff;">';
					$message .= '<div style="width:100%;margin-right:20px;">';
					$message .= '<p></p>';
						$message=$message."<th>שם הלקוח/ה: </th><td>"."&nbsp;".$row['FirstName']."&nbsp;".$row['LastName']."</td></tr>";
						$message=$message."<tr><th>מספר טלפון: </th><td>"."&nbsp;".$row['PhoneNumber']."</td></tr>";
						$message=$message."<tr><th>מבנה פנים: </th><td>"."&nbsp;".$row['FacialStructure']."</td></tr>";
						$message=$message."<tr><th>סוג עור: </th><td>"."&nbsp;".$row['SkinType']."</td></tr>";
						$message=$message."<tr><th>המלצה: </th><td>"."&nbsp;".$row1['action']."</td></tr></table>";
						$message .= '<p></p>';
					$message .= '</div>';
				$message .= '</div>';
				$message .= '<div id="footer" style="background:#FFE4C4;border-top:1px solid #A52A2A;">';
				$message .= '<div style="padding:20px;text-align:center;width:50%;margin:0 auto;">';
					$message .= '<a href="http://www.alin-Makeup.co.il" style="font-size:1em;"> חזרה לאתר Alin Makeup Artist ';
				$message .= '</div></div></div>';
				$message .= '</body></html>';
		
   
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
						//$mail->Subject = 'welcome';
						$mail->Subject ="=?UTF-8?B?".base64_encode("פירטיי הלקוח")."?=";
						$mail->msgHTML($message);
	
					
					//send the message, check for errors
					if (!$mail->send()) {
						echo "mail failed<br>";
					}
					else {   
							echo 'mail sent<br>';
					}
					//in case the alarm should be sent every time(personal traning, group traning)
					//we will update the data to the sended day
					if($row1['con']=='yes')
					{
						$s5 = "update `mcustomer` set `date`='".date('Y-m-d h:i:s')."' where `MCustomerID`='".$row['MCustomerID']."'";
						mysqli_query($con, $s5);
					}
			}

		}
		//if time duration is passed will send email to makeup artist about birthday of customer
		if(date('m-d')==$bday)
		{	
			
			$message = '<html lang="he-IL">';
				$message .= '<head><meta charset="utf-8"></head>';
				$message .= '<body dir="rtl" style="width:97%;margin:10px auto;padding:0;color:#0000cc;font-size:1em;line-height:1;font-family:Arial,Helvetica,sans-serif;">';
				$message .= '<div style="border:1px solid #0EABAB;">';
					$message .= '<div id="header" style="background:#99ccff;border-bottom:1px solid #0EABAB;">';
						$message .= '<div style="padding:20px;text-align:center;width:50%;margin:0 auto;">';
						$message .= '<h1>יום הולדת ללקוח/ה</h1>';
					$message .= '</div>';
				$message .= '</div>';
				$message .= '<div style="width:100%;background:#ffffff;">';
					$message .= '<div style="width:100%;margin-right:20px;">';
						$message=$message."<tr><th>שם הלקוח/ה: </th><td>"."&nbsp;".$row['FirstName']."&nbsp;".$row['LastName']."</td></tr>";
						$message=$message."<tr><th>מספר טלפון: </th><td>"."&nbsp;".$row['PhoneNumber']."</td></tr></table>";
						$message=$message."<th>מזל טוב היום יום ההולדת ללקוח/ה היקר/ה שלך ברכי אותה</th>";
						$message .= '</div>';
					$message .= '</div>';		
					$message .= '<p>';
					$message .= '<img src="https://srv214.gif.co.il/images/224388bday999.gif" style="width:auto;height:auto;border:1px solid #ffffff;" />';
					$message .= '</p>';
				$message .= '<div id="footer" style="background:#99ccff;border-top:1px solid #0EABAB;">';
				$message .= '<div style="padding:20px;text-align:center;width:50%;margin:0 auto;">';
					$message .= '<a href="http://www.alin-Makeup.co.il" style="font-size:1em;"> חזרה לאתר Alin Makeup Artist ';
				$message .= '</div></div></div>';
				$message .= '</body></html>';

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
						///$mail->Subject = 'welcome';
						$mail->Subject ="=?UTF-8?B?".base64_encode("מזל טוב")."?=";
						$mail->msgHTML($message);

					
					//send the message, check for errors
						if (!$mail->send()) {
							echo "mail failed<br>";
						}
						else {
							echo 'bday mail sent<br>';
						}				
		}	
	}
       ?>