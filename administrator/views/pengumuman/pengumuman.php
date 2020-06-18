<?php 
if(isset($parameter)):	

$a = explode('-',$parameter);
$attention = $a[0];
if(is_numeric($attention)){

?>

<div class='container--content--page'>

	<div class='content'>

		<div class='content--main'>

			<div class='main--section'>

				
				<?php 
				
				$detail = $pengumuman->getPengumumanById($attention);
				
				if(!empty($detail['gambar'])){
				echo "
				
				<div class='main--section__featured-image'>
					<img src='".ROOT."images/content/news/".$detail['gambar']."'/>
				</div>
				
				";	
				
				}
				
				echo"
				
				<div class='main--section__meta'>
					<strong>".$libs->tgl_indo($detail['tanggal'])."</strong> 
				</div>

				<div class='main--section__title'>

					<h1>
						".$detail['judul']."
					</h1>

				</div>

				<div class='main--section__share'>
				   <div class='addthis_sharing_toolbox'></div>
				</div>

				<div class='main--section__content'>

					<div class='main--content--text'>
					  ".
					  
						$detail['konten']
					  
					  ."
					</div>

				</div>
				
				
				";
				
				?>
				


			</div>

		</div>



	<?php
	include"component/sidebar.php";
	
	?>

	</div>




	<div class='clear'></div>

</div>

<?php 
}else{
	header('location:'.ROOT.'');
}
endif;
?>