<?php
require_once('include/require.php');

$EActivity = new EActivity(); 

StartHeader();
CloseHeader();
StartBody();
PrintTopHeader();
$EActivity->PrintEActivity();
CloseBody();


Class EActivity 
{
	function EActivity(){}
	
	function PrintEActivity()
	{
		?>
		<div class="ipage trainingpage"><!-- ipage start -->
			<div class="rowhead">
				<h2>ערבי פעילות</h2>
			</div>
			<div class="trainingpage_intro">
				<p>
				<?php
				$SQL = "select * from  page where Slug = 'evenings-activity'";
				$rs = GetRs($SQL) ;
				while($rw = mysql_fetch_array($rs)){
	
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