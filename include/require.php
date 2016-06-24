<?php
require_once("include/config.php");//include session_start function for saving user data
require_once("admin/include/db.ini.php");//data base init file
require_once("admin/include/dbfunction.php");//data base functions
require_once("admin/include/common.php");//simple check function for valedation
require_once("include/website.php");//website varibals

//load website layout 
if ($Site->Theme != ""){
	require_once($ThemeDir . $Site->Theme . "/layout.php");//folder theme on website file layout
}
else{
	require_once("include/layout.php");
}

//for mail functions
require_once('mail/class.phpmailer.php');

//set current session if the session is empty
if (! isset($_SESSION['Currency'])){
	$_SESSION['Currency'] = 1;//if current session not set..will set it to "1"
}
else {//if Currency session is set..will set it to "!"
	$Currency = ReplaceEmpty("currency", $_SESSION['Currency']);//if currency is empty will est the Currency session
	$_SESSION['Currency'] = $Currency;
}
?>