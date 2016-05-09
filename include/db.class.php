<?php
class DB
{
	var $host;
	var $user;
	var $pass;
	var $name;
	var $cnn;
	var $db;

	function DB()
	{
		$this->host = "localhost";
		$this->user = "root";
		$this->pass = "";
		$this->name = "mydelta";
	}
};
?>