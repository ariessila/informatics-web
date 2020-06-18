<div class="container--footer--widget">

	<div class="footer--widget">

		<div class="widget widget--address">

			<div class="widget__title">
				<h2>
					<?php echo ($model=='id')?'KONTAK': 'CONTACT';?>
				</h2>
			</div>


			<div class="widget__contacts">

				<div class="widget__content">
					<ul class="widget__content--contacts">
					<?php 
					$atur = $home->getPengaturan();
					
					echo "
						<li>
							".$atur['alamat']."
						</li>

					";
					
					
					?>
					
					</ul>
				</div>

			</div>

		</div>






		<div class="widget widget--link">

			<div class="widget__title">
				<h2>
					EXTERNAL LINK
				</h2>
			</div>


			<div class="widget__content">

				<ul class="widget__content--link">
					<?php 
					
					$link = $home->getLink();
					foreach($link as $link){
						
						echo '					
					<li>
						<a target="_blank" href="http://'.$link['link'].'">'.$link['link'].'</a>
					</li>
';
						
					}
					?>
					
				</ul>

			</div>

		</div>





		<div class="widget widget--statistics">

			<div class="widget__title">
				<h2>
					<?php echo ($model == 'id')?'STATISTIK':'STATISTIC';?>
				</h2>
			</div>


			<div class="widget__content">

				<ul class="widget__content--statistics">
				<?php 
				$ini = $pengunjung->countPengunjungHariIni();
				$minggu = $pengunjung->countPengunjungMingguIni();
				$seluruh = $pengunjung->countPengunjung();
				
				echo "
					<li>
						Hari ini <span class='statistics__count'>".$ini."</span>
					</li>

					<li>
						Minggu ini <span class='statistics__count'>".$minggu."</span>
					</li>

					<li>
						Keseluruhan  <span class='statistics__count'>".$seluruh."</span>
					</li>

				";
				
				
				?>
					
				</ul>

			</div>

		</div>







		<div class="widget widget--contacts">

			<div class="widget__title">
				<h2>
					<?php echo ($model=='id')?"LINK TERKAIT":"LINKS";?>
				</h2>
			</div>


			<div class="widget__content">

				<ul class="widget__content--contacts">

					
		<?php
		$sub = $subdomain->getSubdomain(0,15);
		
		foreach($sub as $sub){ 
		
		$ep = explode($subdomain_aktif,ROOT);
		$link = $ep[0];
		
		echo "
			<li>
				<a href='".$link.$sub['subdomain']."'>".$link.$sub['subdomain']."</a>
			</li>

		";
			
			
		}
		?>
		
		
				</ul>

			</div>

		</div>

	</div>

</div>





<div class="container--footer--copyright">

	<div class="footer--copyright">
<?php
		$pengaturan = $home->getPengaturan();
		echo "
		
		<p>&copy; Copyright ".date('Y')." . ".$pengaturan['footer']."<span style='float:right;'>Powered by Teknik Informatika Unhas</span></p>
		
		";
?>
		
	</div>

</div>


<div class="body-background"><img src="<?=ROOT?>images/layout/backgroundmain.jpg"/></div>