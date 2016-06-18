<?php
require_once('include/require.php');

$NailsTips = new NailsTips(); 
$Mode = ReplaceEmpty("mode","show");
$NailsTipsID = ReplaceEmpty("tipsid","");

//if tips were add successfully
if ($Mode == "addtips")
{
	//add tip successfully
	if ($NailsTips->Add())
	{
		SetMsg("<b><font color=red>$NailsTips->ObjName הטיפ נוסף בהצלחה</font></b>","success");            
        header("Location: ".$Site->AURL."nails-tips.php");
        exit();             
	}
	else 
	{
	    SetMsg($NailsTips->Error,"error");           
	}
}
//if tips were deleted successfully
if($Mode=="removed")
{
	//remove tip successfully
	$NailsTips->Remove($NailsTipsID);
	SetMsg("<b><font color=red>$NailsTips->ObjName הטיפ הוסר בהצלחה</font></b>","success");            
	header("Location: ".$Site->AURL."nails-tips.php");
	exit(); 
}

StartHeader();//view of page with the logo
CloseHeader();//close of header
StartBody();//middle of page
PrintTopHeader();//tollbar of the page
$NailsTips->PrintNailsTips();
CloseBody();//close body

//class that adds nail tips by artist
Class NailsTips {

	function NailsTips(){}
	
	function Add()
	{
		global $Site;
		$SAWMemberID = @$_SESSION['SAWMemberID'];
		//check if the details is right
        if ($this->IsValid())
		{	
            $TipsID = GetID("tips","TipsID");
            $DateAdded = date("Y-m-d H:i:s");
            $DateUpdated = $DateAdded;
			$Desc = ReplaceEmpty("desc","");
			//inset tip to data base
            $SQL = "insert into tips (TipsID , `Desc`, TipsType , MemberID , DateAdded) values ($TipsID , '$Desc' , '2' , '$SAWMemberID' , '$DateAdded')";
            GetRS($SQL);		
            return true;
        }
        else 
		{
            return false;
        }
    }
	//delete tips 
	function Remove($TipsID = 0)
	{
		$SAWMemberID = @$_SESSION['SAWMemberID'];
		//delete tips from data base
		$SQL = "delete from tips where TipsID = $TipsID and TipsType = 2 and MemberID = $SAWMemberID";
		GetRs($SQL);
		return true;
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
	function PrintNailsTips()
	{
		$SAWMemberID  = @$_SESSION['SAWMemberID'] ;
		?>
		<div class="ipage makeuptips"><!-- ipage start -->
			<div class="rowhead">
				<h2>עולם הציפורניים</h2>
			</div>
			<?php echo ShowMsg() ?>
			<?php
			$SAWProfileType = @$_SESSION['SAWProfileType'];
			if($SAWProfileType != 'user')
			{ ?>
				<?php if (isset($_SESSION['SAWMemberID'])) 
				{  ?>
					<div class="makeuptips_intro">
					<div class="makeuptips_intro_row">
						<!-- makeuptips_intro_row start -->
						<h2>הוספת טיפ</h2>
						<form action="nails-tips.php" method="POST" enctype="multipart/form-data">
							<textarea name="desc"></textarea>
							<input type="submit" value="אישור" class="custom_btn" />
							<input type="hidden" name="mode" value="addtips">
						</form>
					</div>
					<!-- makeuptips_intro_row close -->
				   <?php
				}
			}
			//TipsType = '2' means nail tips
			$SQL = "select * from  tips where TipsType = '2'";
			$rs = GetRs($SQL);
			$Count = 1;
			while($rw = mysql_fetch_array($rs))
			{
				?>
					<div class="makeuptips_intro_row"><!-- makeuptips_intro_row start -->
						<h2>טיפ <?php echo $Count ?></h2>
							<p>
								<?php echo $rw['Desc'] ?>
							</p>
						<?php if($SAWMemberID == $rw['MemberID'])
						{ ?>
								<a href="nails-tips.php?mode=removed&tipsid=<?php echo $rw['TipsID'] ?>" class="remove_btn"></a>
						  <?php
						}
						?>
					</div>
					<!-- makeuptips_intro_row close -->
				<?php
				$Count = $Count + 1;
			}
			?>
		</div>
		</div><!-- ipage close -->
	<?php	
	}
}
?>