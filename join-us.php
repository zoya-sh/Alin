<?php
require_once('include/require.php');

$JoinUs = new JoinUs(); 
$Mode = ReplaceEmpty("mode", "view");

if ($Mode == "register")
{
	//masseg when user join the website
	if ($JoinUs->Register())
	{
		SetMsg('<b><font color=red>ברוך הבא</b></font>',"success");  
		header("Location: " . $Site->DocRoot . "makeup-artist-profile.php");	
        exit();             
	}
	else 
	{
	    SetMsg($JoinUs->Error,"error");           
	}
}

StartHeader();//view of page with the logo
CloseHeader();//close of header
StartBody();//middle of page
PrintTopHeader();//tollbar of the page
$JoinUs->PrintJoinUs();
CloseBody();//close body

//class responsable to registert users to the website
Class JoinUs 
{

	function JoinUs()
	{	
		$this->Error = "";
		$this->Heading = "Register your profile";		
		$this->FirstName = ReplaceEmpty("firstname", "");
		$this->UserType = ReplaceEmpty("usertype", "user");
		$this->LastName = ReplaceEmpty("lastname", "");
		$this->Email = ReplaceEmpty("email", "");
		$this->Password = ReplaceEmpty("password", "");
		$this->CPassword = ReplaceEmpty("cpassword", "");
		$this->PhoneNumber = ReplaceEmpty("phonenumber", "");		
	}
	//registeration to the web
	function Register()
	{
		global $Site;
		//if all the details is valid save the user on data base
		if ($this->IsValid())
		{
			$MemberID = GetID("member", "MemberID");
			$DateAdded = gmdate("Y-m-d H:i:s");
			$DateUpdated = $DateAdded;
			$IsEnable = 1;
				//sha($this->Password)
			$SQL = "insert into member (MemberID, ProfileType, FirstName, LastName,  TelNo, Email, Password, IsActive, IsEnable, DateAdded, DateUpdated) values ($MemberID, 'user', '$this->FirstName', '$this->LastName', '$this->PhoneNumber', '$this->Email', '$this->Password', '1' , '$IsEnable', '$DateAdded', '$DateUpdated')";
			GetRS($SQL);

			$_SESSION['SAWMemberID'] = $MemberID ;//cookie-To not allow impersonation of another user PHP gives each customer ID
			
			return true;
		}
		else
		{
			return false;
		}		
	}
	//function for check user details
	function IsValid()
	{
        $this->Error = "";
        $Valid = true;
        $error = "";
		//email check from common.php
		if (! IsValidEmail($this->Email)) 
		{
			if ($error != "") { $error = "$error<br>"; }
			$error .= '<b><font color=red>אנא הזן כתובת אימייל תקינה</b></font>';
			$Valid = False;
		}
		//if user alredy exist
		elseif(IsValueExist("member","Email", "MemberID", $this->Email, 0))
		{
			if ($error != "") { $error = "$error<br>"; }
			$error .= '<b><font color=red>המשתמש קיים במערכת</b></font>';
			$Valid = False;
		}
		//first name
		if (! IsValidStr($this->FirstName))
		{
			if ($error != "") { $error = "$error<br>"; }
			$error .= '<b><font color=red>אנא הזן שם פרטי</b></font>';
			$Valid = False;
		}
		//last name
		if (! IsValidStr($this->LastName))
		{
			if ($error != "") { $error = "$error<br>"; }
			$error .= '<b><font color=red>אנא הזן שם משפחה</b></font>';
			$Valid = False;
		}
		//password
		if (! IsValidStr($this->Password)) 
		{
			if ($error != "") { $error = "$error<br>"; }
			$error .= '<b><font color=red>אנא הזן סיסמא</b></font>';
			$Valid = False;
		}
		//verify password
		if (($this->CPassword) != ($this->Password) ) 
		{
			if ($error != "") { $error = "$error<br>"; }
			$error .= '<b><font color=red>הסיסמאות אינן תואמות</b></font>';
			$Valid = False;
		}
        $this->Error = $error;
        return $Valid;
    }
	
	function PrintJoinUs()
	{
		global $Site;
	?>
	<div class="ipage joinpage"><!-- ipage start -->
    	<div class="rowhead">
        	<h2>הצטרף עכשיו</h2>
        </div>
		<?php echo ShowMsg() ?>
		<form action="join-us.php" method="post" id="frmRegister" >
			<div class="joinpage_intro">
				<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
					<label>שם פרטי:</label>
					<input type="text" name="firstname" class="custom_input" value="<?php echo $this->FirstName ?>">
				</div><!-- contactpage_intro_row close// -->
				<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
					<label>שם משפחה:</label>
					<input type="text" name="lastname" class="custom_input" value="<?php echo $this->LastName ?>">
				</div><!-- contactpage_intro_row close// -->
				<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
					<label>Email:</label>
					<input type="email" name="email" class="custom_input" value="<?php echo $this->Email ?>">
				</div><!-- contactpage_intro_row close// -->
				<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
					<label>מס' טלפון:</label>
					<input type="number" name="phonenumber" min="1" max="9999999999" class="custom_input" value="<?php echo $this->PhoneNumber ?>">
				</div><!-- contactpage_intro_row close// -->
				<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
					<label>סיסמא:</label>
					<input type="password" name="password" class="custom_input">
				</div><!-- contactpage_intro_row close// -->
				<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
					<label>וידוא סיסמא:</label>
					<input type="password" name="cpassword" class="custom_input">
				</div><!-- contactpage_intro_row close// -->
				<div class="contactpage_intro_row"><!-- contactpage_intro_row start -->
					<input type="submit" value="אישור" class="custom_btn">
				</div><!-- contactpage_intro_row close// -->
				<input type="hidden"  name="mode" value="register">	
			</div>
		</form>
    </div><!-- ipage close// -->
	<?php	
	}
}
?>