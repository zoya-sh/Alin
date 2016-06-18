<?php
// finds whether a variable is NULL if not NULL returns variable ID
function GetValue($table, $var, $id, $input_val, $nf = ""){
	global $db;
	// finds whether a variable is NULL
	if (is_null($input_val)){
		return "";
	}
	
	$input_val = "'" . $input_val . "'";
	//select something (ExRate/symbol) from table where ID=what we search for
	$SQL = "select $id from $table where $var = $input_val";
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

//get max id number from table, increments one for adding new data 
function GetID($table,$id){
	global $db;
	$SQL = "select max($id) from $table";
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

//check if a value(email/name) exist on db
function IsValueExist($table, $value, $id, $input, $exp = -1, $cond = "0=0"){
	global $db;
	$input = "'" . $input . "'";
	$exp = "'" . $exp . "'";

	$SQL = "select $id from $table where ($value = $input) and ($cond) and ($id != $exp)";
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

//get a unique query to the currently active database on the server 
function GetRS($SQL){
	global $db;
	$rs = @mysql_query($SQL,$db->cnn) or die(mysql_error());
	return $rs;
}

?>