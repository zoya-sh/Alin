<?php
require_once("include/require.php");

$Mode = ReplaceEmpty("mode", "");
$VarietyID = ReplaceEmpty("varietyid" , "") ;

if (isset($_GET['mode']))
{
	global $Cart ;
	//on logout unset memberId and ProfileType(makeup artist or simple user)
	if ($_GET['mode'] == "logout")
	{
		unset($_SESSION['SAWMemberID']);
		unset($_SESSION['SAWProfileType']);
		SetMsg('<b><font color=red>ההתנתקות בוצעה בהצלחה</b></font>');
		header("Location:  " . $Site->DocRoot . "index.php");// on logout go to home page
		$Cart->ClearCart();
	}
}

//on login set memberId and ProfileType(makeup artist or simple user)
if ($Mode == "login")
{	
	if (isset($_POST['username']))
	{
		//if user or password not exist or wrong show error to user
		if (! (doUserAndPasswordMatch($_POST['username'],$_POST['password'])))
		{
			SetMsg('<b><font color=red>שם משתמש או סימסא לא נכונים</b></font>', "error");
			PrintLoginScreen(1);
			exit;
		}
		else 
		{
			if (! (isUserActive($_POST['username'],$_POST['password']))){
				SetMsg('<b><font color=red>חשבונך אינו פעיל</b></font>', "error");
				PrintLoginScreen(2);
				exit;
			}
		}
	}
}

if (!($myUser = getCurrentUser())){
	PrintLoginScreen();
	exit;
}
//if ther is no error
function PrintLoginScreen($error = 0){

	StartHeader();
	CloseHeader();
	StartBody();
	PrintTopHeader();
	ShowMsg();
	PrintLoginForm();//login view
	CloseBody();	
	exit();
}

function PrintLoginForm(){
	
	global $Site;
	global $VarietyID;
	
	$Mode = ReplaceEmpty("mode", "");
	$Email = ReplaceEmpty("email", "");
	$UserName = ReplaceEmpty("username", "");
	$Password = ReplaceEmpty("password", "");
	$CPassword = ReplaceEmpty("cpassword", "");
	$CompanyName = ReplaceEmpty("companyname", "");
	$Title = ReplaceEmpty("title", "");
	$FirstName = ReplaceEmpty("firstname", "");
	$LastName = ReplaceEmpty("lastname", "");
	$MiddleName = ReplaceEmpty("middlename", "");
	$Address1 = ReplaceEmpty("address1", "");
	$Address2 = ReplaceEmpty("address2", "");
	$City = ReplaceEmpty("city", "");
	$Postcode = ReplaceEmpty("postcode", "");
	$CountryID = ReplaceEmpty("countryid", "0");
	$County = ReplaceEmpty("county", "");
	$TelNo = ReplaceEmpty("telno", "");
	$Mobile = ReplaceEmpty("mobile", "");
	$Fax = ReplaceEmpty("fax", "");
	$Agreed = ReplaceEmpty("agreed", "0");
	?>
    <div class="ipage joinpage">
        <!-- ipage start -->
        <div class="rowhead">
            <h2>התחבר</h2>
        </div>
        <div class="joinpage_intro">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="login_form">

                <div class="contactpage_intro_row">
                    <!-- contactpage_intro_row start -->
                    <label>Email:</label>
                    <input type="text" class="custom_input" id="username" name="username" value="<?php echo $UserName ?>">
                </div>
                <!-- contactpage_intro_row close// -->
                <div class="contactpage_intro_row">
                    <!-- contactpage_intro_row start -->
                    <label>סיסמא:</label>
                    <input type="password" class="custom_input" id="password" name="password" value="<?php echo $Password ?>">
                </div>
                <!-- contactpage_intro_row close// -->
                <div class="contactpage_intro_row">
                    <!-- contactpage_intro_row start -->
                    <input type="submit" value="אישור" class="custom_btn">
                </div>
                <!-- contactpage_intro_row close// -->
                <div class="contactpage_intro_row">
                    <!-- contactpage_intro_row start -->
                    <a href="forget-password.php"><span type="submit" value="" class="custom_btn">שלח סיסמא למייל</span></a>
                    <input type="hidden" value="login" class="custom_btn" name="mode">
                </div>
                <!-- contactpage_intro_row close// -->

            </form>
        </div>
    </div>
    <!-- ipage close// -->
    <?php 
}
//function get the current user 
function getCurrentUser()
{
	if (isset($_SESSION['SAWMemberID'])) 
	{
		$a = $_SESSION['SAWMemberID'];
		SetSession($a);
		return SetSession($a);
	}
	else
		return False;
}

//function checks if user match his password
function doUserAndPasswordMatch($user,$password)
{
	global $db;
	$LangID = ReplaceEmpty("langid","1");
	//password =  sha($password)
	$SQL = "select * from member where Email = '$user' and password = '$password'";
	$rsUser = @mysql_query($SQL,$db->cnn) or die(mysql_error());

	if ($rwUser = mysql_fetch_array($rsUser))
	{
		$_SESSION['SAWMemberID'] = $rwUser['MemberID'];
		$_SESSION['CheckoutEmail'] = $rwUser['Email'];
		return true;
	}
	else
	{
		return false;
	}
}

//function checks if user account is not activated
function isUserActive($user,$password)
{
	global $db;
	//password =  sha($password)
	//0 if we want not to activit user account, 1 to activit user account
	$SQL = "select * from member where Email = '$user' and password = '$password' and isenable = 1";
	$rsUser = @mysql_query($SQL,$db->cnn) or die(mysql_error());

	if ($rwUser = mysql_fetch_array($rsUser))
	{
		$_SESSION['SAWMemberID'] = $rwUser['MemberID'];
		$_SESSION['SAWProfileType'] = $rwUser['ProfileType'];
		return true;
	}
	else
	{
		return false;
	}
}

//for setting cookies for user name and type
function SetSession($userid)
{
	global $db;
	
	$SQL = "select * from member where MemberID = $userid";
	$rsUser = @mysql_query($SQL,$db->cnn) or die(mysql_error());

	if (($rwUser = mysql_fetch_array($rsUser)))
	{
		$_SESSION['SAWMemberID'] = $rwUser['MemberID'];
		$_SESSION['SAWProfileType'] = $rwUser['ProfileType'];
		return true;
	}
	else 
	{
		return false;
	}
}

$SAWMemberID = $_SESSION['SAWMemberID'];
$SAWProfileType= $_SESSION['SAWProfileType'];
?>