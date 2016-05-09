<?php

sajax_init();
sajax_export("GetVarietyDropDown");
sajax_export("ABC");
sajax_handle_client_request();

function GetProductImage($ProductID = 0, $Width= 0, $Height = 0, $Class = "", $Style = "" , $ID="" , $VarietyID = ""){
	global $Site;
	echo $VarietyID ;
	RecordOutput();
	$BrandID = GetValue("product", "ProductID", "BrandID", $ProductID);
	$Image1 = GetValue("variety", "VarietyID", "Image1", $VarietyID);
	
	$Title1 = GetValue("brand", "BrandID", "BrandName", $BrandID);
	$Title2 = GetValue("product", "ProductID", "ProductName", $ProductID);
	$Title = $Title1." ".$Title2 ;
	echo $Image1 ;
	echo $VarietyID ;
	if(empty($Image1)) {
	
		$SQL = "select * from product_image where ProductID = $ProductID and IsDefaultImage = 1"; 
		$rs = GetRS($SQL);
		$Path = "";
		if ($rw = mysql_fetch_array($rs)){

			if ($rw['ThumbImageName'] != ""){
				$Path = $rw['ThumbImageName'];
			}
			elseif ($rw['MidImageName'] != ""){
				$Path = $rw['MidImageName'];
			}
			elseif ($rw['LargeImageName'] != ""){
				$Path = $rw['LargeImageName'];
			}
			else {
				$Path = $Site->ADataDir . "nopic.gif";
			}
		}
		else {
			$Path = $Site->ADataDir . "nopic.gif";
		}
	}else{
	
	$Path = $Image1 ;
	}

	echo Img($Path, $Width, $Height, $Title, $Class = $Class , $Style , $ID);
	return GetOutput();
}


function GetVarietyImage($VarietyID = 0, $Width= 0, $Height = 0, $Class = "", $Style = "" ){
	global $Site;



	$SQL = "select * from variety where VarietyID = $VarietyID";
	$rs = GetRS($SQL);

	$Path = "";
	
	if ($rw = mysql_fetch_array($rs)){
		$Title = $rw['VarietyName'];

		if ($rw['Image1'] != ""){			
			if (is_file($Site->DataDir . $rw['Image1'])){
				$Path = $Site->ADataDir . $rw['Image1'];

				return Img($Path, $Width, $Height, $Title, $Class = "", $Style);
			}
			else {
				return "";
			}
		}
		else {
			return "";
		}
	}
	else {
		return "";
	}	
}

function GetProductMidImage($ProductID = 0){
	global $Site;
	RecordOutput();
	$Title = GetValue("product", "ProductID", "ProductName", $ProductID);
	
	$SQL = "select * from product_image where ProductID = $ProductID and IsDefaultImage = 1";
	$rs = GetRS($SQL);

	$Path = "";
	
	if ($rw = mysql_fetch_array($rs)){
		if ($rw['MidImageName'] != ""){
			$Path = $rw['MidImageName'];
		}
		elseif ($rw['LargeImageName'] != ""){
			$Path = $rw['LargeImageName'];
		}
		else {
			$Path = $Site->ADataDir . "nopic.gif";
		}
	}
	else {
		$Path = $Site->ADataDir . "nopic.gif";
	}

	echo Img($Path, 300, 0, $Title , 'imgbord');
	return GetOutput();	
}

function GetNoOfProductInCat($CatID = 0){
	global $Site;

	$Path = GetValue("cat","CatID","Path", $CatID, "");

	$SQL = "select CatID from cat where Path like '%$Path'";
	$mCatID = GetInStr($SQL);

	$SQL = "select count(distinct product.ProductID) from product_cat left join product on product_cat.ProductID = product.ProductID where product_cat.CatID in ($mCatID) and  product.IsEnable = 1 and product.BrandID in ($Site->Brands) and (select count(VarietyID) from variety where variety.ProductID = product.ProductID and IsEnable = 1) > 0";
	return GetVal($SQL);
}

function GetNoOfProductInBrand($BrandID = 0){
	global $Site;
	$SQL = "select count(distinct product.ProductID) from product where product.IsEnable = 1 and product.BrandID in ($Site->Brands) ";
	if ($BrandID > 0){
		$SQL .= " and product.BrandID = $BrandID ";
	}
	return GetVal($SQL);
}

function GetProductDefaultVariety($ProductID = 0){
	$SQL = "select VarietyID from variety where ProductID = $ProductID and IsEnable = 1 and IsDefaultVariety = 1 order by IsDefaultVariety desc limit 0,1";
	return GetVal($SQL, 0, 0);
}

function GetProductDefaultPrice($ProductID = 0, $IsFormated = false){
	$SQL = "select Price, IsPOA from variety where ProductID = $ProductID and IsEnable = 1 and IsDefaultVariety = 1 order by IsDefaultVariety desc, IsPOA limit 0,1";
	$Price = GetVal($SQL, 0, 0);
	$IsPOA = GetVal($SQL, 1, 0);

	if ($Price > 0 && $IsPOA != 1){
		if (! $IsFormated){
			return $Price;
		}
		else {
			return FormatCur($Price);
		}
	}
	else {
		if (! $IsFormated){
			return "0";
		}
		else {
			return "P.O.A.";
		}
	}
}

function GetVarietyPrice($VarietyID = 0, $IsFormated = false){
	$SQL = "select Price, IsPOA from variety where VarietyID = $VarietyID and IsEnable = 1 order by IsDefaultVariety desc, IsPOA limit 0,1";
	$Price = GetVal($SQL, 0, 0);
	$IsPOA = GetVal($SQL, 1, 0);

	if ($Price > 0 && $IsPOA != 1){
		if (! $IsFormated){
			return $Price;
		}
		else {
			return FormatCur($Price);
		}
	}
	else {
		if (! $IsFormated){
			return "0";
		}
		else {
			return "P.O.A.";
		}
	}
}

function GetCategoryPath ($CatID, $URL = "category/", $IsWithCounting = true){
	global $Site;

	$numPath = GetValue("cat","CatID","Path",$CatID);
	$arrPath = explode(".",$numPath);
	$strP = "";
	while (list($IndexValue, $n) = each($arrPath)){
		$n = (int)$n;
		if ( IsValueInCSV($Site->Cats, $n) ){
			$ObjName = GetValue("cat","CatID","CatName",$n,"");
			$Slug = GetValue("cat","CatID","Slug",$n,"");

			if ($ObjName != ""){
				if (! $IsWithCounting){
					$strP =  "<a style = \"color: #868889;text-decoration: none;\" href = \"" . $URL . $Slug . "/\"  title=\"$ObjName\">" . $ObjName . "</a>  <span  style = \"color: #0000FF;font-size: 12px;font-weight: bold;padding: 0 5px;\">&gt;</span>  " . $strP ;
				}
				else {
					$NOR = GetNoOfProductInCat($n);
					$strP =  "<a style = \"color: #868889;text-decoration: none;\" href = \"" . $URL . $Slug . "/\" title=\"$ObjName\">" . $ObjName . " ($NOR)</a>  <span  style = \"color: #0000FF;font-size: 12px;font-weight: bold;padding: 0 5px;\">&gt;</span>  " . $strP ;
				}
			}
		}
	}

	return $strP;
}

function GetNoOfVariety($ProductID = 0){
	$SQL = "select VarietyID from variety where ProductID = $ProductID and IsEnable = 1 order by IsDefaultVariety desc, IsPOA";
	return GetNoOfRec($SQL);
}

function GetNoOfProductInWishlist($WishlistID = 0){
	$SQL = "select * from wishlist_variety where WishlistID = $WishlistID";
	return GetNoOfRec($SQL);
}

function GetDefaultWishlist($MemberID = 0){
	global $SAWMemberID;

	if ($MemberID <= 0){
		if (isset($_SESSION['SAWMemberID'])){
			$MemberID = $_SESSION['SAWMemberID'];
		}
	}

	return GetValue("wishlist", "MemberID", "WishlistID", $MemberID, 0);
}


function Attribute($Attribute = ""){
	if (is_array($Attribute)){
		$mvarAttribute = serialize($Attribute);
	}
	else {
		$mvarAttribute = $Attribute;
	}
	return $mvarAttribute;
}





function GetVarietyDropDown($ProductID = 0, $CVarietyID = 0, $UVarietyID = 0, $Value = 0){
	$DropDown = My($ProductID, $CVarietyID, $UVarietyID, $Value);

	if ($UVarietyID < 0){
		$UVarietyID = $CVarietyID;
	}

	$Rtn[] = $CVarietyID; // Div to Update
	$Rtn[] = $UVarietyID; // Name of div to next variety load
	$Rtn[] = $DropDown; // Data
	
	$Price = GetValue("variety", "VarietyID", "Price", $UVarietyID, 0); // Price for current select

	if ($Price <= 0){
		$Rtn[] = "0";
	}
	else {
		$Rtn[] = FormatCur($Price);
	}
	
	$Rtn[] = GetVarietyImage($UVarietyID, 100);
	$Rtn[] = RTFTrim(GetValue("variety", "VarietyID", "DetailDesc", $UVarietyID, "")); // Detail Description for current select
	$Rtn[] = GetValue("variety", "VarietyID", "IsNotAllow", $UVarietyID, 0); // Allow selection or not for current select
	$Rtn[] = GetValue("variety", "VarietyID", "MinQty", $UVarietyID, 0); // Minimum Quantity for current select
	$Rtn[] = GetValue("variety", "VarietyID", "AvaQty", $UVarietyID, 0); // Available Quantity for current select
	$Rtn[] = GetValue("variety", "VarietyID", "IsNotAllow", $UVarietyID, 0); // Available Quantity for current select

	return $Rtn;
}

function My($ProductID = 0, $CVarietyID = 0, $UVarietyID = 0, $Value = 0){
	$SQL = "select * from variety where ProductID = $ProductID and UVarietyID = $UVarietyID order by VarietyCode";
	$rs = GetRS($SQL);
	$NOR = GetNoOfRec($SQL);

	if ($NOR > 0){
		RecordOutput();
		
			//echo "<table cellpading=\"0\" cellspacing=\"0\">";
			echo "<tr>";
				echo "<td colspan=\"2\" style=\"background: #DDDDDD; padding: 4px; width: 200px; font-weight: bold; border: 0px solid #cccccc; -moz-border-radius:8px  0px  0px 0px; border-radius: 8px 0px  0px 0px;\">Color</td>";
				//echo "<td style=\"background: #DDDDDD; padding: 4px; width: 60px; font-weight: bold; border: 0px solid #cccccc; text-align: right;\"><b>Price</b></td>";
				//echo "<td style=\"background: #DDDDDD; padding: 4px; width: 60px; font-weight: bold; border: 0px solid #cccccc; text-align: right; -moz-border-radius:0px  8px  0px 0px; border-radius: 0px 8px  0px 0px;\"><b>In Stock</b></td>";
			echo "</tr>";

			echo "<option value = \"-1\">Please select</option>";
			while ($rw = mysql_fetch_array($rs)){
			
				echo "<tr>";
				
				if ($rw['VarietyID'] == $Value){
					echo "<td style=\"padding: 2px; border: 0px solid #EEEEEE;\"><input type = \"radio\" name = \"size\" value = \"$rw[VarietyID]\"  onClick = \"LoadVarietyDD($UVarietyID, this.value)\"></td>";
					echo "<td style=\"padding: 2px; border: 0px solid #EEEEEE;\">" . $rw['VarietyName'] . "</td>";
					//echo "<td style=\"padding: 2px; border: 0px solid #EEEEEE; text-align: right;\">" . FormatCur($rw['Price']) . "</td>";
					//echo "<td style=\"padding: 2px 6px 2px 0; border: 0px solid #EEEEEE; text-align: right;\">" . $rw['AvaQty'] . "</td>";
					//echo "<option value = \"$rw[VarietyID]\" selected>$rw[VarietyName]</option>";
				}
				else {
					echo "<td style=\"padding: 2px; border: 0px solid #EEEEEE;\"><input type = \"radio\" name = \"size\" value = \"$rw[VarietyID]\" onClick = \"LoadVarietyDD($UVarietyID, this.value)\"></td>";
					echo "<td style=\"padding: 2px; border: 0px solid #EEEEEE;\">" . $rw['VarietyName'] . "</td>";
					//echo "<td style=\"padding: 2px; border: 0px solid #EEEEEE; text-align: right;\">" . FormatCur($rw['Price']) . "</td>";
					//echo "<td style=\"padding: 2px 6px 2px 0; border: 0px solid #EEEEEE; text-align: right;\">" . $rw['AvaQty'] . "</td>";
					//echo "<option value = \"$rw[VarietyID]\">$rw[VarietyName]</option>";
				}

				echo "</tr>";
			}	
			//echo "</select>";

			//echo "</table>";

		return GetOutput();
	}
	else {
		return "";
	}
}

function GetVarietySection($ProductID, $VarietyID = 0){
	$numPath = GetValue("variety", "VarietyID", "Path", $VarietyID, "");
	$arrPath = array_reverse(explode(".",$numPath));
	$strP = "";

	$LastVal = 0;
	while (list($IndexValue, $n) = each($arrPath)){
		
		$Value = 0;
		if (isset($arrPath[$IndexValue + 1])){
			$Value = $arrPath[$IndexValue + 1];
		}

		
		$strP .= My($ProductID, intval($LastVal), intval($n), intval($Value));
		$strP .= "<div id = 'newquote" . intval($n) . "'>";
		$LastVal = $n;
	}

	for ($i = 0;$i<count($arrPath);$i++){
		$strP .= "</div>";
	}
	return $strP;
}

function xGetVarietySection($ProductID, $CVarietyID, $UVarietyID, $Value = 0){
	if ($CVarietyID != $UVarietyID){		
		$C = $UVarietyID;
		$U = GetValue("variety", "VarietyID", "UVarietyID", $C, 0);

		$strP = "<div id = 'a_newquote" . $CVarietyID . "'>";
		$strP .= GetVarietySection1($ProductID, $C, $U, $C);		
		$strP .= My($ProductID, $CVarietyID, $UVarietyID, $Value);
		$strP .= "</div>";
		
		return $strP;
	}
	else {
		return "";
	}
}


function GetAllBrand($SQL ="" , $Ulstyle = "") {
global $Site;
	$SQL = $SQL;
	$rs  = getRs($SQL) ;
	$Count = 0 ;
	$Alphabet = 'A' ;
	$NOR = mysql_num_rows($rs) ;
	$Division = ceil($NOR/4) ;
	while($rw = mysql_fetch_array($rs)){

	$GetFirstChar = substr($rw['BrandName'] ,0 , 1) ;

	$Count = $Count + 1;
	
	if($GetFirstChar != $Alphabet) {
		echo "<p> &nbsp;</p>";
		$Alphabet = $GetFirstChar ;
		}
		?>

    <li>
        <a href="<?php echo $Site->AURL ?>brand-product/<?php echo $rw['Slug'] ?>/">
            <?php echo $rw['BrandName'] ?>
        </a>
    </li>


    <?php
	if( ($Count )%($Division) == 0) {
	?>
        </ul>
        <ul class="allbrand" style="<?php echo $Ulstyle ?>">
            <?php
	}
	}
}


function GetInnerAllBrand($SQL ="" , $Ulstyle = "" , $Slug = "brand-product/") {
global $Site;
	$SQL = $SQL;
	$rs  = getRs($SQL) ;
	$Count = 0 ;
	$Alphabet = 'A' ;
	$NOR = mysql_num_rows($rs) ;
	$Division = ceil($NOR/3) ;
	while($rw = mysql_fetch_array($rs)){

	$GetFirstChar = substr($rw['BrandName'] ,0 , 1) ;

	$Count = $Count + 1;
	
	if($GetFirstChar != $Alphabet) {
		echo "<li style='width:135px;list-style-type:none;'><p style='line-height:10px;'> &nbsp;</p></li>";
		$Alphabet = $GetFirstChar ;
		}
		?>

                <li style="width:135px;list-style-type:none;">
                    <a href="<?php echo $Site->AURL ?><?php echo $Slug;  ?><?php echo $rw['Slug'] ?>/" style="font: 11px/1px Arial, Helvetica, sans-serif;color:#FE0000;">
                        <?php echo $rw['BrandName'] ?>
                    </a>
                </li>


                <?php
	if( ($Count )%($Division) == 0) {
	?>
        </ul>
        <ul class="allbrand" style="width:135px;margin:0px;">
            <?php
	}
	}
}


function GetSliderBrandImages(){
global $Site;
	$SQL = "Select * from brand where IsEnable = 1 ORDER BY RAND() limit 0 , 30";
	$rs  = getRs($SQL) ;
	$i = 1 ;
	while($rw = mysql_fetch_array($rs)){
	
	?>
                <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-<?php echo $i ?> jcarousel-item-<?php echo $i ?>-horizontal" style="float: left; list-style: none;" jcarouselindex="<?php echo $i ?>">
                    <a href="<?php echo $Site->AURL ?>brand-product/<?php echo $rw['Slug'];  ?>/">
					<img src="<?php echo $rw['Image1'] ?>" border="0" class="img" width="141px;" height="89px;"></a></li>
                <a href="#">
                </a>
                <?php
	$i = $i + 1 ;
	}
}

?>