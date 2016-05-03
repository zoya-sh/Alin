<?php
require_once('include/require.php');

$GTranning = new GTranning(); 

StartHeader();
CloseHeader();
StartBody();
PrintTopHeader();
$GTranning->PrintGTranning();
CloseBody();


Class GTranning 
{

	function GTranning(){}
	
	function PrintGTranning()
	{
		?>
		<div class="ipage trainingpage"><!-- ipage start -->
			<div class="rowhead">
				<h2>סדנא קבוצתית</h2>
			</div>
			<div class="trainingpage_intro">
				<p>
				<?php
				$SQL = "select * from  page where Slug = 'group-training'";
				$rs = GetRs($SQL) ;
				while($rw = mysql_fetch_array($rs))
				{
					
					?>
יתווסף ע"י המאפרת אלין מישייב				
					<?php
				
				}
				?>
				</p>
			</div>
		</div><!-- ipage close -->
		<?php	
	}
}
?>