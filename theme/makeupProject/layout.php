<?php
function StartHeader(){
global $Site;
?>	

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Alin-Makeup-Artist</title>
    <!-- faveicon start -->
    <link rel="icon" type="image/png" href="<?php echo $Site->ThemePath ?>images/faveicon.png" sizes="16x16">
    <!-- faveicon close// -->
    <!-- style start -->
    <link href="<?php echo $Site->ThemePath ?>css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $Site->ThemePath ?>css/mainslider.css" />
    <link href="<?php echo $Site->ThemePath ?>css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $Site->ThemePath ?>css/loader.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $Site->ThemePath ?>css/responsive.css" rel="stylesheet" type="text/css" />
    <!-- style close// -->
    
    <!-- main-script -->
	<script src="<?php echo $Site->ThemePath ?>js/jquery.min.js"></script>
    <!-- main-script// -->
    
    <!-- responsive menu -->
    <script src="<?php echo $Site->ThemePath ?>js/menuscript.js "></script>
    <!-- responsive menu// -->
<?php	
}
function CloseHeader(){
?>	
</head>
<?php	
}
function StartBody(){
?>
<body>
<div class="maincontainer">
<?php
}
function PrintTopHeader(){
global $Site;
global $SAWMemberID;
$SAWMemberID  = @$_SESSION['SAWMemberID'] ;
?>		
<div class="header"><!-- header start -->
		<div class="logo"><a href="index.php"><img src="<?php echo $Site->ThemePath ?>images/logo.png" alt="" /></a></div>
        <div id='menu'><!-- menu start -->
            <ul>
               <li class=''><a href='index.php' class="menuactive">דף הבית</a></li>
               <li class=''><a href='#' class="">גלריה</a>
               	<ul>
                	<li><a href="makeup-gallery.php">איפור</a></li>
                    <li><a href="nails-gallery.php">ציפורניים</a></li>
                </ul>
               </li>
               <li class=''><a href='#' class="">סדנאות</a>
               	<ul>
                	<li><a href="personal-training.php">סדנא אישית</a></li>
                    <li><a href="group-training.php">סדנא קבוצתית</a></li>
                    <li><a href="evenings-activity.php">ערבי פעילות</a></li>
                </ul>
               </li>
               <li class=''><a href='#' class="">טיפים</a>
               	<ul>
                	<li><a href="makeup-tips.php">עולם האיפור</a></li>
                    <li><a href="nails-tips.php">עולם הציפורניים</a></li>
                    <li><a href="care-tips.php">עולם הטיפוח</a></li>
                </ul>
               </li>
               <li class=''><a href='do-it-by-yourself.php' class="">עשה בעצמך!</a></li>
               <li class=''><a href='makeup-artist-profile.php' class="">פרופיל</a>
               	<ul>
                	<li><a href="makeup-artist-profile.php">התחבר</a></li>
                   <?php if(!isset($SAWMemberID)){ ?> <li><a href="join-us.php">הצטרף</a></li> <?php } ?>
                </ul>
               </li>
               <li class=''><a href='contact-us.php' class="">צור קשר</a></li>
            </ul>
        </div><!-- menu close// -->
	</div><!-- header close -->
<?php	
}
function PrintHPSlider(){
global $Site;
?>	
<div class="mainslider"><!-- mainslider start -->
        <div class="banner">
            <div class="container">
                <!-- img slider -->
                <div class="img-slider">
                        <!-- start slider script -->
                    <script src="<?php echo $Site->ThemePath ?>js/main-slider/responsiveslides.min.js"></script>
                     <script>
                        // You can also use "$(window).load(function() {"
                        $(function () {
                          // Slideshow 4
                          $("#slider4").responsiveSlides({
                            auto: true,
                            pager: true,
                            nav:true,
                            speed: 1000,
                            namespace: "callbacks",
                            before: function () {
                              $('.events').append("<li>before event fired.</li>");
                            },
                            after: function () {
                              $('.events').append("<li>after event fired.</li>");
                            }
                          });
                    
                        });
                      </script>
                    <!-- End slider script // -->
                    <!-- Slideshow 4 -->
                    <div  id="top" class="callbacks_container">
                      <ul class="rslides" id="slider4">
                        <li>
                          <img class="img-responsive" src="<?php echo $Site->ThemePath ?>images/slider_pic1.jpg" alt="">
                          <div class="slider-caption"><!-- slider-caption start --></div><!-- slider-caption close// -->
                        </li>
                        <li>
                          <img class="img-responsive" src="<?php echo $Site->ThemePath ?>images/slider_pic2.jpg" alt="">
                          <div class="slider-caption"><!-- slider-caption start --></div><!-- slider-caption close// -->
                        </li>
                        <li>
                          <img class="img-responsive" src="<?php echo $Site->ThemePath ?>images/slider_pic3.jpg" alt="">
                          <div class="slider-caption"><!-- slider-caption start --></div><!-- slider-caption close// -->
                        </li>
                        <li>
                          <img class="img-responsive" src="<?php echo $Site->ThemePath ?>images/slider_pic4.jpg" alt="">
                          <div class="slider-caption"><!-- slider-caption start --></div><!-- slider-caption close// -->
                        </li>
                        <li>
                          <img class="img-responsive" src="<?php echo $Site->ThemePath ?>images/slider_pic5.jpg" alt="">
                          <div class="slider-caption"><!-- slider-caption start --></div><!-- slider-caption close// -->
                        </li>
                      </ul>
                    </div>
                    <div class="clear"></div>
                </div>   
            </div>
        </div>
    </div><!-- mainslider close -->
<?php	
}
function CLoseBody(){
?>	
</div>
</body>
<?php	
}
function watermark_text($oldimage_name, $new_image_name){
    global $font_path, $font_size, $water_mark_text_1, $water_mark_text_2;
	$image_path = "";
	$font_path = "";
	$font_size = 15;  // in pixcels
	//$water_mark_text_1 = "9";
	$water_mark_text_2 = "";
    list($owidth,$oheight) = getimagesize($oldimage_name);
    $width = $owidth ;    
    $height = $oheight ;  
    $image = imagecreatetruecolor($width, $height);
    $image_src = imagecreatefromjpeg($oldimage_name);
    imagecopyresampled($image, $image_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
   // $black = imagecolorallocate($image, 0, 0, 0);
    $blue = imagecolorallocate($image, 79, 166, 185);
   // imagettftext($image, $font_size, 0, 30, 190, $black, $font_path, $water_mark_text_1);
    imagettftext($image, $font_size, 0, 68, 190, $blue, $font_path, $water_mark_text_2);
    imagejpeg($image, $new_image_name, 100);
    imagedestroy($image);
    unlink($oldimage_name);
    return true;
}
?>
