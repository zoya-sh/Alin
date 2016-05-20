<?php
require_once('include/login.php');

$Profile = new Profile(); 

StartHeader();
CloseHeader();
StartBody();
PrintTopHeader();
$Profile->PrintProfile();
CloseBody();


Class Profile 
{

	function Profile(){}
	
	function PrintProfile()
	{
		global $SAWMemberID ;
		global $SAWProfileType ;
		global $Site ;
		?>
		<div class="ipage artistprofile"><!-- ipage start -->
			<div class="rowhead">
				<?php if($_SESSION['SAWProfileType'] == 'user'){ ?>
					<h2>פרופיל לקוח</h2>
					<?php
				}
				else
				{
					?>
					<h2>פרופיל אמנית האיפור</h2>
					<?php
				}
				?>
			</div>
			<?php
			$SQL ="select * from member where MemberID = $SAWMemberID";
			$rs = GetRs($SQL);
			if($rw = mysql_fetch_array($rs))
			{
				?>	
				<div class="artistprofile_intro">
					<div class="videopage_intro_coll"><!-- videopage_intro_coll start -->
						<div class="videopage_intro_coll_top">
							<div class="videopage_intro_coll_top_row">
								<a href="makeup-artist-profile.php?mode=logout" class="videopage_intro_coll_top_row_btn videopage_intro_coll_top_row_btn1">התנתק</a>
							</div>
							<div class="videopage_intro_coll_top_row">
								<a href="chnagepassword.php" class="videopage_intro_coll_top_row_btn videopage_intro_coll_top_row_btn2">שינוי סיסמא</a>
							</div>
						</div>
						<?php 
						
						if($_SESSION['SAWProfileType'] == 'user')
						{
							//$Count = $Count + 1;
							$y = 10;
							$result = fmod($rw['Treatment'],$y);
							//echo $result ;
							if($rw['Treatment'] <5)
							{
							?>
			
							<?php
							}
							elseif($rw['Treatment'] > 4)
							{
								if($result >-1 and $result <5)
								{
								?>
								<div class="videopage_intro_coll_bottom">
									<div class="videopage_intro_coll_bottom_row">
										<a href="<?php echo $Site->ThemePath ?>images/treatment10.png" target="_new" class="videopage_intro_coll_top_row_btn videopage_intro_coll_top_row_btn3">print</a>
									</div>
									<div class="videopage_intro_coll_bottom_row">
										<img src="<?php echo $Site->ThemePath ?>images/treatment10.png" alt="" />
									</div>	
								</div>		
								<?php	
								}
								elseif($result > 4 and $result <10)
								{
									?>
									<div class="videopage_intro_coll_bottom">
										<div class="videopage_intro_coll_bottom_row">
											<a href="<?php echo $Site->ThemePath ?>images/treatment5.png"  target="_new"  class="videopage_intro_coll_top_row_btn videopage_intro_coll_top_row_btn3">print</a>
										</div>
										<div class="videopage_intro_coll_bottom_row">
											<img src="<?php echo $Site->ThemePath ?>images/treatment5.png" alt="" />
										</div>	
									</div>		
									<?php
								}
							}	
						}
							?>
					</div><!-- videopage_intro_coll close// -->
					
					<?php if($_SESSION['SAWProfileType'] == 'user'){ ?>
					<div class="videopage_intro_colr"><!-- videopage_intro_colr start -->
						<div class="videopage_intro_colr_row1">
							<p><?php echo $rw['FirstName'] ?>  <?php echo $rw['LastName'] ?></p>
							<p><?php echo  $rw['TelNo'] ?></p>
							<p><?php echo  $rw['Email'] ?></p>
							</div>
						<div class="videopage_intro_colr_row2">	
							<p>טיפול מס:  <?php echo $rw['Treatment'] ?></p>
						</div>
		
					</div><!-- videopage_intro_colr close// -->
					<?php 
					}elseif($_SESSION['SAWProfileType'] == 'artist'){
					?>
					<div style="width:100%">
					<div class="videopage_intro_coll_bottom" style="width:46%;float:left;margin:5px">
					<center><a href="nails-costomers.php">לקוחות ציפורניים</a></center>
					</div>
					<div class="videopage_intro_coll_bottom"  style="width:46%;float:left;margin:5px">
					<center><a href="makup-costomers.php">לקוחות איפור</a></center>
					</div>
					</div>
					<?php	
					}
					?>
				<div class="clear"></div>
				</div>
		<?php
		}
		else
		{	
			echo "member does not exist" ;
		}
		?>
		</div><!-- ipage close// -->		
		<?php	
	}
}
?>