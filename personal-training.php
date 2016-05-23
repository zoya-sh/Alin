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
	function PrintPTranning(){
	?>
    <div class="ipage trainingpage">
        <!-- ipage start -->
        <div class="rowhead">
            <h2>סדנא אישית</h2>
        </div>
        <div class="trainingpage_intro">
           
			<p>בואי להתפנק בשעתיים של יופי!</p>
			<p>מה כוללת הסדנה האישית:	</p>
			<p># אבחון סוג העור צורת הפנים וצורת העין.	</p>
			<p># טיפים לטיפוח נכון של העור .	</p>
			<p># למידה של התאמת  בסיס (מייק-אפ) לגוון העור שלך ללא כל עזרה	</p>
			<p># התאמת סגנון איפור יום יומי לצורת העין הספציפית שלך.		</p>
			<p>למידה של שדרוגי איפור..מה הכוונה?!	</p>
			<p>חזרת אחרי יום מטורף?!	</p>
			<p>נשארו לך 20 דק להתארגן?!		</p>
			<p>בואי וגלי איך את משדרגת את האיפור היום יומי בנגיעות קלות 	</p>
			<p>שדורשות מאיתנו 5 דקות והופכות את האיפור לאיפור ערב זוהר ומרשים!	</p>
			<p>בשונה מסדנאות אחרות זו היא סדנה מעשית שבא את מיישמת את הנלמד.	</p>
			<p>רוצה לעבור חוויה כיפית עם חברה? אחות? אמא?	</p>
			<p>סדנא אישית אפשר לקבוע עד 3 בנות יחד.	</p>		

        </div>
    </div>
    <!-- ipage close -->
    <?php	
	}
}
?>