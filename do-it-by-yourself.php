<?php
require_once('include/require.php');

$DoItByYourSlef = new DoItByYourSlef(); 
$Mode = ReplaceEmpty("mode","show");
$VideoID = ReplaceEmpty("videoid","");

//if the video has been successfully added
if ($Mode == "addvideo")
{
	//add video successfully
	if ($DoItByYourSlef->Add())
	{
		SetMsg("<b><font color=red>$DoItByYourSlef->ObjName סרטון נוסף בהצלחה</b></font>","success");           
        header("Location: ".$Site->AURL."do-it-by-yourself.php");
        exit();             
	}
	else 
	{
	    SetMsg($DoItByYourSlef->Error,"error");           
	}
}
//delete video from the gallery
if($Mode=="removed")
{	
	//removed video successfully
	$DoItByYourSlef->Remove($VideoID) ;
	SetMsg("<b><font color=red>$DoItByYourSlef->ObjName סרטון הוסר בהצלחה</b></font>","success");        
	header("Location: ".$Site->AURL."do-it-by-yourself.php");
	exit(); 
}

StartHeader();//view of page with the logo
CloseHeader();//close of header
StartBody();//middle of page
PrintTopHeader();//tollbar of the page
$DoItByYourSlef->PrintDoItByYourSlef();
CloseBody();//close body

Class DoItByYourSlef
{
	function DoItByYourSlef(){}
	//add new video
	function Add()
	{
		global $Site;
		$SAWMemberID = @$_SESSION['SAWMemberID'];
        
		if ($this->IsValid())
		{
			$VideoID = GetID("video", "VideoID");//id number of video
            $DateAdded = date("Y-m-d H:i:s");
            $DateUpdated = $DateAdded;

			/** Creating a path to upload video **/
			$PushPath = "" ;
			$count = 0  ;
			$path = "video/"; //path to save video
			
			//our PHP file named "profilepic-1" automatically entered into a global super variable named $_FILES
			$ProfilePicFileName1 = GetUploadFileName("profilepic-1", $VideoID.'-1');
			if($ProfilePicFileName1) 
			{
				//every $_FILES has array that include: File name, file type, its size and directory
				$name = $_FILES['profilepic-1']['name'] ;//The original name of the file on the client machine(our case video name)
				if ($_FILES['profilepic-1']['error'] == 4) //The error code associated with "profilepic-1" file upload.
				{
					continue; //Skip file if any error found
				}
				//if there is no error code associated with "profilepic-1" file upload.				
				if ($_FILES['profilepic-1']['error'] == 0) 
				{	
						$name=time().$name;
						// No error found! Move uploaded files 
						if(UploadFile($path .'/'. $name ,'profilepic-1')) 
						{
							$PushPath = $Site->AURL.''.$path.$name ;
							$count++; // Number of successfully uploaded files
						}
				}
			}
			//if videos uploaded to the path successfully we saved them on dataBase
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
	//delete video from data-base
	function Remove($VideoID = 0)
	{
		$SAWMemberID  = @$_SESSION['SAWMemberID'] ;
		$SQL = "delete from video where VideoID = $VideoID and MemberID = $SAWMemberID";
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
	//show video Gallery
	function PrintDoItByYourSlef()
	{
		global $Site;
		$SAWMemberID = @$_SESSION['SAWMemberID'];
	?>
	<div class="ipage videopage"><!-- ipage start -->
		<div class="rowhead">
			<h2>עשה זאת בעצמך!</h2>
		</div>
		<?php echo ShowMsg() ?>
		<?php //only if it's makeup artist she can add or remove video from gallery
		$SAWProfileType = @$_SESSION['SAWProfileType'] ;
		if($SAWProfileType != 'user')
		{ ?>
			<?php if (isset($_SESSION['SAWMemberID'])) 
			{ ?>
				<div class="gallerypage_addnewpic">
					<label>הוספת וידאו</label>
					<!--the  method is post, the action of upload video is on do-it-by-yourself.php-->
					<form action="do-it-by-yourself.php" method="POST" enctype="multipart/form-data">
					<!--the input kind is file that we want to upload to our server, the file name "profilepic-1" -->
						<input type="file" name="profilepic-1" class="custom_input" />
						<input type="submit" value="אישור" class="custom_btn" />
						<input type="hidden" name="mode" value="addvideo" >
					</form>
				</div>
			   <?php
			}
		}
		?>
		<ul class="videopage_intro">
		<?php
			$SQL = "select * from  video";
			$rs = GetRs($SQL) ;
			$Count = 0 ;
			while($rw = mysql_fetch_array($rs))
			{
				$Count = $Count + 1;
		?>	
				<div class="videopage_intro_col"><!-- videopage_intro_col start , video type mp4-->
				<video width="100%" height="100%" controls>
					<source src="<?php echo $rw['Path'] ?>" type="video/mp4"></video>
				<?php if($SAWMemberID == $rw['MemberID']) 
				{ ?>
					<!-- remove butten -->
					<a href="do-it-by-yourself.php?mode=removed&videoid=<?php echo $rw['VideoID'] ?>" class="remove_btn"></a> 
				<?php 
				} 
				?>
				</div> <!-- videopage_intro_col close -->
				<?php
				//only 2 video in line
				if($Count%2 ==0)
				{	
					echo "<p style='clear: both;'></p>";
				}
			}
			?>
		</ul>
		<div class="clear"></div>
	</div><!-- ipage close -->
	<?php	
	}
}
?>