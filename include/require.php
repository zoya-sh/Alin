<?php
require_once("include/config.php");
require_once("admin/include/db.ini.php");
require_once("admin/include/dbfunction.php");
require_once("admin/include/common.php");
require_once("include/website.php");


if ($Site->Theme != ""){
	require_once($ThemeDir . $Site->Theme . "/layout.php");
}
else{
	require_once("include/layout.php");
}


require_once('mail/class.phpmailer.php');


if (! isset($_SESSION['Currency'])){
	$_SESSION['Currency'] = 1;
}
else {
	$Currency = ReplaceEmpty("currency", $_SESSION['Currency']);
	$_SESSION['Currency'] = $Currency;
}
?>