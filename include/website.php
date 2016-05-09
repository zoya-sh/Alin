<?php
class Site {
	public $WebsiteID;	
	public $WebsiteName;
	public $Title;
	public $URL;
	public $CompanyName;
	public $Address1;
	public $Address2;
	public $Address3;
	public $Postcode;
	public $Phone;
	public $Fax;
	public $Email;
	public $Image1;
	public $Image2;
	public $Image3;
	public $ShortDesc;
	public $DetailDesc;
	public $IsEnable;
	public $Priority;
	public $MetaTitle;
	public $MetaKeyword;
	public $MetaText;

	public $Brands;
	public $Theme;

	public $PerPage;
	public $Sort;
	public $Ord;
	public $View;
	public $GoogleAnalyticsCode;


	public $DataDir;
	public $DocRoot;

	function Site(){
		global $DataDir;
		global $DocRoot;
		global $ThemeDir;

		$URL = SelfURL();

		$this->WebsiteID = GetValue("website", "URL", "WebsiteID", $URL, 1);

		$SQL = "select * from website where WebsiteID = $this->WebsiteID";
		$rs = GetRS($SQL);
			
		if ($rw = mysql_fetch_array($rs)){
			$this->WebsiteID = $rw['WebsiteID'];
			$this->WebsiteName = $rw['WebsiteName'];
			$this->Title = $rw['WebsiteName'];
			$this->URL = $rw['URL'];
			$this->CompanyName = $rw['CompanyName'];
			$this->Address1 = $rw['Address1'];
			$this->Address2 = $rw['Address2'];
			$this->Address3 = $rw['Address3'];
			$this->Postcode = $rw['Postcode'];
			$this->Phone = $rw['Phone'];
			$this->Fax = $rw['Fax'];
			$this->Email = $rw['Email'];
			$this->Image1 = $rw['Image1'];
			$this->Image2 = $rw['Image2'];
			$this->Image3 = $rw['Image3'];
			$this->ShortDesc = $rw['ShortDesc'];
			$this->DetailDesc = $rw['DetailDesc'];
			$this->IsEnable = $rw['IsEnable'];
			$this->Priority = $rw['Priority'];
			$this->MetaTitle = $rw['MetaTitle'];
			$this->MetaKeyword = $rw['MetaKeyword'];
			$this->MetaText = $rw['MetaText'];
			$this->Remark = $rw['Remark'];	
			$this->GoogleVerifyCode = $rw['GoogleVerifyCode'];	
			$this->GoogleAnalyticsCode = $rw['GoogleAnalyticsCode'];	

		
			$this->Theme = "makeupProject";
			$this->DataDir = $DataDir;
			$this->DocRoot = $DocRoot;
			$this->AURL = trim($URL, "/") . $this->DocRoot;
			$this->ADataDir = $this->AURL . $this->DataDir;

			$this->ThemePath = $this->AURL . trim($ThemeDir, "/") . "/" . $this->Theme . "/";
			$this->AssetPath = $this->ThemePath . "assets/";

			$this->PerPage = 16;
			$this->Sort = "ProductName";
			$this->Ord = "Asc";
			$this->View = "grid";
			$this->CartType = "2";

			if (isset($_SESSION['PerPage'])){
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
			}

		}
		else {
			echo "<center>No website configured for this domain";
			exit();
		}
	}
}

$Site = new Site();
?>