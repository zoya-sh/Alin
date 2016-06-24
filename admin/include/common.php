<?php

//repalce empty Get/Post/Cookie
function ReplaceEmpty($variable,$value){
	//if variable is set
	if (isset($_GET[$variable]))
	{
		//HTTP GET variables
		$rtn = $_GET[$variable];
	}
	//if variable is post
	elseif (isset($_POST[$variable]))
	{
		//HTTP POST variables
		$rtn = $_POST[$variable];
	}
	//if variable is set/post
	else
	{
		//return other value
		$rtn = $value;
	}
	/*check if the magic_quotes state for (Get/Post/Cookie) operations are off. When magic_quotes are on, all ' , " , \ ,NUL's are escaped with a "\" automatically. in the past it was useful to prevent SQL Injection*/	
	if (!get_magic_quotes_gpc()) 
	{
		//if rtn is not a array
		if (! is_array($rtn)){
			//ran addslashes() on all GET, POST, and COOKIE data for escaped (/)
			return @addslashes($rtn);
		}
		else 
		{//array
			return $rtn;
		}	
	}
	else //magic_quotes state for (Get/Post/Cookie) operations are on
	{
		return $rtn;
	}
}

//check email validation
function IsValidEmail($email){
	$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$";
	if (@eregi($pattern, $email)){// return true if the email contains valid pattern
         return true;
	}
	else {
		return false;//not valid email
	}   
}

//get or upload file with arr that have name
function GetUploadFileName($arrayname, $Prefix = "", $Default = ""){
	$filename = $_FILES[$arrayname]['name'];
	//if there is file with name
	if ($filename != ""){ 
		//find the number where last "." in filename, and cut string in this langht (take the string without the ".")
		$file_ext = substr($filename, strripos($filename, '.'));
		return strtolower($Prefix . $file_ext);//Make a string lowercase
	}
	else {
		return $Default;
	}
}

//upload file with name filename(file menas gallery photo) from 'profilepic-1 arr with max size 8388608
function UploadFile($filename, $arrayname, $maxsize = 314572800){
	$uploadedfile = $_FILES[$arrayname]['tmp_name'];//Temporary file name on srver
	$filesize = $_FILES[$arrayname]['size'];//Size of the file in bytes
	$isremove = ReplaceEmpty("r" . $arrayname, 0);//only for artist
	//if filesize bigger then the maxsize
	if ($filesize > $maxsize){
		return false;
	}
	//file real name
	$realname = $filename;
	//if the file were removed
	if ($isremove == 1){
		//file a file/directory not exists or file is NULL
		if ((! file_exists($realname)) || is_null($realname)) {
		}
		else {
			unlink($realname);//delete the file
		}
		return true;
	}
	else {//if the file exist
		if ($uploadedfile != ""){
			//return true if the file named by uploadedfile was uploaded via HTTP POST.
			if (is_uploaded_file($uploadedfile)){
				if ($filesize > 0){
					//This function checks to ensure that the file designated by uploadedfile is a valid upload file (meaning that it was uploaded via PHP's HTTP POST upload mechanism). 
					//If the file is valid, it will be moved to the filename given by realname.
					move_uploaded_file($uploadedfile, $realname);
					return true;
				}
			}
			else{	
				return false;}
		}
		else {
			return true;}
	}
}

//show message
function ShowMsg($Msg = "", $MsgType = "info", $Index = "default"){

	if ($Msg == ""){
		if (isset($_SESSION['sewamsg'][$Index]))
		{ 
			//if the message is set           
			$Msg = $_SESSION['sewamsg'][$Index];
			if ($_SESSION['sewamsgtype'][$Index] != ""){
				//type of the message(error,info..)
				$MsgType = $_SESSION['sewamsgtype'][$Index];
			}
			SetMsg("","",$Index);
		}
		else {
			SetMsg("","",$Index);
		}
	}
	//print message and message type
	if ($Msg != ""){
		?>
		<div id = "inf_info" class="inf_<?php echo $MsgType ?>"><?php echo $Msg ?></div>
		<?php
	}
}

//set the message
function SetMsg($Msg = "", $MsgType = "info", $Index = "default"){
	$_SESSION['sewamsg'][$Index] = $Msg;
	$_SESSION['sewamsgtype'][$Index] = $MsgType;
}

//if the str len is valid(string<=255)
function IsValidStr($Value, $MaxLength = 255){
	if (strlen(trim($Value)) > 0 && strlen(trim($Value)) <= 255){
		return true;
	}
	else {
		return false;
	}
}

//returns all full url (include: server name + port+ serverrequri)
function SelfURL(){
	//SERVER['REQUEST_URI'] will hold the full request path including the querystring
    if(!isset($_SERVER['REQUEST_URI'])){
        $serverrequri = $_SERVER['PHP_SELF'];//Returns the filename of the currently executing script
    }else{
        $serverrequri =    $_SERVER['REQUEST_URI'];//give the url of website
    }
	
	$serverrequri = "/CodeIgniter/";
	$serverrequri = "/";
	// if https=on return s , if https not empty return s otherwise ""
    $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
	//finds the position of the first / of a substring in a string and returns $_SERVER["SERVER_PROTOCOL"] till / +$s
    $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;//take the protocol name
    $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);//finds the port
	//returns: server name + port+ url
    return $protocol."://".$_SERVER['SERVER_NAME'].$port.$serverrequri; 
}

//finds part of the string where s1 begins ti firt /
function strleft($s1, $s2) {
	//finds part of the string where s1 begins ti firt /
	return substr($s1, 0, strpos($s1, $s2));
}

?>