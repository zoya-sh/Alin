<?php
require_once('include/require.php');

$ContatUs = new ContatUs(); 

$Mode =  ReplaceEmpty('mode' , '');


StartHeader();//view of page with the logo
CloseHeader();//close of header
StartBody();//middle of page
PrintTopHeader();//tollbar of the page
$ContatUs->PrintForm();//profile page
CloseBody();//close body

//class that present a user that want to conect the artist 
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
			<?php if(isset($_REQUEST['q']) && $_REQUEST['q']==1)
			{// if mail was sended q will be true for messeg "Artist will contact you shortly"
				echo '<b><font color=red>לקוח יקר פרטייך התקבלו, ניצור איתך קשר בהקדם האפשרי</font></b>';
			}
			// if the mail failed
			if(isset($_REQUEST['q']) && $_REQUEST['q']==0)
			{
				echo '<b><font color=red>משהו השתבש , נסה שנית</b></font>';
			}
			?>
			<!-- send the details of the customer to contact-us.php for sending mail contaction -->
			<form action="mail/contact-us.php" method="post"> 
				<div class="contactpage_intro">
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
						<p>אלין מישייב </p>
						<p>alin.makeup.artist@gmail.com</p>
						<p>0507817770</p>
					</div><!-- contactpage_intro_row close// -->
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
						<label>שם פרטי:</label>
						<input type="text" name="text1" class="custom_input" required/>
					</div><!-- contactpage_intro_row close// -->
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
						<label>שם משפחה:</label>
						<input type="text" name="text2" class="custom_input" required/>
					</div><!-- contactpage_intro_row close// -->
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
						<label>מספר טלפון:</label>
						<input type="number"  min="1" max="9999999999" name="text3" class="custom_input" required />
					</div><!-- contactpage_intro_row close// -->
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
					<labelBlack>ציפורניים: </labelBlack>
					<input type="radio" name="nm1" value="בניה בג'ל" />
					<labelWithe>בניה בג'ל</labelWithe>
					<input type="radio" name="nm1" value="מילוי בג'ל" />
					<labelWithe>מילוי בג'ל</labelWithe>
					<input type="radio" name="nm1" value="בניה באקריל" />
					<labelWithe>בניה באקריל</labelWithe><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="nm1" value="מילוי בג'ל" />
					<labelWithe>מילוי באקריל</labelWithe>
					<input type="radio" name="nm1" value="מילוי באקריל" />
					<labelWithe>בניה מושלבת</labelWithe>
					<input type="radio" name="nm1" value="מריחת לק ג'ל" />
					<labelWithe>מריחת לק ג'ל</labelWithe>
					
				</div><!-- contactpage_intro_row close// -->
				<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
					<labelBlack>איפור: </labelBlack>
					<input type="radio" name="nm2" value="איפור ערב" />
					<labelWithe>איפור ערב</labelWithe>
					<input type="radio" name="nm2" value="איפור כלה" />
					<labelWithe>איפור כלה</labelWithe>
					<input type="radio" name="nm2" value="מסיבת רווקות" />
					<labelWithe>מסיבת רווקות</labelWithe>
					<input type="radio" name="nm2" value="איפור לברית/ה" />
					<labelWithe>איפור לברית/ה</labelWithe><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="nm2" value="איפור לבת מצווה" />
					<labelWithe>איפור לבת מצווה</labelWithe>
					<input type="radio" name="nm2" value="ערבי פעילויות" />
					<labelWithe>ערבי פעילויות</labelWithe>
					<input type="radio" name="nm2" value="סדנא אישית" />
					<labelWithe>סדנא אישית</labelWithe>
					<input type="radio" name="nm2"  value="סדנא קבוצתית"/>
					<labelWithe>סדנא קבוצתית</labelWithe>
				</div><!-- contactpage_intro_row close// -->
				<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
					<labelBlack>גבות ושעוות: </labelBlack>
					<input type="radio" name="nm3" value="גבות ושעוות" />
					<labelWithe>בחירה</labelWithe>
					</div><!-- contactpage_intro_row close// -->
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
						<input type="submit" value="שלח" class="custom_btn" />
						<input type="hidden" name="mode" class="custom_btn" />
					</div><!-- contactpage_intro_row close// -->
				</div>
			</form>
		</div><!-- ipage close// -->	
			
				
		<?php	
	}
}
?>