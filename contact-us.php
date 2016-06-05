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
						<p>אלין מישייב</p>
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
						<label>מס' טלפון:</label>
						<input type="number"  min="1" max="9999999999" name="text3" class="custom_input" required />
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
					<input type="radio" name="nm2" value="איפור ערב" />
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
					<input type="radio" name="nm3" value="גבות ושעוות" />
					<label>בחירה</label>
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