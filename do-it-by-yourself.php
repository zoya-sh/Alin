<?php
require_once('include/require.php');

$DoItByYourSlef = new DoItByYourSlef(); 

$Mode = ReplaceEmpty("mode","show");
$VideoIDD = ReplaceEmpty("videoid","");


if ($Mode == "addvideo")
{
	if ($DoItByYourSlef->Add())
	{
		SetMsg("$DoItByYourSlef->ObjName added successfully","success");            
        header("Location: ".$Site->AURL."do-it-by-yourself.php");
        exit();             
	}
	else 
	{
	    SetMsg($DoItByYourSlef->Error,"error");           
	}
}
if($Mode=="removed")
{	
	$DoItByYourSlef->Remove($VideoIDD) ;
	SetMsg("$MakupGallery->ObjName removed successfully","success");            
	header("Location: ".$Site->AURL."do-it-by-yourself.php");
	exit(); 
}

StartHeader();
CloseHeader();
StartBody();
PrintTopHeader();
$DoItByYourSlef->PrintDoItByYourSlef();
CloseBody();


Class DoItByYourSlef
{

	function DoItByYourSlef(){}
	
	function Add()
	{
		global $Site  ;
		$SAWMemberID  = @$_SESSION['SAWMemberID'] ;
        if ($this->IsValid())
		{
			$VideoID = GetID("video", "VideoID");
            $DateAdded = date("Y-m-d H:i:s");
            $DateUpdated = $DateAdded;

			$this->Image = "" ;
			/** Create directory **/

			$PushPath = "" ;
			$count = 0  ;
			$valid_formats = array("jpg", "jpeg", "png", "gif", "zip", "bmp");
			$max_file_size = 1024*100; //100 kb
			$path = "video/"; // Upload directory
			
			$ProfilePicFileName1 = GetUploadFileName("profilepic-1", $VideoID.'-1');
			if($ProfilePicFileName1) 
			{
				$name = $_FILES['profilepic-1']['name'] ;
				if ($_FILES['profilepic-1']['error'] == 4) 
				{
					continue; // Skip file if any error found
				}	       
				if ($_FILES['profilepic-1']['error'] == 0) 
				{	
						$name=time().$name;
						// No error found! Move uploaded files 
						if(UploadFile($path .'/'. $name ,'profilepic-1')) 
						{
							$PushPath = $Site->AURL.''.$path.$name ;
							//array_push($PathArray , $PushPath) ;
							$count++; // Number of successfully uploaded files
						}
				}

			}
			if(!empty($_FILES['profilepic-1']['name']))
			{		
				$VideoID = GetID("video", "VideoID");  
				$DateAdded = ""	;
				$SQL = "insert into video (VideoID, Path, MemberID , Type , DateAdded) values ($VideoID, '$PushPath', '$SAWMemberID', '2', '$DateAdded')";
				GetRS($SQL);	
			}
            return true;
        }
        else 
		{
            return false;
        }
    }
	
	function Remove($VideoID = 0)
	{
		$SAWMemberID  = @$_SESSION['SAWMemberID'] ;
		$SQL = "delete from video where VideoID = $VideoID and MemberID = $SAWMemberID";
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
	
	function PrintDoItByYourSlef()
	{
		$SAWMemberID  = @$_SESSION['SAWMemberID'] ;
		
		?>
		<div class="ipage videopage"><!-- ipage start -->
			<div class="rowhead">
				<h2>עשה זאת בעצמך!</h2>
			</div>
			<?php 
			$SAWProfileType = @$_SESSION['SAWProfileType'] ;
			if($SAWProfileType != 'user'){ ?>
			<?php if (isset($_SESSION['SAWMemberID'])) { ?>
			<div class="gallerypage_addnewpic">
				<label>הוספת וידאו</label>
				<form action="do-it-by-yourself.php" method="POST" enctype="multipart/form-data">
				<input type="file" name="profilepic-1" class="custom_input" />
				<input type="submit" value="OK" class="custom_btn" />
				<input type="hidden" name="mode" value="addvideo" >
				</form>
			</div>
			<?php
			}
			}
			?>
			<div class="videopage_intro">
			<?php
			$SQL = "select * from  video";
			$rs = GetRs($SQL) ;
			$Count = 1 ;
			while($rw = mysql_fetch_array($rs)){
			?>
				<div class="videopage_intro_col"><!-- videopage_intro_col start -->
				<video width="100%" height="100%" controls>
				<source src="<?php echo $rw['Path'] ?>" type="video/mp4">
				</video>
				<?php if($SAWMemberID == $rw['MemberID']) { ?><a href="do-it-by-yourself.php?mode=removed&videoid=<?php echo $rw['VideoID'] ?>" class="remove_btn"></a> <?php } ?>
				</div><!-- videopage_intro_col close -->
			<?php
			}
			?>
			<div class="clear"></div>
			</div>
		</div><!-- ipage close -->
		<?php	
	}
}
?>