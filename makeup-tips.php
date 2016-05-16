<?php
require_once('include/require.php');

$MakeupTips = new MakeupTips(); 

$Mode = ReplaceEmpty("mode","show");
$MackupTipsID = ReplaceEmpty("tipsid","");


if ($Mode == "addtips")
{
	if ($MakeupTips->Add())
	{
		SetMsg("$MakeupTips->ObjName added successfully","success");            
        header("Location: ".$Site->AURL."makeup-tips.php");
        exit();             
	}
	else 
	{
	    SetMsg($MakeupTips->Error,"error");           
	}
}
if($Mode=="removed")
{
	$MakeupTips->Remove($MackupTipsID) ;
	SetMsg("$MakupGallery->ObjName removed successfully","success");            
	header("Location: ".$Site->AURL."makeup-tips.php");
	exit(); 
}

StartHeader();
CloseHeader();
StartBody();
PrintTopHeader();
$MakeupTips->PrintMakeupTips();
CloseBody();


Class MakeupTips 
{
	function MakeupTips(){}
	
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
						
            $SQL = "insert into tips (TipsID , `Desc`, TipsType , MemberID , DateAdded) values ($TipsID , '$Desc' , '1' , '$SAWMemberID' , '$DateAdded')";		
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
		//$SQL = "delete from tips where TipsID = $TipsID and TipsType = 1 and MemberID = '$SAWMemberID'";
		$SQL = "delete from tips where TipsID = $TipsID and TipsType = 1 and MemberID = $SAWMemberID";
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
	
	function PrintMakeupTips()
	{
		$SAWMemberID  = @$_SESSION['SAWMemberID'] ;
		//global $Site ;
		?>
		<div class="ipage makeuptips"><!-- ipage start -->
			<div class="rowhead">
				<h2>עולם האיפור</h2>
			</div>
			<?php 
			$SAWProfileType = @$_SESSION['SAWProfileType'] ;
			if($SAWProfileType != 'user')
			{ ?>
				<?php if (isset($_SESSION['SAWMemberID'])) 
				{  ?>
					<div class="makeuptips_intro">
					<div class="makeuptips_intro_row"><!-- makeuptips_intro_row start -->
						<h2>הוספת טיפ</h2>
						<form action="makeup-tips.php" method="POST" enctype="multipart/form-data">
							<textarea name="desc"></textarea>
							<input type="submit" value="OK" class="custom_btn" />
							<input type="hidden" name="mode" value="addtips" >
						</form>
					</div>
					<!-- makeuptips_intro_row close -->
				   <?php
				}
			}
			$SQL = "select * from  tips where TipsType = '1'";
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
								<a href="makeup-tips.php?mode=removed&tipsid=<?php echo $rw['TipsID'] ?>" class="remove_btn"></a>
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