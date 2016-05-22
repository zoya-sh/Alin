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

				<p>	מארגנת מסיבת רווקות שכולן אוהבות להתאפר?!</p>
				<p> רוצה לצ'פר את הנשים בעבודה?</p>
				<p> הגעתן למקום הנכון.</p>
				<p> סנדא קבוצתית מה כוללת? איפור טוב יושב על עור טוב.</p>
				<p> # ילמדו בנות הקבוצה על סוגי עור שונים וידעו לאבחן את העור שלהן.</p>
				<p> # יקבלו טיפים לטיפוח העור שטיפה ניקיון הפנים ותכשירי טיפוח.</p>
				<p> # ידעו לאבחן כל אחת את צורת הפנים שלה.</p>
				<p> # ילמדו איך לעצב ולחטב את צורת הפנים בעזרת שיטת המורפולוגיה.</p>
				<p> # טיפים וטכניקות לאיפור יום יומי.</p>
				<p> # טכניקה למריחת האיילינר שחזר לאופנה ובגדול.</p>
				<p> # שדרוג האיפור הקל לאיפור ערב עמיד ומרשים.</p>
				<p> הסדנא מתאימה למעל 10 בנות  בקבוצה ועד קבוצות של 60 בנות.</p>
				<p>  </p>
				<p>* למסיבות רווקות מובטחות הפתעות ובניית התוכן יחד עם המארגנת .</p>
			</div>
		</div><!-- ipage close -->
		<?php	
	}
}
?>