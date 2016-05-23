<?php
require_once('include/require.php');

$ForgetPassword = new ForgetPassword(); 

$Mode = ReplaceEmpty("mode","show");


StartHeader();//view of page with the logo
CloseHeader();//close of header
StartBody();//middle of page
PrintTopHeader();//tollbar of the page
$ForgetPassword->PrintForm();
CloseBody();//close body

//class for sending recovery password to email
Class ForgetPassword 
{

	function ForgetPassword(){}
	
	function PrintForm()
	{
		?>
		<div class="ipage gallerypage"><!-- ipage start -->
			<div class="rowhead">
				<h2>שחכת סיסמא?</h2>
			</div><?php if(isset($_REQUEST['q']))
			{
				echo '<b><font color=red>הסיסמא נשלחה בהצלחה</b></font>';
				
			}?>
			<!-- send the details of the customer to mail.php for restore his password -->
			<form action="mail/mail.php" method="POST" enctype="multipart/form-data">
				<div class="">
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
						<label>הכנס מייל לשחזור</label>
						<input type="email" name="email" class="custom_input" required/>
					</div><!-- contactpage_intro_row close// -->
					
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
						<input type="submit" value="שלח" class="custom_btn" />
						<input type="hidden" name="mode" value="forgetpassword" >
					</div><!-- contactpage_intro_row close// -->
				</div>
			</form>
		</div><!-- ipage close// -->	
		<?php	
	}	
}
?>