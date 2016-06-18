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

//class allows the customer to leave contact information to makeup artist
Class ContatUs 
{
	function ContatUs()
	{
		$this->Error = ReplaceEmpty('error' , '');
	}
	function PrintForm()
	{
		?>
		<div class="ipage contactpage"><!-- ipage start -->
			<div class="rowhead">
				<h2>צור קשר</h2>
			</div>
			<!--if mail sent, q will be true user will see massage "Artist will contact you shortly"-->
			<?php if(isset($_REQUEST['q']) && $_REQUEST['q']==1)
			{
				echo '<b><font color=red>לקוח יקר פרטייך התקבלו, ניצור איתך קשר בהקדם האפשרי</font></b>';
			}
			//if sending e-mail failed
			if(isset($_REQUEST['q']) && $_REQUEST['q']==0)
			{
				echo '<b><font color=red>משהו השתבש , נסה שנית</b></font>';
			}
			?>
			<!-- send the details of the customer to contact-us.php for sending customer dateils to artist email -->
			<form action="mail/contact-us.php" method="post"> 
				<div class="contactpage_intro">
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
						<p><labelWithe>אלין מישייב </labelWithe><p>
						<p><labelWithe>alin.makeup.artist@gmail.com</labelWithe><p>
						<p><labelWithe>0507817770</labelWithe><p>
					</div><!-- contactpage_intro_row close// -->
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
						<label1>שם פרטי:</label1>
						<input type="text" name="text1" class="custom_input" required/>
					</div><!-- contactpage_intro_row close// -->
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
						<label1>שם משפחה:</label1>
						<input type="text" name="text2" class="custom_input" required/>
					</div><!-- contactpage_intro_row close// -->
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
						<label1>מספר טלפון:</label1>
						<input type="number"  min="1" max="9999999999" name="text3" class="custom_input" required />
					</div><!-- contactpage_intro_row close// -->
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
					<label2>ציפורניים: </label2>
					<input type="radio" name="nm1" value="בניה באקריל" />
					<labelWithe>בניה באקריל</labelWithe>
					<input type="radio" name="nm1" value="מילוי באקריל" />
					<labelWithe>מילוי באקריל</labelWithe><br>					
					<input type="radio" name="nm1" value="בניה בג'ל" />
					<labelWithe>בניה בג'ל</labelWithe>
					<input type="radio" name="nm1" value="מילוי בג'ל" />
					<labelWithe>מילוי בג'ל</labelWithe>
					<input type="radio" name="nm1" value="מריחת לק ג'ל" />
					<labelWithe>מריחת לק ג'ל</labelWithe>
					<br>
					<input type="radio" name="nm1" value="בניה מושלבת" />
					<labelWithe>בניה מושלבת</labelWithe>
					
				</div><!-- contactpage_intro_row close// -->
				<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
					<input type="radio" name="nm3" value="גבות ושעוות" />
					<label2>גבות ושעוות </label2>
					
				</div><!-- contactpage_intro_row close// -->
				<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
					<label2>איפור: </label2>
					<input type="radio" name="nm2" value="איפור ערב" />
					<labelWithe>איפור ערב</labelWithe>
					<input type="radio" name="nm2" value="איפור כלה" />
					<labelWithe>איפור כלה</labelWithe>
					<input type="radio" name="nm2" value="מסיבת רווקות" />
					<labelWithe>מסיבת רווקות</labelWithe><br>
					<input type="radio" name="nm2" value="איפור לברית/ה" />
					<labelWithe>איפור לברית/ה</labelWithe>
					<input type="radio" name="nm2" value="איפור לבת מצווה" />
					<labelWithe>איפור לבת מצווה</labelWithe><br>
					<input type="radio" name="nm2" value="ערבי פעילויות" />
					<labelWithe>ערבי פעילויות</labelWithe>
					<input type="radio" name="nm2" value="סדנא אישית" />
					<labelWithe>סדנה אישית</labelWithe>
					<input type="radio" name="nm2"  value="סדנא קבוצתית"/>
					<labelWithe>סדנה קבוצתית</labelWithe>
				</div><!-- contactpage_intro_row close// -->
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
						<input type="submit" value="שלח" class="custom_btn" />
						<input type="hidden" name="mode" class="custom_btn" />
					</div><!-- contactpage_intro_row close// -->
				</div>
			</form>
		</div><!-- ipage close -->
		<?php	
	}
}
?>