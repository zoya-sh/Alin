<?php
require_once('include/require.php');

$ForgetPassword = new ForgetPassword(); 

$Mode = ReplaceEmpty("mode","show");

if ($Mode == "forgetpassword")
{
	if ($ForgetPassword->Add())
	{
		SetMsg("$ForgetPassword->ObjName Password sented successfully","success");            
        header("Location: ".$Site->AURL."makeup-artist-profile.php");
        exit();             
	}
	else 
	{
	    SetMsg($ForgetPassword->Error,"error");           
	}
}

StartHeader();
CloseHeader();
StartBody();
PrintTopHeader();
$ForgetPassword->PrintForm();
CloseBody();


Class ForgetPassword 
{

	function ForgetPassword(){}
	
	function Add()
	{
		$SAWMemberID  = @$_SESSION['SAWMemberID'] ;
       
	   if ($this->IsValid())
		{	
			$email = ReplaceEmpty("email","");
			//send password to mail
            $SQL = "Select * FROM member where Email = '$email' ";
			ECHO $SQL ;
			$mrs=GetRS($SQL);
			$mrow=mysql_fetch_array($mrs);
			$name=stripslashes($mrow['FirstName'].' '.$mrow['LastName']);
			$Password = $mrow['Password'] ;

			$HTML="Hello ".$name.", <br><br><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Recovery Details are listed below...<br><br><br>
			Emailid: ".$this->Email."<br>
			Password:".$Password."<br><br><br>
			Click on Below Link for login with provided credentials....
			<a href='http://localhost/alin-makeup/' > Login</a>";
			$from="sales@alin-makeup.com";
			$to="$email";
			$subject = "Recovery Password";
			SendMail($HTML,$from,$to,$subject);		
			return true;
        }
        else 
		{
            return false;
        }
    }
	
	function IsValid()
	{
		$this->Error = "";
		$Valid = true;
        $error = "";
		$this->Error = $error;
		
		return $Valid;
	}
	
	function PrintForm()
	{
		?>
		<div class="ipage gallerypage"><!-- ipage start -->
			<div class="rowhead">
				<h2>שחכת סיסמא?</h2>
			</div><?php if(isset($_REQUEST['q']))
			{
				echo '<b><font color=red>Check your Mail</b></font>';
				
			}?>
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