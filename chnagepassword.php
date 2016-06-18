<?php
require_once('include/require.php');

$CPassword = new CPassword(); 
$Mode = ReplaceEmpty("mode","show");

//if password changed successfully
if ($Mode == "chnagepassword")
{
	//password changed successfuliy
	if ($CPassword->Add())
	{
		SetMsg("$CPassword->ObjName <b><font color=red>הסיסמא שונתה בהצלחה</b></font>","success");            
        header("Location: ".$Site->AURL."makeup-artist-profile.php");
        exit();             
	}
	else 
	{
	    SetMsg($CPassword->Error,"error");           
	}
}

StartHeader();//view of page with the logo
CloseHeader();//close of header
StartBody();//middle of page
PrintTopHeader();//tollbar of the page
$CPassword->PrintForm();
CloseBody();//close body

//class for changing user password
Class CPassword 
{
	 function CPassword(){}
	 //add a new password
	 function Add()
	 {
		//if the user exist he can add new password
		$SAWMemberID = @$_SESSION['SAWMemberID'];
        if ($this->IsValid())
		{
			$NPassword = ReplaceEmpty("newpassword","");
			$pass=  base64_encode($NPassword);
            $SQL = "update member set password = '$pass' where MemberID = $SAWMemberID";
            GetRS($SQL);	
            return true;
        }
        else 
		{
            return false;
        }
	 }
	//check if the user valid and there is no error
	function IsValid()
	{
		$this->Error = "";
		$Valid = true;
        $error = "";
		$this->Error = $error;
		return $Valid;
	}
	//page form
	function PrintForm()
	{
		?>
		<div class="ipage gallerypage"><!-- ipage start -->
			<div class="rowhead">
				<h2>החלף סיסמא</h2>
			</div>
			<?php echo ShowMsg() ?>
			<form action="chnagepassword.php" method="POST" enctype="multipart/form-data">
				<div class="">
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
						<label>הכנס סיסמא חדשה</label>
						<input type="password" name="newpassword" class="custom_input" required/>
					</div><!-- contactpage_intro_row close// -->
					<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
						<input type="submit" value="OK" class="custom_btn" />
						<input type="hidden" name="mode" value="chnagepassword" >
					</div><!-- contactpage_intro_row close// -->
				</div>
			</form>
		</div><!-- ipage close// -->	
		<?php	
	}	
}
?>