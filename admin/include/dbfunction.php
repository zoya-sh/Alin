<?php
// finds whether a variable
function GetValue($tn, $sf, $gf, $val, $nf = ""){
	global $db;
	// finds whether a variable is NULL
	if (is_null($val)){
		return "";
	}
	
	$val = "'" . $val . "'";
	//select something (ExRate/symbol) from table where ID=what we search for
	$SQL = "select $gf from $tn where $sf = $val";
	//sends a unique query to the currently active database on the server 
	$rs = @mysql_query($SQL,$db->cnn) or die(mysql_error());
	//Fetch a result row as an associative array
	if (($rw = mysql_fetch_array($rs))){
		return $rw[0];
	}
	else{
		return $nf;
	}
}

//get max id from and ++1 for adding data 
function GetID($tn,$fn){
	global $db;
	$SQL = "select max($fn) from $tn";
	//sends a unique query to the currently active database on the server 
	$rs = @mysql_query($SQL,$db->cnn) or die(mysql_error());
	//Fetch a result row as an associative array
	if (($rw = mysql_fetch_array($rs))){
		return $rw[0]+1;
	}
	else{
		return 1;
	}
}

//make a right string without whitespace (or other characters) 
function GetInStr($sql,$keyfield = "0",$blankvalue = "-1", $Spliter = ","){
	global $db;
	//sends a unique query to the currently active database on the server 
	$rs = @mysql_query($sql,$db->cnn) or die(mysql_error());
	$instr = "";
	//Fetch a result row as an associative array
	while (($rw = mysql_fetch_array($rs))){
		if ($rw[$keyfield] != ""){
			$instr = $instr . $rw[$keyfield] . $Spliter;
		}
	}

	if 	($instr == ""){
		$instr = "$blankvalue";
	}
	// Strip  characters "Spliter" from the beginning and end of a string
	return trim($instr, $Spliter);
}

//check if a value exist on db
function IsValueExist($tn, $sf, $gf, $val, $exp = -1, $cond = "0=0"){
	global $db;
	$val = "'" . $val . "'";
	$exp = "'" . $exp . "'";

	$SQL = "select $gf from $tn where ($sf = $val) and ($cond) and ($gf != $exp)";
	//sends a unique query to the currently active database on the server 
	$rs = @mysql_query($SQL,$db->cnn) or die(mysql_error());
	//Fetch a result row as an associative array
	if (($rw = mysql_fetch_array($rs))){
		return true;
	}
	else{
		return false;
	}
}

//return number of rows
function GetNoOfRec($SQL){
	global $db;
	//sends a unique query to the currently active database on the server 
	$rsCount = @mysql_query($SQL,$db->cnn) or die(mysql_error());
	$NOR = mysql_num_rows($rsCount);
	return $NOR;
}

//get a unique query to the currently active database on the server 
function GetRS($SQL){
	global $db;
	$rs = @mysql_query($SQL,$db->cnn) or die(mysql_error());
	return $rs;
}

//get a location of path(for saving data, getting data)
function LocationPath ($tbl, $sf, $gv, $sv, $url, $qrystring, $var, $classname = "boldtext"){
	$numPath = GetValue($tbl,$sf,"Path",$sv);
	$arrPath = explode(".",$numPath);
	$strP = "";
	while (list($IndexValue, $n) = each($arrPath)){
		$ObjName = GetValue($tbl,$sf,$gv,$n,"");
		if ($ObjName != ""){
			$strP =  "<a href = \"$url?$var=" . (int)$n . "$qrystring\"><span class = \"$classname\">" . $ObjName . "</span></a>  :  " . $strP ;
		}
	}
	return $strP;
}


?>