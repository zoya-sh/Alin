<?php
require_once('include/require.php');

$NailsCustomer = new NailsCustomer(); 

StartHeader();//view of page with the logo
CloseHeader();//close of header
StartBody();//middle of page
PrintTopHeader();//tollbar of the page
$NailsCustomer->PrintForm();
CloseBody();//close body

//class responsable to upload nails users for given cupons 
Class NailsCustomer 
{
	function NailsCustomer()
	{
		//masseg on upload exist user
		$this->MemberID = ReplaceEmpty("memberid", "");
		$this->FirstName = ReplaceEmpty("fname", "");
		$this->LastName = ReplaceEmpty("lname", "");
		$this->Email = ReplaceEmpty("email", "");
		$this->PhoneNumber = ReplaceEmpty("phonenumber", "");
		$this->Mode = ReplaceEmpty("mode", "");	
	}
	
	function PrintForm()
	{
	
	
	?>
    <div class="ipage makeupprofilepage">
        <!-- ipage start -->
        <div class="rowhead">
            <h2>לקוחות ציפורניים</h2>
        </div>
        <?php
		//if the user exist we will upload his data
		if($this->Mode == 'save')
		{

		$SQL ="select * from member where FirstName = '$this->FirstName' and LastName = '$this->LastName' and  Email = '$this->Email' and  TelNo = '$this->PhoneNumber' and ProfileType =  'user'";
		$rs = GetRs($SQL);
		while($rw = mysql_fetch_array($rs)) 
		{
		?>
            <form action="nails-costomers.php" method="POST" enctype="multipart/form-data">
                <center>
                    <div class="makeupprofilepage_intro">
                        <input type="submit" value="הוספת טיפול" class="custom_btn" />&nbsp;&nbsp;&nbsp;&nbsp
                        <input type="hidden" name="mode" value="increment">
                        <input type="hidden" name="memberid" value="<?php echo $rw['MemberID'] ?>">
                        <?php

			echo '<b><font color=#8B2252 size=4>שם פרטי = </b></font>' ; echo '<b><font color=#8B2252 size=4>'.$rw['FirstName'].'</b></font>' ; echo "&nbsp;&nbsp;&nbsp;&nbsp;";
			echo '<b><font color=#8B2252 size=4>טיפול מס = </b></font>' ; echo '<b><font color=#8B2252 size=4>'.$rw['Treatment'].'</b></font>'  ;echo "&nbsp;&nbsp;&nbsp;&nbsp;";
			?>
                    </div>
                </center>

            </form>
            <?php
		}
		}
		//if the artist incriment number of treatments
		elseif($this->Mode == 'increment') 
		{
			
		$SQL ="update member set Treatment = Treatment + 1  where MemberID = $this->MemberID";	
		GetRs($SQL);
		header("Location: ".$Site->AURL."nails-costomers.php");	
		}		
		?>

                <form action="nails-costomers.php" method="POST" enctype="multipart/form-data">
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
                                <input type="text" name="fname" class="custom_input" value="<?php echo $this->FirstName ?>" required>
                            </div>
                            <!-- makeupprofilepage_intro_col_row close// -->

                            <div class="makeupprofilepage_intro_col_row">
                                <!-- makeupprofilepage_intro_col_row start -->
                                <label>שם משפחה:</label>
                                <input type="text" name="lname" class="custom_input" value="<?php echo $this->LastName ?>" required>
                            </div>
                            <!-- makeupprofilepage_intro_col_row close// -->

                            <div class="makeupprofilepage_intro_col_row">
                                <!-- makeupprofilepage_intro_col_row start -->
                                <label>מס' טלפון:</label>
                                <input type="number" min="1" max="9999999999" name="phonenumber" class="custom_input" value="<?php echo $this->PhoneNumber ?>" required>
                            </div>
                            <!-- makeupprofilepage_intro_col_row close// -->

                            <div class="makeupprofilepage_intro_col_row">
                                <!-- makeupprofilepage_intro_col_row start -->
                                <label>Email:</label>
                                <input type="email" name="email" class="custom_input" value="<?php echo $this->Email ?>" required>
                            </div>
                            <!-- makeupprofilepage_intro_col_row close// -->

                            <div class="makeupprofilepage_intro_col_row">
                                <!-- makeupprofilepage_intro_col_row start -->
                                <input type="submit" value="טען" class="custom_btn" />
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