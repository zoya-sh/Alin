<?php
require_once('include/require.php');

$CPassword = new CPassword(); 

$Mode = ReplaceEmpty("mode","show");

if ($Mode == "chnagepassword")
{
	if ($CPassword->Add())
	{
		SetMsg("$CPassword->ObjName added successfully","success");            
        header("Location: ".$Site->AURL."makeup-artist-profile.php");
        exit();             
	}
	else 
	{
	    SetMsg($CPassword->Error,"error");           
	}
}

StartHeader();
CloseHeader();
StartBody();
PrintTopHeader();
$CPassword->PrintForm();
CloseBody();


Class CPassword 
{

	function CPassword(){}
	
	 function Add()
	 {
		$SAWMemberID  = @$_SESSION['SAWMemberID'] ;
        if ($this->IsValid())
		{
			$NPassword = ReplaceEmpty("newpassword","");
            $SQL = "update member set password = '$NPassword' where MemberID = $SAWMemberID";
            GetRS($SQL);	

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
				<h2>החלף סיסמא</h2>
			</div>
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