<?php
require_once('include/require.php');

$EActivity = new EActivity(); 

StartHeader();//view of page with the logo
CloseHeader();//close of header
StartBody();//middle of page
PrintTopHeader();//tollbar of the page
$EActivity->PrintEActivity();
CloseBody();//close body

//class present evening tranning information
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