<?php
require_once('include/require.php');

$GTranning = new GTranning(); 

StartHeader();//view of page with the logo
CloseHeader();//close of header
StartBody();//middle of page
PrintTopHeader();//tollbar of the page
$GTranning->PrintGTranning();
CloseBody();//close body

//class present group tranning information
Class GTranning 
{
	function GTranning(){}
	//page form
	function PrintGTranning()
	{
		?>
		<div class="ipage trainingpage"><!-- ipage start -->
			<div class="rowhead">
				<h2>סדנה קבוצתית</h2>
			</div>
			<div class="trainingpage_intro">
				<?php
				$SQL = "select * from  page where Slug = 'group-training' ";
				$rs = GetRs($SQL) ;
				while($rw = mysql_fetch_array($rs)){
					echo $rw['DetailDesc']
				?>			<?php
				}
				?>
			</div>
		</div><!-- ipage close -->
	<?php	
	}
}
?>