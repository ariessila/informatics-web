<div class="container--top__nav">

	<div class="nav">

		<ul class="nav__main">
		
			

<?php 

echo ($model == 'id')?"<li><a href='".ROOT.$model."/'>Beranda</a></li>":"<li><a href='".ROOT.$model."/'>Home</a></li>";
if(isset($model)):
//dsini  dari semua navigasi

$navigasi = $halaman->getParentHalaman();
	

foreach($navigasi as $navigasi){
	$child_nav = $halaman->getHalamanChild($navigasi['id_halaman']);
	
	$child_active = $halaman->getHalamanChildActive($navigasi['id_halaman'],$parameter);
	
	// $child_nav2 = $halaman->getHalamanChildSub($navigasi['id_halaman']);

	echo ($parameter == $navigasi['id_halaman'] or $child_active == 1 )?"<li class='nav__main--active' >":"<li>";
 
	echo ($model=='en')?
	"<a href='".ROOT.$model.'/page/'.$navigasi['id_halaman'] .'/'. $navigasi['link_halaman_en'] . "'>".$navigasi['judul_halaman_en']."</a>":
	"<a href='".ROOT.$model.'/page/'.$navigasi['id_halaman'] .'/'. $navigasi['link_halaman_id'] . "'>".$navigasi['judul_halaman_id']."</a>"; 
		if(isset($child_nav)){
			echo "<ul class='nav__main__sub'>";
			// var_dump($child_nav);
			foreach($child_nav as $child_nav){
				
				if($model!='en'){

					echo ($parameter==$child_nav['id_halaman'])?
					
					"<li class='nav__main__sub--active'>":"<li>";

					echo"
						<a href='".ROOT.$model.'/page/'.$child_nav['id_halaman'] .'/'. $child_nav['link_halaman_id'] . "'>".$child_nav['judul_halaman_id']."</a>
					</li>"; 
					
				}else{
					
					echo ($parameter==$child_nav['id_halaman'])?
					
					"<li class='nav__main__sub--active'>":"<li>";

					echo"
						<a href='".ROOT.$model.'/page/'.$child_nav['id_halaman'] .'/'. $child_nav['link_halaman_en'] . "'>".$child_nav['judul_halaman_en']."</a>
					</li>";
					
					
				}
			}
			echo "</ul>";
		}
	echo "</li>";
	
}
	
// $hasil = $manajemen_halaman->getManajemenHalaman();
// $data = json_decode($hasil['halaman'],true);
			
					
			
// foreach($data as $parrent)
		// { 
		
		// $main = $halaman->getHalamanByIdForNav($parrent['id']);
		
		// if(isset($parrent['children']))
			// {
			
			// if($model == 'id'){
			// echo ($libs->cari($parameter,$parrent['children']) == 1 or $parameter==$main['link_halaman_id'] )? 
				
				// "<li class='nav__main--active' >":"<li>";
		
			// echo 	"<a href='".ROOT.$model.'/page/'.$main['id_halaman'].'/'.$main['link_halaman_id']."'>".$main['judul_halaman_id']."<i class='fa fa-angle-down'></i></a>

					// <ul class='nav__main__sub'>";
			
			// }else{
				
			// echo ($libs->cari($parameter,$parrent['children']) == 1 or $parameter==$main['link_halaman_en'] )? 
				
				// "<li class='nav__main--active' >":"<li>";
		
			// echo 	"<a href='".ROOT.$model.'/page/'.$main['id_halaman'].'/'.$main['link_halaman_en']."'>".$main['judul_halaman_en']."<i class='fa fa-angle-down'></i></a>

					// <ul class='nav__main__sub'>";
				
			// }
				
				
				// foreach($parrent['children'] as $sub)
				// {
				// if($model == 'id'){
					
				// $sub = $halaman->getHalamanById($sub['id']);
					
				// echo ($parameter==$sub['link_halaman_id'])?"<li class='nav__main__sub--active'>":"<li >";
				// echo" <a href='".ROOT.$model.'/page/'.$sub['id_halaman'].'/'.$sub['link_halaman_id']."'>".$sub['judul_halaman_id']."</a>
				  // </li>"; 
											
				// }else{
						
				// $sub = $halaman->getHalamanById($sub['id']);
					
				// echo ($parameter==$sub['link_halaman_en'])?"<li class='nav__main__sub--active'>":"<li >";
				// echo" <a href='".ROOT.$model.'/page/'.$sub['id_halaman'].'/'.$sub['link_halaman_en']."'>".$sub['judul_halaman_en']."</a>
				  // </li>"; 
					
				// }
			
			
			
				// }//akhir sub 1
			// echo "
				// </ul>
			// </li>
			
			// ";
			
			// }else{//parrent
			
			// if($model == 'id'){
				// echo ($parameter==$main['link_halaman_id'])?
				
				// "<li class='nav__main--active'>":"<li>";

				// echo"
					// <a href='".ROOT.$model.'/page/'.$main['id_halaman'] .'/'. $main['link_halaman_id'] . "'>".$main['judul_halaman_id']."</a>
				// </li>"; 
			// }else
			// {
				// echo ($parameter==$main['link_halaman_en'])?
				
				// "<li class='nav__main--active'>":"<li>";

				// echo"
				// <a href='".ROOT.$model.'/page/'.$main['id_halaman'] .'/'. $main['link_halaman_en'] . "'>".$main['judul_halaman_en']."</a>
				// </li>"; 
			// }
			
			// }//parrent
		
		// }//		

endif;
?>
			
		</ul>

		<select class="nav__mobile">
			<option value="" selected="selected">NAVIGASI</option> 
	
			<option value="<?=ROOT?>">Home</option>

<?php 
		$mini_nav = $halaman->getHalamanForMiniNav();
		foreach($mini_nav as $mini_nav){
			if($model=='id'){
				echo " 
				<option value='".ROOT.$model.'/page/'.$mini_nav['id_halaman'] .'/'. $mini_nav['link_halaman_id'] . "'>".$mini_nav['judul_halaman_id']."</option> 
			
				";
				
			}else{
				echo " 
				<option value='".ROOT.$model.'/page/'.$mini_nav['id_halaman'] .'/'. $mini_nav['link_halaman_en'] . "'>".$mini_nav['judul_halaman_en']."</option> 
			
				";
				
			}
				
			
		}
	
?>
		
		
		</select>

	</div>
	
	<div class="container-search">
		<ul class="language">
			
			<?php 
			$methodId = (!empty($method))?'id/'.$method.'/'.$parameter : 'id/';
			$methodEn = (!empty($method))?'en/'.$method.'/'.$parameter : 'en/';
			
			echo"
			<li>
				<a href='".ROOT.$methodId."'><img src='".ROOT."images/id.png'></a></li>
			</li>
			<li class='selected'>
				<a href='".ROOT.$methodEn."' ><img src='".ROOT."images/en.png'></a></li>
			</li>
			
			";
			
			?>
			
		</ul>
	<form method='post' style='display:inline;' action='<?php echo ROOT.$model."/cari/"; ?>'>
			<input type="text" placeholder="" name='katacari' class="search">
	</form>
	</div>
</div>
