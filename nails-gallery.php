<?php
require_once('include/require.php');

$NailsGallery = new NailsGallery(); 
$Mode = ReplaceEmpty("mode","show");
$MGalleryID = ReplaceEmpty("id","");

//add photo to the gallery
if ($Mode == "photoupload")
{
	//add photo successfully
	if ($NailsGallery->Add())
	{
		SetMsg("<b><font color=red>$NailsGallery->ObjName תמונה נוספה בהצלחה</b></font>","success");             
        header("Location: ".$Site->AURL."nails-gallery.php");
        exit();             
	}
	else 
	{
	    SetMsg($NailsGallery->Error,"error");           
	}
}
//delete photo from the gallery
if($Mode=="remove")
{
	//removed photo successfully
	$NailsGallery->Remove($MGalleryID);
	SetMsg("<b><font color=red>$NailsGallery->ObjName תמונה הוסרה בהצלחה</b></font>","success");               
	header("Location: ".$Site->AURL."nails-gallery.php");
	exit(); 
}

StartHeader();//view of page with the logo
$NailsGallery->InsertMyHead();//add link to gallery.css file
CloseHeader();//close of header
StartBody();//middle of page
PrintTopHeader();//tollbar of the page
$NailsGallery->PrintNailsGallery();
CloseBody();//close body

Class NailsGallery 
{
	function NailsGallery(){}
	//add photo to the gallery
	function Add()
	{
		global $Site;
		$SAWMemberID = @$_SESSION['SAWMemberID'];
		
        if ($this->IsValid())
		{	
            $MGalleryID = GetID("mgallery","MGalleryID");//id number of photo
            $DateAdded = date("Y-m-d H:i:s");
            $DateUpdated = $DateAdded;
			
			/** Creating a path to upload photos **/
			$PushPath = "";
			$count = 0;
			$path = "photo/nailsGallery/"; //path to save photos
			
			//our PHP file named "profilepic-1" automatically entered into a global super variable named $_FILES
			$ProfilePicFileName1 = GetUploadFileName("profilepic-1", $MGalleryID.'-1');
			if($ProfilePicFileName1) 
			{
				//every $_FILES has array that include: File name, file type, its size and directory
				$name = $_FILES['profilepic-1']['name'] ;//The original name of the file on the client machine(our case photo name)
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
							$PushPath = $Site->AURL.''.$path.$name ;//push photo to directory
							$count++; // Number of successfully uploaded files
						}
				}
			}
			//if photos web uploaded to the directory successfully we saved them on dataBase
			if(!empty($_FILES['profilepic-1']['name']))
			{	
				$MGalleryID = GetID("mgallery", "MGalleryID");  
				$DateAdded = "";
				$SQL = "insert into mgallery (MGalleryID, ImagePath, MemberID, IsNail , DateAdded) values ($MGalleryID, '$PushPath', '$SAWMemberID', '2', '$DateAdded')";
				GetRS($SQL);	
			}	
            return true;
        }
        else 
		{
            return false;
        }
    }
	//delete nalis photos from dataBase
	function Remove($GID = 0)
	{
		$SAWMemberID = @$_SESSION['SAWMemberID'];//IsNail = 2 for nail gallery
		$SQL = "delete from mgallery where MGalleryID = $GID and IsNail = 2 and MemberID = $SAWMemberID";
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
	//Print nails Gallery
	function PrintNailsGallery()
	{
		global $Site;
		$SAWMemberID = @$_SESSION['SAWMemberID'];
	?>
    <div class="ipage gallerypage">
        <!-- ipage start -->
		<?php echo ShowMsg() ?>
        <?php //only if it's makeup artist e can add or remove photo from gallery
		$SAWProfileType = @$_SESSION['SAWProfileType'];
		if($SAWProfileType != 'user')
		{ ?>
            <?php if (isset($_SESSION['SAWMemberID'])) 
			{ ?>
                <div class="gallerypage_addnewpic">
                    <label>הוספת תמונה</label>
					<!--the  method is post, the action of upload photo is on nails-gallery.php -->
                    <form action="nails-gallery.php" method="POST" enctype="multipart/form-data">
					<!--the input kind is file that we want to upload to our server, the file name "profilepic-1" -->
                        <input type="file" name="profilepic-1" class="custom_input" />
                        <input type="submit" value="אישור" class="custom_btn" />
                        <input type="hidden" name="mode" value="photoupload">
                    </form>
                </div>
               <?php
			}
		}
		?>
		<ul id="lightGallery" class="gallery">
        <?php
			$SQL = "select * from  mgallery where IsNail = 2";
			$rs = GetRs($SQL);
			$Count  = 0;
			while($rw = mysql_fetch_array($rs))
			{
				$Count = $Count + 1;
		?>
				<li><span><a href="#" data-title="" data-desc="" data-src="<?php echo $rw['ImagePath'] ?>"> <img src="<?php echo $rw['ImagePath'] ?>" /> </a></span>
				<?php if($SAWMemberID == $rw['MemberID'])
				{ ?>
					<a href="<?php echo $Site->AURL ?>nails-gallery.php?mode=remove&id=<?php echo $rw['MGalleryID'] ?>">הסרה</a>
				<?php
				}
				?>
				</li>
				<?php
				//only 5 photo in line
				if($Count%5 ==0)
				{	
					echo "<p style='clear: both;'></p>";
				}
			}
			?>
        </ul>
        <div class="clear"></div>
        </div><!-- ipage close -->
			<!-- gallery-script -->
            <script src="<?php echo $Site->ThemePath ?>js/lightGallery.js"></script>
            <script>
				$(document).ready(function() {
					$("#lightGallery span").lightGallery({
						mode:"fade",
						speed:800,
						caption:true,
						desc:true,
						mobileSrc:true
					});
				});
			</script>
            <!-- gallery-script -->
            <?php	
	}
	//add link to gallery.css file
	function InsertMyHead()
	{
		global $Site;
		?>
        <link href="<?php echo $Site->ThemePath ?>css/gallery.css" rel="stylesheet" type="text/css" />
        <?php	
	}
}
?>