<?php
require_once('include/require.php');

$CareTips = new CareTips(); 

$Mode = ReplaceEmpty("mode","show");
$CareTipsID = ReplaceEmpty("tipsid","");


if ($Mode == "addtips")
{
	if ($CareTips->Add())
	{
		SetMsg("$CareTips->ObjName added successfully","success");            
        header("Location: ".$Site->AURL."care-tips.php");
        exit();             
	}
	else 
	{
	    SetMsg($CareTips->Error,"error");           
	}
}
if($Mode=="removed")
{	
	$CareTips->Remove($CareTipsID);
	SetMsg("$MakupGallery->ObjName removed successfully","success");            
	header("Location: ".$Site->AURL."care-tips.php");
	exit(); 
}

StartHeader();
CloseHeader();
StartBody();
PrintTopHeader();
$CareTips->PrintCareTips();
CloseBody();


Class CareTips 
{

	function CareTips(){}
	
	function Add()
	{
		global $Site  ;
		$SAWMemberID  = @$_SESSION['SAWMemberID'] ;
		
		if ($this->IsValid())
		{			
			$TipsID = GetID("tips","TipsID");
			$DateAdded = date("Y-m-d H:i:s");
			$DateUpdated = $DateAdded;
			$TipsID = GetID("tips", "TipsID");  
			$Desc = ReplaceEmpty("desc","");	
				
			$SQL = "insert into tips (TipsID , `Desc`, TipsType , MemberID , DateAdded) values ($TipsID , '$Desc' , '3' , '$SAWMemberID' , '$DateAdded')";
			GetRS($SQL);	
			return true;
		}
		else 
		{
			return false;
		}
    }
	
	function Remove($TipsID = 0)
	{
		$SAWMemberID  = @$_SESSION['SAWMemberID'] ;
		$SQL = "delete from tips where TipsID = $TipsID and TipsType = 3 and MemberID = $SAWMemberID";
		GetRs($SQL);
		return true;	
	}
	
	function IsValid()
	{
		$this->Error = "";
		$Valid = true;
        $error = "";
		$this->Error = $error;
		return $Valid;
	}
	
	function PrintCareTips()
	{
		$SAWMemberID  = @$_SESSION['SAWMemberID'] ;
		?>
		<div class="ipage makeuptips"><!-- ipage start -->
			<div class="rowhead">
				<h2>עולם הטיפוח</h2>
			</div>		
			<div class="makeuptips_intro">
			<?php
			$SAWProfileType = @$_SESSION['SAWProfileType'] ;
			if($SAWProfileType != 'user')
			{ ?>
				<?php if (isset($_SESSION['SAWMemberID'])) 
				{  ?>
					<div class="makeuptips_intro_row">
						<!-- makeuptips_intro_row start -->
						<h2>הוספת טיפ</h2>
						<form action="care-tips.php" method="POST" enctype="multipart/form-data">
							<textarea name="desc"></textarea>
							<input type="submit" value="OK" class="custom_btn" />
							<input type="hidden" name="mode" value="addtips">
						</form>
					</div>
					<!-- makeuptips_intro_row close -->
				   <?php
				}
			}
			$SQL = "select * from  tips where TipsType = '3'";
			$rs = GetRs($SQL) ;
			$Count = 1 ;
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
								<a href="care-tips.php?mode=removed&tipsid=<?php echo $rw['TipsID'] ?>" class="remove_btn"></a>
						  <?php
						}
						?>
					</div>
					<!-- makeuptips_intro_row close -->
				<?php
				$Count = $Count + 1 ;
			}
			?>
		</div>
		</div>
		<!-- ipage close -->
	<?php	
	}
}
?>