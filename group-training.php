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
	
	function PrintGTranning()
	{
		?>
		<div class="ipage trainingpage"><!-- ipage start -->
			<div class="rowhead">
				<h2>סדנה קבוצתית</h2>
			</div>
			<div class="trainingpage_intro">

			<h1><p>	מארגנת מסיבת רווקות וכולן אוהבת להתאפר?</p>
				<p> מעוניינים לצ'פר את הנשים בעבודה?</p>
				<p>הגעת למקום הנכון.</p><br>

				<p>סדנא קבוצתית כוללת:</p>
				<p> ^ לימוד על סוגי העור השונים ואבחון סוג העור שלך.</p>
				<p> ^ טיפים לטיפוח העור, נקיון הפנים ותכשירי טיפוח שונים.</p>
				<p> ^ אבחון צורת הפנים וצורת העין.</p>
				<p> ^ לימוד טכניקות עיצוב, חיטוב של צורת הפנים בשיטת המורפולוגיה.</p>
				<p> ^ טיפים וטכניקות לאיפור יום יומי.</p>
				<p> ^ לימוד טכניקה למריחת האיילינר</p>
				<p> ^ שדרוג איפור יום יומי לאיפור ערב עמיד ומרשים.</p><br>
				
				<p>כמות המשתתפים בסדנה קבוצתית נעה בין 10 ל-60 אנשים.</p><br>				
				<p>~ למסיבות רווקות מובטחות הפתעות ובניית התוכן יחד עם המארגנת ~</p></h1>
			</div>
		</div><!-- ipage close -->
		<?php	
	}
}
?>