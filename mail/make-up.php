<?php
require 'PHPMailerAutoload.php';
	//a proper connection to MySQL was made
	$con=mysqli_connect("localhost","root","","alinmakeup");
	
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
		$finaldate = date('Y-m-d',strtotime($date1 .$row1['duration']));	

		//for birthday
		$dt1 = DateTime::CreateFromFormat("Y-m-d", $row['DOB']);//Returns new DateTime object because DOB is a varchar
		$bday = $dt1->format('m-d'); //take onlet day and month, for years to come on birthday

	
		if($row1['id']!='')
		{
			//if time duration is passed will send email to makeup artist
			if(date('Y-m-d')==$finaldate)
			{
				$message="<table><tr><td>שימרי על הלקוחות שלך<tr><th>שם הלקוח</th><td>".$row['FirstName']."&nbsp;".$row['LastName']."</td></tr>";
				$message=$message."<tr><th>מספרה טלפון</th><td>".$row['PhoneNumber']."</td></tr>";
				$message=$message."<tr><th>מבנה פנים</th><td>".$row['FacialStructure']."</td></tr>";
				$message=$message."<tr><th>סוג עור</th><td>".$row['SkinType']."</td></tr>";
				$message=$message."<tr><th>המלצה</th><td>".$row1['action']."</td></tr></table>";
		
   
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
						$mail->Subject = 'welcome';
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
			$message="<table><tr><td>שימרי על הלקוחות שלך<tr><th>שם הלקוח</th><td>".$row['FirstName']."&nbsp;".$row['LastName']."</td></tr>";
			$message=$message."<tr><th>מספר טלפון</th><td>".$row['PhoneNumber']."</td></tr>";
			$message=$message."<tr><th>מזל טוב</th><td> <th>היום יום הולדת ללקוחה היקרה שלך, ברכי אותה!</th></td></tr></table>";
	
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
						$mail->Subject = 'welcome';
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