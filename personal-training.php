<?php
require_once('include/require.php');

$PTranning = new PTranning(); 

StartHeader();//view of page with the logo
CloseHeader();//close of header
StartBody();//middle of page
PrintTopHeader();//tollbar of the page
$PTranning->PrintPTranning();
CloseBody();//close body

//class present personal tranning information
Class PTranning 
{
	function PTranning(){}
	//page form
	function PrintPTranning()
	{
		?>
		<div class="ipage trainingpage"><!-- ipage start -->
			<div class="rowhead">
				<h2>סדנה אישית</h2>
			</div>
			<div class="trainingpage_intro">
				<?php
				$SQL = "select * from  page where Slug = 'personal-training' ";
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