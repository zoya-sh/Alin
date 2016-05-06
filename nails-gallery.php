<?php
require_once('include/require.php');

$MakupGallery = new MakupGallery(); 

$Mode = ReplaceEmpty("mode","show");
$MGalleryID = ReplaceEmpty("id","");

if ($Mode == "photoupload")
{
	if ($MakupGallery->Add())
	{
		SetMsg("$MakupGallery->ObjName added successfully","success");            
        header("Location: ".$Site->AURL."nails-gallery.php");
        exit();             
	}
	else 
	{
	    SetMsg($MakupGallery->Error,"error");           
	}
}

if($Mode=="remove")
{
	$MakupGallery->Remove($MGalleryID) ;
	SetMsg("$MakupGallery->ObjName added successfully","success");            
	header("Location: ".$Site->AURL."nails-gallery.php");
	exit(); 
}

StartHeader();
$MakupGallery->InsertMyHead();
CloseHeader();
StartBody();
PrintTopHeader();
$MakupGallery->PrintMakupGallery();
CloseBody();

Class MakupGallery 
{
	function MakupGallery(){}
	
	 function Add()
	 {

		global $Site  ;
		$SAWMemberID  = @$_SESSION['SAWMemberID'] ;
		
        if ($this->IsValid())
		{
			
            $MGalleryID = GetID("mgallery","MGalleryID");
            $DateAdded = date("Y-m-d H:i:s");
            $DateUpdated = $DateAdded;

			$this->Image = "" ;
			/** Create directory **/

			$PushPath = "" ;
			$count = 0  ;
			$valid_formats = array("jpg", "jpeg", "png", "gif", "zip", "bmp");
			$max_file_size = 1024*100; //100 kb
			$path = "photo/"; // Upload directory
			
			$ProfilePicFileName1 = GetUploadFileName("profilepic-1", $MGalleryID.'-1');
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
			$MGalleryID = GetID("mgallery", "MGalleryID");  
			$DateAdded = ""	;
            $SQL = "insert into mgallery (MGalleryID, ImagePath,  MemberID, IsNail , DateAdded) values ($MGalleryID, '$PushPath',  '$SAWMemberID', '2', '$DateAdded')";
            GetRS($SQL);	
			}	
            return true;
        }
        else 
		{
            return false;
        }
    }
	
	function Remove($GID = 0)
	{
		$SAWMemberID  = @$_SESSION['SAWMemberID'] ;
		$SQL = "delete from mgallery where MGalleryID = $GID and IsNail = 2 and MemberID = $SAWMemberID";
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
	
	
	function PrintMakupGallery()
	{
	global $Site;
	$SAWMemberID  = @$_SESSION['SAWMemberID'] ;
	?>
    <div class="ipage gallerypage">
        <!-- ipage start -->
        <?php 
		$SAWProfileType = @$_SESSION['SAWProfileType'] ;
		if($SAWProfileType != 'user'){ ?>
            <?php if (isset($_SESSION['SAWMemberID'])) { ?>
                <div class="gallerypage_addnewpic">
                    <div class="gallerypage_addnewpic">
                        <label>הוספת תמונה</label>
                        <form action="nails-gallery.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="profilepic-1" class="custom_input" />
                            <input type="submit" value="OK" class="custom_btn" />
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
			$rs = GetRs($SQL) ;
			while($rw = mysql_fetch_array($rs)){
			?>
                                <li><span><a href="#" data-title="pic" data-desc="pic" data-src="<?php echo $rw['ImagePath'] ?>"> <img src="<?php echo $rw['ImagePath'] ?>" /> </a>
			</span>
                                    <?php if($SAWMemberID == $rw['MemberID']){ ?>
                                        <a href="<?php echo $Site->AURL ?>nails-gallery.php?mode=remove&id=<?php echo $rw['MGalleryID'] ?>">removed</a>
                                        <?php
			}
			?>
                                </li>
                                <?php
			}
			?>
                        </ul>
                        <div class="clear"></div>
                </div>
                <!-- ipage close -->

                <!-- gallery-script -->
                <script src="<?php echo $Site->ThemePath ?>js/lightGallery.js"></script>
                <script>
                    $(document).ready(function() {
                        $("#lightGallery span").lightGallery({
                            mode: "fade",
                            speed: 800,
                            caption: true,
                            desc: true,
                            mobileSrc: true
                        });
                    });
                </script>
                <!-- gallery-script// -->
                <?php	
	}
	function InsertMyHead()
	{
	global $Site;
	?>
                    <link href="<?php echo $Site->ThemePath ?>css/gallery.css" rel="stylesheet" type="text/css" />
                    <?php	
	}
}
?>