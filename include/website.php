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


	public $Brands;
	public $Theme;

	public $PerPage;
	public $Sort;
	public $Ord;
	public $View;

	public $DataDir;
	public $DocRoot;

	function Site(){
		//global vars
		global $DataDir;
		global $DocRoot;
		global $ThemeDir;

		$URL = SelfURL();//get url of current php file
		// checks whether a variable - $URL is NULL if nut NULL returns WebsiteID
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
			
			/*$this->PerPage = 16;
			$this->Sort = "ProductName";//This function sorts an array. Elements will be arranged from lowest to highest when this function has completed.
			$this->Ord = "Asc";//Returns the ASCII value of the first character of string.
			$this->View = "grid";
			$this->CartType = "2";
			
			
			//check if website is set
			if (isset($_SESSION['PerPage'])){
				//finds whether a variable is a number or a numeric string
				if (is_numeric($_SESSION['PerPage'])){
					$this->PerPage = $_SESSION['PerPage'];
				}
			}

			if (isset($_SESSION['Sort'])){
				$this->Sort = $_SESSION['Sort'];
			}

			if (isset($_SESSION['Ord'])){
				$this->Ord = $_SESSION['Ord'];
			}

			if (isset($_SESSION['View'])){
				$this->View = $_SESSION['View'];
			}*/

		}
		else {//in case website not set
			echo "<center>No website configured for this domain";
			exit();
		}
	}
}

$Site = new Site();
?>