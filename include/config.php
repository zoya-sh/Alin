<?php
/*This function "session_start()" - PHP checks whether the user has a Cookie
If not -> the function creates for the user a cookie 
If yes -> php goes to its internal storage place and looking for all the data about this user.
all the data writen on a special variable: $ _SESSION*/
session_start();
$PerPage = 10;
$DocRoot = "/alin-makeup/";
$ThemeDir = "theme/";
?>