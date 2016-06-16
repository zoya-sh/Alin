<?php
function StartHeader(){
global $Site;
?>	

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- represents a character encoding declaration -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- This stops the user from zooming into your site.-->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	
    <title>Alin-Makeup-Artist</title>
    <!-- faveicon start-  an icon associated with a URL that is variously displayed, as in a browser's address bar or next to the site name in a bookmark list
    <link rel="icon" type="image/png" href="<?php echo $Site->ThemePath ?>images/faveicon.png" sizes="16x16">.-->
    <!-- faveicon close// -->
    <!-- style start -->
    <link href="<?php echo $Site->ThemePath ?>css/style.css" rel="stylesheet" type="text/css" /><!-- css for text  -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $Site->ThemePath ?>css/mainslider.css" /><!-- css for main slider-->
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
               <li class=''><a href='index.php' >דף הבית</a></li>
               <li class=''><a href='#' class="">גלריה</a>
               	<ul>
                	<li><a href="makeup-gallery.php">גלריית איפור</a></li>
                    <li><a href="nails-gallery.php">גלריית ציפורניים</a></li>
                </ul>
               </li>
               <li class=''><a href='#' class="">סדנאות</a>
               	<ul>
                	<li><a href="personal-training.php">סדנה אישית</a></li>
                    <li><a href="group-training.php">סדנה קבוצתית</a></li>
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
                	<li><a href="makeup-artist-profile.php">התחברות</a></li>
                   <?php if(!isset($SAWMemberID)){ ?> <li><a href="join-us.php">הצטרפות</a></li> <?php } ?>
                </ul>
               </li>
               <li class=''><a href='contact-us.php' class="">יצירת קשר</a></li>
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
?>