<?php
require_once('include/require.php');

$NailsTips = new NailsTips(); 

$Mode = ReplaceEmpty("mode","show");
$NailsTipsID = ReplaceEmpty("tipsid","");


if ($Mode == "addtips")
{
	if ($NailsTips->Add())
	{
		SetMsg("$NailsTips->ObjName added successfully","success");            
        header("Location: ".$Site->AURL."nails-tips.php");
        exit();             
	}
	else 
	{
	    SetMsg($NailsTips->Error,"error");           
	}
}
if($Mode=="removed")
{
	$NailsTips->Remove($NailsTipsID) ;
	SetMsg("$MakupGallery->ObjName removed successfully","success");            
	header("Location: ".$Site->AURL."nails-tips.php");
	exit(); 
}

StartHeader();
CloseHeader();
StartBody();
PrintTopHeader();
$NailsTips->PrintNailsTips();
CloseBody();


Class NailsTips {

	function NailsTips(){}
	
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
			
            $SQL = "insert into tips (TipsID , `Desc`, TipsType , MemberID , DateAdded) values ($TipsID , '$Desc' , '2' , '$SAWMemberID' , '$DateAdded')";
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
		//$SQL = "delete from tips where TipsID = $TipsID and TipsType = 2 and MemberID  = '$SAWMemberID'";
		$SQL = "delete from tips where TipsID = $TipsID and TipsType = 2 and MemberID  = $SAWMemberID";
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
	
	function PrintNailsTips()
	{
		$SAWMemberID  = @$_SESSION['SAWMemberID'] ;
		//global $Site ;
		?>
		<div class="ipage makeuptips"><!-- ipage start -->
			<div class="rowhead">
				<h2>עולם הציפורניים</h2>
			</div>
			<?php
			$SAWProfileType = @$_SESSION['SAWProfileType'] ;
			if($SAWProfileType != 'user')
			{ ?>
				<?php if (isset($_SESSION['SAWMemberID'])) 
				{  ?>
					<div class="makeuptips_intro_row">
						<!-- makeuptips_intro_row start -->
						<h2>הוספת טיפ</h2>
						<form action="nails-tips.php" method="POST" enctype="multipart/form-data">
							<textarea name="desc"></textarea>
							<input type="submit" value="OK" class="custom_btn" />
							<input type="hidden" name="mode" value="addtips">
						</form>
					</div>
					<!-- makeuptips_intro_row close -->
				   <?php
				}
			}
			$SQL = "select * from  tips where TipsType = '2'";
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
								<a href="nails-tips.php?mode=removed&tipsid=<?php echo $rw['TipsID'] ?>" class="remove_btn"></a>
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