<?php
require_once('include/require.php');

$MackupCustomer = new MackupCustomer(); 
$Mode = ReplaceEmpty("mode", "");

//save makeup customer successfully
if ($Mode == "save")
{
	//massage on saved user
	if ($MackupCustomer->Add())
	{
		SetMsg('<b><font color=red>הלקוח נשמר בהצלחה</b></font>',"success");            
        header("Location: ".$Site->AURL."makup-costomers.php");
        exit();             
	}
	else 
	{
	    SetMsg($MackupCustomer->Error,"error");           
	}
}

StartHeader();//view of page with the logo
CloseHeader();//close of header
StartBody();//middle of page
PrintTopHeader();//tollbar of the page
$MackupCustomer->PrintForm();
CloseBody();//close body

//class responsable to save makeup users for future alarms
Class MackupCustomer 
{
	//user data
	function MackupCustomer()
	{
		$this->MemberID = ReplaceEmpty("memberid", "");
		$this->FirstName = ReplaceEmpty("fname", "");
		$this->LastName = ReplaceEmpty("lname", "");
		$this->PhoneNumber = ReplaceEmpty("phonenumber", "");
		$this->DOB = ReplaceEmpty("dob", "");
		$this->MakeupType = ReplaceEmpty("MakeupType", "");
		$this->FacialStructure = ReplaceEmpty("faceStruc", "");
		$this->SkinType = ReplaceEmpty("skin", "");
		$this->Mode = ReplaceEmpty("mode", "");	
	}
	//add makeup customer to data-base
	function Add()
	{
		$MPhoneNumber  = GetID("mcustomer","MCustomerID");//select max MCustomerID from mcustomer table inctimant by 1 for saving new customer 
		$MemberID = @$_SESSION['SAWMemberID'];//for only artist with MemberID=2 can add new customer to the databse
		$date=date('Y-m-d');//data of setting customer to the databse
		//save mcustomer on data base 
		$SQL = "insert into mcustomer (date ,MCustomerID, MemberID,  FirstName, LastName,  PhoneNumber,  DOB, MakeupType, FacialStructure, SkinType ) values ('$date', $MPhoneNumber, '$MemberID', '$this->FirstName', '$this->LastName', '$this->PhoneNumber', '$this->DOB', '$this->MakeupType', '$this->FacialStructure', '$this->SkinType')";
		GetRS($SQL);	
		return true;
	}
	//form page
	function PrintForm()
	{	
	?>
    <div class="ipage makeupprofilepage">
        <!-- ipage start -->
        <div class="rowhead">
            <h2>לקוחות איפור</h2>
        </div>
        <?php ShowMsg() ?> <!-- for sending mail according functionality  written on page makup-costomers.php -->
            <form action="makup-costomers.php" method="POST" enctype="multipart/form-data">
                <div class="makeupprofilepage_intro">
                    <div class="makeupprofilepage_intro_coll">
                        <!-- makeupprofilepage_intro_coll start -->
                    </div>
                    <!-- makeupprofilepage_intro_coll close// -->
                    <div class="makeupprofilepage_intro_colr">
                        <!-- makeupprofilepage_intro_colr start -->

                        <div class="makeupprofilepage_intro_col_row">
                            <!-- makeupprofilepage_intro_col_row start -->
                            <label>שם פרטי:</label>
                            <input type="text" name="fname" class="custom_input" value="<?php echo $this->FirstName ?>" required />
                        </div>
                        <!-- makeupprofilepage_intro_col_row close// -->

                        <div class="makeupprofilepage_intro_col_row">
                            <!-- makeupprofilepage_intro_col_row start -->
                            <label>שם משפחה:</label>
                            <input type="text" name="lname" class="custom_input" value="<?php echo $this->LastName ?>" required />
                        </div>
                        <!-- makeupprofilepage_intro_col_row close// -->

                        <div class="makeupprofilepage_intro_col_row">
                            <!-- makeupprofilepage_intro_col_row start -->
                            <label>מספר טלפון:</label>
                            <input type="number" name="phonenumber" min="1" max="9999999999" class="custom_input" value="<?php echo $this->PhoneNumber ?>" required />
                        </div>
                        <!-- makeupprofilepage_intro_col_row close// -->

                        <div class="makeupprofilepage_intro_col_row">
                            <!-- makeupprofilepage_intro_col_row start -->
                            <label>תאריך לידה:</label>
                            <input type="date" name="dob" class="custom_input" value="<?php echo $this->DOB ?>" required />
                        </div>
                        <!-- makeupprofilepage_intro_col_row close// -->

                        <div class="makeupprofilepage_intro_col_row">
                            <!-- makeupprofilepage_intro_col_row start -->
                            <label>סוג איפור:</label>
                            <select class="custom_select" name="MakeupType" required>
                                <option value="Evening Makeup">איפור ערב</option>
                                <option value="Bride Makeup">איפור כלה</option>
                                <option value="Makeup Alliance">איפור לברית/ה</option>
								<option value="Makeup Bat Mitzvah">איפור לבת מצווה</option>
                                <option value="Personal Tranning">סדנה אישית</option>
                                <option value="Group Tranning">סדנה קבוצתית</option>
								<option value="Evening activity">איפור ערב</option>
                                <option value="Bridesmaids Party">מסיבת רווקות</option>
                            </select>
                        </div>
						 <div class="makeupprofilepage_intro_col_row">
                            <!-- Facial Structure of customer -->
                            <label>מבנה פנים:</label>
                            <input type="text" name="faceStruc" class="custom_input" value="<?php echo $this->FacialStructure ?>" required />
                        </div>
						 <div class="makeupprofilepage_intro_col_row">
                            <!-- Skin Type of customer  -->
                            <label>סוג עור:</label>
                            <input type="text" name="skin" class="custom_input" value="<?php echo $this->SkinType ?>" required />
                        </div>
                        <!-- makeupprofilepage_intro_col_row close// -->

                        <div class="makeupprofilepage_intro_col_row">
                            <!-- makeupprofilepage_intro_col_row start -->
                            <input type="submit" value="שמור" class="custom_btn" />
                        </div>
                        <!-- makeupprofilepage_intro_col_row close// -->
                    </div>
                    <!-- makeupprofilepage_intro_colr close// -->
                    <input type="hidden" name="mode" value="save">
                    <div class="clear"></div>
                </div>
            </form>
    </div>
    <!-- ipage close// -->
    <?php	
	}
}
?>