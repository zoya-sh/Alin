<?php
// Check that the class DB not exists before trying to use it

if (!(class_exists('DB')))
{
       require("include/db.class.php");
}
$db = new DB;
$db->host = "localhost";
$db->user = "root";
$db->pass = "";
$db->name = "alinmakeup";
//Open a connection to a MySQL Server
$db->cnn = mysql_connect("$db->host", "$db->user", "$db->pass") or die();
// Set definition data to support Hebrew
mysql_set_charset('utf8',$db->cnn);
$db->db = @mysql_select_db($db->name, $db->cnn) or die(mysql_error());
