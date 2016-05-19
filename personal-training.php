<?php
require_once('include/require.php');

$PTranning = new PTranning(); 

StartHeader();
CloseHeader();
StartBody();
PrintTopHeader();
$PTranning->PrintPTranning();
CloseBody();


Class PTranning 
{
	function PTranning(){}	
	function PrintPTranning(){
	?>
    <div class="ipage trainingpage">
        <!-- ipage start -->
        <div class="rowhead">
            <h2>סדנא אישית</h2>
        </div>
        <div class="trainingpage_intro">
            <p>
                <?php
			$SQL = "select * from  page where Slug = 'personal-training'";
			$rs = GetRs($SQL) ;
			while($rw = mysql_fetch_array($rs)){
				
				?>
יתווסף ע"י המאפרת אלין מישייב				

                <?php
			}
			?>
            </p>
        </div>
    </div>
    <!-- ipage close -->
    <?php	
	}
}
?>