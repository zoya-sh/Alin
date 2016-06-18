<?php
//pladform for website
class Site {
	public $WebsiteID;//website id	
	public $WebsiteName;//website name
	public $Title;
	public $URL;//website url
	public $CompanyName;//Company Name
	//address and Postcodeof Company
	public $Address1;
	public $Postcode;
	
	//website number
	public $Phone;
	public $Fax;
	public $Email;//email of Company

	public $IsEnable;
	public $Priority;
	public $MetaTitle;
	public $MetaKeyword;

	public $Theme;
	public $DataDir;
	public $DocRoot;

	function Site(){
		//global vars
		global $DataDir;
		global $DocRoot;
		global $ThemeDir;

		$URL = SelfURL();//get url of current php file
		// checks whether a variable - $URL is NULL if not NULL returns WebsiteID
		$this->WebsiteID = GetValue("website", "URL", "WebsiteID", $URL, 1);
		//select our website vars
		$SQL = "select * from website where WebsiteID = $this->WebsiteID";
		//get a unique query to the currently active database on the server 
		$rs = GetRS($SQL);
			
		//Fetch a result row as an associative array
		if ($rw = mysql_fetch_array($rs)){
			//put all the data about the website
			$this->WebsiteID = $rw['WebsiteID'];
			$this->WebsiteName = $rw['WebsiteName'];
			$this->Title = $rw['WebsiteName'];
			$this->URL = $rw['URL'];
			$this->CompanyName = $rw['CompanyName'];
			$this->Address1 = $rw['Address1'];

			$this->Postcode = $rw['Postcode'];
			$this->Phone = $rw['Phone'];
			$this->Fax = $rw['Fax'];
			$this->Email = $rw['Email'];

			$this->IsEnable = $rw['IsEnable'];
			$this->Priority = $rw['Priority'];
			$this->MetaTitle = $rw['MetaTitle'];
			$this->MetaKeyword = $rw['MetaKeyword'];

			$this->Remark = $rw['Remark'];	
			
			//sets dirctions for the path of the website
			$this->Theme = "makeupProject";
			$this->DataDir = $DataDir;// the dir in "theme/"(set on config file)
			$this->DocRoot = $DocRoot;// the project basic dir "/alin-makeup/"(set on config file)
			$this->AURL = trim($URL, "/") . $this->DocRoot;
			// ADataDir-> url/alin-makeup/theme/
			$this->ADataDir = $this->AURL . $this->DataDir;
			// ThemePath-> url/alin-makeup/theme/makeupProject/assets/
			$this->ThemePath = $this->AURL . trim($ThemeDir, "/") . "/" . $this->Theme . "/";
			// AssetPath->url/alin-makeup/theme/makeupProject/assets/
			$this->AssetPath = $this->ThemePath . "assets/";
		}
		else {//in case website not set
			echo "<center>No website configured for this domain";
			exit();
		}
	}
}

$Site = new Site();
?>