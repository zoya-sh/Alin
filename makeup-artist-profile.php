<?php
require_once('include/login.php');

$Profile = new Profile(); 

StartHeader();//view of page with the logo
CloseHeader();//close of header
StartBody();//middle of page
PrintTopHeader();//tollbar of the page
$Profile->PrintProfile();//profile page
CloseBody();//close body

//class that present a user of the website- artist or other user
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
				<!-- if user name is the same as a Ccookie we will show user profile -->
				<?php if($_SESSION['SAWProfileType'] == 'user'){ ?>
					<h2>פרופיל לקוח</h2>
					<?php
				}
				else//alse will show makeup artist profile
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
								<a href="makeup-artist-profile.php?mode=logout" class="videopage_intro_coll_top_row_btn videopage_intro_coll_top_row_btn1"><center>התנתק</center></a>
							</div>
							<div class="videopage_intro_coll_top_row">
								<a href="chnagepassword.php" class="videopage_intro_coll_top_row_btn videopage_intro_coll_top_row_btn2"><center>שינוי סיסמא</center></a>
							</div>
						</div>
						<?php 
						
						if($_SESSION['SAWProfileType'] == 'user')
						{
							$y = 10;
							$result = fmod($rw['Treatment'],$y);
							if($rw['Treatment'] <5)
							{
							?>
			
							<?php
							}
							elseif($rw['Treatment'] > 4)
							{
								//user treatment between more then 10
								if($result >-1 and $result <5)
								{
								?>
								<div class="videopage_intro_coll_bottom">
									<div class="videopage_intro_coll_bottom_row">
										<a href="<?php echo $Site->ThemePath ?>images/treatment10.png" target="_new" class="videopage_intro_coll_top_row_btn videopage_intro_coll_top_row_btn3">הדפס</a>
									</div>
									<div class="videopage_intro_coll_bottom_row">
										<img src="<?php echo $Site->ThemePath ?>images/treatment10.png" alt="" />
									</div>	
								</div>		
								<?php	
								}
								//user treatment between more then 5 
								elseif($result > 4 and $result <10)
								{
									?>
									<div class="videopage_intro_coll_bottom">
										<div class="videopage_intro_coll_bottom_row">
											<a href="<?php echo $Site->ThemePath ?>images/treatment5.png"  target="_new"  class="videopage_intro_coll_top_row_btn videopage_intro_coll_top_row_btn3">הדפס</a>
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
					</div><!-- user profile - name, phone number email and number of treatment// -->
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
					//if it's artist profile, will show 2 link to different pages:makeup customers, nails customers
					}
					elseif($_SESSION['SAWProfileType'] == 'artist')
					{
					?>
						<div style="width:100%">
						<div class="videopage_intro_coll_bottom" style="width:46%;float:left;margin:5px">
						<center><b><font color=#8B2252 size=4><a href="nails-costomers.php">לקוחות ציפורניים</a></font></b></center>
						</div>
						<div class="videopage_intro_coll_bottom"  style="width:46%;float:left;margin:5px">
						<center><b><font color=#8B2252 size=4><a href="makup-costomers.php">לקוחות איפור</a></b></font></center>
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
			echo '<b><font color=red>משתמש לא קיים</b></font>';
		}
		?>
		</div><!-- ipage close// -->		
		<?php	
	}
}
?>