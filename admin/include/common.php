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

//check if value is empty
function IfIsNotEmpty($value1, $value2 = ""){
	if ($value1 != ""){
		return $value1 . $value2;
	}
	else{
		return "";
	}
}
//make a simple string without HTML and PHP tags 
function PlainText($Val = ""){
	return trim(strip_tags($Val));
}

//get string without Blank
function GetNonBlank($Val1 = "", $Val2 = ""){
	$tVal1 = PlainText($Val1);//string without HTML and PHP tags 
	$tVal2 = PlainText($Val2);//string without HTML and PHP tags 

	if ($tVal1 != ""){
		return $Val1;
	}
	elseif ($tVal2 != ""){
		return $Val2;
	}
	else {
		return "";
	}
}
function RTFTrim($Val = ""){
	$Val = trim($Val);
	/*Allows use to take some regular expression and replace it with another text,
	preg_quote takes str and puts a backslash in front of every character that is part of the regular expression syntax. This is useful if you have a run-time string that you need to match in some text and the string may contain special regex characters.*/
	$Val = preg_replace('/'.preg_quote('<br>&'.'nbsp;').'$/i', '', $Val);
	$tVal = $Val;
	return utf8_encode($Val);// Encodes string to UTF-8
}

//check if var Available, if so print it
function RefNo($Val = ""){
	if ($Val != ""){
		return "<div style=\"padding:5px\"><b>$Val</b></div>";
	}
	else {
		return "Not Available";
	}
}

function LeadingZero($Value, $NoOfZero = 4){
	return sprintf("%0" . $NoOfZero . "d",$Value);
}
//check  date validation
function IsDateValid($Value,$AllowZeroValue = False) {
	$DateParts = explode(" ", $Value);// Split a string by string ""
	$DateParts = explode("-", $DateParts[0]);// Split a string by DateParts array
	$YYVal = $DateParts[0];//year
	$MMVal = $DateParts[1];//month
	$DDVal = $DateParts[2];//day

	//check if gregorian date is valid
	if ((checkdate($MMVal,$DDVal,$YYVal) == false)){
		if ($AllowZeroValue){
			//if AllowZeroValue Enabled put zeto data
			if ($Value == "0-0-0 00:00:00" || $Value == "0-0-0"){
				return true;
			}
			else {
				return false;
			}
		}//if AllowZeroValue not Enabled put zeto data
		else {
			return false;
		}
	}
	else {
		//if date valid
		return true;
	}
}
//check  email validation
function IsValidEmail($email){
	$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$";
	if (@eregi($pattern, $email)){// return true if the email contains valid pattern
         return true;
	}
	else {
		return false;//not valid email
	}   
}
//get random string mix the string cut it and make uppercase
function GetRandomStr(){
	return strtoupper(substr(str_shuffle('df1sicj3kxcvXSNxm6aOZpqxn9QDlaciw5alaciAg2hakckUI7y'), 0, 8));
}

function FormatCur($value = 0, $cur = 0){
	if ($cur == 0){
		//if Currency is set
		if (isset($_SESSION['Currency'])){
			$cur = $_SESSION['Currency'];
		}//if Currency is not set
		else {
			$cur = 1;
		}
	}
	// finds the variable currency
	$Sym = GetValue("currency", "CurrencyID", "Symbol", $cur, "&pound;");
	return $Sym . FormatAmt($value, $cur);
}

function FormatAmt($value = 0, $cur = 0){
	if ($cur == 0){
		//if Currency is set
		if (isset($_SESSION['Currency'])){
			$cur = $_SESSION['Currency'];
		}
		else {//if Currency is not set
			$cur = 1;
		}
	}
	// finds the variable currency
	$ExRate = GetValue("currency", "CurrencyID", "ExRate", $cur, 1);
	if ($value >= 0){
		return sprintf("%0.2f",($value * $ExRate));
	}
	else{
		return sprintf("%0.2f",((($value * $ExRate) * -1)));
	}
}
 //Get Unix timestamp for a date(July 1, 2000 for mktime(0, 0, 0, 7, 1, 2000))
function SQLToUnixTime($str) { 
    list($date, $time) = explode(' ', $str); // Split a string by date and time
    list($year, $month, $day) = explode('-', $date); // Split a string date for Y-m-d
    list($hour, $minute, $second) = explode(':', $time); // Split a string time for hour, minute, second
     
    $timestamp = @mktime($hour, $minute, $second, $month, $day, $year); //Get Unix timestamp for a date    
    return $timestamp; //return date
} 
//get hidden fields for user such as ID, NAME, VALUE
function GetHiddenFields($qrystring = "", $SkipVar = ""){
	$Rtn = "";
	if ($qrystring != ""){
		$QryStringArray = preg_split("/&/",$qrystring);
		//Count all elements in an array, run on the array
		for ($i=0;$i<count($QryStringArray);$i++){
			$ElementArray = preg_split("/=/",$QryStringArray[$i]);
			if (count($ElementArray) == 2){
				if ($ElementArray[0] != $SkipVar){//put the array elements in string
					$Rtn .= '<input type = "hidden" id = "' . $ElementArray[0] . '" name = "' . $ElementArray[0] . '" value = "' . $ElementArray[1] . '">';
				}
			}
		}
	}
	return $Rtn;//return all the fields
}
//get query string
function GetQryStr($qrystring = "", $SkipVar = ""){
	$Rtn = "";
	if ($qrystring != ""){
		$QryStringArray = preg_split("/&/",$qrystring);
		//Count all elements in an array, run on the array
		for ($i=0;$i<count($QryStringArray);$i++){
			$ElementArray = preg_split("/=/",$QryStringArray[$i]);
			if (count($ElementArray) == 2){
				if ($ElementArray[0] != $SkipVar){//put the array elements in string
					if ($Rtn != "") { $Rtn .= "&"; }
					$Rtn = $Rtn . $ElementArray[0] . "=" . $ElementArray[0];
				}
			}
		}
	}
	return $Rtn;//return query string
}
//get or upload file with arr that have name
function GetUploadFileName($arrayname, $Prefix = "", $Default = ""){
	$filename = $_FILES[$arrayname]['name'];
	if ($filename != ""){ //if there is file with name
		$file_ext = substr($filename, strripos($filename, '.'));//find the number where last "." in filename, and cut string in this langht (take the string without the ".")
		return strtolower($Prefix . $file_ext);//Make a string lowercase
	}
	else {
		return $Default;
	}
}
//true Is File Uploaded else return false
function IsFileUploaded($arrayname){
	$filename = $_FILES[$arrayname]['name'];
	if ($filename != ""){
		return true;
	}
	else {
		return false;
	}
}
//upload file with name filename(file menas gallery photo) from 'profilepic-1 arr with max size 8388608
function UploadFile($filename, $arrayname, $maxsize = 8388608){
	$uploadedfile = $_FILES[$arrayname]['tmp_name'];//name
	$filesize = $_FILES[$arrayname]['size'];//size
	$isremove = ReplaceEmpty("r" . $arrayname, 0);//onkey for artist
	//if sizefile bigger then the maxsize
	if ($filesize > $maxsize){
		return false;
	}
	//file name
	$realname = $filename;
	//if the file were removed
	if ($isremove == 1){
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
					//This function checks to ensure that the file designated by uploadedfile is a valid upload file (meaning that it was uploaded via PHP's HTTP POST upload mechanism). If the file is valid, it will be moved to the filename given by realname.
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
//write data into the file
function WriteToFile($FileName, $Data){
	$openedfile = fopen($FileName, "w");
	fwrite($openedfile, $Data);//write
	fclose($openedfile);//close file
}
//read data from file
function ReadFromFile($FileName){
	return file_get_contents($FileName);//Reads entire file into a string
}
//write data into the file ,if the file is not exist creat it
function InsertLine($FileName, $Data = ""){
	//Open for writing only; place the file pointer at the end of the file. If the file does not exist, attempt to create it. In this mode, fseek() has no effect, writes are always appended.
	$fh = fopen($FileName, 'a') or die("can't open file");
	fwrite($fh, $Data);
	fclose($fh);
}
//In computing, a comma-separated values (CSV) file stores tabular data (numbers and text) in plain text. Each line of the file is a data record. Each record consists of one or more fields, separated by commas. The use of the comma as a field separator is the source of the name for this file format.

//check if the $Value exist in $CSV
function IsValueInCSV($CSV, $Value, $Sep = ","){
	$CSV = trim(trim($CSV), $Sep);
	$Value = trim(trim($Value), $Sep);
	if ($CSV == '' && $Value == ''){
		return false;
	}
	$arrValue = explode($Sep, $CSV);//put the CSV in arr
	if (is_array($arrValue)) {
		//Returns TRUE if var is an array, FALSE otherwise.
		for( $i = 0; $i < sizeof($arrValue); $i++) {
			//if one of arr vale is equal $Value return true
			if ($Value == trim($arrValue[$i])){
				return true;
			}
		}
	}
	else{
		//if not arr and arrValue equal Value return true
		if ($Value == $arrValue){
			return true;
		}
	}
	return false;
}
//add $Value to $CSV
function AddToCSV($CSV, $Value, $IsKeepUnique = True, $Sep = ","){
	$CSV = trim(trim($CSV), $Sep);
	$Value = trim(trim($Value), $Sep);
	if ($CSV == ''){
		return $Value;
	}
	if ($IsKeepUnique){
		if (IsValueInCSV($CSV, $Value)){
			return $CSV;
		}
	}//adding Value if not exist yet
	if ($Value != ''){
		return $CSV . $Sep . $Value;
	}
	else {
		return $CSV;
	}
}
//remove $Value from $CSV
function RemoveFromCSV($CSV, $Value = '', $Sep = ","){
	$CSV = trim(trim($CSV), $Sep);
	$Value = trim(trim($Value), $Sep);
	if ($CSV == ''){
		return $CSV;
	}
	$arrValue = split($Sep, $CSV);//Splits a string into array by regular expression.
	$CSV = '';
	if (is_array($arrValue)) {
		//Returns TRUE if var is an array, FALSE otherwise.
		for( $i = 0; $i < sizeof($arrValue); $i++) {
			$CurrentValue = trim($arrValue[$i]);
			if ($Value != $CurrentValue && $CurrentValue != ''){
				$CSV = $CSV . $Sep . $CurrentValue;
			}
		}
		return trim(trim($CSV), $Sep);
	}
	else {
		if ($value == $arrValue){
			return '';
		}
	}
}
//remove duplicate values from csv
function RemoveDuplicateFromCSV($CSV, $Value = '', $Sep = ","){
    $CSV = trim(trim($CSV), $Sep);
    $Value = trim(trim($Value), $Sep);

    if ($CSV == ''){
        return $CSV;
    }
    $arrValue = split($Sep, $CSV);//Splits a string into array by regular expression.
    if (is_array($arrValue)){
        $arrValue = array_unique($arrValue);//Removes duplicate values from an array 
    }
    return implode(",", $arrValue);//join array elements with a string
}
//makr title with uppercase
function TitleCase($string){ 
	$len=strlen($string); //Get string length
	$i=0; 
	$last= ""; 
	$new= ""; 
	$string=strtoupper($string); //Make a string uppercase
	while ($i<$len){//run on the string
		$char=substr($string,$i,1);//take letter by letter each time
		if (ereg( "[A-Z]",$last)){
			$new.=strtolower($char);//Tokenize string
		}
		else {
			$new.=strtoupper($char); //make char upper case
		}
		$last=$char; 
		$i++; 
	}
	return($new); 
}
//calculate past time(now-start)
function DateDiff($dformat, $endDate, $beginDate){
	$date_parts1=explode($dformat, $beginDate);//cut date to parts
	$date_parts2=explode($dformat, $endDate);//cut date to parts
	$start_date=gregoriantojd($date_parts1[0], $date_parts1[1], $date_parts1[2]);//y-m-d
	$end_date=gregoriantojd($date_parts2[0], $date_parts2[1], $date_parts2[2]);//y-m-d
	return $end_date - $start_date;
}

function EchoArray($array,$return_me=false){
	//not a arr
    if(is_array($array) == false){
        $return = "The provided variable is not an array.";
    }
	else{//an arr
        foreach($array as $name=>$value){//print arr name the values of arr and close arr name
            if(is_array($value)){//if the value is an arr
                $return .= "";
                $return .= "['<b>$name</b>'] {<div style='margin-left:10px;'>\n";
                $return .= EchoArray($value,true);
                $return .= "</div>}";
                $return .= "\n\n";
            }
			else
			{//if value not arr print value
                if(is_string($value)){
                    $value = "\"$value\"";
                }
                $return .= "['<b>$name</b>'] = $value\n\n";
            }
        }
    }
    if($return_me == true){
        return $return;
    }
	else{
        echo "<pre>".$return."</pre>";
    }
}
//return date
function DBDate($Date){
	if ($Date != ""){
		return @date("Y-m-d H:i:s",strtotime($Date));
	}
	else {
		return "";
	}
}
//return date in other format
function UKDate($Date, $Format = "d-M-Y H:i"){
	if ($Date != ""){
		return @date($Format,strtotime($Date));
	}
	else {
		return "";
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

function ReplaceDate($variable, $value){
    $DD = ReplaceEmpty("dd" . $variable, "0");//if empty replace to 0
    $MM = ReplaceEmpty("mm" . $variable, "0");//if empty replace to 0
    $YY = ReplaceEmpty("yy" . $variable, "0");//if empty replace to 0
    $HH = ReplaceEmpty("hh" . $variable, "0");//if empty replace to 0
    $Min = ReplaceEmpty("min" . $variable, "0");//if empty replace to 0
	
	if ($DD == 0 || $MM == 0 || $YY == 0){
		$Rtn = "";
	}
	else {//return Parse English textual datetime description into a Unix timestamp
	    $Rtn = @date("Y-m-d h:i",strtotime($DD . "-" . $MM . "-" . $YY . " " . $HH . ":" . $Min));
	}
    return $Rtn;//return date
}
//return page type name
function Pg($PageName){
	return $PageName;
}
/*This function will turn output buffering on. While output buffering is active no output is sent from the script (other than headers), instead the output is stored in an internal buffer.

The contents of this internal buffer may be copied into a string variable using ob_get_contents(). To output what is stored in the internal buffer, use ob_end_flush(). Alternatively, ob_end_clean() will silently discard the buffer contents.*/
	
//turn on output buffering
function RecordOutput(){
    ob_start();
}
//get back the whole content of your output
function GetOutput(){
    return ob_get_clean();
}

function CheckVal($Val = "0", $Text = ""){
	if ($Val == 1){
		return $Text;
	}
	else {
		return "";
	}
}
//Strip HTML and PHP tags from a string
function AbbrHTML($str, $length, $minword = 3){
	$str = strip_tags($str);
	return Abbr($str, $length, $minword = 3);
}
//Strip HTML and PHP tags from a string
function Abbr($str, $length, $minword = 3)
{
    $sub = '';
    $len = 0;
    foreach (explode(' ', $str) as $word)
    {
        $part = (($sub != '') ? ' ' : '') . $word;
        $sub .= $part;
        $len += strlen($part);
        
        if (strlen($word) > $minword && strlen($sub) >= $length){
            break;
        }
    }
    return ($sub . (($len < strlen($str)) ? '...' : ''));
}

function GetAge($Birthdate){
	// Explode the Birthdate into meaningful variables y-m-d
	list($BirthYear,$BirthMonth,$BirthDay) = explode("-", $Birthdate);
	// Find the differences
	$YearDiff = @date("Y") - $BirthYear;
	$MonthDiff = @date("m") - $BirthMonth;
	$DayDiff = @date("d") - $BirthDay;
	// If the birthday has not occured this year
	if ($DayDiff < 0 || $MonthDiff < 0)
	  $YearDiff--;
	return $YearDiff;
}

function IsValidDate($Value, $AllowZeroValue = False) {
    $DateParts = explode(" ", $Value);//cut Value to parts
    $DateParts = explode("-", $DateParts[0]);

	$YYVal = "0";
	$MMVal = "0";
	$DDVal = "0";
	//check years
	if (isset($DateParts[0])){
		//if it's a number
		if (is_numeric($DateParts[0])){
			$YYVal = $DateParts[0];
		}
	}
	//check month
	if (isset($DateParts[1])){
		//if it's a number
		if (is_numeric($DateParts[1])){
			$MMVal = $DateParts[1];
		}
	}
	//check days
	if (isset($DateParts[2])){
		//if it's a number
		if (is_numeric($DateParts[2])){
			$DDVal = $DateParts[2];
		}
	}
	//if the date has an error put all zero
    if ((checkdate($MMVal,$DDVal,$YYVal) == false)){
        if ($AllowZeroValue){
            if ($Value == "0-0-0 00:00:00" || $Value == "0-0-0" || $Value == ""){
				return true;
            }
            else {
                return false;
            }
        }
        else {return false;}
    }
    else {return true;}
}
/*Preg_match function to check regular expression in front of any text
in out case we check if the url are correct*/
function IsValidURL($URL){
	return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $URL);
}

function GetSlug($Val){
	$Val = @ereg_replace("[^A-Za-z0-9]", "-", $Val);
	$Val = str_replace(" ", "-", $Val);
	$Val = str_replace("--", "-", $Val);
	$Val = str_replace("--", "-", $Val);
	$Val = str_replace("--", "-", $Val);
	$Val = trim($Val, "-");
	return strtolower($Val);
}
//retun yes or no
function YesNo($Val = "0"){
	if ($Val == 1){
		return "Yes";
	}
	else {
		return "No";
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

function IsRemoteFileExists($url) {
    $curl = curl_init($url);
    //don't fetch the actual page, you only want to check the connection is ok
    curl_setopt($curl, CURLOPT_NOBODY, true);
    //do request
    $result = curl_exec($curl);
    $ret = false;
    //if request did not fail
    if ($result !== false) {
        //if request was ok, check response code
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);  

        if ($statusCode == 200) {
            $ret = true;   
        }
    }
    curl_close($curl);
    return $ret;
}


?>