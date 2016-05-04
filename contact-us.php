<?php
require_once('include/require.php');

$ContatUs = new ContatUs(); 

$Mode =  ReplaceEmpty('mode' , '');

if ($Mode == "sendenquiry")
{
	if ($ContatUs->SendEnquiry())
	{
		SetMsg("Your password has been mailed to your email address.","success");            
        header("Location: " . $Site->DocRoot . "contact-us.php");
		exit();
	}
	else 
	{
	    SetMsg($ContatUs->Error,"error");           
	}

}

StartHeader();
CloseHeader();
StartBody();
PrintTopHeader();
$ContatUs->PrintForm();
CloseBody();


Class ContatUs 
{

	function ContatUs()
	{
		$this->Error = ReplaceEmpty('error' , '') ;
	}
	
	function PrintForm()
	{
		?>
		<div class="ipage contactpage"><!-- ipage start -->
			<div class="rowhead">
				<h2>צור קשר</h2>
			</div>
			<?php if(isset($_REQUEST['q']))
			{
				echo '<b><font color=red>Artist will contact you shortly</font></b>';
				
			}?>
			<form action="mail/contact-us.php" method="post"> 
				<div class="contactpage_intro">
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
						<p>אלין מישייב</p>
						<p>alin.makeup.artist@gmail.com</p>
						<p>0507817770</p>
					</div><!-- contactpage_intro_row close// -->
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
						<label>שם פרטי:</label>
						<input type="text" name="text1" class="custom_input" />
					</div><!-- contactpage_intro_row close// -->
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
						<label>שם משפחה:</label>
						<input type="text" name="text2" class="custom_input" />
					</div><!-- contactpage_intro_row close// -->
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
						<label>מס' טלפון:</label>
						<input type="number"  min="1" max="9999999999" name="text3" class="custom_input" />
					</div><!-- contactpage_intro_row close// -->
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
					<label>ציפורניים: </label>
					<input type="radio" name="nm1" value="בניה בג'ל" />
					<label>בניה בג'ל</label>
					<input type="radio" name="nm1" value="מילוי בג'ל" />
					<label>מילוי בג'ל</label>
					<input type="radio" name="nm1" value="בניה באקריל" />
					<label>בניה באקריל</label>
					<input type="radio" name="nm1" value="מילוי בג'ל" />
					<label>מילוי באקריל</label>
					<input type="radio" name="nm1" value="מילוי באקריל" />
					<label>בניה מושלבת</label>
					<input type="radio" name="nm1" value="מריחת לק ג'ל" />
					<label>מריחת לק ג'ל</label>
					
				</div><!-- contactpage_intro_row close// -->
				<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
					<label>איפור: </label>
					<input type="radio" name="nm2" value=">איפור ערב" />
					<label>איפור ערב</label>
					<input type="radio" name="nm2" value="איפור כלה" />
					<label>איפור כלה</label>
					<input type="radio" name="nm2" value="מסיבת רווקות" />
					<label>מסיבת רווקות</label>
					<input type="radio" name="nm2" value="איפור לברית/ה" />
					<label>איפור לברית/ה</label>
					<input type="radio" name="nm2" value="איפור לבת מצווה" />
					<label>איפור לבת מצווה</label>
					<input type="radio" name="nm2" value="ערבי פעילויות" />
					<label>ערבי פעילויות</label>
					<input type="radio" name="nm2" value="סדנא אישית" />
					<label>סדנא אישית</label>
					<input type="radio" name="nm2"  value="סדנא קבוצתית"/>
					<label>סדנא קבוצתית</label>
				</div><!-- contactpage_intro_row close// -->
				<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
					<label>גבות ושעוות: </label>
					<input type="radio" name="nm3" value="בחירה" />
					<label>בחירה</label>
					</div><!-- contactpage_intro_row close// -->
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
						<input type="submit" value="שלח" class="custom_btn" />
						<input type="hidden" value="sendenquiry" name="mode" class="custom_btn" />
					</div><!-- contactpage_intro_row close// -->
				</div>
			</form>
		</div><!-- ipage close// -->	
			
				
		<?php	
	}
	
	function SendEnquiry()
	{
			global $Site;
			
			$SQL="select * from member where IsEnable = 1";
			$rs=GetRS($SQL);
			while($row=mysql_fetch_array($rs))
			{
				//send mail to artist for new custmer
				$Email = $row['Email'] ;
				$name = $row['FirstName'] ;
				
				$text1 = ReplaceEmpty('text1' , '');//first name	
				$text2 = ReplaceEmpty('text2' , '');//last name
				$text3 = ReplaceEmpty('text3' , '');//phone number
				$nm1 = ReplaceEmpty('nm1' , '');//radio 1	
				$nm2 = ReplaceEmpty('nm2' , '');//radio 2	
				$nm3 = ReplaceEmpty('nm3' , '');//radio 3
					
				$HTML="Hello ".$name.", <br><br><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Below listed enquiry from customer...<br><br><br>
				First name: ".$text1."<br>
				Last Name: ".$text2."<br>
				Number: ".$text3."<br>
				nm1: ".$nm1."<br>
				nm2: ".$nm2."<br>
				nm3: ".$nm3."<br>";
				$from="sales@aignmakup.com";
				$to="$Email";
				$subject = "Recovery Password";
				SendMail($HTML,$from,$to,$subject);		
			}	
	}
}
?>